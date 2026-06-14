<x-app-layout>
    <main class="max-w-6xl mx-auto px-4 py-10 bg-background min-h-screen text-on-surface">
        <div class="flex justify-between items-center mb-8">
            <h1 class="font-sora text-2xl font-black text-on-surface uppercase tracking-tight">Admin Order Dashboard</h1>
            <a href="{{ route('dashboard') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm font-inter">
                &larr; Dashboard
            </a>
        </div>
        <div class="bg-surface-container/60 rounded-2xl border border-white/5 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-surface-container-high/60 border-b border-white/5 text-xs text-on-surface-variant uppercase tracking-wider font-jetbrains">
                            <th class="p-4">Mã đơn</th>
                            <th class="p-4">Khách hàng</th>
                            <th class="p-4">Tổng tiền</th>
                            <th class="p-4">Phương thức</th>
                            <th class="p-4">Trạng thái</th>
                            <th class="p-4 text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm font-inter">
                        @foreach($orders as $order)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="p-4 font-bold text-primary font-jetbrains">#{{ $order->id }}</td>

                            <td class="p-4 font-semibold text-on-surface font-sora">{{ $order->user->name ?? 'Ẩn danh' }}</td>

                            <td class="p-4 font-bold text-primary font-jetbrains">{{ number_format($order->total_price) }} đ</td>

                            <td class="p-4 uppercase font-bold text-on-surface-variant font-jetbrains">{{ $order->payment_method }}</td>

                            <td class="p-4">
                                @if($order->status === 'pending')
                                <span class="bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 px-3 py-1.5 rounded-full font-bold text-xs font-jetbrains uppercase tracking-wide">⏳ Chờ duyệt</span>
                                @elseif($order->status === 'paid')
                                <span class="bg-tertiary/10 border border-tertiary/20 text-tertiary px-3 py-1.5 rounded-full font-bold text-xs font-jetbrains uppercase tracking-wide">✅ Đã xong</span>
                                @else
                                <span class="bg-error/10 border border-error/20 text-error px-3 py-1.5 rounded-full font-bold text-xs font-jetbrains uppercase tracking-wide">❌ Đã hủy</span>
                                @endif
                            </td>

                            <td class="p-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="p-2 bg-secondary/10 text-secondary hover:bg-secondary hover:text-background rounded-lg transition-colors flex items-center justify-center" title="Chỉnh sửa">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>

                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này vĩnh viễn?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-error/10 text-error hover:bg-error hover:text-white rounded-lg transition-colors flex items-center justify-center" title="Xóa đơn hàng">
                                            <span class="material-symbols-outlined text-base">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-app-layout>