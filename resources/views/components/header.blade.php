@props(['categories' => []])
<header class="bg-white border-b border-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        
        <div class="flex-shrink-0 flex items-center">
            <a href="/" class="text-2xl font-black text-blue-700 tracking-tighter">
                GEAR<span class="text-gray-900">SHOP</span>
            </a>
        </div>

        <div class="flex-1 max-w-2xl mx-8">
            <div class="relative">
                <input type="text" class="w-full bg-gray-100 border-transparent focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 rounded-lg py-2 pl-4 pr-10 text-sm transition" placeholder="Bạn cần tìm sản phẩm gì?">
                <button class="absolute right-0 top-0 mt-2 mr-3 text-gray-500 hover:text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>

        <div class="flex items-center space-x-6">
            <a href="#" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition">
                <div class="relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="absolute -top-1 -right-2 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">0</span>
                </div>
                <span class="text-xs font-medium mt-1">Giỏ hàng</span>
            </a>
            
            <a href="/login" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="text-xs font-medium mt-1">Đăng nhập</span>
            </a>
        </div>

    </div>
</header>