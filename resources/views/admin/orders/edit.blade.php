<x-app-layout>
    <main class="max-w-4xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-black uppercase text-gray-800">Cập nhật đơn hàng #{{ $order->id }}</h1>
            <a href="{{ route('admin.orders.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors">&larr; Quay lại danh sách</a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Trạng thái đơn hàng</label>
                        <select name="status" class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>⏳ Đang chờ xử lý</option>
                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>✅ Đã thanh toán</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>❌ Đã hủy</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Phương thức thanh toán</label>
                        <select name="payment_method" class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                            <option value="cash" {{ $order->payment_method == 'cash' ? 'selected' : '' }}>💵 Tiền mặt (COD)</option>
                            <option value="bank" {{ $order->payment_method == 'bank' ? 'selected' : '' }}>🏦 Chuyển khoản (Bank)</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end pt-6 border-t border-gray-100">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition-colors shadow-lg shadow-blue-200">
                        Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>