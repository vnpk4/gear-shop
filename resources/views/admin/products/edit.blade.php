<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa Sản Phẩm: ') . $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tên sản phẩm *</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Giá tiền (VNĐ) *</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="flex gap-4 mb-4">
                        <div class="w-1/2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Danh mục *</label>
                            <select name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"> @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Hãng sản xuất *</label>
                            <select name="brand_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"> @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Ảnh hiện tại</label>
                        @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="Ảnh cũ" class="w-32 h-32 object-cover mb-3 rounded shadow border border-gray-300">
                        @else
                        <p class="text-sm text-gray-500 mb-3 italic">Chưa có ảnh</p>
                        @endif

                        <label class="block text-gray-700 text-sm font-bold mb-2">Thay ảnh mới (Bỏ trống nếu muốn giữ ảnh cũ)</label>
                        <input type="file" name="image" class="w-full text-gray-700 border p-2 rounded">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-bold py-2 px-6 rounded shadow-md focus:outline-none focus:shadow-outline transition duration-300">
                            Cập nhật thay đổi
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="text-gray-500 hover:text-gray-800 font-bold text-sm">Hủy bỏ</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>