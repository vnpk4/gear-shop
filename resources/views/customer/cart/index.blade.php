<x-app-layout>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if(count($cart) > 0)
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full lg:w-2/3 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-sm text-gray-500 uppercase tracking-wider">
                            <th class="p-4 font-semibold">Sản phẩm</th>
                            <th class="p-4 font-semibold text-center">Đơn giá</th>
                            <th class="p-4 font-semibold text-center">Số lượng</th>
                            <th class="p-4 font-semibold text-right">Thành tiền</th>
                            <th class="p-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $details)
                        @php
                        $subtotal = $details['price'] * $details['quantity'];
                        $total += $subtotal;
                        @endphp
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-20 h-20 bg-white border border-gray-100 rounded-xl p-2 flex-shrink-0 flex items-center justify-center">
                                        @if($details['image'])
                                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="max-h-full object-contain">
                                        @else
                                        <img src="https://via.placeholder.com/100" class="opacity-20">
                                        @endif
                                    </div>
                                    <a href="{{ route('customer.products.show', $id) }}" class="font-bold text-gray-800 hover:text-blue-600 transition-colors line-clamp-2">
                                        {{ $details['name'] }}
                                    </a>
                                </div>
                            </td>

                            <td class="p-4 text-center font-semibold text-gray-600">
                                {{ number_format($details['price']) }} đ
                            </td>

                            <td class="p-4 text-center">
                                <span class="inline-block bg-gray-100 text-gray-800 font-bold py-1 px-3 rounded-lg">
                                    {{ $details['quantity'] }}
                                </span>
                            </td>

                            <td class="p-4 text-right font-black text-blue-700">
                                {{ number_format($subtotal) }} đ
                            </td>

                            <td class="p-4 text-right">
                                <form action="{{ route('customer.cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors p-2 rounded-full hover:bg-red-50" title="Xóa khỏi giỏ">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-4 mb-4">Tóm tắt đơn hàng</h2>

                    <div class="space-y-3 text-sm text-gray-600 mb-6">
                        <div class="flex justify-between">
                            <span>Tạm tính:</span>
                            <span class="font-semibold">{{ number_format($total) }} đ</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Phí giao hàng:</span>
                            <span class="text-green-600 font-semibold">Miễn phí</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-6">
                        <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-4 mb-4">Tóm tắt đơn hàng</h2>

                        <div class="border-t border-gray-100 pt-4 mb-6 flex justify-between items-end">
                            <span class="font-bold text-gray-900">Tổng cộng:</span>
                            <span class="text-3xl font-black text-blue-700">{{ number_format($total) }} đ</span>
                        </div>

                        <form action="{{ route('customer.checkout.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <h3 class="font-bold text-sm text-gray-700 uppercase">Chọn phương thức thanh toán:</h3>

                            <div class="space-y-2">
                                <label class="flex items-center space-x-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment_method" value="cash" checked class="text-blue-600 focus:ring-blue-500">
                                    <span class="text-sm font-medium text-gray-700">💵 Tiền mặt (COD)</span>
                                </label>

                                <label class="flex items-center space-x-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment_method" value="bank" class="text-blue-600 focus:ring-blue-500">
                                    <span class="text-sm font-medium text-gray-700">🏦 Chuyển khoản (Bank)</span>
                                </label>
                            </div>

                            <button type="submit" class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-all shadow-lg shadow-blue-200 uppercase tracking-wider">
                                Xác nhận đặt hàng
                            </button>
                        </form>
                    </div>

                    <a href="{{ route('home') }}" class="block text-center mt-4 text-sm text-gray-500 hover:text-blue-600 transition-colors">
                        &larr; Tiếp tục mua sắm
                    </a>
                </div>
            </div>
        </div>

        @else
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-16 text-center flex flex-col items-center">
            <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Giỏ hàng của bạn đang trống</h2>
            <p class="text-gray-500 mb-8">Có vẻ như bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
            <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition-colors shadow-lg shadow-blue-200">
                Bắt đầu mua sắm ngay
            </a>
        </div>
        @endif

    </main>

    <x-footer />
</x-app-layout>