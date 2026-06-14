<x-app-layout>
    <main class="max-w-5xl mx-auto px-4 py-10">
        <h1 class=" font-black mb-6 uppercase">LỊCH SỬ MUA HÀNG</h1>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-sm text-gray-500 uppercase">
                        <th class="p-4">Mã đơn</th>
                        <th class="p-4">Ngày đặt</th>
                        <th class="p-4">Phương thức</th>
                        <th class="p-4 text-right">Tổng tiền</th>
                        <th class="p-4 text-center">Trạng thái</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($orders as $order)
                        <tr>
                            <td class="p-4 font-bold">#{{ $order->id }}</td>
                            <td class="p-4 text-gray-500">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="p-4 uppercase font-semibold text-gray-600">{{ $order->payment_method }}</td>
                            <td class="p-4 text-right font-bold text-blue-600">{{ number_format($order->total_price) }} đ</td>
                            <td class="p-4 text-center">
                                @if($order->status === 'pending')
                                    <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-bold">⏳ Đang chờ thanh toán</span>
                                @else
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">✅ Đã thanh toán</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-400">Bạn chưa có đơn hàng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</x-app-layout>