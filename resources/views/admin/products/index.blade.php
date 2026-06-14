<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-sora font-extrabold text-xl text-on-surface leading-tight">
                {{ __('Admin Product Dashboard') }}
            </h2>
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.products.create') }}" class="btn-primary px-4 py-2 rounded-xl text-xs font-bold font-sora uppercase tracking-wider shadow-sm flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">add</span> Thêm Sản Phẩm
                </a>
                <a href="{{ route('dashboard') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm font-inter">
                    &larr; Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-background min-h-screen text-on-surface">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-tertiary/10 border-l-4 border-tertiary text-tertiary p-4 mb-6 rounded-lg shadow-sm font-inter text-sm">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-surface-container/60 overflow-hidden shadow-xl sm:rounded-lg border border-white/5">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-fixed divide-y divide-white/5">
                        <thead class="bg-surface-container-high/60">
                            <tr class="text-xs font-bold text-on-surface-variant uppercase tracking-wider font-jetbrains">
                                <th scope="col" class="w-32 px-6 py-4 text-center">
                                    Hình ảnh
                                </th>
                                <th scope="col" class="px-6 py-4 text-left">
                                    Tên sản phẩm
                                </th>
                                <th scope="col" class="w-40 px-6 py-4 text-right">
                                    Giá tiền
                                </th>
                                <th scope="col" class="w-64 px-6 py-4 text-center">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-sm font-inter">
                            @foreach($products as $item)
                            <tr class="hover:bg-white/5 transition duration-150">

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="Ảnh" class="w-24 h-16 mx-auto object-cover rounded-md border border-white/10 shadow-sm">
                                    @else
                                    <span class="inline-flex items-center justify-center w-24 h-16 mx-auto rounded-md bg-white/5 text-on-surface-variant/40 text-xs border border-white/10">Trống</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-semibold text-on-surface truncate text-left font-sora">{{ $item->name }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="font-bold text-primary font-jetbrains">{{ number_format($item->price) }} ₫</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center space-x-3">

                                        <a href="{{ route('admin.products.show', $item->id) }}" class="text-on-surface hover:text-primary bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg transition duration-200 font-jetbrains text-xs">
                                            Xem
                                        </a>

                                        <a href="{{ route('admin.products.edit', $item->id) }}" class="text-secondary hover:text-white bg-secondary/10 hover:bg-secondary px-3 py-1.5 rounded-lg transition duration-200 font-jetbrains text-xs">
                                            Sửa
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-error hover:text-white bg-error/10 hover:bg-error px-3 py-1.5 rounded-lg transition duration-200 font-jetbrains text-xs">
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
                <div class="bg-surface-container-high/60 px-6 py-4 border-t border-white/5">
                    {{ $products->links() }}
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>