<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;



Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// Show login form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::get('forgot-password', [ForgotController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ForgotController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotController::class, 'reset'])->name('password.update');



Route::get('/',[MainController::class,'index'])->name('index');
Route::get('/about',[MainController::class,'about'])->name('about');

Route::get('/product-info', [MainController::class, 'productInfo'])->name('product.info');
Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');
Route::get('/faq', [MainController::class, 'faq'])->name('faq');
Route::get('/wishlist', [MainController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [MainController::class, 'card'])->name('card');
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/compaire', [MainController::class, 'compaire'])->name('compaire');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/blog-details', [MainController::class, 'blogDetails'])->name('blog.details');
Route::get('/create-account', [MainController::class, 'createAccount'])->name('create.account');
Route::get('/order', [MainController::class, 'order'])->name('order');
Route::get('/sellers', [MainController::class, 'sellers'])->name('sellers');
Route::get('/user-profile', [MainController::class, 'userProfile'])->name('user.profile');
Route::get('/contact-us', [MainController::class, 'contactUs'])->name('contact.us');
Route::get('/empty-card', [MainController::class, 'emptyCard'])->name('empty.card');
Route::get('/becomevendor', [MainController::class, 'becomevendor'])->name('becomevendor');
Route::get('/product-sidebar', [MainController::class, 'productSidebar'])->name('product.sidebar');
Route::get('/seller-sidebar', [MainController::class, 'sellerSidebar'])->name('seller.sidebar');
Route::get('/empty-wishlist', [MainController::class, 'emptyWishlist'])->name('empty.wishlist');
Route::get('/flash-sale', [MainController::class, 'flashSale'])->name('flash.sale');


Route::middleware('user.auth')->prefix('user')->group(function () {
   
    Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');

Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');   

    
   Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
   Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
   Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
   Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
   Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
   Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');


   Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
   Route::post('payment-store', [PaymentController::class, 'paymentStore'])->name('payment.store');

    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
    
});

// Admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware('admin.auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

     Route::get('admin/change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.change-password.form');
    Route::post('admin/change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');
    
    Route::get('/users', [UserController::class, 'userdetail'])->name('userdetail');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('useredit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('userupdate');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('userdestroy');

    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});