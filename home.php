<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Lanka-Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1589100984654-49531a6d4e3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        .nav-active {
            position: relative;
        }
        .nav-active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            background-color: #FACC15;
            border-radius: 50%;
        }
        .vehicle-slide {
            transition: opacity 1s ease-in-out;
        }
        /* Remove gap between nav and slider */
        .vehicle-slider-container {
            margin-top: -1px; 
        }
        .nav-active {
            color: #b45309; 
            font-weight: 600;
        }
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Fixed Navigation Bar with White Blur -->
<nav class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-[95%] max-w-5xl rounded-2xl backdrop-blur-md bg-white/80 shadow-xl">
    <div class="flex flex-col">
        <!-- Mobile Menu Button -->
        <div class="flex items-center justify-end px-4 py-3 md:hidden">
            <button id="mobile-menu-button" class="text-black hover:text-yellow-700 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex md:items-center md:justify-between md:px-6 md:py-3">
            <!-- Centered Navigation Links -->
            <div class="flex-1 flex justify-center">
                <div class="flex space-x-8">
                    <a href="#home" class="text-black hover:text-yellow-700 font-medium nav-active">Home</a>
                    <a href="#vehicles" class="text-black hover:text-yellow-700 font-medium">Vehicles</a> 
                    <a href="#rates" class="text-black hover:text-yellow-700 font-medium">About</a>
                    <a href="#locations" class="text-black hover:text-yellow-700 font-medium">Locations</a>
                    <a href="#contact" class="text-black hover:text-yellow-700 font-medium">Contact</a>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                
                <a href="logout.php" class="bg-yellow-700 hover:bg-yellow-800 px-4 py-2 rounded-lg transition duration-300">
                    Logout
                </a>
            </div>
        </div>

        <!-- Mobile Menu Items (WITH STRONGER BLUR) -->
        <div id="mobile-menu" class="hidden flex flex-col items-center space-y-4 px-6 py-4 text-center md:hidden rounded-b-2xl bg-white/60 backdrop-blur-lg">
            <a href="#home" class="text-black hover:text-yellow-700 font-medium block">Home</a>
            <a href="#vehicles" class="text-black hover:text-yellow-700 font-medium block">Vehicles</a>
            <a href="#rates" class="text-black hover:text-yellow-700 font-medium block">About</a>
            <a href="#locations" class="text-black hover:text-yellow-700 font-medium block">Locations</a>
            <a href="#contact" class="text-black hover:text-yellow-700 font-medium block">Contact</a>
            <!-- Mobile Login/Signup Buttons -->
            <div class="flex space-x-4 pt-2">

            <a href="logout.php" class="bg-yellow-700 hover:bg-yellow-800 px-4 py-2 rounded-lg transition duration-300">
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- Home Section -->
<div id="home">
    <!-- Vehicle Slider with Review Overlays -->
    <div class="vehicle-slider-container relative h-64 md:h-[32rem] overflow-hidden">
        <!-- Slider Content -->
        <div id="vehicle-slides" class="h-full w-full relative">
            <!-- Slide 1 with Review -->
            <div class="vehicle-slide absolute inset-0 w-full h-full opacity-100 transition-opacity duration-700">
                <img src="images/Home/p6.png" alt="Luxury vehicles" class="w-full h-full object-cover" />
                <!-- Review Overlay - Adjusted for mobile -->
                <div class="absolute bottom-4 md:bottom-8 left-1/2 transform -translate-x-1/2 w-11/12 md:w-3/4 lg:w-2/3 bg-black bg-opacity-50 text-white p-4 md:p-6 rounded-2xl">
                    <div class="flex flex-col md:flex-row items-center">
                        <img src="images/people/p1.jpg" alt="Customer" class="w-12 h-12 md:w-16 md:h-16 rounded-full object-cover border-2 border-white mb-2 md:mb-0 md:mr-4 lg:mr-6">
                        <div class="text-center md:text-left">
                            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start mb-1 md:mb-2">
                                <h4 class="text-sm md:text-lg font-semibold md:mr-4">Amal D.</h4>
                                <div class="flex text-yellow-400 text-sm md:text-base">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                            <p class="italic text-xs md:text-sm lg:text-base">"The luxury car I rented was in perfect condition and made my vacation unforgettable!"</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 with Review -->
            <div class="vehicle-slide absolute inset-0 w-full h-full opacity-0 transition-opacity duration-700">
                <img src="images/Home/p2.png" alt="SUV vehicles" class="w-full h-full object-cover" />
                <!-- Review Overlay -->
                <div class="absolute bottom-4 md:bottom-8 left-1/2 transform -translate-x-1/2 w-11/12 md:w-3/4 lg:w-2/3 bg-black bg-opacity-50 text-white p-4 md:p-6 rounded-2xl">
                    <div class="flex flex-col md:flex-row items-center">
                        <img src="images/people/p2.jpg" alt="Customer" class="w-12 h-12 md:w-16 md:h-16 rounded-full object-cover border-2 border-white mb-2 md:mb-0 md:mr-4 lg:mr-6">
                        <div class="text-center md:text-left">
                            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start mb-1 md:mb-2">
                                <h4 class="text-sm md:text-lg font-semibold md:mr-4">Kasun M.</h4>
                                <div class="flex text-yellow-400 text-sm md:text-base">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                            <p class="italic text-xs md:text-sm lg:text-base">"The SUV handled mountain roads perfectly. Quick booking process and friendly staff!"</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 with Review -->
            <div class="vehicle-slide absolute inset-0 w-full h-full opacity-0 transition-opacity duration-700">
                <img src="images/Home/p7.png" alt="Sports car" class="w-full h-full object-cover" />
                <!-- Review Overlay -->
                <div class="absolute bottom-4 md:bottom-8 left-1/2 transform -translate-x-1/2 w-11/12 md:w-3/4 lg:w-2/3 bg-black bg-opacity-50 text-white p-4 md:p-6 rounded-2xl">
                    <div class="flex flex-col md:flex-row items-center">
                        <img src="images/people/p3.jpg" alt="Customer" class="w-12 h-12 md:w-16 md:h-16 rounded-full object-cover border-2 border-white mb-2 md:mb-0 md:mr-4 lg:mr-6">
                        <div class="text-center md:text-left">
                            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start mb-1 md:mb-2">
                                <h4 class="text-sm md:text-lg font-semibold md:mr-4">Nuwan T.</h4>
                                <div class="flex text-yellow-400 text-sm md:text-base">
                                    ★ ★ ★ ★ ☆
                                </div>
                            </div>
                            <p class="italic text-xs md:text-sm lg:text-base">"Great experience overall. The sports car was amazing to drive!"</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4 with Review -->
            <div class="vehicle-slide absolute inset-0 w-full h-full opacity-0 transition-opacity duration-700">
                <img src="images/Home/p4.png" alt="Motorcycles" class="w-full h-full object-cover" />
                <!-- Review Overlay -->
                <div class="absolute bottom-4 md:bottom-8 left-1/2 transform -translate-x-1/2 w-11/12 md:w-3/4 lg:w-2/3 bg-black bg-opacity-50 text-white p-4 md:p-6 rounded-2xl">
                    <div class="flex flex-col md:flex-row items-center">
                        <img src="images/people/p4.jpg" alt="Customer" class="w-12 h-12 md:w-16 md:h-16 rounded-full object-cover border-2 border-white mb-2 md:mb-0 md:mr-4 lg:mr-6">
                        <div class="text-center md:text-left">
                            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start mb-1 md:mb-2">
                                <h4 class="text-sm md:text-lg font-semibold md:mr-4">Dinuka R.</h4>
                                <div class="flex text-yellow-400 text-sm md:text-base">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                            <p class="italic text-xs md:text-sm lg:text-base">"Best motorcycle rental experience ever! Will definitely come back."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dots - Adjusted position for mobile -->
        <div class="absolute bottom-1 md:bottom-4 left-0 right-0 flex justify-center space-x-2 md:space-x-3">
            <button class="slide-dot w-2 h-2 md:w-3 md:h-3 rounded-full bg-white bg-opacity-70 border border-white" data-index="0"></button>
            <button class="slide-dot w-2 h-2 md:w-3 md:h-3 rounded-full bg-white bg-opacity-30 border border-white" data-index="1"></button>
            <button class="slide-dot w-2 h-2 md:w-3 md:h-3 rounded-full bg-white bg-opacity-30 border border-white" data-index="2"></button>
            <button class="slide-dot w-2 h-2 md:w-3 md:h-3 rounded-full bg-white bg-opacity-30 border border-white" data-index="3"></button>
        </div>
    </div>
