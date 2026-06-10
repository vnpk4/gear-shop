<x-app-layout>
    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-black text-gray-800 border-l-4 border-emerald-500 pl-3">
                Admin User Dashboard
            </h1>
            <a href="{{ route('admin.users.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text px-4 py-2 rounded-lg font-bold text-sm transition-colors shadow-sm">
                + Thêm người dùng
            </a>
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-emerald-600 transition-colors font-medium">
                &larr; Quay lại Dashboard
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 uppercase">
                        <th class="p-4">ID</th>
                        <th class="p-4">Tên người dùng</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Quyền (Role)</th>
                        <th class="p-4 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-bold text-gray-500">#{{ $user->id }}</td>
                        <td class="p-4 font-bold text-gray-900">{{ $user->name }}</td>
                        <td class="p-4 text-gray-600">{{ $user->email }}</td>
                        <td class="p-4">
                            @if($user->role === 'admin')
                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-bold text-xs">Quản trị viên</span>
                            @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full font-bold text-xs">Khách hàng</span>
                            @endif
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded-lg transition-colors" title="Xem chi tiết">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="p-2 bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white rounded-lg transition-colors" title="Chỉnh sửa">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này? Thao tác này sẽ xóa mọi đơn hàng của họ.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg transition-colors" title="Xóa">
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