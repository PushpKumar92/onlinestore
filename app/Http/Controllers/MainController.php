<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    // Home Page
    public function index() {
            $products = Product::all();
        return view('frontend.index', compact('products'));
    }

    // Static Pages
    public function about() {
        return view('frontend.about');
    }

    public function privacy() {
        return view('frontend.privacy');
    }

    public function terms() {
        return view('frontend.terms');
    }

    public function faq() {
        return view('frontend.faq');
    }

    public function contactUs() {
        return view('frontend.contact-us');
    }

    // Product & Seller Info Pages
    public function productInfo() {
        return view('frontend.product-info');
    }

    public function productSidebar() {
        return view('frontend.product-sidebar');
    }

    public function sellers() {
        return view('frontend.sellers');
    }

    public function sellerSidebar() {
        return view('frontend.seller-sidebar');
    }

    public function flashSale() {
        return view('frontend.flash-sale');
    }

    // Blog Pages
    public function blog() {
        return view('frontend.blog');
    }

    public function blogDetails() {
        return view('frontend.blog-details');
    }
    public function createAccount() {
        return view('frontend.create-account');
    }

    // User Pages
    public function userProfile() {
        return view('frontend.userprofile');
    }

    // Cart & Order Pages
    public function card() {
        return view('frontend.cart');
    }

    public function emptyCard() {
        return view('frontend.empty-card');
    }

    public function checkout() {
        return view('frontend.checkout');
    }

    public function order() {
        return view('frontend.order');
    }


    public function emptyWishlist() {
        return view('frontend.empty-wishlist');
    }
}