</div>
<!-- Hero Section with Bottom Wave Only -->
<section class="relative text-black py-16 md:py-32 overflow-hidden">
    <!-- Background Image with Blur -->
    <div class="absolute inset-0 z-0">
        <img src="images/Home/section2photo1.avif" 
             alt="Car background" 
             class="w-full h-full object-cover filter blur-sm" />
        <div class="absolute inset-0 bg-yellow-500 bg-opacity-60"></div>
    </div>
    
    <!-- Content -->
    <div class="container mx-auto px-4 text-center relative z-10">
        <!-- Logo and Main Heading -->
        <div class="mb-4 md:mb-6">
            <h1 class="text-3xl md:text-6xl font-bold mb-2 md:mb-4 tracking-wider text-white drop-shadow-lg">Drive Lanka</h1>
            <div class="h-1 w-24 md:w-32 bg-white mx-auto"></div>
        </div>
        
        <!-- Subheadings -->
        <p class="text-lg md:text-xl mb-1 md:mb-2 italic text-white drop-shadow">A Premium Vehicle Rental Agency</p>
        <p class="text-xl md:text-3xl font-bold mb-6 md:mb-10 text-white drop-shadow-md">We compare vehicle rental prices, you save!</p>
        
        <!-- Search Form - Compact responsive version -->
        <div class="max-w-6xl mx-auto bg-white bg-opacity-95 backdrop-filter backdrop-blur-sm rounded-lg shadow-xl p-4 md:p-6 border-t-4 border-yellow-500">
            <form id="search-form">
                <!-- Desktop Layout (single line) -->
                <div class="hidden md:flex flex-row gap-3 items-end">
                    <!-- Pick-up Location -->
                    <div class="flex-1 min-w-[180px]">
                        <label class="block text-gray-800 text-sm font-bold mb-1 text-left">Pick-up Location</label>
                        <div class="relative">
                            <select id="pickup-location" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm appearance-none">
                                <option value="">Select Location</option>
                                <option value="cmb">Colombo </option>
                                <option value="kandy">Kandy</option>
                                <option value="galle">Galle</option>
                                <option value="negombo">Negombo</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Type -->
                    <div class="flex-1 min-w-[120px]">
                        <label class="block text-gray-800 text-sm font-bold mb-1 text-left">Vehicle Type</label>
                        <div class="relative">
                            <select id="vehicle-type" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm appearance-none">
                                <option value="">All Types</option>
                                <option value="car">Car</option>
                                <option value="van">Van</option>
                                <option value="bus">Bus</option>
                                <option value="bike">Bike</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pick-up Date -->
                    <div class="flex-1 min-w-[140px]">
                        <label class="block text-gray-800 text-sm font-bold mb-1 text-left">Pick-up Date</label>
                        <div class="relative">
                            <input id="pickup-date" type="date" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Drop-off Date -->
                    <div class="flex-1 min-w-[140px]">
                        <label class="block text-gray-800 text-sm font-bold mb-1 text-left">Drop-off Date</label>
                        <div class="relative">
                            <input id="dropoff-date" type="date" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Search Button -->
                    <div class="w-auto">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 h-[42px]">
                            <span class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Search
                            </span>
                        </button>
                    </div>
                </div>
                
                <!-- Mobile Layout (compact) -->
                <div class="md:hidden flex flex-col gap-3">
                    <!-- Search Button (mobile trigger) -->
                    <button type="button" id="mobile-search-trigger" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 w-full flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search Vehicles
                    </button>
                    
                    <!-- Collapsible Search Fields -->
                    <div id="mobile-search-fields" class="hidden flex-col gap-3">
                        <!-- Pick-up Location -->
                        <div>
                            <label class="block text-gray-800 text-xs font-bold mb-1 text-left">Pick-up Location</label>
                            <div class="relative">
                                <select id="pickup-location-mobile" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm appearance-none">
                                    <option value="">Select Location</option>
                                    <option value="cmb">Colombo </option>
                                    <option value="kandy">Kandy</option>
                                    <option value="galle">Galle</option>
                                    <option value="negombo">Negombo</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vehicle Type -->
                        <div>
                            <label class="block text-gray-800 text-xs font-bold mb-1 text-left">Vehicle Type</label>
                            <div class="relative">
                                <select id="vehicle-type-mobile" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm appearance-none">
                                    <option value="">All Types</option>
                                    <option value="car">Car</option>
                                    <option value="van">Van</option>
                                    <option value="bus">Bus</option>
                                    <option value="bike">Bike</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Date Fields -->
                        <div class="grid grid-cols-2 gap-3">
                            <!-- Pick-up Date -->
                            <div>
                                <label class="block text-gray-800 text-xs font-bold mb-1 text-left">Pick-up Date</label>
                                <div class="relative">
                                    <input id="pickup-date-mobile" type="date" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Drop-off Date -->
                            <div>
                                <label class="block text-gray-800 text-xs font-bold mb-1 text-left">Drop-off Date</label>
                                <div class="relative">
                                    <input id="dropoff-date-mobile" type="date" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Search Button (mobile) -->
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 w-full mt-2">
                            Search Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

