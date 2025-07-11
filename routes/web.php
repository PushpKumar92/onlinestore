<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\VendorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;



 require __DIR__ . '/frontend/main.php';  





Route::middleware('user.auth')->prefix('user')->group(function () {
   
    Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');
     
  
   Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
   Route::post('payment-store', [PaymentController::class, 'paymentStore'])->name('payment.store');

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

    Route::get('vendors', [VendorController::class, 'index'])->name('admin.index');
    Route::get('vendors/pending', [VendorController::class, 'showPendingVendors'])->name('admin.vendors');
    Route::post('vendors/approve/{id}', [VendorController::class, 'approveVendor'])->name('admin.vendor.approve');
    Route::post('/vendors/{id}/decline', [VendorController::class, 'decline'])->name('admin.vendor.decline');

 Route::get('products', [AdminProductController::class, 'index'])->name('admin.products.index');           // List all products
    Route::get('products/create', [AdminProductController::class, 'create'])->name('products.create');  // Show form to create
    Route::post('products', [AdminProductController::class, 'store'])->name('products.store');          // Store new product
      // Show single product
    Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit'); // Edit form
    Route::put('products/{product}', [AdminProductController::class, 'update'])->name('products.update'); // Update product
    Route::delete('products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy'); // Delete

    // Custom Routes
        Route::resource('products', AdminProductController::class)->except(['show']);


    Route::get('products/pending', [AdminProductController::class, 'pending'])->name('products.pending');  
    Route::post('products/{id}/approve', [AdminProductController::class, 'approve'])->name('products.approve');

    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('/vendor/register', [VendorController::class, 'register'])->name('vendor.register');
Route::post('/vendor/register', [VendorController::class, 'registerSubmit'])->name('vendor.register.submit');
Route::get('/vendor/login', [VendorController::class, 'showvendorlogin'])->name('vendor.login');
Route::post('/vendor/login', [VendorController::class, 'login'])->name('vendor.login.submit');
Route::get('/sellers', [VendorController::class, 'showVendor'])->name('sellers');

Route::middleware('vendor.auth')->prefix('vendor')->group(function () {
 Route::get('dashboard', [VendorController::class, 'showdashboard'])->name('vendor.dashboard');   

   Route::get('change-password', [VendorController::class, 'showChangePasswordForm'])->name('vendor.change-password.form');
    Route::post('change-password', [VendorController::class, 'changePassword'])->name('vendor.change-password');

    Route::get('products', [VendorProductController::class, 'index'])->name('vendor.products.index');           
    Route::get('products/create', [VendorProductController::class, 'create'])->name('products.create');  
    Route::post('products', [VendorProductController::class, 'store'])->name('products.store');         
    
    Route::get('products/{product}/edit', [VendorProductController::class, 'edit'])->name('products.edit'); // Edit form
    Route::put('products/{product}', [VendorProductController::class, 'update'])->name('products.update'); // Update
    Route::delete('products/{product}', [VendorProductController::class, 'destroy'])->name('products.destroy'); // Delete
    
    Route::resource('products', VendorProductController::class)->except(['show']);
    

     Route::get('logout', [VendorController::class, 'logout'])->name('vendor.logout');
});