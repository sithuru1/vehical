<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'lanka_drive';
$username = 'root';
$password = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connect to database
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get form data with sanitization
        $vehicle = htmlspecialchars($_POST['car_name']);
        $customer_name = htmlspecialchars($_POST['customer_name']);
        $pickup_location = htmlspecialchars($_POST['pickup_location']);
        $pickup_date = htmlspecialchars($_POST['pickup_date']);
        $dropoff_date = htmlspecialchars($_POST['dropoff_date']);
        $passengers = (int)$_POST['passengers'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($_POST['phone']);
        
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address");
        }

        // Calculate total days
        $start = new DateTime($pickup_date);
        $end = new DateTime($dropoff_date);
        $interval = $start->diff($end);
        $total_days = $interval->days;
        if ($total_days == 0) $total_days = 1;

        // Get daily rate
        $stmt = $pdo->prepare("SELECT daily_rate FROM cars WHERE 
                              model = ? OR 
                              CONCAT(make, ' ', model) = ? OR
                              ? LIKE CONCAT('%', model, '%')");
        $stmt->execute([$vehicle, $vehicle, $vehicle]);
        $daily_rate = $stmt->fetchColumn();

        if (!$daily_rate) {
            throw new Exception("Daily rate not found for vehicle: $vehicle");
        }

        // Calculate total price
        $total_price = (float)$daily_rate * (int)$total_days;

        // Insert booking with all fields
        $stmt = $pdo->prepare("INSERT INTO car_booking 
            (vehicle_name, customer_name, pickup_location, pickup_date, dropoff_date, 
             total_days, total_price, passengers, email, phone, booking_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        
        $stmt->execute([
            $vehicle,
            $customer_name,
            $pickup_location,
            $pickup_date,
            $dropoff_date,
            $total_days,
            $total_price,
            $passengers,
            $email,
            $phone
        ]);

        $_SESSION['booking_success'] = [
            'message' => 'Booking successful!',
            'price' => $total_price,
            'days' => $total_days,
            'vehicle' => $vehicle
        ];
        
        header('Location: '.$_SERVER['PHP_SELF']);
        exit();

    } catch(Exception $e) {
        $_SESSION['booking_error'] = 'Error: ' . $e->getMessage();
        header('Location: '.$_SERVER['PHP_SELF']);
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Lanka-Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .nav-active { color: #b45309; font-weight: 600; }
        
        .offer-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #ef4444;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>
<body class="bg-gray-50">
   <!-- Navigation Bar -->
   <nav class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-[95%] max-w-5xl rounded-2xl backdrop-blur-md bg-white/80 shadow-xl">
    <div class="flex flex-col">
      <!-- Mobile Menu Button -->
      <div class="flex items-center justify-end px-4 py-3 md:hidden">
        <button id="mobile-menu-button" class="text-black hover:text-yellow-700 focus:outline-none">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex md:items-center md:justify-center md:space-x-8 md:py-3">
        <a href="home.php" class="text-black hover:text-yellow-700 font-medium nav-active">Home</a>
        <a href="#container" class="text-black hover:text-yellow-700 font-medium">Cars</a>
        <a href="home.php#vehicles" class="text-black hover:text-yellow-700 font-medium">Vehicles</a> 
        <a href="contact.php" class="text-black hover:text-yellow-700 font-medium">Contact</a>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden flex flex-col items-center space-y-4 px-6 py-4 text-center md:hidden rounded-b-2xl bg-white/60 backdrop-blur-lg">
        <a href="home.php" class="text-black hover:text-yellow-700 font-medium block">Home</a>
        <a href="#container" class="text-black hover:text-yellow-700 font-medium">Cars</a>
        <a href="home.php#vehicles" class="text-black hover:text-yellow-700 font-medium">Vehicles</a> 
        <a href="contact.php" class="text-black hover:text-yellow-700 font-medium block">Contact</a>
      </div>
    </div>
  </nav>

<!-- Hero Section -->
<section class="relative h-[80vh] min-h-[500px] max-h-[800px] bg-gray-900 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="images/cars/section1.jpg" alt="Car rental service" class="w-full h-full object-cover blur-sm md:blur-none lg:blur-sm scale-105 brightness-90" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-black/30"></div>
    </div>
    
    <div class="container mx-auto px-4 h-full flex flex-col justify-center items-center text-center relative z-10">
        <div class="max-w-4xl px-4 sm:px-6">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 md:mb-6 text-white drop-shadow-xl">Premium Car Rentals in Sri Lanka</h1>
            <p class="text-xl sm:text-2xl md:text-3xl max-w-2xl mx-auto text-gray-100 drop-shadow-md mb-8">Experience your journey with our luxury fleet and exceptional service</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button id="show-all-btn" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-lg font-semibold text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Browse Vehicles
                </button>
                <!-- Special Offers Button -->
                <button id="special-offers-btn" class="px-8 py-3 bg-red-600 hover:bg-red-700 rounded-lg text-lg font-semibold text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Special Offers
                </button>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-10 rotate-180">
        <svg class="w-full h-[40px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" 
                  class="fill-white"></path>
        </svg>
    </div>
</section>

<!-- Vehicle Listing -->
<section id="container" class="py-16 bg-white">
    <div class="container mx-auto px-4">


        <div id="cars-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Car 1 (Has Offer) -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative car-card" data-offer="true">
                <div class="offer-badge">10% OFF</div>
                <div class="relative h-48 overflow-hidden">
                    <img src="images/cars/priese.jpg" alt="Toyota Prius" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 bg-yellow-500 text-black px-2 py-1 rounded text-sm font-bold">Popular</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">Toyota Prius</h3>
                        <div>
                            <span class="text-lg line-through text-gray-500">LKR 8,000</span>
                            <span class="text-lg font-bold text-red-600"> LKR 7,200/day</span>
                        </div>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Full Insurance</span>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Automatic Transmission</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Air Conditioning</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>5 Seats</span>
                        </li>
                    </ul>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition duration-200 book-now-btn">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Car 2 (No Offer) -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 car-card" data-offer="false">
                <div class="relative h-48 overflow-hidden">
                    <img src="images/cars/civic.avif" alt="Honda Civic" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">Honda Civic</h3>
                        <span class="text-lg font-bold text-yellow-600">LKR 10,000/day</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Full Insurance</span>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Automatic Transmission</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Air Conditioning</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>5 Seats</span>
                        </li>
                    </ul>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition duration-200 book-now-btn">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Car 3 (Has Offer) -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative car-card" data-offer="true">
                <div class="offer-badge">15% OFF</div>
                <div class="relative h-48 overflow-hidden">
                    <img src="images/cars/corolla.avif" alt="Toyota Corolla" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">Toyota Corolla</h3>
                        <div>
                            <span class="text-lg line-through text-gray-500">LKR 9,500</span>
                            <span class="text-lg font-bold text-red-600"> LKR 8,075/day</span>
                        </div>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Full Insurance</span>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Automatic Transmission</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Air Conditioning</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>5 Seats</span>
                        </li>
                    </ul>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition duration-200 book-now-btn">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Car 4 (No Offer) -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 car-card" data-offer="false">
                <div class="relative h-48 overflow-hidden">
                    <img src="images/cars/swift.avif" alt="Suzuki Swift" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">Suzuki Swift</h3>
                        <span class="text-lg font-bold text-yellow-600">LKR 6,500/day</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Full Insurance</span>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Automatic Transmission</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Air Conditioning</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>5 Seats</span>
                        </li>
                    </ul>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition duration-200 book-now-btn">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Car 5 (Has Offer) -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative car-card" data-offer="true">
                <div class="offer-badge">20% OFF</div>
                <div class="relative h-48 overflow-hidden">
                    <img src="images/cars/montero.avif" alt="Mitsubishi Montero" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">Mitsubishi Montero</h3>
                        <div>
                            <span class="text-lg line-through text-gray-500">LKR 15,000</span>
                            <span class="text-lg font-bold text-red-600"> LKR 12,000/day</span>
                        </div>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Full Insurance</span>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Automatic Transmission</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Air Conditioning</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>7 Seats</span>
                        </li>
                    </ul>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition duration-200 book-now-btn">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Car 6 (No Offer) -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 car-card" data-offer="false">
                <div class="relative h-48 overflow-hidden">
                    <img src="images/cars/sunny.avif" alt="Nissan Sunny" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">Nissan Sunny</h3>
                        <span class="text-lg font-bold text-yellow-600">LKR 7,500/day</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Full Insurance</span>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Automatic Transmission</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Air Conditioning</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>5 Seats</span>
                        </li>
                    </ul>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition duration-200 book-now-btn">
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Modal (Hidden by default) -->
<div id="booking-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-2 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full mx-2 p-4 sm:p-6 overflow-y-auto" style="max-height: 90vh;">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg sm:text-xl font-bold">Book Your Car</h3>
            <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <form method="POST" class="space-y-3 sm:space-y-4" id="booking-form">
    <input type="hidden" id="car_id" name="car_id">
    
    <div>
        <label class="block text-gray-700 text-sm sm:text-base mb-1">Car Model</label>
        <input type="text" name="car_name" id="car_name" 
               class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" readonly required>
    </div>
    <div>
        <label class="block text-gray-700 text-sm sm:text-base mb-1">Full Name</label>
        <input type="text" name="customer_name" id="customer_name"
               class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" required>
    </div>
            <div>
                <label class="block text-gray-700 text-sm sm:text-base mb-1">Pickup Location</label>
                <select name="pickup_location" id="pickup_location" class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" required>
                    <option value="">Select a location</option>
                    <option value="Colombo Airport">Colombo Airport</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Galle">Galle</option>
                    <option value="Negombo">Negombo</option>
                </select>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div>
                    <label class="block text-gray-700 text-sm sm:text-base mb-1">Pickup Date</label>
                    <input type="date" name="pickup_date" id="pickup_date" min="<?php echo date('Y-m-d'); ?>"
                           class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm sm:text-base mb-1">Drop-off Date</label>
                    <input type="date" name="dropoff_date" id="dropoff_date" min="<?php echo date('Y-m-d'); ?>"
                           class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" required>
                </div>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm sm:text-base mb-1">Number of Passengers</label>
                <input type="number" name="passengers" id="passengers" min="1"
                       class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" required>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm sm:text-base mb-1">Email</label>
                <input type="email" name="email" id="email"
                       class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" required>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm sm:text-base mb-1">Phone Number</label>
                <input type="tel" name="phone" id="phone"
                       class="w-full px-3 py-2 text-sm sm:text-base border rounded-lg" required>
            </div>
            
            <button type="submit" 
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 sm:py-3 px-4 rounded-lg text-sm sm:text-base">
                Confirm Booking
            </button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 text-yellow-400">Drive Lanka</h3>
                <p class="text-gray-400">Your trusted vehicle rental service in Sri Lanka.</p>
            </div>
            <div>
                <h4 class="font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="index.html" class="text-gray-400 hover:text-yellow-400">Home</a></li>
                    <li><a href="cars.php" class="text-gray-400 hover:text-yellow-400">Cars</a></li>
                    <li><a href="vans.php" class="text-gray-400 hover:text-yellow-400">Vans</a></li>
                    <li><a href="bus.php" class="text-gray-400 hover:text-yellow-400">Buses</a></li>
                    <li><a href="bikes.php" class="text-gray-400 hover:text-yellow-400">Bikes</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Support</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-yellow-400">FAQ</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-yellow-400">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Contact Us</h4>
                <address class="text-gray-400 not-italic">
                    123 Galle Road<br>
                    Colombo 03, Sri Lanka<br>
                    Phone: +94 11 234 5678<br>
                    Email: info@DriveLanka.lk
                </address>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>© 2025 Drive Lanka. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Check for successful booking in URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('booking') === 'success') {
        // Show success popup
        showSuccessPopup();
        
        // Clear the URL parameter
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    // Mobile menu toggle functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        // Toggle mobile menu on button click
        mobileMenuButton.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!mobileMenu.contains(e.target) && e.target !== mobileMenuButton) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Close menu when a nav link is clicked
        const navLinks = mobileMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // Booking modal functionality
    const bookButtons = Array.from(document.querySelectorAll('button')).filter(button =>
        button.textContent.trim() === 'Book Now' || button.textContent.trim() === 'Get This Offer'
    );
    const bookingModal = document.getElementById('booking-modal');
    const closeModal = document.getElementById('close-modal');

    // Show modal with selected vehicle name 
    bookButtons.forEach(button => {
        button.addEventListener('click', function() {
            const vehicleName = this.closest('.bg-white')?.querySelector('h3')?.textContent || '';
            if (bookingModal) {
                const inputField = bookingModal.querySelector('input[name="car_name"]');
                if (inputField) inputField.value = vehicleName.trim();
                bookingModal.classList.remove('hidden');
                
                // Set today's date as minimum for pickup and dropoff
                const today = new Date().toISOString().split('T')[0];
                document.querySelector('input[name="pickup_date"]').min = today;
                document.querySelector('input[name="dropoff_date"]').min = today;
            }
        });
    });

    // Close modal when clicking close button or outside modal
    if (closeModal && bookingModal) {
        closeModal.addEventListener('click', function () {
            bookingModal.classList.add('hidden');
        });
        
        // Close when clicking outside modal content
        bookingModal.addEventListener('click', function(e) {
            if (e.target === bookingModal) {
                bookingModal.classList.add('hidden');
            }
        });
    }

    // Toggle between regular bikes and special offers
    const browseBikesBtn = document.getElementById('browse-bikes-btn');
    const specialOffersBtn = document.getElementById('special-offers-btn');
    const regularBikesSection = document.getElementById('regular-bikes');
    const specialOffersSection = document.getElementById('special-offers');

    if (browseBikesBtn && specialOffersBtn && regularBikesSection && specialOffersSection) {
        browseBikesBtn.addEventListener('click', function() {
            regularBikesSection.style.display = 'block';
            specialOffersSection.style.display = 'none';
            // Update active button styling
            browseBikesBtn.classList.add('active');
            specialOffersBtn.classList.remove('active');
            // Scroll to bikes section
            regularBikesSection.scrollIntoView({ behavior: 'smooth' });
        });

        specialOffersBtn.addEventListener('click', function() {
            regularBikesSection.style.display = 'none';
            specialOffersSection.style.display = 'block';
            // Update active button styling
            specialOffersBtn.classList.add('active');
            browseBikesBtn.classList.remove('active');
            // Scroll to offers section
            specialOffersSection.scrollIntoView({ behavior: 'smooth' });
        });

        // Initialize active button
        if (regularBikesSection.style.display !== 'none') {
            browseBikesBtn.classList.add('active');
        } else {
            specialOffersBtn.classList.add('active');
        }
    }

    // Date validation for booking form
    const pickupDateInput = document.querySelector('input[name="pickup_date"]');
    const dropoffDateInput = document.querySelector('input[name="dropoff_date"]');
    
    if (pickupDateInput && dropoffDateInput) {
        pickupDateInput.addEventListener('change', function() {
            // Set dropoff date minimum to pickup date
            dropoffDateInput.min = this.value;
            
            // If current dropoff date is before new pickup date, reset it
            if (dropoffDateInput.value && new Date(dropoffDateInput.value) < new Date(this.value)) {
                dropoffDateInput.value = this.value;
            }
        });
    }

    // Form submission handling
    const bookingForm = document.querySelector('#booking-modal form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            // Basic client-side validation
            const pickupDate = new Date(document.querySelector('input[name="pickup_date"]').value);
            const dropoffDate = new Date(document.querySelector('input[name="dropoff_date"]').value);
            
            if (dropoffDate < pickupDate) {
                e.preventDefault();
                alert('Drop-off date must be after pickup date');
                return false;
            }
            
            return true;
        });
    }

    // Success popup functionality
    function showSuccessPopup() {
        const popup = document.getElementById('success-popup');
        if (popup) {
            popup.classList.remove('hidden');
            
            // Close popup when clicking close button or outside
            const closeButtons = popup.querySelectorAll('.close-popup');
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    popup.classList.add('hidden');
                });
            });
            
            popup.addEventListener('click', function(e) {
                if (e.target === popup) {
                    popup.classList.add('hidden');
                }
            });
        }
    }

    // Set vehicle name when clicking book now buttons 
    document.querySelectorAll('.book-now-btn').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.bg-white') || this.closest('.vehicle-card');
            if (card) {
                const vehicleName = card.querySelector('h3')?.textContent || '';
                const inputField = document.getElementById('vehicle-field') || 
                                  document.querySelector('input[name="car_name"]');
                if (inputField) inputField.value = vehicleName.trim();
            }
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Initialize modals as hidden
    if (bookingModal) bookingModal.classList.add('hidden');
    const successPopup = document.getElementById('success-popup');
    if (successPopup) successPopup.classList.add('hidden');
});
</script>
    
</body>
</html>