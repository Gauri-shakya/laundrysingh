<footer class="bg-[#111827] text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12">
            <!-- Brand Column -->
            <div class="lg:col-span-1">
                <a href="/" class="inline-block mb-6">
                    <img src="{{ asset('images/logo1.png') }}" alt="Laundry Singh Logo" class="h-16 w-auto ">
                </a>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Professional laundry and dry cleaning services delivered to your doorstep. We care for your clothes as much as you do.
                </p>
                <!-- Social Links -->
                <div class="flex space-x-4 mt-6">
                    <a href="https://www.facebook.com/profile.php?id=61590915598544" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition-colors">
                        <i class="fab fa-facebook-f text-xs"></i>
                    </a>
                    <a href="https://www.instagram.com/laundry_singh/" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition-colors">
                        <i class="fab fa-instagram text-xs"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition-colors">
                        <i class="fab fa-twitter text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-6 text-white uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li><a href="{{ url('/') }}#home" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Home</a></li>
                    <li><a href="{{ url('/') }}#about" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> About Us</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Our Services</a></li>
                    <li><a href="{{ url('/') }}#pricing" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Pricing</a></li>
                    <li><a href="{{ url('/') }}#contact" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-lg font-bold mb-6 text-white uppercase tracking-wider">Services</h4>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li><a href="{{ url('/') }}#services" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Dry Cleaning</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Wash & Fold</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Steam Pressing</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Express Service</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-green-500 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Premium Laundry</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h4 class="text-lg font-bold mb-6 text-white uppercase tracking-wider">Legal</h4>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li><a href="{{ route('privacy') }}" class="hover:text-green-500 transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-green-500 transition-colors">Terms & Conditions</a></li>
                    <li><a href="{{ route('refund') }}" class="hover:text-green-500 transition-colors">Refund Policy</a></li>
                    <li><a href="{{ route('shipping') }}" class="hover:text-green-500 transition-colors">Shipping Policy</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-bold mb-6 text-white uppercase tracking-wider">Contact Us</h4>
                <ul class="space-y-4 text-sm text-gray-400">

                    <li class="flex items-start gap-3">
                        <i class="fas fa-building text-green-500 mt-1"></i>
                        <div>
                            <span class="font-semibold text-white">Corporate Address</span><br>
                            <span>A-217, 2nd Floor, Tower 3, NX ONE, Amrapali Dream Valley, Greater Noida, Uttar Pradesh 201318</span>
                        </div>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-green-500 mt-1"></i>
                        <div>
                            <span class="font-semibold text-white">Branch Address</span><br>
                            <span>Ground Floor, Radha Sky Garden Market, Sector 16B, Noida Extension, UP-201306</span>
                        </div>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone-alt text-green-500"></i>
                        <a href="tel:+919289891258" class="hover:text-green-500">+91 9289891258</a>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone-alt text-green-500"></i>
                        <a href="tel:+919289891259" class="hover:text-green-500">+91 9289891259</a>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-green-500"></i>
                        <a href="mailto:info@laundrysingh.com" class="hover:text-green-500">info@laundrysingh.com</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Laundry Singh. All rights reserved.</p>
            <p>
                Developed By <i class="fas fa-heart text-red-500"></i>
                <a href="https://socialcults.com" target="_blank" rel="noopener noreferrer" class="hover:underline">
                    SocialCults
                </a>
            </p>
        </div>
    </div>
</footer>