<!-- Popup Modal -->
<div id="search-popup" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50 p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-auto p-6 relative">
        <button id="close-popup" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="text-center">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2" id="popup-title">Vehicles Available!</h3>
            <p class="text-gray-600 mb-4" id="popup-message">We found matching vehicles for your search criteria.</p>
            <button id="view-results" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                View Results
            </button>
            <a href="home"><button id="go-to-login" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ml-2 hidden">
                Login
            </button></a>
        </div>
    </div>
</div>

    
    <!-- Single Wave Border Bottom Only -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-10 rotate-180">
        <svg class="w-full h-[40px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" 
                  class="fill-white"></path>
        </svg>
    </div>
</section>
    <!-- Vehicle Types Section -->
    <section class="py-16 bg-white" id="vehicles">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Vehicle Fleet</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Find the perfect vehicle for your Sri Lankan journey</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Cars -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <img src="images/Home/sec3Car.jpeg" alt="Cars in Sri Lanka" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">Cars</h3>
                        <p class="text-gray-600 mb-4">From compact cars to luxury sedans for city and long-distance travel.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-yellow-500">From LKR 6,000/day</span>
                            <a href="cars.php"><button class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-md">Book Now</button></a>
                        </div>
                    </div>
                </div>
                
                <!-- Vans -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <img src="images/Home/sec3Van.jpeg" alt="Vans in Sri Lanka" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">Vans</h3>
                        <p class="text-gray-600 mb-4">Comfortable vans for families and group travels across Sri Lanka.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-yellow-500">From LKR 12,000/day</span>
                            <a href="vans.php"><button class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-md">Book Now</button></a>
                        </div>
                    </div>
                </div>
                
                <!-- bus -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <img src="images/Home/bus.jpg" alt="SUVs in Sri Lanka" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">Buses</h3>
                        <p class="text-gray-600 mb-4">Spacious Buses for adventure and off-road trips in Sri Lanka.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-yellow-500">From LKR 10,000/day</span>
                            <a href="bus.php"><button class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-md">Book Now</button></a>
                        </div>
                    </div>
                </div>
                
                <!-- Bikes -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <img src="https://images.unsplash.com/photo-1558981806-ec527fa84c39?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Bikes in Sri Lanka" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">Bikes & Scooters</h3>
                        <p class="text-gray-600 mb-4">Economical two-wheelers for easy navigation through Sri Lankan roads.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-yellow-500">From LKR 2,500/day</span>
                            <a href="bikes.php"><button class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-md">Book Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="py-16 bg-white" id="rates">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Choose Drive Lanka?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We offer a wide range of vehicles to suit all your travel needs in Sri Lanka at competitive prices.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm text-center">
                    <div class="bg-yellow-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Best Price Guarantee</h3>
                    <p class="text-gray-600">We compare prices across multiple providers to ensure you get the best deal in Sri Lanka.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm text-center">
                    <div class="bg-yellow-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">No Hidden Fees</h3>
                    <p class="text-gray-600">Transparent pricing with all government taxes and insurance included.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm text-center">
                    <div class="bg-yellow-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Sri Lanka Support</h3>
                    <p class="text-gray-600">Our local customer service team is available around the clock.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Sri Lankan Destinations Section -->
    <section class="py-16 bg-gray-50" id="locations">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Popular Sri Lankan Destinations</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Explore the beauty of Sri Lanka with our vehicles</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Sigiriya -->
                <a href="#sigiriya" class="relative rounded-lg overflow-hidden h-64 group block">
                    <img src="images/Home/sigiriya.jpeg" alt="Kandy" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 group-hover:bg-opacity-20 transition-all">
                        <h3 class="text-white text-xl font-bold">Sigiriya</h3>
                    </div>
                </a>
                
                <!-- Galle -->
                <a href="#galle" class="relative rounded-lg overflow-hidden h-64 group block">
                    <img src="images/Home/galle.jpg" alt="Galle" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 group-hover:bg-opacity-20 transition-all">
                        <h3 class="text-white text-xl font-bold">Galle Fort</h3>
                    </div>
                </a>
                
                <!-- Kandy -->
                <a href="#kandy" class="relative rounded-lg overflow-hidden h-64 group block">
                    <img src="images/Home/kandy.jpg" alt="Kandy" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 group-hover:bg-opacity-20 transition-all">
                        <h3 class="text-white text-xl font-bold">Kandy</h3>
                    </div>
                </a>
                
                <!-- Trincomalee -->
                <a href="#trincomalee" class="relative rounded-lg overflow-hidden h-64 group block">
                    <img src="images/Home/trinco.avif" alt="Trincomalee" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 group-hover:bg-opacity-20 transition-all">
                        <h3 class="text-white text-xl font-bold">Trincomalee</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Call to Action -->
