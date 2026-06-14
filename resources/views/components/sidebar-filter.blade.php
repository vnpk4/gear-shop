@props(['brands', 'categories'])

<aside class="w-full md:w-64 flex-shrink-0">
    <form action="{{ url('/') }}" method="GET" class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm">
        
        <h3 class="font-bold text-lg mb-4 text-gray-800">Bộ lọc sản phẩm</h3>

        <div class="mb-6">
            <h4 class="font-semibold text-sm mb-3 text-gray-700">Danh mục</h4>
            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                @foreach($categories as $category)
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                            @if(in_array($category->id, request('categories', []))) checked @endif 
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <span class="text-sm text-gray-600 hover:text-blue-600">{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="mb-6">
            <h4 class="font-semibold text-sm mb-3 text-gray-700">Thương hiệu</h4>
            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                @foreach($brands as $brand)
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="brands[]" value="{{ $brand->id }}" 
                            @if(in_array($brand->id, request('brands', []))) checked @endif 
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <span class="text-sm text-gray-600 hover:text-blue-600">{{ $brand->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-6">
            <h4 class="font-semibold text-sm mb-3 text-gray-700">Khoảng giá (VNĐ)</h4>
            <div class="flex items-center space-x-2">
                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Từ..." class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <span class="text-gray-400">-</span>
                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Đến..." class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div class="mb-6">
            <h4 class="font-semibold text-sm mb-3 text-gray-700">Sắp xếp theo</h4>
            <select name="sort" class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="">Mặc định</option>
                <option value="price_asc" @if(request('sort') == 'price_asc') selected @endif>Giá: Thấp đến Cao</option>
                <option value="price_desc" @if(request('sort') == 'price_desc') selected @endif>Giá: Cao xuống Thấp</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors text-sm">
            Áp dụng bộ lọc
        </button>

        @if(request()->anyFilled(['categories', 'brands', 'min_price', 'max_price', 'sort']))
            <a href="{{ url('/') }}" class="block text-center w-full mt-3 text-sm text-gray-500 hover:text-red-500 transition-colors">
                Xóa bộ lọc
            </a>
        @endif
    </form>
</aside>