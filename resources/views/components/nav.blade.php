<nav class="bg-blue-700 text-white sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-8 h-12 text-sm font-medium">

            <div class="relative group h-full flex items-center bg-blue-800 px-6 cursor-pointer text-white hover:bg-blue-900 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <span class="font-bold text-sm uppercase tracking-wide">Danh mục sản phẩm</span>

                <div class="absolute top-full left-0 w-64 bg-white shadow-2xl border border-gray-100 hidden group-hover:block z-[100] animate-fade-in">
                    @foreach($categories as $cat)
                    <a href="{{ url('/category/' . $cat->slug) }}" class="flex items-center justify-between px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all border-b border-gray-50 last:border-0">
                        <span class="text-sm font-medium">{{ $cat->name }}</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            <a href="/" class="hover:text-blue-200 transition">Trang chủ</a>
            <a href="#" class="hover:text-blue-200 transition">Khuyến mãi Hot</a>
            <a href="#" class="hover:text-blue-200 transition">Build PC</a>
            <a href="#" class="hover:text-blue-200 transition">Tin tức công nghệ</a>
            <a href="#" class="hover:text-blue-200 transition">Hướng dẫn thanh toán</a>

        </div>
    </div>
</nav>