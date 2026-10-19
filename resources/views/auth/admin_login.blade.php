<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - LaundrySingh</title>

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

    <div class="w-full max-w-md bg-zinc-900/60 backdrop-blur-md rounded-[2.5rem] shadow-2xl border border-white/10 overflow-hidden relative p-8 md:p-10 z-10">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center mb-4 bg-white/5 p-3 rounded-2xl border border-white/5 shadow-inner">
                <img src="{{ asset('images/logo1.png') }}" class="h-16 md:h-20 w-auto object-contain" alt="Laundry Singh Logo">
            </div>
            <p class="text-xs text-zinc-400 font-bold uppercase tracking-widest mt-3">Admin Login</p>
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

        <form action="{{ route('admin.login.post', request()->query()) }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="login" class="block text-xs font-bold uppercase tracking-wider text-zinc-400 mb-2">Email or Mobile Number</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-500">
                        <i class="fas fa-user text-sm"></i>
                    </span>
                    <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus
                        class="w-full bg-zinc-800/40 border border-zinc-700/60 rounded-2xl pl-11 pr-4 py-4 text-white font-semibold focus:outline-none focus:border-brand-accent focus:ring-1 focus:ring-brand-accent transition-all text-sm placeholder-zinc-500"
                        placeholder="Email or Mobile Number">
                </div>
                @error('login')
                    <span class="text-brand-red text-xs font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-zinc-400 mb-2">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-500">
                        <i class="fas fa-lock text-sm"></i>
                    </span>
                    <input type="password" id="password" name="password" required
                        class="w-full bg-zinc-800/40 border border-zinc-700/60 rounded-2xl pl-11 pr-12 py-4 text-white font-semibold focus:outline-none focus:border-brand-accent focus:ring-1 focus:ring-brand-accent transition-all text-sm placeholder-zinc-500"
                        placeholder="••••••••">
                    <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 flex items-center pr-4 text-zinc-500 hover:text-zinc-300 transition-colors">
                        <i id="eye-icon" class="fas fa-eye text-sm"></i>
                    </button>
                </div>
                @error('password')
                    <span class="text-brand-red text-xs font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between text-xs font-semibold text-zinc-400">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded text-brand-red focus:ring-brand-red w-4 h-4 bg-zinc-800 border-zinc-700 accent-brand-red">
                    <span>Remember me</span>
                </label>
            </div>

            <div class="pt-2">
                <button type="submit" class="group relative w-full bg-gradient-to-r from-brand-red to-brand-darkRed hover:from-brand-darkRed hover:to-brand-red text-white font-black py-4 px-6 rounded-2xl transition-all duration-300 shadow-xl shadow-brand-red/20 uppercase tracking-widest text-xs flex items-center justify-center gap-3">
                    <span>Log In</span>
                    <i class="fas fa-sign-in-alt transition-transform group-hover:translate-x-1"></i>
                </button>
            </div>
        </form>

        <div class="mt-8 text-center text-xs text-zinc-500 font-medium">
            &copy; 2026 LaundrySingh. All rights reserved.
        </div>

    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
