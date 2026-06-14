@props(['categories' => []])
<header class="bg-surface-container-low/80 backdrop-blur-xl border-b border-white/10 shadow-[0_0_15px_rgba(76,214,255,0.1)] py-4 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">

        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center">
            <a href="/" class="font-sora text-2xl font-black text-primary tracking-tighter uppercase">
                Gear<span class="text-secondary">Master</span>
            </a>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('customer.products.index') }}" method="GET" class="relative hidden sm:flex items-center">
            <input type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="Search telemetry/hardware..."
                class="glass-input w-full sm:w-64 lg:w-96 pl-4 pr-10 py-2 rounded-full text-sm text-on-surface placeholder:text-on-surface-variant/50 focus:ring-0">

            <button type="submit" class="absolute right-0 top-0 mt-2.5 mr-4 text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-xl">search</span>
            </button>
        </form>

        <!-- Actions -->
        <div class="flex items-center space-x-6">
            @if(!auth()->check() || auth()->user()->role !== 'admin')
            <a href="{{ route('customer.cart.index') }}" class="flex flex-col items-center text-on-surface-variant hover:text-primary transition group">
                <div class="relative flex items-center justify-center p-2 rounded-full bg-white/5 group-hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined">shopping_cart</span>
                </div>
                <span class="font-jetbrains text-[10px] uppercase tracking-widest mt-1">Giỏ hàng</span>
            </a>
            @endif
            
            @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="hidden sm:flex items-center mx-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 btn-secondary border-primary/50 text-primary hover:bg-primary/10 rounded-xl font-bold text-sm transition-all shadow-sm">
                    <span class="material-symbols-outlined text-lg mr-2">dashboard</span>
                    Trang quản trị
                </a>
            </div>
            @endif

            <div class="flex items-center space-x-6">
                @guest
                <a href="{{ route('login') }}" class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors group">
                    <div class="bg-white/5 p-2 rounded-full group-hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-[10px] text-on-surface-variant/70 font-jetbrains uppercase">Đăng nhập</p>
                        <p class="text-sm font-bold leading-none text-on-surface group-hover:text-primary">Tài khoản Guest</p>
                    </div>
                </a>
                @endguest

                @auth
                <div class="relative group cursor-pointer flex items-center gap-2 text-on-surface-variant transition-colors h-full py-2">
                    <div class="bg-primary/10 p-2 rounded-full text-primary">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-[10px] text-on-surface-variant/70 font-jetbrains uppercase">Chào mừng,</p>
                        <p class="text-sm font-bold leading-none text-primary font-sora">
                            {{ Auth::user()->realname ?? Auth::user()->name }}
                        </p>
                    </div>

                    <div class="absolute top-full right-0 pt-2 w-48 hidden group-hover:block z-50">
                        <div class="bg-surface-container-high/95 backdrop-blur-md shadow-[0_0_30px_rgba(0,0,0,0.5)] border border-white/10 rounded-xl overflow-hidden">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-on-surface hover:bg-primary/10 hover:text-primary transition-colors font-medium border-b border-white/5">
                                Thông tin cá nhân
                            </a>
                            @if(auth()->check() && auth()->user()->role !== 'admin')
                            <a href="{{ route('customer.orders.index') }}" class="block px-4 py-3 text-sm text-on-surface hover:bg-primary/10 hover:text-primary transition-colors font-medium border-b border-white/5">
                                Lịch sử đặt hàng
                            </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-error hover:bg-error-container/20 font-medium">
                                    Đăng xuất
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
        </div>

    </div>
</header>