<x-app-layout>
    <main class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-black uppercase text-gray-800 border-l-4 border-emerald-500 pl-3">Hồ sơ người dùng</h1>
            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-emerald-600 transition-colors">&larr; Quay lại</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-emerald-500 h-24"></div>
                    <div class="px-6 pb-6">
                        <div class="relative -mt-12 mb-4">
                            <div class="w-24 h-24 bg-white p-1 rounded-full shadow-md mx-auto">
                                <div class="w-full h-full bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-3xl font-black uppercase">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 border-t border-gray-50 pt-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Họ và tên thật</label>
                                <p class="text-gray-800 font-semibold">{{ $user->realname ?? 'Chưa cập nhật' }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Ngày sinh</label>
                                <p class="text-gray-800 font-semibold">{{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') : 'Chưa cập nhật' }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Email</label>
                                <p class="text-gray-800 font-semibold">{{ $user->email }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Vai trò hệ thống</label>
                                <div class="mt-1">
                                    <span class="{{ $user->role === 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }} px-3 py-1 rounded-full font-bold text-[10px] uppercase">
                                        {{ $user->role }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="block text-center w-full bg-gray-900 text-white font-bold py-3 rounded-2xl hover:bg-emerald-600 transition-colors">Chỉnh sửa hồ sơ</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        Lịch sử đơn hàng ({{ $user->orders->count() }})
                    </h3>

                    @if($user->orders->isEmpty())
                        <div class="text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-100">
                            <p class="text-gray-400">Người dùng này chưa có đơn hàng nào.</p>
                        </div>
                    @else
                        <div class="overflow-hidden">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                        <th class="pb-4">Mã đơn</th>
                                        <th class="pb-4">Ngày mua</th>
                                        <th class="pb-4">Tổng tiền</th>
                                        <th class="pb-4">Trạng thái</th>
                                        <th class="pb-4"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($user->orders as $order)
                                        <tr>
                                            <td class="py-4 font-bold text-gray-900">#{{ $order->id }}</td>
                                            <td class="py-4 text-gray-500 text-sm">{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td class="py-4 font-black text-emerald-600">{{ number_format($order->total_price) }}đ</td>
                                            <td class="py-4">
                                                <span class="px-2 py-1 rounded text-[10px] font-bold uppercase {{ $order->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                                    {{ $order->status }}
                                                </span>
                                            </td>
                                            <td class="py-4 text-right">
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-emerald-500 hover:underline text-xs font-bold uppercase">Chi tiết</a>
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