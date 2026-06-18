<div>
    @if(session('success'))
        <div class="mb-8 p-4 bg-green-100 border border-green-400 text-green-700 rounded-xl flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-sm">
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-bold text-sm sm:text-base">{{ session('success') }}</span>
            </div>
            
            @if(Route::has('customer.cart.index'))
                <a href="{{ route('customer.cart.index') }}" class="text-sm bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg font-semibold transition-colors whitespace-nowrap text-center w-full sm:w-auto">
                    Xem giỏ hàng
                </a>
            @endif
        </div>
    @endif

    @if(session('error'))
        <div class="mb-8 p-4 bg-red-100 border border-red-400 text-red-700 rounded-xl flex items-center space-x-3 shadow-sm">
            <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-bold">{{ session('error') }}</span>
        </div>
    @endif
</div>