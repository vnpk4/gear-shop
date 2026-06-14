<x-app-layout>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="font-sora text-2xl font-bold text-on-surface mb-8 uppercase tracking-tight">Giỏ hàng của bạn</h1>

        @if(count($cart) > 0)
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Products List -->
            <div class="w-full lg:w-2/3 bg-surface-container/60 rounded-2xl border border-white/5 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-high/60 border-b border-white/5 text-xs text-on-surface-variant uppercase tracking-wider">
                                <th class="p-4 font-semibold font-jetbrains">Sản phẩm</th>
                                <th class="p-4 font-semibold text-center font-jetbrains">Đơn giá</th>
                                <th class="p-4 font-semibold text-center font-jetbrains">Số lượng</th>
                                <th class="p-4 font-semibold text-right font-jetbrains">Thành tiền</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @php $total = 0; @endphp
                            @foreach($cart as $id => $details)
                            @php
                            $subtotal = $details['price'] * $details['quantity'];
                            $total += $subtotal;
                            @endphp
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="p-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-20 h-20 bg-white/5 border border-white/10 rounded-xl p-2 flex-shrink-0 flex items-center justify-center">
                                            @if($details['image'])
                                            <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="max-h-full object-contain">
                                            @else
                                            <img src="https://via.placeholder.com/100" class="opacity-10">
                                            @endif
                                        </div>
                                        <a href="{{ route('customer.products.show', $id) }}" class="font-sora font-bold text-on-surface hover:text-primary transition-colors line-clamp-2 leading-snug">
                                            {{ $details['name'] }}
                                        </a>
                                    </div>
                                </td>

                                <td class="p-4 text-center font-semibold text-on-surface-variant font-jetbrains">
                                    {{ number_format($details['price']) }} đ
                                </td>

                                <td class="p-4 text-center">
                                    <span class="inline-block bg-white/10 text-on-surface font-jetbrains font-bold py-1 px-3 rounded-lg text-sm">
                                        {{ $details['quantity'] }}
                                    </span>
                                </td>

                                <td class="p-4 text-right font-black text-primary font-sora">
                                    {{ number_format($subtotal) }} đ
                                </td>

                                <td class="p-4 text-right">
                                    <form action="{{ route('customer.cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-on-surface-variant/50 hover:text-error transition-colors p-2 rounded-full hover:bg-error-container/20" title="Xóa khỏi giỏ">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="w-full lg:w-1/3">
                <div class="bg-surface-container/60 rounded-2xl border border-white/10 shadow-sm p-6 sticky top-24">
                    <h2 class="text-lg font-bold text-on-surface font-sora border-b border-white/5 pb-4 mb-4">Tóm tắt đơn hàng</h2>

                    <div class="space-y-3 text-sm text-on-surface-variant mb-6 font-inter">
                        <div class="flex justify-between">
                            <span>Tạm tính:</span>
                            <span class="font-semibold text-on-surface">{{ number_format($total) }} đ</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Phí giao hàng:</span>
                            <span class="text-tertiary font-semibold">Miễn phí</span>
                        </div>
                    </div>

                    <div class="border-t border-white/5 pt-4 mb-6 flex justify-between items-end">
                        <span class="font-bold text-on-surface font-sora">Tổng cộng:</span>
                        <span class="text-3xl font-black text-primary font-sora">{{ number_format($total) }} đ</span>
                    </div>

                    <form action="{{ route('customer.checkout.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <h3 class="font-jetbrains text-[10px] text-on-surface-variant/80 uppercase tracking-widest mb-2">Chọn phương thức thanh toán:</h3>

                        <div class="space-y-2">
                            <label class="flex items-center space-x-3 p-3 border border-white/10 rounded-xl cursor-pointer hover:bg-white/5">
                                <input type="radio" name="payment_method" value="cash" checked class="text-primary focus:ring-0 focus:ring-offset-0 bg-white/5 border-white/20">
                                <span class="text-sm font-medium text-on-surface">💵 Tiền mặt (COD)</span>
                            </label>

                            <label class="flex items-center space-x-3 p-3 border border-white/10 rounded-xl cursor-pointer hover:bg-white/5">
                                <input type="radio" name="payment_method" value="bank" class="text-primary focus:ring-0 focus:ring-offset-0 bg-white/5 border-white/20">
                                <span class="text-sm font-medium text-on-surface">🏦 Chuyển khoản (Bank)</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-primary w-full mt-4 py-4 px-6 rounded-xl transition-all uppercase tracking-wider font-sora font-bold text-sm">
                            Xác nhận đặt hàng
                        </button>
                    </form>

                    <a href="{{ route('home') }}" class="block text-center mt-6 text-sm text-on-surface-variant hover:text-primary transition-colors font-inter">
                        &larr; Tiếp tục mua sắm
                    </a>
                </div>
            </div>
        </div>

        @else
        <!-- Empty Cart -->
        <div class="bg-surface-container/60 border border-white/10 rounded-2xl p-16 text-center flex flex-col items-center">
            <div class="w-32 h-32 bg-white/5 rounded-full flex items-center justify-center mb-6 border border-white/5">
                <span class="material-symbols-outlined text-on-surface-variant/30 text-5xl">shopping_cart</span>
            </div>
            <h2 class="text-2xl font-bold text-on-surface mb-2 font-sora">Giỏ hàng của bạn đang trống</h2>
            <p class="text-on-surface-variant mb-8 font-inter">Có vẻ như bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
            <a href="{{ route('home') }}" class="btn-primary font-sora font-bold py-3 px-8 rounded-xl transition-colors uppercase tracking-wider text-sm">
                Bắt đầu mua sắm ngay
            </a>
        </div>
        @endif

    </main>

    <x-footer />
</x-app-layout>