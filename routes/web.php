<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[MainController::class,'index'])->name('index');
Route::get('/about',[MainController::class,'about'])->name('about');

Route::get('/product-info', [MainController::class, 'productInfo'])->name('product.info');
Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');
Route::get('/faq', [MainController::class, 'faq'])->name('faq');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/wishlist', [MainController::class, 'wishlist'])->name('wishlist');
Route::get('/card', [MainController::class, 'card'])->name('card');
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



