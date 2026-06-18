<x-app-layout>

    <main x-data="{ mobileFilterOpen: false }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-background min-h-screen text-on-surface">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 border-b border-white/5 pb-6">
            <h2 class="text-xl sm:text-2xl font-black text-on-surface font-sora uppercase tracking-tight">
                Sản phẩm mới nhất
            </h2>
            <div class="flex items-center justify-between sm:justify-end gap-4">
                <button @click="mobileFilterOpen = true" class="flex md:hidden items-center justify-center gap-2 px-4 py-2 bg-white/5 border border-white/10 rounded-xl font-bold font-sora text-sm text-primary hover:bg-primary/10 transition-all">
                    <span class="material-symbols-outlined text-lg">filter_alt</span>
                    Bộ lọc
                </button>
                <div class="text-xs font-jetbrains text-on-surface-variant/60 uppercase tracking-wider">
                    Tổng cộng: <strong class="text-primary">{{ $products->total() ?? 0 }}</strong> sản phẩm
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            
            <x-sidebar-filter :brands="$brands" :categories="$categories" />

            <div class="flex-1">
                <div class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                    @forelse($products as $item)
                        <x-product-card :product="$item" />
                    @empty
                        <div class="col-span-full py-20 text-center bg-surface-container/60 rounded-xl border border-dashed border-white/10 shadow-inner">
                            <p class="text-on-surface-variant/80 text-lg font-inter">Không tìm thấy sản phẩm nào phù hợp với bộ lọc.</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-8 font-jetbrains text-xs">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </main>
    
    <x-footer />
</x-app-layout>