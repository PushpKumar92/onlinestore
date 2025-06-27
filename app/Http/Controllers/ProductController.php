<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Blog;


class ProductController extends Controller
{
public function index()
{
    $products = Product::all();
    return view('admin.products.index', compact('products'));
}

public function create()
{
    return view('admin.products.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    $product = new Product($request->except('image'));

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product added successfully');
}

public function edit(Product $product)
{
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    if ($request->hasFile('image')) {
        // Delete old image
        if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
            File::delete(public_path('uploads/products/' . $product->image));
        }
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products'), $imageName);
        $product->image = $imageName;
    }

    $product->update($request->except('image'));

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}

public function destroy(Product $product)
{
    if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
        File::delete(public_path('uploads/products/' . $product->image));
    }

    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted successfully');
}
}