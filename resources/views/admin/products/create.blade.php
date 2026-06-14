<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-sora font-black text-xl text-on-surface leading-tight uppercase tracking-tight">
                {{ __('Thêm Sản Phẩm Mới') }}
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
                
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="space-y-2 group">
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Tên sản phẩm *</label>
                        <input type="text" name="name" placeholder="Ví dụ: Bàn phím cơ Custom GM-01" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40 font-inter" required>
                    </div>

                    <div class="space-y-2 group">
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Giá tiền (VNĐ) *</label>
                        <input type="number" name="price" placeholder="Ví dụ: 1500000" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40 font-jetbrains" required>
                    </div>

                    <div class="flex gap-6">
                        <div class="w-1/2 space-y-2">
                            <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Danh mục *</label>
                            <select name="category_id" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 bg-surface-container">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" class="bg-surface-container-high text-on-surface">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2 space-y-2">
                            <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Hãng sản xuất *</label>
                            <select name="brand_id" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 bg-surface-container">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" class="bg-surface-container-high text-on-surface">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Hình ảnh tải lên *</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-32 border border-dashed border-white/10 rounded-xl cursor-pointer bg-white/3 hover:bg-white/5 hover:border-primary/40 transition-all">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <span class="material-symbols-outlined text-3xl text-on-surface-variant mb-2">upload_file</span>
                                    <p class="text-xs text-on-surface-variant font-inter">Kéo thả hoặc nhấn để chọn file ảnh</p>
                                </div>
                                <input type="file" name="image" class="hidden" required>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-white/5">
                        <button type="submit" class="btn-primary px-8 py-3.5 rounded-xl font-sora font-bold text-sm uppercase tracking-wider flex items-center gap-2">
                            Lưu Sản Phẩm
                            <span class="material-symbols-outlined text-sm">save</span>
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="text-on-surface-variant hover:text-error transition-colors font-bold text-sm font-inter">Hủy bỏ</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>