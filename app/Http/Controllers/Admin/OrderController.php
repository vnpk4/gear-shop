<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu đầu vào (Validation) để đảm bảo an toàn
        $request->validate([
            'status' => 'required|in:pending,paid,cancelled',
            'payment_method' => 'required|in:cash,bank',
        ]);

        $order = Order::findOrFail($id);
        
        $order->update([
            'status' => $request->status,
            'payment_method' => $request->payment_method
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Đã cập nhật đơn hàng #' . $id . ' thành công!');
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        $order->delete(); 

        return redirect()->route('admin.orders.index')->with('success', 'Đã xóa đơn hàng #' . $id . ' vĩnh viễn!');
    }
}
