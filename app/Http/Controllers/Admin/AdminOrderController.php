<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    // Hiển thị tất cả đơn hàng của mọi khách hàng cho Admin thấy
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Hàm cập nhật trạng thái từ 'pending' sang 'paid'
    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'paid']); // Chuyển trạng thái đơn sang Đã thanh toán

        return redirect()->back()->with('success', 'Đã xác nhận thanh toán đơn hàng #' . $id);
    }
}