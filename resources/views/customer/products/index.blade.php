<x-app-layout>
    <x-header :categories="$categories" />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900">
                Sản phẩm mới nhất
            </h2>
            <div class="flex space-x-2">
                <span class="text-sm text-gray-500">Hiển thị: <strong>{{ $products->count() }}</strong> sản phẩm</span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @forelse($products as $item)
                <x-product-card :product="$item" />
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-gray-400 italic">Chưa có sản phẩm nào trong danh mục này.</p>
                </div>
            @endforelse
        </div>

    </main>

    <x-footer />
</x-app-layout>