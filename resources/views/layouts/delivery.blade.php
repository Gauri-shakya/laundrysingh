<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Delivery Panel') - LaundrySingh</title>

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
<body class="font-poppins bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Top Navigation Header -->
    <header class="bg-zinc-950 text-white px-5 py-4 flex items-center justify-between sticky top-0 z-40 shadow-md border-b border-brand-red/25">
        <a href="{{ route('delivery.dashboard') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/logo1.png') }}" class="h-10 w-auto object-contain" alt="Laundry Singh Logo">
            <span class="text-[9px] bg-brand-red text-white font-bold px-1.5 py-0.5 rounded ml-1 uppercase tracking-wider">EXECUTIVE</span>
        </a>

        <div class="flex items-center gap-3">
            <span class="text-xs font-bold text-slate-300 hidden sm:inline">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to log out?');" class="inline">
                @csrf
                <button type="submit" class="text-brand-red hover:text-red-400 p-2 rounded-xl transition-colors">
                    <i class="fas fa-sign-out-alt text-lg"></i>
                </button>
            </form>
        </div>
    </header>

    <!-- Content Area -->
    <main class="flex-1 p-4 sm:p-6 max-w-md mx-auto w-full">
        
        <!-- Welcome text -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-black text-slate-800 uppercase tracking-tight border-b-2 border-brand-red pb-0.5 inline-block">Executive Panel</h2>
                <p class="text-[11px] text-slate-400 font-semibold mt-1">ID: {{ Auth::user()->employee_id }} | Active</p>
            </div>
            <a href="{{ route('delivery.dashboard') }}" class="bg-zinc-900 hover:bg-zinc-800 text-white border border-zinc-800 px-3 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 shadow-sm shadow-black/10">
                <i class="fas fa-home text-brand-accent"></i>
                <span>Home</span>
            </a>
        </div>

        <!-- System Alerts -->
        @if (session('success'))
            <div class="mb-4 bg-emerald-50 border-l-4 border-brand-green p-4 rounded-xl text-emerald-700 text-xs font-semibold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-sm"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700"><i class="fas fa-times"></i></button>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-xl text-red-700 text-xs font-semibold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                    <i class="fas fa-exclamation-circle text-sm"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700"><i class="fas fa-times"></i></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-4 text-center text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-10">
        &copy; 2026 LaundrySingh Executive.
    </footer>

</body>
</html>
