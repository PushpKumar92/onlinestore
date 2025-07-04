<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductBaseController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::whereNotNull('admin_id')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        app(ProductBaseController::class)->saveProduct($request);
        return redirect()->route('admin.products.index')->with('success', 'Product added.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Product $product)
    {
        app(ProductBaseController::class)->saveProduct($request, $product);
        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

   public function approve($id)
{
    $product = \App\Models\Product::findOrFail($id);
    $product->status = 'approved';
    $product->save();

    return redirect()->back()->with('success', 'Product approved successfully!');
}
   public function pending()
{
    $pendingProducts = \App\Models\Product::where('status', 'pending')->latest()->get();

    return view('admin.products.pending', compact('pendingProducts'));
}
}