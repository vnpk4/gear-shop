<x-app-layout>
    <main class="max-w-3xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-black uppercase text-gray-800">ADD NEW USER</h1>
            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-emerald-600">&larr; Quay lại</a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên tài khoản</label>
                    <input type="text" name="name" placeholder="Ví dụ: nva_99" required class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên người dùng</label>
                    <input type="text" name="realname" placeholder="Ví dụ: Nguyễn Văn A" required class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ngày sinh</label>
                    <input type="date" name="birthday" value="{{ $user->birthday ?? '' }}" class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" required class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Mật khẩu</label>
                    <input type="password" name="password" required minlength="8" class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Phân quyền</label>
                    <select name="role" class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                        <option value="customer">Khách hàng</option>
                        <option value="admin">Quản trị viên (Admin)</option>
                    </select>
                </div>
                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-black font-bold py-3 px-8 rounded-xl transition-colors">Lưu tài khoản</button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>