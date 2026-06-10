<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'Lỗi: Bạn không thể tự xóa chính mình!');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Đã xóa người dùng thành công!');
    }
    public function store(Request $request)
    {
        $request->validate([
            'realname' => 'required', 
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users', 
            'birthday' => 'date',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'accountname' => $request->accountname,
            'realname' => $request->realname, // Mới
            'birthday' => $request->birthday, // Mới
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('admin.users.index')->with('success', 'Thêm thành công!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // 4. Cập nhật thông tin
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id,
            'realname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,customer',
        ]);

        $user->name = $request->name;
        $user->realname = $request->realname;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Đã cập nhật thông tin người dùng!');
    }
    public function show($id)
    {
        $user = User::with(['orders' => function ($q) {
            $q->latest();
        }])->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }
}
