<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', [CustomerController::class, 'index'])->name('home');
Route::get('/category/{slug}', [CustomerController::class, 'index']);
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'customer') {
        return redirect('/');
    }

    return view('dashboard');
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::resource('users', AdminUserController::class);
});
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/products', [CustomerController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [CustomerController::class, 'show'])->name('products.show');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::prefix('customer')->name('customer.')->middleware(['auth', 'role:admin,customer'])->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [CheckoutController::class, 'history'])->name('orders.index');
    Route::get('/checkout', function() {
        return redirect()->route('customer.cart.index')->with('error', 'Vui lòng xác nhận đơn hàng từ Giỏ hàng!');
    });
});
require __DIR__ . '/auth.php';
