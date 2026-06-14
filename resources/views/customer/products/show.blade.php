<x-app-layout>
    <!-- Google Fonts & Material Symbols for premium design -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&family=Hanken+Grotesk:wght@500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <style>
        .font-hanken {
            font-family: 'Hanken Grotesk', sans-serif;
        }
        .font-mono-jb {
            font-family: 'JetBrains Mono', monospace;
        }
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
        .glow-primary {
            box-shadow: 0 0 12px 2px rgba(137, 206, 255, 0.15);
        }
        .glow-accent {
            box-shadow: 0 0 16px 2px rgba(255, 185, 95, 0.2);
        }
        .glass-panel {
            background: rgba(34, 42, 61, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Chi tiết Sản phẩm') }}
            </h2>
            <a href="{{ route('customer.products.index') }}" class="text-gray-500 hover:text-gray-700 font-medium underline flex items-center gap-1">
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

    <div class="py-12 bg-[#0b1326] min-h-screen text-[#dae2fd]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#171f33] overflow-hidden shadow-2xl sm:rounded-2xl border border-[#3e4850]/50 p-6 md:p-8 flex flex-col gap-8">
                
                <!-- Breadcrumbs -->
                <nav aria-label="Breadcrumb" class="flex text-[#bec8d2] font-mono-jb text-[11px] uppercase tracking-wider">
                    <ol class="inline-flex items-center space-x-2">
                        <li class="inline-flex items-center">
                            <a class="hover:text-[#89ceff] transition-colors" href="/">Trang chủ</a>
                        </li>
                        <li><span class="text-[#3e4850]">/</span></li>
                        <li>
                            <a class="hover:text-[#89ceff] transition-colors" href="{{ route('customer.products.index') }}">Sản phẩm</a>
                        </li>
                        @if($product->brand)
                        <li><span class="text-[#3e4850]">/</span></li>
                        <li>
                            <a class="hover:text-[#89ceff] transition-colors" href="{{ route('customer.products.index', ['brands[]' => $product->brand_id]) }}">
                                {{ $product->brand->name }}
                            </a>
                        </li>
                        @endif
                        <li><span class="text-[#3e4850]">/</span></li>
                        <li aria-current="page" class="text-[#dae2fd] font-semibold truncate max-w-[200px]">{{ $product->name }}</li>
                    </ol>
                </nav>

                <!-- Product Hero Section -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Image Gallery -->
                    <div class="lg:col-span-7 flex flex-col gap-4">
                        <div class="bg-[#131b2e] border border-[#3e4850] rounded-xl overflow-hidden relative group aspect-video lg:aspect-square flex items-center justify-center p-4">
                            <div class="absolute inset-0 bg-gradient-to-tr from-[#89ceff]/5 to-transparent pointer-events-none"></div>
                            @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="max-w-[80%] max-h-[85%] object-contain transition-transform duration-500 group-hover:scale-105 filter drop-shadow-2xl">
                            @else
                            <div class="text-[#bec8d2] flex flex-col items-center gap-2">
                                <span class="material-symbols-outlined text-6xl">image_not_supported</span>
                                <span>Sản phẩm chưa có ảnh</span>
                            </div>
                            @endif
                        </div>
                        @if($product->image_path)
                        <div class="grid grid-cols-4 gap-4">
                            <button class="bg-[#131b2e] border border-[#89ceff] rounded-lg border-opacity-50 hover:border-opacity-100 transition-colors aspect-square flex items-center justify-center p-2">
                                <img class="max-w-full max-h-full object-contain rounded" src="{{ asset('storage/' . $product->image_path) }}"/>
                            </button>
                            <button class="bg-[#131b2e] border border-[#3e4850] rounded-lg hover:border-[#89ceff] transition-colors aspect-square flex items-center justify-center p-2 opacity-60 hover:opacity-100">
                                <img class="max-w-full max-h-full object-contain rounded filter grayscale" src="{{ asset('storage/' . $product->image_path) }}"/>
                            </button>
                            <button class="bg-[#131b2e] border border-[#3e4850] rounded-lg hover:border-[#89ceff] transition-colors aspect-square flex items-center justify-center p-2 opacity-60 hover:opacity-100">
                                <img class="max-w-full max-h-full object-contain rounded filter hue-rotate-90" src="{{ asset('storage/' . $product->image_path) }}"/>
                            </button>
                            <button class="bg-[#131b2e] border border-[#3e4850] rounded-lg hover:border-[#89ceff] transition-colors aspect-square flex items-center justify-center p-2 opacity-60 hover:opacity-100 relative">
                                <div class="absolute inset-0 bg-[#0b1326]/80 flex items-center justify-center z-10 rounded">
                                    <span class="material-symbols-outlined text-[#89ceff]" style="font-size: 2rem;">play_circle</span>
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
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-[#04b4a2]/10 border border-[#4fdbc8]/20 rounded-md w-max">
                                <span class="w-2 h-2 rounded-full bg-[#4fdbc8] animate-pulse"></span>
                                <span class="font-mono-jb text-xs text-[#4fdbc8] uppercase tracking-widest">Còn Hàng ({{ $product->stock }})</span>
                            </div>
                            @else
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-500/10 border border-red-500/20 rounded-md w-max">
                                <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                <span class="font-mono-jb text-xs text-red-400 uppercase tracking-widest">Hết Hàng</span>
                            </div>
                            @endif

                            <h1 class="font-hanken font-bold text-2xl md:text-3xl text-[#dae2fd] leading-tight mt-1">
                                {{ $product->name }}
                            </h1>

                            <div class="flex items-center gap-3 mt-1">
                                <div class="flex text-[#ffb95f]">
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="material-symbols-outlined text-[#88929b]" style="font-variation-settings: 'FILL' 1;">star_half</span>
                                </div>
                                <span class="text-[#bec8d2] text-xs font-inter">(128 Đánh giá)</span>
                                <span class="text-[#3e4850]">|</span>
                                <span class="text-[#bec8d2] font-mono-jb text-xs">SKU: {{ $product->id }}00{{ rand(100,999) }}</span>
                            </div>
                        </div>

                        <!-- Price Section -->
                        <div class="border-b border-[#3e4850]/50 pb-6 flex flex-col gap-1">
                            <span class="text-[#bec8d2] text-xs line-through">Giá niêm yết: {{ number_format($product->price) }} ₫</span>
                            <div class="font-hanken text-3xl md:text-4xl font-bold text-[#89ceff] tracking-tight">
                                {{ number_format($product->price - ($product->price * 0.1)) }} ₫
                            </div>
                        </div>

                        <!-- Bento Specs Grid -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="glass-panel border border-[#3e4850]/50 p-4 rounded-xl flex flex-col gap-1 hover:border-[#89ceff]/50 transition-colors">
                                <span class="material-symbols-outlined text-[#89ceff] text-xl">loyalty</span>
                                <span class="font-mono-jb text-[10px] text-[#bec8d2] uppercase">Thương hiệu</span>
                                <span class="font-hanken text-sm font-semibold text-[#dae2fd]">{{ $product->brand->name ?? 'Đang cập nhật' }}</span>
                            </div>
                            <div class="glass-panel border border-[#3e4850]/50 p-4 rounded-xl flex flex-col gap-1 hover:border-[#89ceff]/50 transition-colors">
                                <span class="material-symbols-outlined text-[#89ceff] text-xl">category</span>
                                <span class="font-mono-jb text-[10px] text-[#bec8d2] uppercase">Danh mục</span>
                                <span class="font-hanken text-sm font-semibold text-[#dae2fd]">{{ $product->category->name ?? 'Đang cập nhật' }}</span>
                            </div>
                            <div class="glass-panel border border-[#3e4850]/50 p-4 rounded-xl flex flex-col gap-1 hover:border-[#89ceff]/50 transition-colors">
                                <span class="material-symbols-outlined text-[#89ceff] text-xl">inventory</span>
                                <span class="font-mono-jb text-[10px] text-[#bec8d2] uppercase">Kho hàng</span>
                                <span class="font-hanken text-sm font-semibold text-[#dae2fd]">{{ $product->stock > 0 ? $product->stock . ' sản phẩm' : 'Hết hàng' }}</span>
                            </div>
                            <div class="glass-panel border border-[#3e4850]/50 p-4 rounded-xl flex flex-col gap-1 hover:border-[#89ceff]/50 transition-colors">
                                <span class="material-symbols-outlined text-[#89ceff] text-xl">qr_code</span>
                                <span class="font-mono-jb text-[10px] text-[#bec8d2] uppercase">Mã số</span>
                                <span class="font-hanken text-sm font-semibold text-[#dae2fd]">{{ $product->id }}00{{ rand(10,99) }}</span>
                            </div>
                        </div>

                        <!-- Actions Section -->
                        <div class="mt-4">
                            @if(Auth::user()->role === 'customer')
                            <form action="{{ route('customer.cart.add', $product->id) }}" method="POST" class="flex flex-col gap-4">
                                @csrf
                                <div class="flex items-center gap-4">
                                    <!-- Custom quantity spinner -->
                                    <div class="flex items-center bg-[#131b2e] border border-[#3e4850] rounded-xl h-12 w-32 overflow-hidden">
                                        <button type="button" onclick="decrementQty()" class="flex-1 h-full text-[#bec8d2] hover:text-[#89ceff] hover:bg-[#222a3d] transition-colors flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm font-bold">remove</span>
                                        </button>
                                        <input aria-label="Số lượng" id="qty-input" name="quantity" type="number" min="1" max="100" value="1"
                                            class="w-10 text-center bg-transparent border-none text-[#dae2fd] font-mono-jb text-sm focus:ring-0 p-0" required>
                                        <button type="button" onclick="incrementQty()" class="flex-1 h-full text-[#bec8d2] hover:text-[#89ceff] hover:bg-[#222a3d] transition-colors flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm font-bold">add</span>
                                        </button>
                                    </div>
                                    
                                    <button type="submit" class="flex-1 bg-transparent border border-[#88929b]/80 hover:bg-[#222a3d] hover:border-[#dae2fd] text-[#dae2fd] font-mono-jb text-xs uppercase tracking-wider h-12 rounded-xl transition-all flex items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-base">shopping_cart</span>
                                        Thêm vào giỏ
                                    </button>
                                </div>
                                
                                <button type="submit" onclick="buyNow(event, '{{ route('customer.cart.add', $product->id) }}')" class="w-full bg-[#ffb95f] text-[#472a00] hover:bg-[#ffddb8] font-hanken text-base font-bold h-14 rounded-xl glow-accent transition-all flex items-center justify-center uppercase tracking-wider">
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
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-6 rounded-xl text-center transition-colors flex items-center justify-center space-x-2">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                        <span>CHỈNH SỬA</span>
                                    </a>

                                    <a href="{{ route('admin.products.index') }}" class="flex-1 bg-gray-800 hover:bg-black text-white font-bold py-3 px-6 rounded-xl text-center transition-colors flex items-center justify-center space-x-2 border border-[#3e4850]">
                                        <span class="material-symbols-outlined text-base">list</span>
                                        <span>DANH SÁCH QUẢN TRỊ</span>
                                    </a>
                                </div>

                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl transition-colors flex items-center justify-center space-x-2">
                                        <span class="material-symbols-outlined text-base">delete</span>
                                        <span>XÓA SẢN PHẨM</span>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>

                        <!-- Assurances -->
                        <div class="flex items-center justify-between text-[#bec8d2] font-mono-jb text-[10px] uppercase mt-2 border-t border-[#3e4850]/50 pt-4">
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[#89ceff] text-base">local_shipping</span>
                                Giao hàng nhanh
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[#89ceff] text-base">verified</span>
                                Bảo hành 12-36T
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[#89ceff] text-base">support_agent</span>
                                Hỗ trợ 24/7
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Description Section -->
                <section class="mt-6 border-t border-[#3e4850]/50 pt-8">
                    <h2 class="font-hanken text-lg font-semibold text-[#dae2fd] border-b-2 border-[#89ceff] w-max pb-1 mb-4">Mô tả sản phẩm</h2>
                    <div class="bg-[#131b2e] rounded-xl border border-[#3e4850]/50 p-6">
                        <div class="text-[#bec8d2] text-sm leading-relaxed prose prose-invert max-w-none">
                            @if($product->description)
                            {!! nl2br(e($product->description)) !!}
                            @else
                            <p class="italic text-gray-500">Chưa có bài viết mô tả cho sản phẩm này.</p>
                            @endif
                        </div>
                    </div>
                </section>

                <!-- Related Products Section -->
                <section class="mt-8 border-t border-[#3e4850]/50 pt-8">
                    <div class="flex items-center justify-between border-b border-[#3e4850]/30 pb-3 mb-6">
                        <h2 class="font-hanken text-lg font-semibold text-[#dae2fd]">Sản phẩm liên quan</h2>
                        <a class="font-mono-jb text-xs text-[#89ceff] hover:text-[#ffddb8] transition-colors flex items-center gap-1" href="{{ route('customer.products.index') }}">
                            Xem tất cả <span class="material-symbols-outlined text-xs">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse($relatedProducts as $relProduct)
                        <div class="bg-[#131b2e] border border-[#3e4850] rounded-xl flex flex-col group hover:border-[#89ceff] transition-colors duration-300 overflow-hidden">
                            <a href="{{ route('customer.products.show', $relProduct->id) }}" class="aspect-square bg-[#171f33] p-4 relative overflow-hidden flex items-center justify-center">
                                @if($relProduct->created_at && $relProduct->created_at->gt(now()->subDays(7)))
                                <div class="absolute top-2 right-2 bg-[#89ceff] text-[#00344d] font-mono-jb text-[10px] px-2 py-0.5 rounded font-bold z-10">MỚI</div>
                                @endif
                                @if($relProduct->image_path)
                                <img class="max-w-[80%] max-h-[80%] object-contain group-hover:scale-105 transition-transform duration-500 filter drop-shadow-md" src="{{ asset('storage/' . $relProduct->image_path) }}" alt="{{ $relProduct->name }}"/>
                                @else
                                <span class="material-symbols-outlined text-4xl text-[#bec8d2]">image</span>
                                @endif
                            </a>
                            <div class="p-4 flex flex-col gap-2 flex-grow">
                                <h3 class="font-inter text-sm text-[#dae2fd] leading-snug line-clamp-2 hover:text-[#89ceff] transition-colors">
                                    <a href="{{ route('customer.products.show', $relProduct->id) }}">{{ $relProduct->name }}</a>
                                </h3>
                                <div class="mt-auto">
                                    <span class="font-mono-jb text-[11px] text-[#bec8d2] line-through block">
                                        {{ number_format($relProduct->price) }} ₫
                                    </span>
                                    <span class="font-hanken text-base font-semibold text-[#89ceff]">
                                        {{ number_format($relProduct->price - ($relProduct->price * 0.1)) }} ₫
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-xs text-[#bec8d2] italic">Không tìm thấy sản phẩm liên quan nào.</p>
                        @endforelse
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>