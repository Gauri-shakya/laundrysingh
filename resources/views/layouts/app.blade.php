<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaundrySingh - Professional Laundry Services</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Oswald for Pricing items & Poppins for Global -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        oswald: ['Oswald', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            red: '#ED1C24',
                            yellow: '#FFF200',
                            black: '#000000',
                            darkRed: '#C4121A',
                            accent: '#FBD106', // Poster yellow
                        },
                        green: {
                            500: '#76B74B',
                            600: '#5A9E3A',
                        },
                        blue: {
                            400: '#4EB3E3',
                            500: '#2D9CDB',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- jQuery & Owl Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <style>
        .owl-nav button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5) !important;
            color: white !important;
            width: 40px;
            height: 40px;
            border-radius: 50% !important;
        }
        .owl-nav .owl-prev { left: 20px; }
        .owl-nav .owl-next { right: 20px; }
    </style>
</head>
<body class="antialiased font-poppins">
    <!-- Sticky Social Media Icons (Left) - Hidden on mobile to avoid overlap -->
<div class="fixed left-0 top-1/2 -translate-y-1/2 z-[60] hidden md:flex flex-col shadow-md">
    <a href="https://www.facebook.com/profile.php?id=61590915598544" class="bg-[#3b5998] text-white w-7 h-7 md:w-8 md:h-8 flex items-center justify-center hover:w-10 transition-all duration-300">
        <i class="fab fa-facebook-f text-[10px] md:text-xs"></i>
    </a>

    <a href="#" class="bg-[#1da1f2] text-white w-7 h-7 md:w-8 md:h-8 flex items-center justify-center hover:w-10 transition-all duration-300">
        <i class="fab fa-twitter text-[10px] md:text-xs"></i>
    </a>

    <a href="https://www.instagram.com/laundry_singh/" class="bg-[#e1306c] text-white w-7 h-7 md:w-8 md:h-8 flex items-center justify-center hover:w-10 transition-all duration-300">
        <i class="fab fa-instagram text-[10px] md:text-xs"></i>
    </a>

    <a href="#" class="bg-[#ff0000] text-white w-7 h-7 md:w-8 md:h-8 flex items-center justify-center hover:w-10 transition-all duration-300">
        <i class="fab fa-youtube text-[10px] md:text-xs"></i>
    </a>
</div>

    <!-- Sticky Schedule Pickup Button (Right) - Hidden on mobile to avoid overlap -->
    <div class="fixed right-0 top-1/2 -translate-y-1/2 z-[60] origin-right hidden md:block">
    <button onclick="openPickupModal()"
       class="bg-yellow-400 text-zinc-900 font-medium py-2 px-3 md:py-2 md:px-4 block transform -rotate-90 translate-x-[40%] hover:translate-x-[35%] transition-transform duration-300 text-[10px] md:text-xs whitespace-nowrap shadow-lg border-l-2 border-zinc-900 text-center"
       style="font-family: 'Poppins', sans-serif;">
        Schedule Free Pickup
    </button>
</div>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.pickup-modal')

    <!-- Floating Call & WhatsApp Buttons (Bottom Right) -->
    <div class="fixed bottom-5 right-5 z-[60] flex flex-col gap-3 items-end">
        <!-- Call Floating Button -->
        <a href="tel:+919289891259" 
           title="Call Us Now"
           class="group relative flex items-center justify-center w-12 h-12 md:w-14 md:h-14 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-2xl transition-all duration-300 hover:scale-110">
            <i class="fas fa-phone-alt text-lg md:text-xl"></i>
            <!-- Tooltip Label -->
            <span class="absolute right-full mr-3 hidden group-hover:block bg-gray-900 text-white text-xs font-semibold px-3 py-1.5 rounded-lg whitespace-nowrap shadow-md transition-all">
                Call +91 9289891259
            </span>
        </a>

        <!-- WhatsApp Floating Button -->
        <a href="https://wa.me/919289891259?text=Hello%20LaundrySingh%2C%20I%20want%20to%20inquire%20about%20your%20laundry%20services." 
           target="_blank"
           rel="noopener noreferrer"
           title="Chat on WhatsApp"
           class="group relative flex items-center justify-center w-12 h-12 md:w-14 md:h-14 bg-[#25D366] hover:bg-[#20ba5a] text-white rounded-full shadow-2xl transition-all duration-300 hover:scale-110">
            <span class="absolute inline-flex h-full w-full rounded-full bg-[#25D366] opacity-75 animate-ping -z-10" style="animation-duration: 2.5s;"></span>
            <i class="fab fa-whatsapp text-2xl md:text-3xl"></i>
            <!-- Tooltip Label -->
            <span class="absolute right-full mr-3 hidden group-hover:block bg-gray-900 text-white text-xs font-semibold px-3 py-1.5 rounded-lg whitespace-nowrap shadow-md transition-all">
                WhatsApp Us
            </span>
        </a>
    </div>
</body>
</html>
