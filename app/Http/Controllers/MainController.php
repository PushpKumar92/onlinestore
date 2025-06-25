<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()             { return view('frontend.index');}
    public function about()             { return view('frontend.about');  }
    public function productInfo()       { return view('frontend.product-info');}
    public function privacy()           { return view('frontend.privacy'); }
    public function terms()             { return view('frontend.terms'); }
    public function faq()               { return view('frontend.faq'); }
    public function sellers()            { return view('frontend.sellers'); }
    public function login()              { return view('frontend.login'); }
    public function card()               { return view('frontend.card'); }
    public function checkout()           { return view('frontend.checkout'); }
    public function wishlist()            { return view('frontend.wishlist'); }
    public function compaire()            { return view('frontend.compaire'); }
    public function blog()              { return view('frontend.blog'); }
    public function blogDetails()       { return view('frontend.blog-details'); }
    public function contactUs()       { return view('frontend.contact-us'); }
    public function order()             { return view('frontend.order'); }
    public function becomevendor()       { return view('frontend.becomevendor'); }
    public function userProfile()        { return view('frontend.user-profile'); }
    public function productSidebar()      { return view('frontend.product-sidebar');} 
    public function sellerSidebar()      { return view('frontend.seller-sidebar');} 
    public function createAccount()      { return view('frontend.create-account');} 
    public function emptyCard()      { return view('frontend.empty-card');} 
    public function emptyWishlist()      { return view('frontend.empty-wishlist');} 
    public function flashSale()      { return view('frontend.flash-sale');} 
}
