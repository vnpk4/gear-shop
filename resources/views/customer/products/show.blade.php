<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-sora font-bold text-xl text-on-surface leading-tight">
                {{ __('Chi tiết Sản phẩm') }}
            </h2>
            <a href="{{ route('customer.products.index') }}" class="text-on-surface-variant hover:text-primary font-medium underline flex items-center gap-1 font-inter text-sm">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                {{ __('Quay lại danh sách') }}
            </a>
        </div>
    </x-slot>

    @php
        $relatedProducts = collect();
        if ($product->category_id) {
            $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->limit(4)
                ->get();
        }
        if ($relatedProducts->count() < 4) {
            $extraProducts = \App\Models\Product::where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->limit(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($extraProducts);
        }
    @endphp

    <div class="py-12 bg-background min-h-screen text-on-surface">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface-container/60 overflow-hidden shadow-2xl sm:rounded-2xl border border-white/10 p-6 md:p-8 flex flex-col gap-8">
                
                <!-- Breadcrumbs -->
                <nav aria-label="Breadcrumb" class="flex text-on-surface-variant/80 font-jetbrains text-[10px] uppercase tracking-wider">
                    <ol class="inline-flex items-center space-x-2">
                        <li class="inline-flex items-center">
                            <a class="hover:text-primary transition-colors" href="/">Trang chủ</a>
                        </li>
                        <li><span class="text-white/10">/</span></li>
                        <li>
                            <a class="hover:text-primary transition-colors" href="{{ route('customer.products.index') }}">Sản phẩm</a>
                        </li>
                        @if($product->brand)
                        <li><span class="text-white/10">/</span></li>
                        <li>
                            <a class="hover:text-primary transition-colors" href="{{ route('customer.products.index', ['brands[]' => $product->brand_id]) }}">
                                {{ $product->brand->name }}
                            </a>
                        </li>
                        @endif
                        <li><span class="text-white/10">/</span></li>
                        <li aria-current="page" class="text-on-surface font-semibold truncate max-w-[200px]">{{ $product->name }}</li>
                    </ol>
                </nav>

                <!-- Product Hero Section -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Image Gallery -->
                    <div class="lg:col-span-7 flex flex-col gap-4">
                        <div class="bg-white/5 border border-white/10 rounded-xl overflow-hidden relative group aspect-video lg:aspect-square flex items-center justify-center p-4">
                            <div class="absolute inset-0 bg-gradient-to-tr from-primary/5 to-transparent pointer-events-none"></div>
                            @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="max-w-[80%] max-h-[85%] object-contain transition-transform duration-500 group-hover:scale-105 filter drop-shadow-2xl">
                            @else
                            <div class="text-on-surface-variant flex flex-col items-center gap-2">
                                <span class="material-symbols-outlined text-6xl">image_not_supported</span>
                                <span>Sản phẩm chưa có ảnh</span>
                            </div>
                            @endif
                        </div>
                        @if($product->image_path)
                        <div class="grid grid-cols-4 gap-4">
                            <button class="bg-white/5 border border-primary rounded-lg border-opacity-50 hover:border-opacity-100 transition-colors aspect-square flex items-center justify-center p-2">
                                <img class="max-w-full max-h-full object-contain rounded" src="{{ asset('storage/' . $product->image_path) }}"/>
                            </button>
                            <button class="bg-white/5 border border-white/10 rounded-lg hover:border-primary transition-colors aspect-square flex items-center justify-center p-2 opacity-60 hover:opacity-100">
                                <img class="max-w-full max-h-full object-contain rounded filter grayscale" src="{{ asset('storage/' . $product->image_path) }}"/>
                            </button>
                            <button class="bg-white/5 border border-white/10 rounded-lg hover:border-primary transition-colors aspect-square flex items-center justify-center p-2 opacity-60 hover:opacity-100">
                                <img class="max-w-full max-h-full object-contain rounded filter hue-rotate-90" src="{{ asset('storage/' . $product->image_path) }}"/>
                            </button>
                            <button class="bg-white/5 border border-white/10 rounded-lg hover:border-primary transition-colors aspect-square flex items-center justify-center p-2 opacity-60 hover:opacity-100 relative">
                                <div class="absolute inset-0 bg-background/80 flex items-center justify-center z-10 rounded">
                                    <span class="material-symbols-outlined text-primary" style="font-size: 2rem;">play_circle</span>
                                </div>
                                <img class="max-w-full max-h-full object-contain rounded" src="{{ asset('storage/' . $product->image_path) }}"/>
                            </button>
                        </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="lg:col-span-5 flex flex-col gap-6">
                        <div class="flex flex-col gap-2">
                            @if($product->stock > 0)
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-tertiary/10 border border-tertiary/20 rounded-md w-max">
                                <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
                                <span class="font-jetbrains text-xs text-tertiary uppercase tracking-widest">Còn Hàng ({{ $product->stock }})</span>
                            </div>
                            @else
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-error/10 border border-error/20 rounded-md w-max">
                                <span class="w-2 h-2 rounded-full bg-error"></span>
                                <span class="font-jetbrains text-xs text-error uppercase tracking-widest">Hết Hàng</span>
                            </div>
                            @endif

                            <h1 class="font-sora font-bold text-2xl md:text-3xl text-on-surface leading-tight mt-1">
                                {{ $product->name }}
                            </h1>

                            <div class="flex items-center gap-3 mt-1">
                                <div class="flex text-secondary">
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined text-on-surface-variant/50" style="font-variation-settings: 'FILL' 1;">star_half</span>
                                </div>
                                <span class="text-on-surface-variant text-xs font-inter">(128 Đánh giá)</span>
                                <span class="text-white/10">|</span>
                                <span class="text-on-surface-variant font-jetbrains text-xs">SKU: {{ $product->id }}00{{ rand(100,999) }}</span>
                            </div>
                        </div>

                        <!-- Price Section -->
                        <div class="border-b border-white/5 pb-6 flex flex-col gap-1">
                            <span class="text-on-surface-variant text-xs line-through">Giá niêm yết: {{ number_format($product->price) }} ₫</span>
                            <div class="font-sora text-3xl md:text-4xl font-bold text-primary tracking-tight">
                                {{ number_format($product->price - ($product->price * 0.1)) }} ₫
                            </div>
                        </div>

                        <!-- Bento Specs Grid -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white/5 border border-white/10 p-4 rounded-xl flex flex-col gap-1 hover:border-primary/50 transition-colors">
                                <span class="material-symbols-outlined text-primary text-xl">loyalty</span>
                                <span class="font-jetbrains text-[10px] text-on-surface-variant/80 uppercase">Thương hiệu</span>
                                <span class="font-sora text-sm font-semibold text-on-surface">{{ $product->brand->name ?? 'Đang cập nhật' }}</span>
                            </div>
                            <div class="bg-white/5 border border-white/10 p-4 rounded-xl flex flex-col gap-1 hover:border-primary/50 transition-colors">
                                <span class="material-symbols-outlined text-primary text-xl">category</span>
                                <span class="font-jetbrains text-[10px] text-on-surface-variant/80 uppercase">Danh mục</span>
                                <span class="font-sora text-sm font-semibold text-on-surface">{{ $product->category->name ?? 'Đang cập nhật' }}</span>
                            </div>
                            <div class="bg-white/5 border border-white/10 p-4 rounded-xl flex flex-col gap-1 hover:border-primary/50 transition-colors">
                                <span class="material-symbols-outlined text-primary text-xl">inventory</span>
                                <span class="font-jetbrains text-[10px] text-on-surface-variant/80 uppercase">Kho hàng</span>
                                <span class="font-sora text-sm font-semibold text-on-surface">{{ $product->stock > 0 ? $product->stock . ' sản phẩm' : 'Hết hàng' }}</span>
                            </div>
                            <div class="bg-white/5 border border-white/10 p-4 rounded-xl flex flex-col gap-1 hover:border-primary/50 transition-colors">
                                <span class="material-symbols-outlined text-primary text-xl">qr_code</span>
                                <span class="font-jetbrains text-[10px] text-on-surface-variant/80 uppercase">Mã số</span>
                                <span class="font-sora text-sm font-semibold text-on-surface">{{ $product->id }}00{{ rand(10,99) }}</span>
                            </div>
                        </div>

                        <!-- Actions Section -->
                        <div class="mt-4">
                            @if(Auth::user()->role === 'customer')
                            <form action="{{ route('customer.cart.add', $product->id) }}" method="POST" class="flex flex-col gap-4">
                                @csrf
                                <div class="flex items-center gap-4">
                                    <!-- Custom quantity spinner -->
                                    <div class="flex items-center bg-white/5 border border-white/10 rounded-xl h-12 w-32 overflow-hidden">
                                        <button type="button" onclick="decrementQty()" class="flex-1 h-full text-on-surface-variant hover:text-primary hover:bg-white/5 transition-colors flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm font-bold">remove</span>
                                        </button>
                                        <input aria-label="Số lượng" id="qty-input" name="quantity" type="number" min="1" max="100" value="1"
                                            class="w-10 text-center bg-transparent border-none text-on-surface font-jetbrains text-sm focus:ring-0 p-0" required>
                                        <button type="button" onclick="incrementQty()" class="flex-1 h-full text-on-surface-variant hover:text-primary hover:bg-white/5 transition-colors flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm font-bold">add</span>
                                        </button>
                                    </div>
                                    
                                    <button type="submit" class="flex-1 btn-secondary font-jetbrains text-xs uppercase tracking-wider h-12 rounded-xl transition-all flex items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-base">shopping_cart</span>
                                        Thêm vào giỏ
                                    </button>
                                </div>
                                
                                <button type="submit" onclick="buyNow(event, '{{ route('customer.cart.add', $product->id) }}')" class="btn-primary w-full py-4 px-6 rounded-xl transition-all uppercase tracking-wider font-sora font-bold text-sm">
                                    Mua Ngay
                                </button>
                            </form>

                            <script>
                                function incrementQty() {
                                    const input = document.getElementById('qty-input');
                                    let val = parseInt(input.value) || 1;
                                    if (val < 100) input.value = val + 1;
                                }
                                function decrementQty() {
                                    const input = document.getElementById('qty-input');
                                    let val = parseInt(input.value) || 1;
                                    if (val > 1) input.value = val - 1;
                                }
                                async function buyNow(event, url) {
                                    event.preventDefault();
                                    const qty = document.getElementById('qty-input').value;
                                    const csrf = document.querySelector('input[name="_token"]').value;
                                    
                                    const formData = new FormData();
                                    formData.append('quantity', qty);
                                    formData.append('_token', csrf);
                                    
                                    try {
                                        const response = await fetch(url, {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-Requested-With': 'XMLHttpRequest'
                                            }
                                        });
                                        window.location.href = "{{ route('customer.cart.index') }}";
                                    } catch (err) {
                                        console.error(err);
                                        event.target.closest('form').submit();
                                    }
                                }
                            </script>
                            @else
                            <div class="flex flex-col gap-3">
                                <div class="flex gap-3">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 btn-primary text-center transition-colors flex items-center justify-center py-3 px-6 rounded-xl font-bold font-sora text-sm">
                                        <span class="material-symbols-outlined text-base mr-2">edit</span>
                                        <span>CHỈNH SỬA</span>
                                    </a>

                                    <a href="{{ route('admin.products.index') }}" class="flex-1 btn-secondary text-center transition-colors flex items-center justify-center py-3 px-6 rounded-xl font-bold font-sora text-sm">
                                        <span class="material-symbols-outlined text-base mr-2">list</span>
                                        <span>DANH SÁCH QUẢN TRỊ</span>
                                    </a>
                                </div>

                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-error/10 border border-error/20 text-error hover:bg-error/25 font-bold py-3 px-6 rounded-xl transition-colors flex items-center justify-center space-x-2 font-sora text-sm">
                                        <span class="material-symbols-outlined text-base">delete</span>
                                        <span>XÓA SẢN PHẨM</span>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>

                        <!-- Assurances -->
                        <div class="flex items-center justify-between text-on-surface-variant font-jetbrains text-[9px] uppercase mt-2 border-t border-white/5 pt-4">
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-primary text-base">local_shipping</span>
                                Giao hàng nhanh
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-primary text-base">verified</span>
                                Bảo hành 12-36T
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-primary text-base">support_agent</span>
                                Hỗ trợ 24/7
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Description Section -->
                <section class="mt-6 border-t border-white/5 pt-8">
                    <h2 class="font-sora text-lg font-semibold text-on-surface border-b-2 border-primary w-max pb-1 mb-4">Mô tả sản phẩm</h2>
                    <div class="bg-white/5 rounded-xl border border-white/10 p-6">
                        <div class="text-on-surface-variant text-sm leading-relaxed prose prose-invert max-w-none font-inter">
                            @if($product->description)
                            {!! nl2br(e($product->description)) !!}
                            @else
                            <p class="italic text-on-surface-variant/40">Chưa có bài viết mô tả cho sản phẩm này.</p>
                            @endif
                        </div>
                    </div>
                </section>

                <!-- Related Products Section -->
                <section class="mt-8 border-t border-white/5 pt-8">
                    <div class="flex items-center justify-between border-b border-white/5 pb-3 mb-6">
                        <h2 class="font-sora text-lg font-semibold text-on-surface">Sản phẩm liên quan</h2>
                        <a class="font-jetbrains text-xs text-primary hover:text-secondary transition-colors flex items-center gap-1" href="{{ route('customer.products.index') }}">
                            Xem tất cả <span class="material-symbols-outlined text-xs">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse($relatedProducts as $relProduct)
                        <div class="bg-surface-container/60 border border-white/5 rounded-xl flex flex-col group hover:border-primary/40 transition-colors duration-300 overflow-hidden">
                            <a href="{{ route('customer.products.show', $relProduct->id) }}" class="aspect-square bg-white/5 p-4 relative overflow-hidden flex items-center justify-center">
                                @if($relProduct->created_at && $relProduct->created_at->gt(now()->subDays(7)))
                                <div class="absolute top-2 right-2 bg-primary text-background font-jetbrains text-[9px] px-2 py-0.5 rounded font-bold z-10">MỚI</div>
                                @endif
                                @if($relProduct->image_path)
                                <img class="max-w-[80%] max-h-[80%] object-contain group-hover:scale-105 transition-transform duration-500 filter drop-shadow-md" src="{{ asset('storage/' . $relProduct->image_path) }}" alt="{{ $relProduct->name }}"/>
                                @else
                                <span class="material-symbols-outlined text-4xl text-on-surface-variant/30">image</span>
                                @endif
                            </a>
                            <div class="p-4 flex flex-col gap-2 flex-grow">
                                <h3 class="font-sora text-sm text-on-surface leading-snug line-clamp-2 hover:text-primary transition-colors">
                                    <a href="{{ route('customer.products.show', $relProduct->id) }}">{{ $relProduct->name }}</a>
                                </h3>
                                <div class="mt-auto pt-2 border-t border-white/5">
                                    <span class="font-jetbrains text-[10px] text-on-surface-variant/60 line-through block">
                                        {{ number_format($relProduct->price) }} ₫
                                    </span>
                                    <span class="font-sora text-base font-semibold text-primary">
                                        {{ number_format($relProduct->price - ($relProduct->price * 0.1)) }} ₫
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-xs text-on-surface-variant/50 italic">Không tìm thấy sản phẩm liên quan nào.</p>
                        @endforelse
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>