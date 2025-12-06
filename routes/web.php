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
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\MainController;
 use App\Http\Controllers\UserForgotPasswordController;
use App\Http\Controllers\ProductdetailController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Admin\ContactUsAdminController;




Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// Show login form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit'); Route::get('user-forgot-password', [UserForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('user-forgot-password', [UserForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('user-reset-password/{token}', [UserForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('user-reset-password', [UserForgotPasswordController::class, 'reset'])->name('password.update');

   //  Main Controller
Route::get('/',[MainController::class,'index'])->name('index');
Route::get('/about',[MainController::class,'about'])->name('about');
Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');
Route::get('/faq', [MainController::class, 'faq'])->name('faq');
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/create-account', [MainController::class, 'createAccount'])->name('create.account');
Route::get('/order', [MainController::class, 'order'])->name('order');
Route::get('/sellers', [MainController::class, 'sellers'])->name('sellers');
Route::get('/user-profile', [MainController::class, 'userProfile'])->name('user.profile');

Route::get('/empty-card', [MainController::class, 'emptyCard'])->name('empty.card');

Route::get('/seller-sidebar', [MainController::class, 'sellerSidebar'])->name('seller.sidebar');
Route::get('/empty-wishlist', [MainController::class, 'emptyWishlist'])->name('empty.wishlist');
Route::get('/flash-sale', [MainController::class, 'flashSale'])->name('flash.sale');
Route::get('/sales', [MainController::class, 'sales'])->name('frontend.sales');


// BlogCOntroller
Route::get('/blog-page', [BlogController::class, 'blogPage'])->name('blog.page');
Route::get('/blog-detail/{slug}', [BlogController::class, 'blogDetails'])->name('blog.details');


Route::get('/contact', [ContactUsController::class, 'index'])->name('contact.us');
Route::post('/contact/submit', [ContactUsController::class, 'store'])->name('contact.submit');

//WishlistCOntroller

Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
Route::get('/wishlist/count', [WishlistController::class, 'getCount'])->name('wishlist.count');
Route::get('/wishlist/items', [WishlistController::class, 'getItems'])->name('wishlist.items');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.remove');


 Route::get('/shop-page', [ProductdetailController::class, 'Allproducts'])->name('productall');
  Route::get('/product-info/{id}', [ProductdetailController::class, 'productInfo'])->name('product.info');

Route::get('/all-product', [AllProductsController::class, 'Allproducts'])->name('allproducts');
    
     
Route::get('/search', [SearchController::class, 'index'])->name('search');


Route::post('/chatbot', [ChatbotController::class, 'handleChat'])->name('chatbot.handle');

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

   // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    
    // Thank you page
    Route::get('/thank-you/{order}', [CheckoutController::class, 'thankYou'])->name('thankyou');
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
 Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');


Route::get('/reviews/product/{productId}', [ReviewController::class, 'getProductReviews'])->name('reviews.product');

   Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
});

// Admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('reset-password/{token}', [AdminForgotPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('reset-password', [AdminForgotPasswordController::class, 'reset'])->name('admin.password.update');

Route::middleware('admin.auth')->prefix('admin')->group(function () {
   Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

   Route::get('change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.change-password.form');
   Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');

     Route::get('users', [UserController::class, 'index'])->name('users.index');


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
   
  // Export Routes
Route::get('products/export/csv', [AdminProductController::class, 'exportCSV'])->name('products.export.csv');
// Route::get('products/export/excel', [AdminProductController::class, 'exportExcel'])->name('products.export.excel');

// Import Route
Route::post('products/import', [AdminProductController::class, 'importProducts'])->name('products.import');

   Route::get('orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
   Route::post('orders/{id}/update', [OrderController::class, 'updateStatus'])->name('admin.orders.update');

   Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
   Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
   Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
   Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

Route::get('meta-tags', [MetaTagController::class, 'index'])->name('meta-tags.index');
    Route::post('meta-tags/store', [MetaTagController::class, 'store'])->name('meta-tags.store');
    Route::get('meta-tags/{id}/edit', [MetaTagController::class, 'edit'])->name('meta-tags.edit');
    Route::put('meta-tags/{id}/update', [MetaTagController::class, 'update'])->name('meta-tags.update');
    Route::delete('meta-tags/{id}/delete', [MetaTagController::class, 'destroy'])->name('meta-tags.destroy');

// Sizes  
   Route::resource('sizes', SizeController::class);

// Colors  
   Route::resource('colors', ColorController::class);



    Route::get('/contacts', [ContactUsAdminController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [ContactUsAdminController::class, 'show'])->name('admin.contacts.show');
    Route::post('/contacts/{id}/replied', [ContactUsAdminController::class, 'markReplied'])->name('admin.contacts.replied');
    Route::delete('/contacts/{id}', [ContactUsAdminController::class, 'destroy'])->name('admin.contacts.destroy');

   Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});

