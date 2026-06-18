@props(['brands', 'categories'])

<!-- Desktop Sidebar (Hidden on Mobile) -->
<aside class="hidden md:block w-64 flex-shrink-0">
    <form action="{{ url('/') }}" method="GET" class="bg-surface-container/60 border border-white/10 p-5 rounded-xl shadow-sm text-on-surface">
        <h3 class="font-sora font-bold text-lg mb-4 text-on-surface uppercase tracking-tight">Bộ lọc sản phẩm</h3>

        <!-- Categories -->
        <div class="mb-6">
            <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Danh mục</h4>
            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                @foreach($categories as $category)
                    <label class="flex items-center space-x-2 cursor-pointer group">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                            @if(in_array($category->id, request('categories', []))) checked @endif 
                            class="rounded border-white/20 text-primary bg-white/5 focus:ring-0 focus:ring-offset-0">
                        <span class="text-sm text-on-surface-variant group-hover:text-primary transition-colors">{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Brands -->
        <div class="mb-6">
            <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Thương hiệu</h4>
            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                @foreach($brands as $brand)
                    <label class="flex items-center space-x-2 cursor-pointer group">
                        <input type="checkbox" name="brands[]" value="{{ $brand->id }}" 
                            @if(in_array($brand->id, request('brands', []))) checked @endif 
                            class="rounded border-white/20 text-primary bg-white/5 focus:ring-0 focus:ring-offset-0">
                        <span class="text-sm text-on-surface-variant group-hover:text-primary transition-colors">{{ $brand->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Price Range -->
        <div class="mb-6">
            <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Khoảng giá (VNĐ)</h4>
            <div class="flex items-center space-x-2">
                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Từ..." class="glass-input w-full text-sm rounded-lg focus:ring-0 p-2">
                <span class="text-on-surface-variant/50">-</span>
                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Đến..." class="glass-input w-full text-sm rounded-lg focus:ring-0 p-2">
            </div>
        </div>

        <!-- Sort -->
        <div class="mb-6">
            <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Sắp xếp theo</h4>
            <select name="sort" class="glass-input w-full text-sm rounded-lg focus:ring-0 bg-surface-container-high/90 text-on-surface border-white/10 p-2">
                <option value="" class="bg-surface-container-highest">Mặc định</option>
                <option value="price_asc" @if(request('sort') == 'price_asc') selected @endif class="bg-surface-container-highest">Giá: Thấp đến Cao</option>
                <option value="price_desc" @if(request('sort') == 'price_desc') selected @endif class="bg-surface-container-highest">Giá: Cao xuống Thấp</option>
            </select>
        </div>

        <!-- Apply Button -->
        <button type="submit" class="btn-primary w-full py-2.5 px-4 rounded-lg transition-colors text-sm font-sora font-bold tracking-wider uppercase">
            Áp dụng bộ lọc
        </button>

        @if(request()->anyFilled(['categories', 'brands', 'min_price', 'max_price', 'sort']))
            <a href="{{ url('/') }}" class="block text-center w-full mt-3 text-sm text-on-surface-variant hover:text-error transition-colors font-jetbrains">
                Xóa bộ lọc
            </a>
        @endif
    </form>
</aside>

<!-- Mobile Filter Drawer (Slide-over overlay) -->
<div x-show="mobileFilterOpen" 
     class="fixed inset-0 z-50 flex md:hidden" 
     style="display: none;" 
     role="dialog" 
     aria-modal="true">
     
    <!-- Backdrop overlay -->
    <div x-show="mobileFilterOpen"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/70 backdrop-blur-sm"
         @click="mobileFilterOpen = false"></div>

    <!-- Drawer Content Panel -->
    <div x-show="mobileFilterOpen"
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-surface-container-high p-6 shadow-2xl border-r border-white/10 z-50">
         
         <div class="flex items-center justify-between mb-6 pb-2 border-b border-white/5">
             <h3 class="font-sora font-bold text-lg text-on-surface uppercase tracking-tight">Bộ lọc sản phẩm</h3>
             <button @click="mobileFilterOpen = false" class="text-on-surface-variant hover:text-error transition-colors p-1 flex items-center justify-center">
                 <span class="material-symbols-outlined text-2xl">close</span>
             </button>
         </div>

         <form action="{{ url('/') }}" method="GET" class="text-on-surface flex flex-col flex-grow">
             <!-- Categories -->
             <div class="mb-6">
                 <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Danh mục</h4>
                 <div class="space-y-2 max-h-40 overflow-y-auto pr-2">
                     @foreach($categories as $category)
                         <label class="flex items-center space-x-2 cursor-pointer group">
                             <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                                 @if(in_array($category->id, request('categories', []))) checked @endif 
                                 class="rounded border-white/20 text-primary bg-white/5 focus:ring-0 focus:ring-offset-0">
                             <span class="text-sm text-on-surface-variant group-hover:text-primary transition-colors">{{ $category->name }}</span>
                         </label>
                     @endforeach
                 </div>
             </div>

             <!-- Brands -->
             <div class="mb-6">
                 <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Thương hiệu</h4>
                 <div class="space-y-2 max-h-40 overflow-y-auto pr-2">
                     @foreach($brands as $brand)
                         <label class="flex items-center space-x-2 cursor-pointer group">
                             <input type="checkbox" name="brands[]" value="{{ $brand->id }}" 
                                 @if(in_array($brand->id, request('brands', []))) checked @endif 
                                 class="rounded border-white/20 text-primary bg-white/5 focus:ring-0 focus:ring-offset-0">
                             <span class="text-sm text-on-surface-variant group-hover:text-primary transition-colors">{{ $brand->name }}</span>
                         </label>
                     @endforeach
                 </div>
             </div>

             <!-- Price Range -->
             <div class="mb-6">
                 <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Khoảng giá (VNĐ)</h4>
                 <div class="flex items-center space-x-2">
                     <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Từ..." class="glass-input w-full text-sm rounded-lg focus:ring-0 p-2">
                     <span class="text-on-surface-variant/50">-</span>
                     <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Đến..." class="glass-input w-full text-sm rounded-lg focus:ring-0 p-2">
                 </div>
             </div>

             <!-- Sort -->
             <div class="mb-6">
                 <h4 class="font-jetbrains text-label-mono text-[11px] text-on-surface-variant/80 mb-3 uppercase tracking-widest">Sắp xếp theo</h4>
                 <select name="sort" class="glass-input w-full text-sm rounded-lg focus:ring-0 bg-surface-container-high/90 text-on-surface border-white/10 p-2">
                     <option value="" class="bg-surface-container-highest">Mặc định</option>
                     <option value="price_asc" @if(request('sort') == 'price_asc') selected @endif class="bg-surface-container-highest">Giá: Thấp đến Cao</option>
                     <option value="price_desc" @if(request('sort') == 'price_desc') selected @endif class="bg-surface-container-highest">Giá: Cao xuống Thấp</option>
                 </select>
             </div>

             <!-- Actions inside Drawer -->
             <div class="mt-auto pt-6 border-t border-white/5 space-y-3">
                 <button type="submit" class="btn-primary w-full py-3 px-4 rounded-lg transition-colors text-sm font-sora font-bold tracking-wider uppercase">
                     Áp dụng bộ lọc
                 </button>

                 @if(request()->anyFilled(['categories', 'brands', 'min_price', 'max_price', 'sort']))
                     <a href="{{ url('/') }}" class="block text-center w-full py-2 text-sm text-on-surface-variant hover:text-error transition-colors font-jetbrains">
                         Xóa bộ lọc
                     </a>
                 @endif
             </div>
         </form>
    </div>
</div>