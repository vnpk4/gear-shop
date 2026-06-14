<x-app-layout>
    <div class="py-12 bg-background min-h-screen text-on-surface">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="font-sora text-3xl font-extrabold text-on-surface mb-8 uppercase tracking-tight">
                ADMIN PANEL
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Products Management -->
                <a href="{{ route('admin.products.index') }}" class="group bg-surface-container/60 rounded-2xl shadow-sm hover:shadow-[0_0_20px_rgba(164,230,255,0.2)] border border-white/5 p-8 transition-all duration-300 flex items-center space-x-6 hover:-translate-y-1">
                    <div class="w-20 h-20 bg-primary/10 text-primary rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-background transition-all duration-300 shadow-[0_0_10px_rgba(164,230,255,0.1)] group-hover:shadow-[0_0_20px_rgba(164,230,255,0.4)]">
                        <span class="material-symbols-outlined text-4xl">inventory_2</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-on-surface group-hover:text-primary transition-colors font-sora">
                            Quản lý hàng hóa
                        </h2>
                        <p class="text-on-surface-variant/80 mt-2 text-sm font-inter">
                            Thêm mới, chỉnh sửa, xóa và theo dõi danh sách sản phẩm trong kho hàng.
                        </p>
                    </div>
                </a>

                <!-- User Management -->
                <a href="{{ route('admin.users.index') }}" class="group bg-surface-container/60 rounded-2xl shadow-sm hover:shadow-[0_0_20px_rgba(218,185,255,0.2)] border border-white/5 p-8 transition-all duration-300 flex items-center space-x-6 hover:-translate-y-1">
                    <div class="w-20 h-20 bg-secondary/10 text-secondary rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-secondary group-hover:text-background transition-all duration-300 shadow-[0_0_10px_rgba(218,185,255,0.1)] group-hover:shadow-[0_0_20px_rgba(218,185,255,0.4)]">
                        <span class="material-symbols-outlined text-4xl">group</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-on-surface group-hover:text-secondary transition-colors font-sora">
                            Quản lý người dùng
                        </h2>
                        <p class="text-on-surface-variant/80 mt-2 text-sm font-inter">
                            Xem danh sách, phân quyền (Admin/Customer) và khóa tài khoản thành viên.
                        </p>
                    </div>
                </a>

                <!-- Orders Management -->
                <a href="{{ route('admin.orders.index') }}" class="group bg-surface-container/60 rounded-2xl shadow-sm hover:shadow-[0_0_20px_rgba(0,252,161,0.2)] border border-white/5 p-8 transition-all duration-300 flex items-center space-x-6 hover:-translate-y-1 col-span-1 md:col-span-2 lg:col-span-1">
                    <div class="w-20 h-20 bg-tertiary/10 text-tertiary rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-tertiary group-hover:text-background transition-all duration-300 shadow-[0_0_10px_rgba(0,252,161,0.1)] group-hover:shadow-[0_0_20px_rgba(0,252,161,0.4)]">
                        <span class="material-symbols-outlined text-4xl">receipt_long</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-on-surface group-hover:text-tertiary transition-colors font-sora">
                            Quản lý đơn đặt hàng
                        </h2>
                        <p class="text-on-surface-variant/80 mt-2 text-sm font-inter">
                            Xem danh sách, cập nhật trạng thái (duyệt/hủy) và quản lý hóa đơn của khách.
                        </p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>