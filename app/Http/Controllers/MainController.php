<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\MetaTag;

class MainController extends Controller
{
    public function index()
{
    // Fetch meta tag for homepage (set 'home' or '/' based on your DB entry)
    $meta = MetaTag::where('page_name', 'home')->orWhere('page_name', '/')->first();

    // ⚡ Flash Sale Products
    $flashSaleProducts = Product::where('discount', '>', 0)
        ->where('status', 1)
        ->latest()
        ->take(8)
        ->get();

    // 🆕 New Arrival Products
    $newArrivalProducts = Product::where(function ($query) {
            $query->whereNull('discount')->orWhere('discount', '=', 0);
        })
        ->where('status', 1)
        ->latest()
        ->take(8)
        ->get();

    $categories = Category::all();
    $products = Product::all();

    return view('frontend.index', compact(
        'flashSaleProducts',
        'newArrivalProducts',
        'categories',
        'products',
        'meta'
    ));
}



    // 🛍️ Flash Sale Products Page
    public function sales(Request $request)
    {
  $query = Product::query();

    // ✅ Show only products that have NO discount
    $query->where(function ($q) {
        $q->whereNull('discount')->orWhere('discount', '=', 0);
    });

    // ✅ Product must be approved
    $query->where('is_approved', 1);

    // ✅ Filters (categories, brands, sizes, colors, price)
    if ($request->filled('categories')) {
        $query->whereIn('category_id', $request->categories);
    }

    if ($request->filled('brands')) {
        $query->whereIn('brand_id', $request->brands);
    }

    if ($request->filled('sizes')) {
        $query->whereHas('sizes', function ($q) use ($request) {
            $q->whereIn('sizes.id', $request->sizes);
        });
    }

    if ($request->filled('colors')) {
        $query->whereHas('colors', function ($q) use ($request) {
            $q->whereIn('colors.id', $request->colors);
        });
    }

    if ($request->filled('price_min')) {
        $query->where('price', '>=', $request->price_min);
    }

    if ($request->filled('price_max')) {
        $query->where('price', '<=', $request->price_max);
    }

    // ✅ Sorting options
    if ($request->filled('sort')) {
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->latest();
        }
    } else {
        $query->latest();
    }

    $products = $query->paginate(12);

    // Pass filters data
    $categories = Category::all();
    $brands = Brand::all();
    $sizes = Size::all();
    $colors = Color::all();

  

        $saleProducts = Product::where('discount', '>', 0)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('frontend.sales', compact('saleProducts','products', 'categories', 'brands', 'sizes', 'colors'));
    }


    // Static Pages
    public function about() {
            $categories = Category::all();
        return view('frontend.about',compact('categories'));
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

    public function checkout() {
        return view('frontend.checkout');
    }

    public function order() {
         $categories = Category::latest()->get();
          
        return view('frontend.order',compact('categories'));
    }


   
}