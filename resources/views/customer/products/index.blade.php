<x-app-layout>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900">
                Sản phẩm mới nhất
            </h2>
            <div class="text-sm text-gray-500">
                Tổng cộng: <strong>{{ $products->total() ?? 0 }}</strong> sản phẩm
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            
            <x-sidebar-filter :brands="$brands" />

            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                    @forelse($products as $item)
                        <x-product-card :product="$item" />
                    @empty
                        <div class="col-span-full py-20 text-center bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            <p class="text-gray-500 text-lg">Không tìm thấy sản phẩm nào phù hợp với bộ lọc.</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </main>
    
    <x-footer />
</x-app-layout>