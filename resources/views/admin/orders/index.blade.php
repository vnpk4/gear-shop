<x-app-layout>
    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-black mb-6 text-red-600">Admin Order Dashboard</h1>
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 font-medium underline">
                &larr; Quay lại danh sách
            </a>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-600 uppercase">
                        <th class="p-4">Mã đơn</th>
                        <th class="p-4">Khách hàng</th>
                        <th class="p-4">Tổng tiền</th>
                        <th class="p-4">Phương thức</th>
                        <th class="p-4">Trạng thái</th>
                        <th class="p-4 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($orders as $order)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-bold">#{{ $order->id }}</td>

                        <td class="p-4 font-semibold text-gray-700">{{ $order->user->name ?? 'Ẩn danh' }}</td>

                        <td class="p-4 font-bold text-gray-900">{{ number_format($order->total_price) }} đ</td>

                        <td class="p-4 uppercase font-bold text-gray-500">{{ $order->payment_method }}</td>

                        <td class="p-4">
                            @if($order->status === 'pending')
                            <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full font-bold text-xs">⏳ Chờ thanh toán</span>
                            @elseif($order->status === 'paid')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold text-xs">✅ Đã thanh toán</span>
                            @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-bold text-xs">❌ Đã hủy</span>
                            @endif
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="p-2 bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white rounded-lg transition-colors" title="Chỉnh sửa">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>

                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này vĩnh viễn?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg transition-colors" title="Xóa đơn hàng">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</x-app-layout>