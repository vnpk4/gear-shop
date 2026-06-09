<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Chi tiết Sản phẩm') }}
            </h2>
            <a href="{{ route('admin.products.index') }}" class="text-gray-500 hover:text-gray-700 font-medium underline">
                &larr; Quay lại danh sách
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 p-8 ">

                    <div class="md:col-span-5">
                        <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-center bg-white h-96">
                            @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain">
                            @else
                            <div class="text-gray-400 flex flex-col items-center">
                                <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Sản phẩm chưa có ảnh</span>
                            </div>
                            @endif
                        </div>

                    </div>

                    <div class="md:col-span-7 flex flex-col" style="padding: 20px;">

                        <div class="text-sm text-gray-500 mb-2">
                            Thương hiệu: <span class="text-blue-600 font-semibold cursor-pointer hover:underline">{{ $product->brand->name ?? 'Đang cập nhật' }}</span>
                        </div>

                        <h1 class="text-2xl font-bold text-gray-900 leading-snug mb-3">
                            {{ $product->name }}
                        </h1>

                        <div class="flex items-center text-sm text-gray-500 mb-4 pb-4 border-b border-gray-200">
                            <span class="mr-4">SKU: <span class="font-mono">{{ $product->id }}00{{ rand(100,999) }}</span></span>
                            <div class="flex items-center border-l border-gray-300 pl-4">
                                <div class="flex text-yellow-400 mr-1">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-current text-yellow-400" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <span class="text-blue-600 cursor-pointer hover:underline">5 (12 đánh giá)</span>
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-sm text-gray-500 line-through mb-1">Giá niêm yết: {{ number_format($product->price + 500000) }} đ</p>
                            <h2 class="text-4xl font-extrabold text-blue-700">Giá hiện tại: {{ number_format($product->price) }} ₫</h2>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-5 mb-6 border border-gray-100">
                            <h3 class="font-bold text-gray-800 mb-3 text-sm uppercase">Mô tả sản phẩm</h3>
                            <div class="text-gray-600 text-sm leading-relaxed prose prose-sm max-w-none">
                                @if($product->description)
                                {!! nl2br(e($product->description)) !!}
                                @else
                                <p class="italic text-gray-400">Chưa có bài viết mô tả cho sản phẩm này.</p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-auto flex space-x-4">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-black font-bold py-3 px-4 rounded shadow flex justify-center items-center transition duration-200 text-center">
                                Sửa thông tin sản phẩm
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-100 hover:bg-red-200 text-red-700 font-bold py-3 px-4 rounded border border-red-200 transition duration-200">
                                    Xóa sản phẩm
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>