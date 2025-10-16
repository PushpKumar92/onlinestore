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

    return view('frontend.product-sidebar', compact('products', 'categories', 'brands', 'sizes', 'colors'));
}
}