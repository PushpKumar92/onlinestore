<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;

class ProductdetailController extends Controller
{
    
  public function Allproducts(Request $request)
{
    // Fetch all filters from DB
    $categories = Category::all();
    $brands = Brand::all();
    $sizes = Size::all();
    $colors = Color::all();

    // Base query
    $products = Product::query();

    // Filter by categories
    if ($request->has('categories')) {
        $products->whereIn('category_id', $request->categories);
    }

    // Filter by brands
    if ($request->has('brands')) {
        $products->whereIn('brand_id', $request->brands);
    }

    // Filter by sizes
    if ($request->has('sizes')) {
        $products->whereHas('sizes', function($q) use ($request) {
            $q->whereIn('size_id', $request->sizes);
        });
    }

    // Filter by colors
    if ($request->has('colors')) {
        $products->whereHas('colors', function($q) use ($request) {
            $q->whereIn('color_id', $request->colors);
        });
    }

    // Filter by price range
    if ($request->has('price_min') && $request->has('price_max')) {
        $products->whereBetween('price', [$request->price_min, $request->price_max]);
    }

    $products = $products->paginate(12);

    return view('frontend.product-sidebar', compact('products', 'categories', 'brands', 'sizes', 'colors'));
}

 

}
