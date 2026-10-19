<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - LaundrySingh</title>

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
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-zinc-950 min-h-screen flex items-center justify-center p-4 relative overflow-y-auto antialiased">

    <!-- Subtle ambient glow effects -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-brand-red/20 rounded-full blur-[80px] -z-0"></div>
    <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-brand-accent/20 rounded-full blur-[80px] -z-0"></div>

    <div class="w-full max-w-md bg-zinc-900/60 backdrop-blur-md rounded-[2.5rem] shadow-2xl border border-white/10 overflow-hidden relative p-8 md:p-10 z-10 my-8">
        
        <!-- Header -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center mb-4 bg-white/5 p-3 rounded-2xl border border-white/5 shadow-inner">
                <img src="{{ asset('images/logo1.png') }}" class="h-16 w-auto object-contain" alt="Laundry Singh Logo">
            </div>
            <p class="text-xs text-zinc-400 font-bold uppercase tracking-widest mt-2">Customer Registration</p>
        </div>

        <!-- Session Status / Errors -->
        @if (session('error'))
            <div class="mb-6 bg-red-950/50 border-l-4 border-brand-red p-4 rounded-xl text-red-200 text-xs font-semibold flex items-center gap-3 border border-red-900/30">
                <i class="fas fa-exclamation-circle text-sm text-brand-red"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif
        
        @if (session('success'))
            <div class="mb-6 bg-emerald-950/50 border-l-4 border-emerald-500 p-4 rounded-xl text-emerald-200 text-xs font-semibold flex items-center gap-3 border border-emerald-900/30">
                <i class="fas fa-check-circle text-sm text-emerald-400"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('register.post', request()->query()) }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-zinc-400 mb-1.5">Full Name</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-500">
                        <i class="fas fa-user text-sm"></i>
                    </span>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full bg-zinc-800/40 border border-zinc-700/60 rounded-2xl pl-11 pr-4 py-3.5 text-white font-semibold focus:outline-none focus:border-brand-accent focus:ring-1 focus:ring-brand-accent transition-all text-sm placeholder-zinc-500"
                        placeholder="Rahul Sharma">
                </div>
                @error('name')
                    <span class="text-brand-red text-xs font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-zinc-400 mb-1.5">Mobile Number</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-500">
                        <i class="fas fa-phone text-sm"></i>
                    </span>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                        class="w-full bg-zinc-800/40 border border-zinc-700/60 rounded-2xl pl-11 pr-4 py-3.5 text-white font-semibold focus:outline-none focus:border-brand-accent focus:ring-1 focus:ring-brand-accent transition-all text-sm placeholder-zinc-500"
                        placeholder="9876543210">
                </div>
                @error('phone')
                    <span class="text-brand-red text-xs font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-zinc-400 mb-1.5">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-500">
                        <i class="fas fa-envelope text-sm"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-zinc-800/40 border border-zinc-700/60 rounded-2xl pl-11 pr-4 py-3.5 text-white font-semibold focus:outline-none focus:border-brand-accent focus:ring-1 focus:ring-brand-accent transition-all text-sm placeholder-zinc-500"
                        placeholder="rahul@gmail.com">
                </div>
                @error('email')
                    <span class="text-brand-red text-xs font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-zinc-400 mb-1.5">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-500">
                        <i class="fas fa-lock text-sm"></i>
                    </span>
                    <input type="password" id="password" name="password" required
                        class="w-full bg-zinc-800/40 border border-zinc-700/60 rounded-2xl pl-11 pr-4 py-3.5 text-white font-semibold focus:outline-none focus:border-brand-accent focus:ring-1 focus:ring-brand-accent transition-all text-sm placeholder-zinc-500"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <span class="text-brand-red text-xs font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-zinc-400 mb-1.5">Confirm Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-500">
                        <i class="fas fa-lock text-sm"></i>
                    </span>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full bg-zinc-800/40 border border-zinc-700/60 rounded-2xl pl-11 pr-4 py-3.5 text-white font-semibold focus:outline-none focus:border-brand-accent focus:ring-1 focus:ring-brand-accent transition-all text-sm placeholder-zinc-500"
                        placeholder="••••••••">
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="group relative w-full bg-gradient-to-r from-brand-red to-brand-darkRed hover:from-brand-darkRed hover:to-brand-red text-white font-black py-4 px-6 rounded-2xl transition-all duration-300 shadow-xl shadow-brand-red/20 uppercase tracking-widest text-xs flex items-center justify-center gap-3">
                    <span>Register</span>
                    <i class="fas fa-user-plus transition-transform group-hover:translate-x-1"></i>
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-xs text-zinc-400 font-semibold">
            Already have an account? <a href="{{ route('login', request()->query()) }}" class="text-brand-accent hover:text-yellow-300 hover:underline transition-all ml-1">Log In</a>
        </div>

        <div class="mt-6 text-center text-[10px] text-zinc-500 font-semibold uppercase tracking-wider">
            &copy; 2026 LaundrySingh. All rights reserved.
        </div>
    </div>
</body>
</html>
