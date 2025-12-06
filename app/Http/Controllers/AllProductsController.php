<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;


class AllProductsController extends Controller
{
    public function allproducts(Request $request)
    {
         $query = Product::query();
    
    // ✅ Show only ACTIVE products (status = 1)
    $query->where('status', 1);
    
   
    
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
    
    // ✅ NEW: Discount filter (optional - only if user wants to filter by discount)
    if ($request->filled('discount_only') && $request->discount_only == 1) {
        $query->where('discount', '>', 0);
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
            case 'discount':
                $query->orderBy('discount', 'desc');
                break;
            default:
                $query->latest();
        }
    } else {
        $query->latest();
    }
    
   $products = $query->paginate(12)->withQueryString();
    
    // Pass filters data - also filter only active categories and brands
    $categories = Category::where('status', 1)->get();
    $brands = Brand::where('status', 1)->get();
    $sizes = Size::all();
    $colors = Color::all();
   
        // Pass all products to the view
        return view('frontend.allproducts', compact('products', 'categories', 'brands', 'sizes', 'colors'));
    }
}
