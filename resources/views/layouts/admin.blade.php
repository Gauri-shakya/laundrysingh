<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - LaundrySingh</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            red: '#ED1C24',
                            darkRed: '#C4121A',
                            yellow: '#FFF200',
                            accent: '#FBD106',
                            black: '#000000',
                            navy: '#1B568C',
                            green: '#5A9E3A',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-slate-50 text-slate-800 antialiased">

    <!-- Mobile Top Header -->
    <header class="lg:hidden bg-zinc-950 text-white px-6 py-4 flex items-center justify-between sticky top-0 z-40 shadow-md border-b border-brand-red/20">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo1.png') }}" class="h-12 w-auto object-contain" alt="Laundry Singh Logo">
        </div>
        <button onclick="toggleMobileSidebar()" class="text-white focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </header>

    <div class="flex min-h-screen">
        
        <!-- Sidebar Navigation -->
        <aside id="sidebar" class="w-72 bg-zinc-950 text-white flex flex-col fixed inset-y-0 left-0 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 shadow-2xl border-r border-white/5">
            <!-- Sidebar Header -->
            <div class="p-6 flex items-center justify-between border-b border-white/10">
                <div class="flex items-center justify-start flex-1">
                    <img src="{{ asset('images/logo1.png') }}" class="h-16 w-auto max-w-[190px] object-contain transition-transform duration-300 hover:scale-105" alt="Laundry Singh Logo">
                </div>
                <button onclick="toggleMobileSidebar()" class="lg:hidden text-white hover:text-brand-red transition-colors ml-2">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Profile Overview -->
            <div class="px-8 py-6 border-b border-white/10 flex items-center gap-3 bg-white/5">
                <div class="w-12 h-12 bg-gradient-to-br from-brand-red to-brand-darkRed rounded-full flex items-center justify-center text-white font-bold shadow-md shadow-brand-red/10">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <h3 class="font-bold text-sm leading-tight">{{ Auth::user()->name ?? 'Administrator' }}</h3>
                    <span class="text-xs text-white/60 font-semibold">{{ ucfirst(Auth::user()->role ?? 'Admin') }}</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav id="sidebar-nav" class="flex-1 min-h-0 px-6 pt-6 pb-12 space-y-1.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-bold text-sm transition-all hover:bg-white/5 @if(Route::is('admin.dashboard')) bg-brand-red text-white shadow-lg shadow-brand-red/30 @else text-white/80 hover:text-white @endif">
                    <i class="fas fa-chart-pie text-lg"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.orders.index') }}" 
                   class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-bold text-sm transition-all hover:bg-white/5 @if(Route::is('admin.orders.*')) bg-brand-red text-white shadow-lg shadow-brand-red/30 @else text-white/80 hover:text-white @endif">
                    <i class="fas fa-shopping-basket text-lg"></i>
                    <span>Bookings</span>
                </a>

                <a href="{{ route('admin.customers.index') }}" 
                   class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-bold text-sm transition-all hover:bg-white/5 @if(Route::is('admin.customers.*')) bg-brand-red text-white shadow-lg shadow-brand-red/30 @else text-white/80 hover:text-white @endif">
                    <i class="fas fa-users text-lg"></i>
                    <span>Customers</span>
                </a>

                <a href="{{ route('admin.services.index') }}" 
                   class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-bold text-sm transition-all hover:bg-white/5 @if(Route::is('admin.services.*')) bg-brand-red text-white shadow-lg shadow-brand-red/30 @else text-white/80 hover:text-white @endif">
                    <i class="fas fa-tags text-lg"></i>
                    <span>Pricing & Services</span>
                </a>
            </nav>

            <div class="p-6 border-t border-white/10">
                <form action="{{ route('admin.logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to log out?');">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-3 bg-red-500/10 hover:bg-red-500/20 text-red-400 font-bold py-3.5 px-4 rounded-2xl text-sm transition-all border border-red-500/20">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 lg:pl-72 flex flex-col min-h-screen">
            
            <!-- Desktop Top Bar -->
            <header class="hidden lg:flex bg-white border-b border-slate-100 px-10 py-6 items-center justify-between sticky top-0 z-30">
                <div>
                    <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight border-b-2 border-brand-red pb-1 inline-block">@yield('page_title', 'Overview')</h2>
                    <p class="text-xs text-slate-400 font-medium mt-1">Manage and audit your laundry service system</p>
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold text-slate-400 uppercase">Status:</span>
                        <span class="px-3 py-1 bg-red-50 text-brand-red text-xs font-bold rounded-full border border-red-100">Live</span>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="flex-1 p-6 md:p-10">
                
                <!-- Notifications/Alerts -->
                @if (session('success'))
                    <div class="mb-8 bg-emerald-50 border-l-4 border-brand-green p-4 rounded-xl text-emerald-700 text-xs font-semibold flex items-center justify-between shadow-sm">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-sm"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700"><i class="fas fa-times"></i></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-8 bg-red-50 border-l-4 border-brand-red p-4 rounded-xl text-red-700 text-xs font-semibold flex items-center justify-between shadow-sm">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-exclamation-circle text-sm"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700"><i class="fas fa-times"></i></button>
                    </div>
                @endif

                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="bg-white border-t border-slate-100 py-6 px-10 text-center text-xs text-slate-400 font-medium">
                &copy; 2026 LaundrySingh. All rights reserved. Redesigned with brand styling.
            </footer>
        </main>
    </div>

    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Auto-scroll the active menu item into view in the sidebar
        document.addEventListener('DOMContentLoaded', () => {
            const activeLink = document.querySelector('nav a.bg-brand-red');
            const navContainer = document.getElementById('sidebar-nav');
            if (activeLink && navContainer) {
                setTimeout(() => {
                    activeLink.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 150);
            }
        });
    </script>
</body>
</html>
