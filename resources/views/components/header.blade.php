@props(['categories' => []])
<header class="bg-white border-b border-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">

        <div class="flex-shrink-0 flex items-center">
            <a href="/" class="text-2xl font-black text-blue-700 tracking-tighter">
                GEAR<span class="text-gray-900">SHOP</span>
            </a>
        </div>

        <form action="{{ route('customer.products.index') }}" method="GET" class="relative hidden sm:flex items-center">

            <input type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="Tìm kiếm sản phẩm..."
                class="w-full sm:w-64 lg:w-96 pl-4 pr-10 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">

            <button type="submit" class="absolute right-0 top-0 mt-2 mr-3 text-gray-400 hover:text-blue-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>

        </form>

        <div class="flex items-center space-x-6">
            @if(!auth()->check() || auth()->user()->role !== 'admin')
            <a href="{{ route('customer.cart.index') }}" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition">
                <div class="relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium mt-1">Giỏ hàng</span>
            </a>
            @endif
            @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="hidden sm:flex items-center mx-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 bg-gray-900 text-white hover:bg-emerald-600 rounded-xl font-bold text-sm transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Trang quản trị
                </a>
            </div>
            @endif
            <div class="flex items-center space-x-6">

                @guest
                <a href="{{ route('login') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition-colors group">
                    <div class="bg-gray-100 p-2 rounded-full group-hover:bg-blue-50">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-xs text-gray-500 font-medium">Đăng nhập</p>
                        <p class="text-sm font-bold leading-none text-gray-900 group-hover:text-blue-600">Tài khoản Guest</p>
                    </div>
                </a>
                @endguest

                @auth
                <div class="relative group cursor-pointer flex items-center gap-2 text-gray-600 transition-colors h-full">
                    <div class="bg-blue-50 p-2 rounded-full text-blue-600">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="hidden md:block text-left py-4">
                        <p class="text-xs text-gray-500 font-medium">Xin chào,</p>
                        <p class="text-sm font-bold leading-none text-blue-700">
                            {{ Auth::user()->realname ?? Auth::user()->name }}
                        </p>
                    </div>

                    <div class="absolute top-full right-0 pt-2 w-48 hidden group-hover:block z-50">
                        <div class="bg-white shadow-lg border border-gray-100 rounded-md overflow-hidden">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 font-medium border-b border-gray-50">
                                Thông tin cá nhân
                            </a>
                            @if(auth()->check() && auth()->user()->role !== 'admin')
                            <a href="{{ route('customer.orders.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                Lịch sử đặt hàng
                            </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 font-medium">
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