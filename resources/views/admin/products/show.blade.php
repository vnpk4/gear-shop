<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-sora font-black text-xl text-on-surface leading-tight uppercase tracking-tight">
                {{ __('Chi tiết Sản phẩm') }}
            </h2>
            <a href="{{ route('admin.products.index') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm flex items-center gap-1 font-inter">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                {{ __('Quay lại danh sách') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-background min-h-screen text-on-surface">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface-container/60 rounded-2xl border border-white/5 p-8 backdrop-blur-md shadow-2xl">

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8">

                    <!-- Image Column -->
                    <div class="md:col-span-5">
                        <div class="border border-white/10 rounded-xl p-4 flex items-center justify-center bg-white/3 h-96 relative overflow-hidden group">
                            @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="max-w-[85%] max-h-[85%] object-contain filter drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="text-on-surface-variant/40 flex flex-col items-center gap-2">
                                <span class="material-symbols-outlined text-6xl">image_not_supported</span>
                                <span class="font-inter text-sm">Sản phẩm chưa có ảnh</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Details Column -->
                    <div class="md:col-span-7 flex flex-col justify-between">

                        <div>
                            <div class="text-xs font-jetbrains text-primary uppercase tracking-widest mb-2">
                                Hãng sản xuất: <span class="text-secondary hover:underline font-bold cursor-pointer">{{ $product->brand->name ?? 'Đang cập nhật' }}</span>
                            </div>

                            <h1 class="text-2xl font-black text-on-surface font-sora leading-snug mb-3">
                                {{ $product->name }}
                            </h1>

                            <div class="flex items-center text-xs font-jetbrains text-on-surface-variant/60 mb-6 pb-4 border-b border-white/5">
                                <span class="mr-4">SKU: <span>{{ $product->id }}00{{ rand(100,999) }}</span></span>
                                <div class="flex items-center border-l border-white/10 pl-4">
                                    <div class="flex text-secondary mr-1">
                                        @for($i=0; $i<5; $i++)
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        @endfor
                                    </div>
                                    <span class="text-on-surface-variant hover:text-primary transition-colors cursor-pointer ml-1">(12 đánh giá)</span>
                                </div>
                            </div>

                            <div class="mb-6 font-sora">
                                <p class="text-xs text-on-surface-variant/60 line-through mb-1 font-jetbrains">{{ number_format($product->price) }} đ</p>
                                <h2 class="text-3xl font-black text-primary">
                                    {{ number_format($product->price - ($product->price * 0.1)) }} <span class="text-sm font-normal text-on-surface-variant">đ</span>
                                </h2>
                            </div>

                            <div class="bg-white/3 rounded-xl p-5 mb-6 border border-white/5 font-inter">
                                <h3 class="font-jetbrains text-[10px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Mô tả sản phẩm</h3>
                                <div class="text-on-surface-variant text-sm leading-relaxed prose prose-invert prose-sm max-w-none">
                                    @if($product->description)
                                    {!! nl2br(e($product->description)) !!}
                                    @else
                                    <p class="italic text-on-surface-variant/40">Chưa có bài viết mô tả cho sản phẩm này.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-4 pt-6 border-t border-white/5 font-sora">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 btn-primary py-3.5 rounded-xl font-bold text-sm uppercase tracking-wider flex justify-center items-center gap-2">
                                <span class="material-symbols-outlined text-sm">edit</span>
                                Sửa thông tin
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-error-container/20 hover:bg-error-container/40 text-error font-bold py-3.5 px-4 rounded-xl border border-error/20 transition-colors uppercase tracking-wider text-sm flex justify-center items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">delete</span>
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