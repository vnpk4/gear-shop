@props(['product'])
@php
    $detailUrl = route('customer.products.show', $product->id);
    if (Auth::check() && Auth::user()->role !== 'customer') {
        $detailUrl = route('admin.products.show', $product->id);
    }
@endphp
<div class="bg-white rounded-xl border border-gray-100 p-4 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group relative overflow-hidden flex flex-col h-full">
    
    <div class="absolute top-2 right-2 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-full z-10">
        -10%
    </div>

    <div class="aspect-square w-full mb-4 overflow-hidden rounded-lg bg-gray-50 flex items-center justify-center p-2 relative cursor-pointer">
        @if($product->image_path)
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
        @else
            <img src="https://via.placeholder.com/200" class="opacity-20">
        @endif

        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
            <a href="{{ $detailUrl }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-2 px-6 rounded-lg shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                XEM CHI TIẾT
            </a>
        </div>
    </div>

    <div class="flex flex-col flex-grow">
        <p class="text-[11px] text-blue-600 font-bold uppercase tracking-wider">{{ $product->brand->name ?? 'GEARSHOP' }}</p>
        
        <a href="{{ $detailUrl }}" class="text-sm font-semibold text-gray-800 line-clamp-2 min-h-[40px] mt-1 group-hover:text-blue-600 transition-colors">
            {{ $product->name }}
        </a>
        
        <div class="flex items-center space-x-1 mt-2 mb-3">
            @for($i=0; $i<5; $i++)
                <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            @endfor
            <span class="text-[10px] text-gray-400">(0)</span>
        </div>

        <div class="pt-3 border-t border-gray-50 mt-auto">
            <p class="text-xs text-gray-400 line-through">{{ number_format($product->price) }} đ</p>
            <p class="text-lg font-black text-blue-700">{{ number_format($product->price - ($product->price * 0.1)) }} <span class="text-sm underline">đ</span></p>
        </div>
    </div>

</div>