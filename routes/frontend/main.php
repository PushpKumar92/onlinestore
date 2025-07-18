<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\forgotController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;


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
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/blog-details', [MainController::class, 'blogDetails'])->name('blog.details');
Route::get('/create-account', [MainController::class, 'createAccount'])->name('create.account');
Route::get('/order', [MainController::class, 'order'])->name('order');
Route::get('/sellers', [MainController::class, 'sellers'])->name('sellers');
Route::get('/user-profile', [MainController::class, 'userProfile'])->name('user.profile');
Route::get('/contact-us', [MainController::class, 'contactUs'])->name('contact.us');
Route::get('/empty-card', [MainController::class, 'emptyCard'])->name('empty.card');
Route::get('/product-sidebar', [MainController::class, 'productSidebar'])->name('product.sidebar');
Route::get('/seller-sidebar', [MainController::class, 'sellerSidebar'])->name('seller.sidebar');
Route::get('/empty-wishlist', [MainController::class, 'emptyWishlist'])->name('empty.wishlist');
Route::get('/flash-sale', [MainController::class, 'flashSale'])->name('flash.sale');

// Cart routes
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('user/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/user/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');

//watch list 
 Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::get('/wishlist/count', [WishlistController::class, 'count'])->name('wishlist.count');