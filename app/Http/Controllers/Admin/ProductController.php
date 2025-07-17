<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
public function index()
{
    $allProducts = Product::latest()->paginate(10); // All
    $adminProducts = Product::where('added_by_role', 'admin')->latest()->get(); // Only admin
    $vendorProducts = Product::where('added_by_role', 'vendor')->latest()->get(); // Only vendor

    return view('admin.products.index', compact('allProducts', 'adminProducts', 'vendorProducts'));
}

public function create()
{
    $categories = category::all();
return view('admin.products.create',compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount = $request->discount ?? 0;
    $product->quantity = $request->quantity;
    $product->category_id = $request->category_id;

    // ✅ Set admin approval and source
    $product->is_approved = true;
    $product->added_by = Auth::guard('admin')->id();
    $product->added_by_role = 'admin';

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/products'), $filename);
        $product->image = $filename;
    }

    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product added successfully and published.');
}
public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); // ✅ Fetch all categories

    return view('admin.products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'quantity' => 'required|integer|min:0',
        'status' => 'required|in:active,inactive',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
}

public function destroy(Product $product)
{
$product->delete();
return redirect()->route('admin.products.destroy')->with('success', 'Product deleted successfully');
}

public function pending()
{
    $products = Product::where('status', 'pending')->latest()->get(); // Optional: latest for recent first
    return view('admin.products.pending', compact('products'));
}
public function approve($id)
{
    $product = Product::findOrFail($id);
    $product->status = 'approved';
    $product->save();

    return back()->with('success', 'Product approved successfully.');
}

public function decline($id)
{
    $product = Product::findOrFail($id);
    $product->status = 'declined'; // use 'declined' or 'inactive' consistently
    $product->save();

    return back()->with('error', 'Product declined.');
}
}