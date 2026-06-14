<x-app-layout>
    <main class="max-w-7xl mx-auto px-4 py-10 bg-background min-h-screen text-on-surface">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-black font-sora uppercase text-on-surface tracking-tight">Hồ sơ người dùng</h1>
            <a href="{{ route('admin.users.index') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm flex items-center gap-1 font-inter">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Quay lại
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-surface-container/60 rounded-2xl border border-white/5 overflow-hidden backdrop-blur-md shadow-2xl">
                    <div class="bg-gradient-to-r from-primary/20 to-secondary/20 h-24"></div>
                    <div class="px-6 pb-6">
                        <div class="relative -mt-12 mb-4">
                            <div class="w-24 h-24 bg-background p-1 rounded-full border border-white/5 mx-auto">
                                <div class="w-full h-full bg-primary/10 text-primary rounded-full flex items-center justify-center text-3xl font-black uppercase font-sora">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 border-t border-white/5 pt-6 font-inter">
                            <div>
                                <label class="text-[10px] font-black uppercase text-on-surface-variant/50 tracking-widest font-jetbrains">Họ và tên thật</label>
                                <p class="text-on-surface font-semibold mt-0.5">{{ $user->realname ?? 'Chưa cập nhật' }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-on-surface-variant/50 tracking-widest font-jetbrains">Ngày sinh</label>
                                <p class="text-on-surface font-semibold mt-0.5">{{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') : 'Chưa cập nhật' }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-on-surface-variant/50 tracking-widest font-jetbrains">Email</label>
                                <p class="text-on-surface font-semibold mt-0.5">{{ $user->email }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-on-surface-variant/50 tracking-widest font-jetbrains">Vai trò hệ thống</label>
                                <div class="mt-1">
                                    <span class="{{ $user->role === 'admin' ? 'bg-error/10 border border-error/20 text-error' : 'bg-primary/10 border border-primary/20 text-primary' }} px-3 py-1 rounded-full font-bold text-[9px] uppercase tracking-wider font-jetbrains">
                                        {{ $user->role }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="block text-center w-full bg-white/5 hover:bg-primary/10 text-on-surface hover:text-primary border border-white/10 hover:border-primary/40 py-3.5 rounded-xl font-sora font-bold transition-all uppercase text-xs tracking-wider">Chỉnh sửa hồ sơ</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Orders History Card -->
            <div class="lg:col-span-2">
                <div class="bg-surface-container/60 rounded-2xl border border-white/5 p-8 backdrop-blur-md shadow-2xl">
                    <h3 class="text-xl font-bold font-sora text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">shopping_bag</span>
                        Lịch sử đơn hàng ({{ $user->orders->count() }})
                    </h3>

                    @if($user->orders->isEmpty())
                        <div class="text-center py-20 bg-white/3 rounded-xl border border-dashed border-white/10">
                            <p class="text-on-surface-variant/60 font-inter">Người dùng này chưa có đơn hàng nào.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse text-sm">
                                <thead>
                                    <tr class="text-[10px] font-black text-on-surface-variant/50 uppercase tracking-widest font-jetbrains border-b border-white/5">
                                        <th class="pb-4">Mã đơn</th>
                                        <th class="pb-4">Ngày mua</th>
                                        <th class="pb-4">Tổng tiền</th>
                                        <th class="pb-4">Trạng thái</th>
                                        <th class="pb-4"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5 font-inter text-on-surface">
                                    @foreach($user->orders as $order)
                                        <tr class="hover:bg-white/3 transition-colors">
                                            <td class="py-4 font-bold font-jetbrains text-primary">#{{ $order->id }}</td>
                                            <td class="py-4 text-on-surface-variant text-sm">{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td class="py-4 font-black text-primary font-jetbrains">{{ number_format($order->total_price) }}đ</td>
                                            <td class="py-4">
                                                @if($order->status === 'paid')
                                                <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase bg-tertiary/10 border border-tertiary/20 text-tertiary font-jetbrains tracking-wide">
                                                    Đã thanh toán
                                                </span>
                                                @else
                                                <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 font-jetbrains tracking-wide">
                                                    Chờ xử lý
                                                </span>
                                                @endif
                                            </td>
                                            <td class="py-4 text-right">
                                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="text-primary hover:text-secondary hover:underline text-xs font-bold uppercase tracking-wider font-jetbrains">Chi tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>