<x-app-layout>
    <main class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="font-sora text-2xl font-black mb-6 uppercase tracking-tight text-on-surface">LỊCH SỬ MUA HÀNG</h1>

        <div class="bg-surface-container/60 border border-white/5 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-high/60 border-b border-white/5 text-xs text-on-surface-variant uppercase font-jetbrains">
                            <th class="p-4">Mã đơn</th>
                            <th class="p-4">Ngày đặt</th>
                            <th class="p-4">Phương thức</th>
                            <th class="p-4 text-right">Tổng tiền</th>
                            <th class="p-4 text-center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm font-inter">
                        @forelse($orders as $order)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="p-4 font-bold text-primary font-jetbrains">#{{ $order->id }}</td>
                                <td class="p-4 text-on-surface-variant/80">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td class="p-4 uppercase font-semibold text-on-surface-variant font-jetbrains">{{ $order->payment_method }}</td>
                                <td class="p-4 text-right font-bold text-primary">{{ number_format($order->total_price) }} đ</td>
                                <td class="p-4 text-center">
                                    @if($order->status === 'pending')
                                        <span class="bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 px-3 py-1.5 rounded-full text-xs font-bold font-jetbrains uppercase tracking-wide">⏳ Đang chờ</span>
                                    @else
                                        <span class="bg-tertiary/10 border border-tertiary/20 text-tertiary px-3 py-1.5 rounded-full text-xs font-bold font-jetbrains uppercase tracking-wide">✅ Đã xong</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-on-surface-variant/50 italic">Bạn chưa có đơn hàng nào trong hệ thống.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-app-layout>