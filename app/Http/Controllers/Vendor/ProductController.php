<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductBaseController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
   public function index()
{
    $vendorId = Auth::guard('vendor')->id(); // Get current vendor's ID

    // Fetch products created by this vendor only
    $products = Product::where('vendor_id', $vendorId)->latest()->get();

    return view('frontend.vendor.products.index', compact('products'));
}


    public function create()
    {
        $categories = Category::all();
        return view('frontend.vendor.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        app(ProductBaseController::class)->saveProduct($request);
        return redirect()->route('products.index')->with('success', 'Product submitted for approval.');
    }

    public function edit(Product $product)
    {
        if ($product->vendor_id !== auth('vendor')->id()) {
            abort(403);
        }

        $categories = Category::all();
        return view('frontend.vendor.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->vendor_id !== auth('vendor')->id()) {
            abort(403);
        }

        app(ProductBaseController::class)->saveProduct($request, $product);
        return redirect()->route('products.index')->with('success', 'Product updated.');
    }
}