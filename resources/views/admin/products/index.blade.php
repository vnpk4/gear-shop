<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quản lý Sản phẩm') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                + Thêm Sản Phẩm
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-fixed divide-y divide-gray-200 border-b border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="w-32 px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Hình ảnh
                                </th>

                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Tên sản phẩm
                                </th>

                                <th scope="col" class="w-40 px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Giá tiền
                                </th>

                                <th scope="col" class="w-64 px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($products as $item)
                            <tr class="hover:bg-gray-50 transition duration-150">

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="Ảnh" class="w-24 h-16 mx-auto object-cover rounded-md border border-gray-300 shadow-sm">
                                    @else
                                    <span class="inline-flex items-center justify-center w-24 h-16 mx-auto rounded-md bg-gray-100 text-gray-400 text-xs border border-gray-200">Trống</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 truncate text-left">{{ $item->name }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="text-sm font-bold text-red-600">{{ number_format($item->price) }} ₫</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center space-x-3">

                                        <a href="{{ route('admin.products.show', $item->id) }}" class="text-gray-700 hover:text-gray-900 bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded transition duration-200">
                                            Xem
                                        </a>

                                        <a href="{{ route('admin.products.edit', $item->id) }}" class="text-green-600 hover:text-green-900 bg-green-50 hover:bg-green-100 px-3 py-1 rounded transition duration-200">
                                            Sửa
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded transition duration-200">
                                                Xóa
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($products->hasPages())
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    {{ $products->links() }}
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>