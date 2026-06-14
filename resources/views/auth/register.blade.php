<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GearMaster - Register</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@500&amp;family=Sora:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom Input Styling for Tech Luxury vibe */
        .glass-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.05);
            border-color: #a4e6ff;
            box-shadow: 0 0 15px rgba(164, 230, 255, 0.2);
            outline: none;
        }
        
        .btn-primary {
            background-color: #a4e6ff;
            color: #0B0B0C;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            box-shadow: 0 0 15px rgba(164, 230, 255, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #e5e2e1;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            border-color: #a4e6ff;
            color: #a4e6ff;
            box-shadow: 0 0 15px rgba(164, 230, 255, 0.1);
        }
        
        .active-field label {
            color: #a4e6ff !important;
        }
        .active-field span {
            color: #a4e6ff !important;
        }
    </style>
</head>
<body class="bg-background text-on-surface min-h-screen flex flex-col font-inter antialiased overflow-x-hidden selection:bg-primary selection:text-on-primary">
    <!-- Header wrapper for brand identity -->
    <header class="fixed top-0 w-full z-50 bg-surface-container-low/80 backdrop-blur-xl border-b border-white/10 shadow-[0_0_15px_rgba(76,214,255,0.1)] h-20 px-margin-mobile md:px-margin-desktop flex justify-between items-center transition-all duration-300">
        <div class="flex items-center gap-4">
            <a class="font-sora text-display-lg-mobile font-extrabold text-primary tracking-tighter hidden md:block" href="/">GearMaster</a>
            <a class="font-sora text-3xl font-extrabold text-primary tracking-tighter md:hidden" href="/">GM</a>
        </div>
        <div class="flex items-center gap-stack-md">
            <button aria-label="Support" class="hover:text-primary transition-colors duration-200 text-on-surface-variant flex items-center justify-center h-10 w-10 rounded-full hover:bg-surface-container-high group">
                <span class="material-symbols-outlined group-hover:scale-110 transition-transform">help</span>
            </button>
        </div>
    </header>

    <!-- Main Content Canvas -->
    <main class="flex-grow flex items-center justify-center px-margin-mobile md:px-margin-desktop pt-32 pb-stack-lg relative min-h-screen">
        <!-- Background Ambient Image -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden flex items-center justify-center opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-background via-transparent to-background z-10"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-background via-transparent to-background z-10"></div>
            <img alt="High-end PC interior" class="w-full h-full object-cover blur-sm mix-blend-screen" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYV-h7EZ2Dh3mon_GdNv93xBxm5d8A1ILtzU4OZjKJKlGIZsmOnez3tKcorNzSve9vAFnTMRCQFZWTjOzux_LRJDjYZER5WD2O-P4QRiShThIDOJQlJQ1A56qHIk6gbB-xfuZucx6dynuUlNpP-hzt5WUeoHB5bdyT75SOSiCOrEVt13h-0uPkmJiVhsfuwHYPC8l86khTZHFfkP6gqeWTSZ_mDtDgx1-HAfTdjI-Xp-lr5voXjEFjbKbdAyr1HhtLtocgCmQjEIql"/>
        </div>

        <!-- Auth Container: Bento Grid Style Layout -->
        <div class="relative z-10 w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-px bg-white/10 rounded-xl overflow-hidden backdrop-blur-md shadow-[0_0_30px_rgba(0,0,0,0.5)] border border-white/10">
            
            <!-- Left Side: Login / Invitation (Visual Anchor) -->
            <div class="relative hidden lg:flex flex-col justify-center p-12 overflow-hidden bg-surface-container-high/90">
                <div class="absolute inset-0 border border-white/5 pointer-events-none"></div>
                <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="absolute -left-20 -top-20 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 max-w-md">
                    <div class="mb-8 inline-flex items-center justify-center w-16 h-16 rounded-xl bg-surface-container shadow-[0_0_20px_rgba(164,230,255,0.15)] border border-primary/20">
                        <span class="material-symbols-outlined text-primary text-[32px]">shield</span>
                    </div>
                    <h2 class="font-sora text-headline-xl text-on-surface mb-4 leading-tight">Already Constructed?</h2>
                    <p class="text-on-surface-variant font-inter text-body-lg mb-8 leading-relaxed">
                        If you already have a connection profile established, access the grid using your secure credentials.
                    </p>
                    <a class="inline-flex items-center justify-center h-12 px-8 rounded-lg font-sora text-button-text uppercase tracking-widest btn-secondary border-primary/50 text-primary hover:bg-primary/10 group" href="{{ route('login') }}">
                        Access Grid
                        <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform">login</span>
                    </a>
                </div>
                <!-- Decorative grid lines overlay -->
                <div class="absolute inset-0 pointer-events-none bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:40px_40px] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_10%,transparent_100%)]"></div>
            </div>

            <!-- Right Side: Register -->
            <div class="bg-surface/90 p-8 md:p-12 flex flex-col justify-center">
                <div class="max-w-md mx-auto w-full">
                    <h1 class="font-sora text-headline-xl text-on-surface mb-2">New Construct</h1>
                    <p class="text-on-surface-variant mb-8 font-inter text-body-md">Create your profile to initialize your GearMaster account.</p>

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <!-- Name (Account Name) -->
                        <div class="space-y-stack-xs relative group">
                            <label class="font-jetbrains text-label-mono text-on-surface-variant group-focus-within:text-primary transition-colors" for="name">Account Name</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">person</span>
                                <input class="glass-input w-full h-11 pl-12 pr-4 rounded-lg text-on-surface font-inter text-body-md placeholder:text-on-surface-variant/50 focus:ring-0" id="name" name="name" value="{{ old('name') }}" placeholder="pilot101" type="text" required autofocus autocomplete="name"/>
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-1 text-error text-xs" />
                        </div>

                        <!-- Real Name -->
                        <div class="space-y-stack-xs relative group">
                            <label class="font-jetbrains text-label-mono text-on-surface-variant group-focus-within:text-primary transition-colors" for="realname">Real Name</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">badge</span>
                                <input class="glass-input w-full h-11 pl-12 pr-4 rounded-lg text-on-surface font-inter text-body-md placeholder:text-on-surface-variant/50 focus:ring-0" id="realname" name="realname" value="{{ old('realname') }}" placeholder="Alex Mercer" type="text" required autocomplete="name"/>
                            </div>
                            <x-input-error :messages="$errors->get('realname')" class="mt-1 text-error text-xs" />
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-stack-xs relative group">
                            <label class="font-jetbrains text-label-mono text-on-surface-variant group-focus-within:text-primary transition-colors" for="email">Email Sequence</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">mail</span>
                                <input class="glass-input w-full h-11 pl-12 pr-4 rounded-lg text-on-surface font-inter text-body-md placeholder:text-on-surface-variant/50 focus:ring-0" id="email" name="email" value="{{ old('email') }}" placeholder="pilot@gearmaster.com" type="email" required autocomplete="username"/>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-error text-xs" />
                        </div>

                        <!-- Password -->
                        <div class="space-y-stack-xs relative group">
                            <label class="font-jetbrains text-label-mono text-on-surface-variant group-focus-within:text-primary transition-colors" for="password">Security Key</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">lock</span>
                                <input class="glass-input w-full h-11 pl-12 pr-12 rounded-lg text-on-surface font-inter text-body-md placeholder:text-on-surface-variant/50 focus:ring-0" id="password" name="password" placeholder="••••••••" type="password" required autocomplete="new-password"/>
                                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" type="button" onclick="togglePasswordVisibility('password', 'password-visibility-icon')">
                                    <span class="material-symbols-outlined" id="password-visibility-icon">visibility</span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-error text-xs" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-stack-xs relative group">
                            <label class="font-jetbrains text-label-mono text-on-surface-variant group-focus-within:text-primary transition-colors" for="password_confirmation">Confirm Key</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">lock_reset</span>
                                <input class="glass-input w-full h-11 pl-12 pr-12 rounded-lg text-on-surface font-inter text-body-md placeholder:text-on-surface-variant/50 focus:ring-0" id="password_confirmation" name="password_confirmation" placeholder="••••••••" type="password" required autocomplete="new-password"/>
                                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" type="button" onclick="togglePasswordVisibility('password_confirmation', 'confirm-visibility-icon')">
                                    <span class="material-symbols-outlined" id="confirm-visibility-icon">visibility</span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-error text-xs" />
                        </div>

                        <button class="btn-primary w-full h-12 rounded-lg font-sora text-button-text uppercase tracking-widest mt-6 flex items-center justify-center gap-2 group" type="submit">
                            Begin Construction
                            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">rocket_launch</span>
                        </button>
                    </form>

                    <div class="mt-6 text-center lg:hidden">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-primary hover:underline">
                            Already constructed? Sign in
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer Component -->
    <footer class="relative bottom-0 w-full bg-surface-dim border-t border-white/5 py-stack-lg px-margin-mobile md:px-margin-desktop z-10 mt-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-stack-lg max-w-container-max mx-auto">
            <div class="col-span-1 md:col-span-2 flex flex-col gap-stack-sm">
                <span class="font-sora text-headline-md text-primary">GearMaster</span>
                <p class="font-inter text-body-md text-on-surface-variant max-w-sm mt-2">
                    Engineered for precision. Designed for performance. The ultimate destination for high-end technical hardware.
                </p>
                <div class="text-on-surface-variant mt-4 font-jetbrains text-label-mono text-xs opacity-60">
                    © 2026 GearMaster. Precision Performance.
                </div>
            </div>
            <div class="col-span-1 flex flex-col gap-stack-sm">
                <h4 class="font-jetbrains text-label-mono text-on-surface mb-2 uppercase tracking-widest">Platform</h4>
                <a class="font-inter text-body-md text-on-surface-variant hover:text-tertiary transition-colors duration-200" href="#">Support</a>
                <a class="font-inter text-body-md text-on-surface-variant hover:text-tertiary transition-colors duration-200" href="#">Shipping</a>
            </div>
            <div class="col-span-1 flex flex-col gap-stack-sm">
                <h4 class="font-jetbrains text-label-mono text-on-surface mb-2 uppercase tracking-widest">Legal</h4>
                <a class="font-inter text-body-md text-on-surface-variant hover:text-tertiary transition-colors duration-200" href="#">Privacy Policy</a>
                <a class="font-inter text-body-md text-on-surface-variant hover:text-tertiary transition-colors duration-200" href="#">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script>
        // Interactive fields highlights
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                const group = input.closest('.relative.group');
                if (group) group.classList.add('active-field');
            });
            input.addEventListener('blur', () => {
                const group = input.closest('.relative.group');
                if (group) group.classList.remove('active-field');
            });
        });

        // Password visibility toggler
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                icon.textContent = 'visibility';
            }
        }
    </script>
</body>
</html>