<section class="py-16 bg-black text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Have questions about your rental?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Our team is ready to help you with any inquiries about vehicles, pricing, or your trip in Sri Lanka.</p>
        <a href="contact.php" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-md text-lg">
            Contact Us Now
        </a>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12" id="contact">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-yellow-400">Drive Lanka</h3>
                    <p class="text-gray-400">Your trusted vehicle rental service in Sri Lanka. We help you find the best deals for cars, vans, SUVs and bikes across the island.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-yellow-400">Home</a></li>
                        <li><a href="#vehicles" class="text-gray-400 hover:text-yellow-400">Vehicles</a></li>
                        <li><a href="#locations" class="text-gray-400 hover:text-yellow-400">Locations</a></li>
                        <li><a href="#rates" class="text-gray-400 hover:text-yellow-400">Rates</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-yellow-400">FAQ</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-yellow-400">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-yellow-400">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-yellow-400">Terms of Service</a></li>
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
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            mobileMenu.classList.toggle('hidden');
        });
        
        // Close menu when clicking outside or on a link
        document.addEventListener('click', function(e) {
            if (!mobileMenu.contains(e.target) && e.target !== mobileMenuButton) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Close menu when a navigation link is clicked
        const navLinks = mobileMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // Check if user is logged in (using PHP session)
    function isLoggedIn() {
        // This assumes us have PHP session variable set
        return <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
    }

    // Get elements
    const searchForm = document.getElementById('search-form');
    const searchPopup = document.getElementById('search-popup');
    const closePopup = document.getElementById('close-popup');
    const viewResultsBtn = document.getElementById('view-results');
    const popupTitle = document.getElementById('popup-title');
    const popupMessage = document.getElementById('popup-message');

    // Handle form submission
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form inputs
            const location = document.getElementById('pickup-location').value;
            const vehicleType = document.getElementById('vehicle-type').value;
            const pickupDate = document.getElementById('pickup-date').value;
            const dropoffDate = document.getElementById('dropoff-date').value;
            
            if (!location || !pickupDate || !dropoffDate) {
                // Show error popup if required fields are missing
                popupTitle.textContent = 'Missing Information';
                popupMessage.textContent = 'Please fill in all required fields to search for vehicles.';
                viewResultsBtn.classList.add('hidden');
                searchPopup.classList.remove('hidden');
                return;
            }
            
            // User is logged in (since we removed the login check), show results popup
            popupTitle.textContent = 'Vehicles Available!';
            popupMessage.textContent = 'We found matching vehicles for your search criteria.';
            viewResultsBtn.classList.remove('hidden');
            searchPopup.classList.remove('hidden');
            
            // Store search parameters
            const searchParams = {
                location: location,
                type: vehicleType,
                pickup: pickupDate,
                dropoff: dropoffDate
            };
            localStorage.setItem('searchParams', JSON.stringify(searchParams));
        });
    }
    
    // Close popup
    if (closePopup) {
        closePopup.addEventListener('click', function() {
            searchPopup.classList.add('hidden');
        });
    }
    
    // View results button - MODIFIED TO REDIRECT TO home.php
    if (viewResultsBtn) {
        viewResultsBtn.addEventListener('click', function() {
            // Redirect to home.php with the search parameters
            const searchParams = JSON.parse(localStorage.getItem('searchParams') || '{}');
            const queryString = new URLSearchParams(searchParams).toString();
            window.location.href = `home.php?${queryString}#vehicles`;
        });
    }
    
    // Close popup when clicking outside
    if (searchPopup) {
        searchPopup.addEventListener('click', function(e) {
            if (e.target === searchPopup) {
                searchPopup.classList.add('hidden');
            }
        });
    }

    // Vehicle slider functionality
    const slides = document.querySelectorAll('.vehicle-slide');
    const dots = document.querySelectorAll('.slide-dot');
    let currentSlide = 0;
    let slideInterval = null;

    function showSlide(index) {
        if (slides.length > 0 && dots.length > 0 && index >= 0 && index < slides.length) {
            // Reset all slides and dots
            slides.forEach(slide => {
                slide.style.opacity = '0';
            });
            dots.forEach(dot => {
                dot.classList.remove('bg-opacity-70');
                dot.classList.add('bg-opacity-30');
            });
            
            // Show selected slide and update dot
            slides[index].style.opacity = '1';
            dots[index].classList.add('bg-opacity-70');
            dots[index].classList.remove('bg-opacity-30');
            currentSlide = index;
        }
    }

    // Initialize dots if they exist
    if (dots.length > 0) {
        dots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                showSlide(index);
                resetSlideInterval();
            });
        });
        
        // Auto-play slides
        function startSlideInterval() {
            slideInterval = setInterval(() => {
                const nextSlide = (currentSlide + 1) % slides.length;
                showSlide(nextSlide);
            }, 5000); // Change slide every 5 seconds
        }
        
        function resetSlideInterval() {
            clearInterval(slideInterval);
            startSlideInterval();
        }
        
        // Initialize the slider
        showSlide(0);
        startSlideInterval();
    }

    // Set default dates for the form
    const today = new Date();
    const tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);
    
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    
    const pickupDateInput = document.getElementById('pickup-date');
    const dropoffDateInput = document.getElementById('dropoff-date');
    
    if (pickupDateInput && dropoffDateInput) {
        pickupDateInput.value = formatDate(today);
        dropoffDateInput.value = formatDate(tomorrow);
        
        // Ensure dropoff date is never before pickup date
        pickupDateInput.addEventListener('change', function() {
            const pickupDate = new Date(this.value);
            const dropoffDate = new Date(dropoffDateInput.value);
            
            if (pickupDate > dropoffDate) {
                const newDropoffDate = new Date(pickupDate);
                newDropoffDate.setDate(pickupDate.getDate() + 1);
                dropoffDateInput.value = formatDate(newDropoffDate);
            }
        });
    }

    // Highlight active navigation item based on scroll position
    const sections = document.querySelectorAll('section, #home');
    const navItems = document.querySelectorAll('nav a');
    
    // Throttle scroll events
    let isScrolling;
    window.addEventListener('scroll', function() {
        window.clearTimeout(isScrolling);
        isScrolling = setTimeout(onScroll, 100);
    }, false);
    
    function onScroll() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (pageYOffset >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });
        
        navItems.forEach(item => {
            item.classList.remove('nav-active');
            if (item.getAttribute('href') === `#${current}`) {
                item.classList.add('nav-active');
            }
        });
    }
});
</script>
</body>
</html>