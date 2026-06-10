<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold text-gray-900 mb-8 uppercase">
                ADMIN PANEL
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <a href="{{ route('admin.products.index') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 flex items-center space-x-6 hover:-translate-y-1">
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                            Quản lý hàng hóa
                        </h2>
                        <p class="text-gray-500 mt-2 text-sm">
                            Thêm mới, chỉnh sửa, xóa và theo dõi danh sách sản phẩm trong kho hàng.
                        </p>
                    </div>
                </a>
                <a href="{{ route('admin.users.index') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 flex items-center space-x-6 hover:-translate-y-1">
                    <div class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">
                            Quản lý người dùng
                        </h2>
                        <p class="text-gray-500 mt-2 text-sm">
                            Xem danh sách, phân quyền (Admin/Customer) và khóa tài khoản thành viên.
                        </p>
                    </div>
                </a>

                <a href="{{ route('admin.orders.index') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 flex items-center space-x-6 hover:-translate-y-1">
                    <div class="w-20 h-20 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 group-hover:text-amber-600 transition-colors">
                            Quản lý đơn đặt hàng
                        </h2>
                        <p class="text-gray-500 mt-2 text-sm">
                            Xem danh sách, cập nhật trạng thái (duyệt/hủy) và quản lý hóa đơn của khách.
                        </p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>