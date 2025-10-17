<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class MainController extends Controller
{
      // 🏠 Homepage (Flash Sale + New Arrivals)
    public function index()
    {
        // ⚡ Flash Sale Products (discount > 0)
        $flashSaleProducts = Product::where('discount', '>', 0)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // 🆕 New Arrival Products (discount == 0 or NULL)
        $newArrivalProducts = Product::where(function ($query) {
                $query->whereNull('discount')
                      ->orWhere('discount', '=', 0);
            })
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // 📂 All Categories
        $categories = Category::latest()->get();

        return view('frontend.index', compact('flashSaleProducts', 'newArrivalProducts', 'categories'));
    }

    // 🛍️ Flash Sale Products Page
    public function sales()
    {
        $saleProducts = Product::where('discount', '>', 0)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

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