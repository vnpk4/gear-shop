<x-app-layout>
    <main class="max-w-3xl mx-auto px-4 py-10 bg-background min-h-screen text-on-surface">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-black font-sora uppercase text-on-surface tracking-tight">ADD NEW USER</h1>
            <a href="{{ route('admin.users.index') }}" class="text-on-surface-variant hover:text-primary transition-colors font-medium text-sm flex items-center gap-1 font-inter">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Quay lại
            </a>
        </div>

        <div class="bg-surface-container/60 rounded-2xl border border-white/5 p-8 backdrop-blur-md shadow-2xl font-inter">
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Tên tài khoản</label>
                    <input type="text" name="name" placeholder="Ví dụ: nva_99" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40" required>
                </div>
                <div class="space-y-2">
                    <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Tên người dùng</label>
                    <input type="text" name="realname" placeholder="Ví dụ: Nguyễn Văn A" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40" required>
                </div>
                <div class="space-y-2">
                    <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Ngày sinh</label>
                    <input type="date" name="birthday" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0" style="color-scheme: dark;">
                </div>
                <div class="space-y-2">
                    <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Email</label>
                    <input type="email" name="email" placeholder="example@gearmaster.com" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40" required>
                </div>
                <div class="space-y-2">
                    <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Mật khẩu</label>
                    <input type="password" name="password" placeholder="••••••••" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 placeholder:text-on-surface-variant/40" required minlength="8">
                </div>
                <div class="space-y-2">
                    <label class="block text-on-surface-variant font-jetbrains text-xs uppercase tracking-widest">Phân quyền</label>
                    <select name="role" class="glass-input rounded-xl w-full py-3 px-4 text-on-surface focus:outline-none focus:ring-0 bg-surface-container">
                        <option value="customer" class="bg-surface-container-high text-on-surface">Khách hàng</option>
                        <option value="admin" class="bg-surface-container-high text-on-surface">Quản trị viên (Admin)</option>
                    </select>
                </div>
                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-black font-sora font-bold py-3.5 px-8 rounded-xl transition-all shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/30 uppercase text-xs tracking-wider">Lưu tài khoản</button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>