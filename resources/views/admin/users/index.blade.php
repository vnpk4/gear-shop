<x-app-layout>
    <main class="max-w-6xl mx-auto px-4 py-10 bg-background min-h-screen text-on-surface">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <h1 class="font-sora text-2xl font-black text-on-surface uppercase tracking-tight">
                Admin User Dashboard
            </h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.users.create') }}" class="btn-primary px-4 py-2 rounded-xl text-xs font-bold font-sora uppercase tracking-wider shadow-sm flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">person_add</span> Thêm người dùng
                </a>
                <a href="{{ route('dashboard') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm font-inter">
                    &larr; Dashboard
                </a>
            </div>
        </div>

        <div class="bg-surface-container/60 rounded-2xl shadow-sm border border-white/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-surface-container-high/60 border-b border-white/5 text-xs text-on-surface-variant uppercase tracking-wider font-jetbrains">
                            <th class="p-4">ID</th>
                            <th class="p-4">Tên người dùng</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Quyền (Role)</th>
                            <th class="p-4 text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm font-inter">
                        @foreach($users as $user)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="p-4 font-bold text-on-surface-variant/80 font-jetbrains">#{{ $user->id }}</td>
                            <td class="p-4 font-bold text-on-surface font-sora">{{ $user->name }}</td>
                            <td class="p-4 text-on-surface-variant font-jetbrains">{{ $user->email }}</td>
                            <td class="p-4">
                                @if($user->role === 'admin')
                                <span class="bg-secondary/10 border border-secondary/20 text-secondary px-3 py-1.5 rounded-full font-bold text-[10px] font-jetbrains uppercase tracking-wide">Quản trị</span>
                                @else
                                <span class="bg-white/5 border border-white/10 text-on-surface-variant px-3 py-1.5 rounded-full font-bold text-[10px] font-jetbrains uppercase tracking-wide">Khách hàng</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="p-2 bg-primary/10 text-primary hover:bg-primary hover:text-background rounded-lg transition-colors flex items-center justify-center" title="Xem chi tiết">
                                        <span class="material-symbols-outlined text-base">visibility</span>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="p-2 bg-secondary/10 text-secondary hover:bg-secondary hover:text-background rounded-lg transition-colors flex items-center justify-center" title="Chỉnh sửa">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này? Thao tác này sẽ xóa mọi đơn hàng của họ.')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-error/10 text-error hover:bg-error hover:text-white rounded-lg transition-colors flex items-center justify-center" title="Xóa">
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