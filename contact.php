<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Lanka - Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .contact-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/Home/p3.png');
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
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        .map-container {
            height: 400px;
        }
        @media (max-width: 768px) {
            .map-container {
                height: 300px;
            }
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
                    <a href="home.php" class="text-black hover:text-yellow-700 font-medium">Home</a>
                    <a href="home.php#vehicles" class="text-black hover:text-yellow-700 font-medium">Vehicles</a> 
                    <a href="home.php#rates" class="text-black hover:text-yellow-700 font-medium">About</a>
                    <a href="home.php#locations" class="text-black hover:text-yellow-700 font-medium">Locations</a>
                    <a href="contact.php" class="text-black hover:text-yellow-700 font-medium nav-active">Contact</a>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Items -->
        <div id="mobile-menu" class="hidden flex flex-col items-center space-y-4 px-6 py-4 text-center md:hidden rounded-b-2xl bg-white/60 backdrop-blur-lg">
            <a href="index.html" class="text-black hover:text-yellow-700 font-medium block">Home</a>
            <a href="index.html#vehicles" class="text-black hover:text-yellow-700 font-medium block">Vehicles</a>
            <a href="index.html#rates" class="text-black hover:text-yellow-700 font-medium block">About</a>
            <a href="index.html#locations" class="text-black hover:text-yellow-700 font-medium block">Locations</a>
            <a href="contact.html" class="text-black hover:text-yellow-700 font-medium block">Contact</a>
            <!-- Mobile Login/Signup Buttons -->
            <div class="flex space-x-4 pt-2">
                <a href="loging.html" class="bg-transparent text-black px-4 py-2 rounded-md font-medium hover:bg-yellow-50 transition border border-yellow-500">Login</a>
                <a href="loging.html" class="bg-transparent text-black px-4 py-2 rounded-md font-medium hover:bg-yellow-50 transition border border-yellow-500">Sign Up</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="pt-24 pb-16 md:pt-32 md:pb-24 contact-bg text-white relative">
    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Contact Drive Lanka</h1>
        <p class="text-xl md:text-2xl max-w-2xl mx-auto">We're here to help with all your vehicle rental needs in Sri Lanka</p>
    </div>
    
    <!-- Wave Border Bottom -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-10 rotate-180">
        <svg class="w-full h-[40px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" 
                  class="fill-white"></path>
        </svg>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Send us a message</h2>
                    <form id="contact-form" action="process_contact.php" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" id="name" name="name" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input type="text" id="subject" name="subject" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="5" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"></textarea>
                        </div>
                        <div>
                            <button type="submit" 
                                class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 w-full">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-2xl font-bold mb-4 text-gray-800">Contact Information</h2>
                        <p class="text-gray-600 mb-6">Have questions about vehicle rentals in Sri Lanka? Our team is ready to assist you with any inquiries.</p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-yellow-100 p-2 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Head Office</h3>
                                    <p class="text-gray-600">123 Galle Road, Colombo 03, Sri Lanka</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-yellow-100 p-2 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Phone</h3>
                                    <p class="text-gray-600">+94 11 234 5678 (Office)<br>+94 76 234 5678 (Hotline)</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-yellow-100 p-2 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Email</h3>
                                    <p class="text-gray-600">info@drivelanka.lk<br>support@drivelanka.lk</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-yellow-100 p-2 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Opening Hours</h3>
                                    <p class="text-gray-600">Monday - Friday: 8:30 AM - 6:00 PM<br>Saturday: 9:00 AM - 3:00 PM<br>Sunday: Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-gray-200 hover:bg-yellow-500 hover:text-white w-10 h-10 rounded-full flex items-center justify-center transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                </svg>
                            </a>
                            <a href="#" class="bg-gray-200 hover:bg-yellow-500 hover:text-white w-10 h-10 rounded-full flex items-center justify-center transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                                </svg>
                            </a>
                            <a href="#" class="bg-gray-200 hover:bg-yellow-500 hover:text-white w-10 h-10 rounded-full flex items-center justify-center transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            <a href="#" class="bg-gray-200 hover:bg-yellow-500 hover:text-white w-10 h-10 rounded-full flex items-center justify-center transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-0 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto rounded-xl overflow-hidden shadow-md">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798511757687!2d79.8527554!3d6.9149349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2596b5d5f07e1%3A0x5638a94c1f4d3c8a!2sGalle%20Rd%2C%20Colombo!5e0!3m2!1sen!2slk!4v1623256789045!5m2!1sen!2slk" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600">Find answers to common questions about vehicle rentals in Sri Lanka</p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-4">
            <!-- FAQ Item 1 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-toggle w-full flex justify-between items-center p-4 text-left bg-gray-50 hover:bg-gray-100 transition">
                    <h3 class="font-medium text-gray-800">What documents do I need to rent a vehicle in Sri Lanka?</h3>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    <p>To rent a vehicle in Sri Lanka, you'll need:</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>A valid driving license (International Driving Permit if your license is not in English)</li>
                        <li>Passport or National ID</li>
                        <li>Credit card in the renter's name for the security deposit</li>
                    </ul>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-toggle w-full flex justify-between items-center p-4 text-left bg-gray-50 hover:bg-gray-100 transition">
                    <h3 class="font-medium text-gray-800">What is the minimum age to rent a vehicle?</h3>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    <p>The minimum age to rent a vehicle in Sri Lanka is 18 years for motorcycles and 21 years for cars and other vehicles. Drivers under 25 may be subject to a young driver surcharge.</p>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-toggle w-full flex justify-between items-center p-4 text-left bg-gray-50 hover:bg-gray-100 transition">
                    <h3 class="font-medium text-gray-800">Is insurance included in the rental price?</h3>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    <p>Yes, all our rentals include basic third-party insurance as required by Sri Lankan law. You can also opt for additional comprehensive coverage for extra protection.</p>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-toggle w-full flex justify-between items-center p-4 text-left bg-gray-50 hover:bg-gray-100 transition">
                    <h3 class="font-medium text-gray-800">Can I take the rental vehicle to any part of Sri Lanka?</h3>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    <p>Most of our vehicles can be driven anywhere in Sri Lanka. However, some restrictions may apply to certain areas during monsoon seasons or in national parks. Please check with our team when booking.</p>
                </div>
            </div>
            
            <!-- FAQ Item 5 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-toggle w-full flex justify-between items-center p-4 text-left bg-gray-50 hover:bg-gray-100 transition">
                    <h3 class="font-medium text-gray-800">What happens if I return the vehicle late?</h3>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    <p>We allow a 1-hour grace period. After that, late returns will be charged at 1.5 times the hourly rate up to 4 hours, and a full day's rate after 4 hours. Please contact us if you anticipate being late to avoid additional charges.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 text-yellow-400">Drive Lanka</h3>
                <p class="text-gray-400">Your trusted vehicle rental service in Sri Lanka. We help you find the best deals for cars, vans, SUVs and bikes across the island.</p>
            </div>
            <div>
                <h4 class="font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="index.html" class="text-gray-400 hover:text-yellow-400">Home</a></li>
                    <li><a href="index.html#vehicles" class="text-gray-400 hover:text-yellow-400">Vehicles</a></li>
                    <li><a href="index.html#locations" class="text-gray-400 hover:text-yellow-400">Locations</a></li>
                    <li><a href="index.html#rates" class="text-gray-400 hover:text-yellow-400">Rates</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Support</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-yellow-400">FAQ</a></li>
                    <li><a href="contact.html" class="text-gray-400 hover:text-yellow-400">Contact Us</a></li>
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

        // FAQ toggle functionality
        const faqToggles = document.querySelectorAll('.faq-toggle');
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('svg');
                
                // Toggle content
                content.classList.toggle('hidden');
                
                // Rotate icon
                icon.classList.toggle('rotate-180');
                
                // Close other open FAQs
                faqToggles.forEach(otherToggle => {
                    if (otherToggle !== toggle) {
                        otherToggle.nextElementSibling.classList.add('hidden');
                        otherToggle.querySelector('svg').classList.remove('rotate-180');
                    }
                });
            });
        });

        // Contact form submission - new version
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const form = this;
                const submitButton = form.querySelector('button[type="submit"]');
                const originalButtonText = submitButton.innerHTML;
                
                // Show loading state
                submitButton.innerHTML = '<svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Sending...';
                submitButton.disabled = true;
                
                // Create loading modal
                const loadingModal = document.createElement('div');
                loadingModal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
                loadingModal.innerHTML = `
                    <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full text-center">
                        <svg class="animate-spin mx-auto h-12 w-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <p class="mt-4 text-gray-700">Processing your message...</p>
                    </div>
                `;
                document.body.appendChild(loadingModal);
                
                try {
                    const formData = new FormData(form);
                    const response = await fetch('process_contact.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        const text = await response.text();
                        throw new Error(`Server returned unexpected response: ${text.substring(0, 100)}`);
                    }
                    
                    const data = await response.json();
                    
                    if (!response.ok) {
                        throw new Error(data.message || `Request failed with status ${response.status}`);
                    }
                    
                    if (!data.success) {
                        throw new Error(data.message || 'Request failed');
                    }
                    
                    // Success case - show message then reload
                    showModal(
                        'Message Sent!', 
                        'Thank you for contacting us. We\'ll get back to you soon. The page will refresh in 3 seconds...', 
                        'success'
                    );
                    
                    // Reload the page after 3 seconds
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                    
                } catch (error) {
                    console.error('Error:', error);
                    showModal(
                        'Error', 
                        error.message || 'There was a problem sending your message. Please try again.', 
                        'error'
                    );
                } finally {
                    // Clean up
                    if (document.body.contains(loadingModal)) {
                        document.body.removeChild(loadingModal);
                    }
                    submitButton.innerHTML = originalButtonText;
                    submitButton.disabled = false;
                }
            });

            function showModal(title, message, type = 'success') {
                const icon = type === 'success' ? 
                    '<svg class="mx-auto h-12 w-12 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>' :
                    '<svg class="mx-auto h-12 w-12 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>';
                
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
                modal.innerHTML = `
                    <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full text-center">
                        ${icon}
                        <h3 class="mt-2 text-lg font-medium text-gray-900">${title}</h3>
                        <p class="mt-2 text-gray-600">${message}</p>
                        <div class="mt-5">
                            <button type="button" onclick="this.closest('div').remove()" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                ${type === 'success' ? 'Close' : 'Try Again'}
                            </button>
                        </div>
                    </div>
                `;
                document.body.appendChild(modal);
            }
        }
    });
</script>

</body>
</html>