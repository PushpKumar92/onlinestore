<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
{
    // ✅ Flash Sale: products with discount > 0
    $flashSaleProducts = Product::where('discount', '>', 0)
        ->where('is_approved', 1)
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();


    $newArrivalProducts = Product::where(function ($query) {
            $query->whereNull('discount')
                  ->orWhere('discount', '=', 0);
        })
        ->where('is_approved', 1)
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();
      
      $categories = Category::latest()->get();

    return view('frontend.index', compact('flashSaleProducts', 'newArrivalProducts','categories'));
}
public function sales()
{
    // ✅ Fetch products having a discount greater than 0
    $saleProducts = Product::where('discount', '>', 0)
        ->where('is_approved', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(12); // Paginate for better UX

    return view('frontend.sales', compact('saleProducts'));
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


    public function sellers() {
        return view('frontend.sellers');
    }

    public function sellerSidebar() {
        return view('frontend.seller-sidebar');
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