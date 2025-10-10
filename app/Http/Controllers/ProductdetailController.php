<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductdetailController extends Controller
{
    
   public function productSidebar(Request $request)
{
    $query = Product::query();

    // ✅ Filter by categories
    if ($request->has('category')) {
        $query->whereIn('category_slug', (array)$request->category);
    }

    // ✅ Filter by brands
    if ($request->has('brand')) {
        $query->whereIn('brand_slug', (array)$request->brand);
    }

    // ✅ Filter by colors
    if ($request->has('color')) {
        $query->whereIn('color', (array)$request->color);
    }

    // ✅ Filter by sizes
    if ($request->has('size')) {
        $query->whereIn('size', (array)$request->size);
    }

    // ✅ Filter by price range
    if ($request->has('min_price') && $request->has('max_price')) {
        $query->whereBetween('price', [
            (int) $request->min_price,
            (int) $request->max_price
        ]);
    }

    // ✅ Get products (with pagination for better UX)
    $products = $query->paginate(12);

    // Return view
    if ($request->ajax()) {
        // When filtering via AJAX → return only products grid
        return view('frontend.product-sidebar', compact('products'))->render();
    }

    // Default load → return full page
    return view('frontend.product-sidebar', compact('products'));
}
}
