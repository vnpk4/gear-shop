@props(['product'])
@php
    $detailUrl = route('customer.products.show', $product->id);
    if (Auth::check() && Auth::user()->role !== 'customer') {
        $detailUrl = route('admin.products.show', $product->id);
    }
@endphp
<div class="bg-surface-container/60 border border-white/5 p-4 hover:border-primary/40 hover:shadow-[0_0_20px_rgba(164,230,255,0.2)] hover:-translate-y-1 transition-all duration-300 group relative overflow-hidden flex flex-col h-full rounded-xl">
    
    <div class="absolute top-2 right-2 bg-error text-on-error font-jetbrains text-[9px] font-bold px-2 py-0.5 rounded-full z-10 uppercase tracking-widest">
        -10% Drop
    </div>

    <div class="aspect-square w-full mb-4 overflow-hidden rounded-lg bg-white/5 flex items-center justify-center p-2 relative cursor-pointer border border-white/5">
        @if($product->image_path)
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
        @else
            <img src="https://via.placeholder.com/200" class="opacity-10">
        @endif

        <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
            <a href="{{ $detailUrl }}" class="btn-primary text-xs font-bold py-2.5 px-6 rounded-lg uppercase tracking-wider shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 font-sora">
                Xem chi tiết
            </a>
        </div>
    </div>

    <div class="flex flex-col flex-grow">
        <p class="text-[10px] text-primary font-bold uppercase tracking-widest font-jetbrains">{{ $product->brand->name ?? 'GEARMASTER' }}</p>
        
        <a href="{{ $detailUrl }}" class="text-sm font-semibold text-on-surface line-clamp-2 min-h-[40px] mt-1 group-hover:text-primary transition-colors font-sora leading-snug">
            {{ $product->name }}
        </a>
        
        <div class="flex items-center space-x-1 mt-2 mb-3">
            @for($i=0; $i<5; $i++)
                <svg class="w-3 h-3 text-secondary fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            @endfor
            <span class="text-[9px] font-jetbrains text-on-surface-variant/50 ml-1">(128)</span>
        </div>

        <div class="pt-3 border-t border-white/5 mt-auto">
            <p class="text-[11px] text-on-surface-variant/60 line-through font-jetbrains">{{ number_format($product->price) }} đ</p>
            <p class="text-lg font-black text-primary font-sora mt-0.5">
                {{ number_format($product->price - ($product->price * 0.1)) }} <span class="text-sm font-normal text-on-surface-variant">đ</span>
            </p>
        </div>
    </div>

</div>