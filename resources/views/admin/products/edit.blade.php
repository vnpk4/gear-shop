<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-sora font-black text-xl text-on-surface leading-tight uppercase tracking-tight">
                {{ __('Sửa Sản Phẩm: ') . $product->name }}
            </h2>
            <a href="{{ route('admin.products.index') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm flex items-center gap-1 font-inter">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                {{ __('Quay lại') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-background min-h-screen text-on-surface">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface-container/60 rounded-2xl border border-white/5 p-8 backdrop-blur-md shadow-2xl">

                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2 group">
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Tên sản phẩm *</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40 font-inter" required>
                    </div>

                    <div class="space-y-2 group">
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Giá tiền (VNĐ) *</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40 font-jetbrains" required>
                    </div>

                    <div class="flex gap-6 font-inter">
                        <div class="w-1/2 space-y-2">
                            <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Danh mục *</label>
                            <select name="category_id" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 bg-surface-container">
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }} class="bg-surface-container-high text-on-surface">
                                    {{ $cat->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2 space-y-2">
                            <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Hãng sản xuất *</label>
                            <select name="brand_id" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 bg-surface-container">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }} class="bg-surface-container-high text-on-surface">
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-y-4 font-inter">
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Ảnh hiện tại</label>
                        @if($product->image_path)
                        <div class="w-32 h-32 bg-white/5 border border-white/10 rounded-xl p-2 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="Ảnh cũ" class="max-w-full max-h-full object-contain rounded-lg">
                        </div>
                        @else
                        <p class="text-xs text-on-surface-variant/60 italic">Chưa có ảnh</p>
                        @endif

                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Thay ảnh mới (Bỏ trống nếu muốn giữ ảnh cũ)</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-24 border border-dashed border-white/10 rounded-xl cursor-pointer bg-white/3 hover:bg-white/5 hover:border-primary/40 transition-all">
                                <div class="flex flex-col items-center justify-center pt-2 pb-2">
                                    <span class="material-symbols-outlined text-2xl text-on-surface-variant mb-1">upload_file</span>
                                    <p class="text-[10px] text-on-surface-variant font-inter">Nhấn để chọn file ảnh mới</p>
                                </div>
                                <input type="file" name="image" class="hidden">
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-white/5">
                        <button type="submit" class="btn-primary px-8 py-3.5 rounded-xl font-sora font-bold text-sm uppercase tracking-wider flex items-center gap-2">
                            Cập nhật thay đổi
                            <span class="material-symbols-outlined text-sm">save</span>
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="text-on-surface-variant hover:text-error transition-colors font-bold text-sm font-inter">Hủy bỏ</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>