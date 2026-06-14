<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GearMaster - Login / Register</title>

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
            
            <!-- Left Side: Login -->
            <div class="bg-surface/90 p-8 md:p-12 flex flex-col justify-center">
                <div class="max-w-md mx-auto w-full">
                    <h1 class="font-sora text-headline-xl text-on-surface mb-2">Access Grid</h1>
                    <p class="text-on-surface-variant mb-8 font-inter text-body-md">Enter your credentials to connect to GearMaster.</p>
                    
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-6" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-stack-md">
                        @csrf

                        <!-- Email Address -->
                        <div class="space-y-stack-xs relative group" id="email-field-group">
                            <label class="font-jetbrains text-label-mono text-on-surface-variant group-focus-within:text-primary transition-colors" for="email">Email Sequence</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">mail</span>
                                <input class="glass-input w-full h-12 pl-12 pr-4 rounded-lg text-on-surface font-inter text-body-md placeholder:text-on-surface-variant/50 focus:ring-0" id="email" name="email" value="{{ old('email') }}" placeholder="pilot@gearmaster.com" type="email" required autofocus autocomplete="username"/>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-error text-sm" />
                        </div>

                        <!-- Password -->
                        <div class="space-y-stack-xs relative group" id="password-field-group">
                            <label class="font-jetbrains text-label-mono text-on-surface-variant group-focus-within:text-primary transition-colors flex justify-between w-full" for="password">
                                <span>Security Key</span>
                                @if (Route::has('password.request'))
                                    <a class="text-primary hover:text-surface-tint hover:underline decoration-primary/30 font-inter text-sm" href="{{ route('password.request') }}">Lost key?</a>
                                @endif
                            </label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">lock</span>
                                <input class="glass-input w-full h-12 pl-12 pr-12 rounded-lg text-on-surface font-inter text-body-md placeholder:text-on-surface-variant/50 focus:ring-0" id="password" name="password" placeholder="••••••••" type="password" required autocomplete="current-password"/>
                                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" type="button" onclick="togglePasswordVisibility()">
                                    <span class="material-symbols-outlined" id="password-visibility-icon">visibility</span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-error text-sm" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center mt-4">
                            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-primary focus:ring-primary border-white/20 rounded bg-surface-container-high transition duration-150 ease-in-out">
                            <label for="remember_me" class="ml-2 block text-sm text-on-surface-variant font-inter">
                                Remember link status
                            </label>
                        </div>

                        <button class="btn-primary w-full h-12 rounded-lg font-sora text-button-text uppercase tracking-widest mt-6 flex items-center justify-center gap-2 group" type="submit">
                            Initialize Link
                            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                    </form>

                    <div class="mt-8 relative flex items-center justify-center">
                        <div class="absolute inset-x-0 h-px bg-white/10"></div>
                        <span class="relative bg-surface px-4 font-jetbrains text-label-mono text-on-surface-variant">External Auth</span>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button class="btn-secondary h-12 rounded-lg font-sora text-button-text flex items-center justify-center gap-2 group">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"></path></svg>
                            Google
                        </button>
                        <button class="btn-secondary h-12 rounded-lg font-sora text-button-text flex items-center justify-center gap-2 group">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"></path></svg>
                            Facebook
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Side: Register / Invitation (Visual Anchor) -->
            <div class="relative hidden lg:flex flex-col justify-center p-12 overflow-hidden bg-surface-container-high/90">
                <div class="absolute inset-0 border border-white/5 pointer-events-none"></div>
                <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="absolute -left-20 -top-20 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 max-w-md">
                    <div class="mb-8 inline-flex items-center justify-center w-16 h-16 rounded-xl bg-surface-container shadow-[0_0_20px_rgba(164,230,255,0.15)] border border-primary/20">
                        <span class="material-symbols-outlined text-primary text-[32px]">memory</span>
                    </div>
                    <h2 class="font-sora text-headline-xl text-on-surface mb-4 leading-tight">New Construct?</h2>
                    <p class="text-on-surface-variant font-inter text-body-lg mb-8 leading-relaxed">
                        Register to unlock personalized loadouts, priority shipping on exclusive hardware drops, and seamless order telemetry.
                    </p>
                    <div class="space-y-4 mb-10">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-tertiary">check_circle</span>
                            <span class="font-inter text-on-surface">Build Tracking Dashboard</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-tertiary">check_circle</span>
                            <span class="font-inter text-on-surface">Early Access to New Tech</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-tertiary">check_circle</span>
                            <span class="font-inter text-on-surface">Secure Payment Vault</span>
                        </div>
                    </div>
                    <a class="inline-flex items-center justify-center h-12 px-8 rounded-lg font-sora text-button-text uppercase tracking-widest btn-secondary border-primary/50 text-primary hover:bg-primary/10 group" href="{{ route('register') }}">
                        Begin Registration
                        <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                    </a>
                </div>
                <!-- Decorative grid lines overlay -->
                <div class="absolute inset-0 pointer-events-none bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:40px_40px] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_10%,transparent_100%)]"></div>
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
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('password-visibility-icon');
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