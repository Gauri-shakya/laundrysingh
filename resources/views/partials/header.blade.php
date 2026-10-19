<header class="bg-gray-100 font-sans shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo1.png') }}" alt="Laundry Singh Logo" class="h-12 sm:h-14 md:h-18 w-auto">
            </a>
        </div>
        
   <nav class="hidden md:flex items-center space-x-8 lg:space-x-12">
    <a href="{{ url('/') }}#home" class="text-[18px] font-semibold text-brand-black hover:text-brand-red transition duration-300">
        Home
    </a>

    <a href="{{ url('/') }}#about" class="text-[18px] font-semibold text-brand-black hover:text-brand-red transition duration-300">
        About Us
    </a>

    <a href="{{ url('/') }}#services" class="text-[18px] font-semibold text-brand-black hover:text-brand-red transition duration-300">
        Services
    </a>

    <a href="{{ url('/') }}#pricing" class="text-[18px] font-semibold text-brand-black hover:text-brand-red transition duration-300">
        Pricing
    </a>

    <a href="{{ url('/') }}#contact" class="text-[18px] font-semibold text-brand-black hover:text-brand-red transition duration-300">
        Contact Us
    </a>
</nav>

       <div class="flex items-center gap-4">

    <!-- Phone Number -->
    <a href="tel:+919289891258"
       class="hidden lg:flex items-center gap-2 text-[16px] font-semibold text-brand-black hover:text-brand-green transition duration-300">
        <i class="fas fa-phone-alt"></i>
        <span>+91 9289891258</span>
    </a>

    <!-- Book Now Button (Optional) -->
   <button onclick="openPickupModal()"
   class="hidden md:flex items-center gap-2 bg-green-700 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-600 transition duration-300 shadow-lg justify-center">
    Book Now
    <i class="fas fa-arrow-right"></i>
   </button>

    <!-- Desktop User/Login Profile Dropdown -->
    <div class="relative hidden md:block" id="desktop-user-dropdown-container">
        @auth
            <!-- Logged-in Profile Icon -->
            <button id="desktop-user-dropdown-btn" class="flex items-center justify-center w-12 h-12 bg-green-50 hover:bg-green-100 text-green-700 rounded-full border border-green-200 transition duration-300 shadow-md cursor-pointer">
                <i class="fas fa-user-circle text-2xl"></i>
            </button>
            
            <!-- Dropdown Menu -->
            <div id="desktop-user-dropdown-menu" class="hidden absolute right-0 mt-2 w-56 bg-white border border-gray-100 rounded-2xl shadow-xl py-2 z-50 transition-all duration-200 transform origin-top-right">
                <div class="px-4 py-3 border-b border-gray-50 flex items-center gap-3 bg-gray-50/50 rounded-t-2xl">
                    <div class="w-8 h-8 bg-green-700 text-white rounded-full flex items-center justify-center font-bold text-xs shrink-0">
                        {{ substr(Auth::user()->name ?? 'C', 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <h5 class="font-bold text-xs text-gray-800 truncate">{{ Auth::user()->name }}</h5>
                        <p class="text-[10px] text-gray-400 font-semibold truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                
                <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    <i class="fas fa-chart-pie text-sm w-4 text-green-700"></i> My Dashboard
                </a>
                <a href="{{ route('customer.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    <i class="fas fa-shopping-basket text-sm w-4 text-green-700"></i> My Bookings
                </a>
                <a href="{{ route('customer.profile') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    <i class="fas fa-user-cog text-sm w-4 text-green-700"></i> Edit Profile
                </a>
                
                <div class="border-t border-gray-50 my-1"></div>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full text-left px-4 py-3 text-xs font-bold text-red-500 hover:bg-red-50 transition cursor-pointer">
                        <i class="fas fa-sign-out-alt text-sm w-4"></i> Log Out
                    </button>
                </form>
            </div>
        @else
            <!-- Guest Icon Button -->
            <a href="{{ route('login') }}" class="flex items-center justify-center w-12 h-12 bg-gray-50 hover:bg-gray-100 text-gray-600 hover:text-brand-red rounded-full border border-gray-200 transition duration-300 shadow-md" title="Login / Register">
                <i class="fas fa-user-circle text-2xl"></i>
            </a>
        @endauth
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button"
            class="md:hidden flex items-center justify-center text-brand-red">
        <i class="fas fa-bars text-2xl"></i>
    </button>

</div>

    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-xl fixed inset-0 top-[64px] w-full z-[100] transition-all duration-300 ease-in-out transform origin-top scale-y-0 opacity-0 overflow-y-auto">
        <nav class="flex flex-col px-4 py-6 space-y-1 min-h-full pb-20">
            <a href="{{ url('/') }}#home" class="text-lg font-bold text-brand-black hover:text-brand-red transition py-4 border-b border-gray-100 uppercase tracking-wide flex items-center gap-4"><i class="fas fa-home text-brand-red w-6"></i> Home</a>
            <a href="{{ url('/') }}#about" class="text-lg font-bold text-brand-black hover:text-brand-red transition py-4 border-b border-gray-100 uppercase tracking-wide flex items-center gap-4"><i class="fas fa-info-circle text-brand-red w-6"></i> About Us</a>
            <a href="{{ url('/') }}#services" class="text-lg font-bold text-brand-black hover:text-brand-red transition py-4 border-b border-gray-100 uppercase tracking-wide flex items-center gap-4"><i class="fas fa-concierge-bell text-brand-red w-6"></i> Services</a>
            <a href="{{ url('/') }}#pricing" class="text-lg font-bold text-brand-black hover:text-brand-red transition py-4 border-b border-gray-100 uppercase tracking-wide flex items-center gap-4"><i class="fas fa-tags text-brand-red w-6"></i> Pricing</a>
            <a href="{{ url('/') }}#contact" class="text-lg font-bold text-brand-black hover:text-brand-red transition py-4 border-b border-gray-100 uppercase tracking-wide flex items-center gap-4"><i class="fas fa-envelope text-brand-red w-6"></i> Contact Us</a>
            
            <div class="py-6 flex flex-col gap-5 mt-4">
                <a href="tel:+919289891258" class="flex items-center gap-4 text-brand-black font-bold text-base uppercase bg-gray-50 p-5 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-700 shadow-inner">
                        <i class="fas fa-phone-alt text-xl"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-500 font-bold">Call Us Now</span>
                        <span class="text-lg">+91 92898 91258</span>
                    </div>
                </a>
                <button onclick="openPickupModal()" class="w-full bg-green-700 text-white py-5 rounded-2xl font-black uppercase tracking-widest text-base shadow-xl shadow-green-100 flex items-center justify-center gap-3 active:scale-95 transition-transform">
                    Book Your Pickup <i class="fas fa-arrow-right"></i>
                </button>
            </div>

            <!-- Mobile Auth Actions -->
            <div class="px-4 pb-10 border-t border-gray-100 pt-6">
                @auth
                    <div class="flex flex-col gap-3 p-5 bg-green-50 border border-green-100 rounded-2xl">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-700 text-white rounded-full flex items-center justify-center font-bold text-sm">
                                {{ substr(Auth::user()->name ?? 'C', 0, 1) }}
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="font-bold text-sm text-gray-800 truncate">{{ Auth::user()->name }}</h4>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Customer Account</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 mt-3">
                            <a href="{{ route('customer.dashboard') }}" class="flex items-center justify-center gap-2 bg-white hover:bg-gray-50 border border-gray-200 text-gray-700 py-3 rounded-xl font-bold text-xs uppercase text-center">
                                <i class="fas fa-chart-pie text-sm"></i> Dashboard
                            </a>
                            <a href="{{ route('customer.orders.index') }}" class="flex items-center justify-center gap-2 bg-white hover:bg-gray-50 border border-gray-200 text-gray-700 py-3 rounded-xl font-bold text-xs uppercase text-center">
                                <i class="fas fa-history text-sm"></i> Bookings
                            </a>
                            <a href="{{ route('customer.profile') }}" class="flex items-center justify-center gap-2 bg-white hover:bg-gray-50 border border-gray-200 text-gray-700 py-3 rounded-xl font-bold text-xs uppercase text-center">
                                <i class="fas fa-user-cog text-sm"></i> Edit Profile
                            </a>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to log out?');" class="w-full mt-1">
                            @csrf
                            <button type="submit" class="w-full bg-red-500/10 hover:bg-red-500/20 text-red-600 font-bold py-3 px-4 rounded-xl text-xs uppercase transition-all border border-red-500/10 flex items-center justify-center gap-2 cursor-pointer">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </button>
                        </form>
                    </div>
                @else
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 py-4 rounded-xl font-bold text-xs uppercase text-center transition">
                            <i class="fas fa-sign-in-alt"></i> Log In
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 bg-zinc-900 hover:bg-zinc-800 text-white py-4 rounded-xl font-bold text-xs uppercase text-center transition">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header>

<script>
    $(document).ready(function() {
        $('#mobile-menu-button').on('click', function(e) {
            e.preventDefault();
            const menu = $('#mobile-menu');
            const icon = $(this).find('i');
            
            if (menu.hasClass('hidden')) {
                menu.removeClass('hidden');
                // Prevent body scroll when menu is open
                $('body').addClass('overflow-hidden');
                // Trigger transition
                setTimeout(() => {
                    menu.removeClass('scale-y-0 opacity-0').addClass('scale-y-100 opacity-100');
                }, 10);
                icon.removeClass('fa-bars').addClass('fa-times');
            } else {
                menu.removeClass('scale-y-100 opacity-100').addClass('scale-y-0 opacity-0');
                $('body').removeClass('overflow-hidden');
                setTimeout(() => {
                    menu.addClass('hidden');
                }, 300);
                icon.removeClass('fa-times').addClass('fa-bars');
            }
        });

        // Close menu when clicking a link
        $('#mobile-menu a, #mobile-menu button').on('click', function() {
            const menu = $('#mobile-menu');
            menu.removeClass('scale-y-100 opacity-100').addClass('scale-y-0 opacity-0');
            $('body').removeClass('overflow-hidden');
            setTimeout(() => {
                menu.addClass('hidden');
            }, 300);
            $('#mobile-menu-button i').removeClass('fa-times').addClass('fa-bars');
        });

        // Toggle user dropdown in desktop header
        $('#desktop-user-dropdown-btn').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('#desktop-user-dropdown-menu').toggleClass('hidden');
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#desktop-user-dropdown-container').length) {
                $('#desktop-user-dropdown-menu').addClass('hidden');
            }
        });
    });
</script>
