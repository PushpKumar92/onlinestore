<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;



require __DIR__ . '/frontend/main.php';

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
   Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
   Route::post('cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
   Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');



Route::middleware('user.auth')->prefix('user')->group(function () {

   Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile');
   Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
   Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
   Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');


   Route::get('/payment/{order}', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
   Route::post('/payment/{order}', [PaymentController::class, 'processPayment'])->name('payment.process');


   
   Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
   Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

   Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
});

// Admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware('admin.auth')->prefix('admin')->group(function () {
   Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

   Route::get('change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.change-password.form');
   Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');

   Route::get('/users', [UserController::class, 'userdetail'])->name('userdetail');
   Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('useredit');
   Route::post('/users/{id}', [UserController::class, 'update'])->name('userupdate');
   Route::delete('users/{id}', [UserController::class, 'destroy'])->name('userdestroy');

   Route::get('blogs', [BlogController::class, 'index'])->name('blogs.list');
   Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.addblog');
   Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
   Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
   Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
   Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

   Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
   Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
   Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
   Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
   Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
   Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

   
   Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
   Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
   Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
   Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
   Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
   Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
   Route::get('products/export', [AdminProductController::class, 'exportCsv'])->name('products.export');
Route::post('products/import', [AdminProductController::class, 'import'])->name('admin.products.import');

   // Approve Vendor Product
   Route::get('/products/pending', [AdminProductController::class, 'pending'])->name('products.pending');
   Route::post('/products/{id}/approve', [AdminProductController::class, 'approve'])->name('admin.products.approve');
   Route::post('/products/{id}/decline', [AdminProductController::class, 'decline'])->name('admin.products.decline');

   Route::resource('brands', BrandController::class);
Route::post('brands/update-status', [BrandController::class, 'updateStatus'])->name('brands.updateStatus');
// Sizes
Route::resource('sizes', SizeController::class);

// Colors
Route::resource('colors', ColorController::class);

   Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});

