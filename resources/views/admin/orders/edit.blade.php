<x-app-layout>
    <main class="max-w-4xl mx-auto px-4 py-10 bg-background min-h-screen text-on-surface">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-black font-sora uppercase text-on-surface tracking-tight">Cập nhật đơn hàng #{{ $order->id }}</h1>
            <a href="{{ route('admin.orders.index') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm flex items-center gap-1 font-inter">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Quay lại danh sách
            </a>
        </div>

        <div class="bg-surface-container/60 rounded-2xl border border-white/5 p-8 backdrop-blur-md shadow-2xl font-inter">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest mb-2">Trạng thái đơn hàng</label>
                        <select name="status" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 bg-surface-container">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }} class="bg-surface-container-high text-on-surface">⏳ Đang chờ xử lý</option>
                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }} class="bg-surface-container-high text-on-surface">✅ Đã thanh toán</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }} class="bg-surface-container-high text-on-surface">❌ Đã hủy</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest mb-2">Phương thức thanh toán</label>
                        <select name="payment_method" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 bg-surface-container">
                            <option value="cash" {{ $order->payment_method == 'cash' ? 'selected' : '' }} class="bg-surface-container-high text-on-surface">💵 Tiền mặt (COD)</option>
                            <option value="bank" {{ $order->payment_method == 'bank' ? 'selected' : '' }} class="bg-surface-container-high text-on-surface">🏦 Chuyển khoản (Bank)</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end pt-6 border-t border-white/5">
                    <button type="submit" class="btn-primary py-3.5 px-8 rounded-xl font-sora font-bold text-xs uppercase tracking-wider flex items-center gap-2">
                        Lưu thay đổi
                        <span class="material-symbols-outlined text-sm">save</span>
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>