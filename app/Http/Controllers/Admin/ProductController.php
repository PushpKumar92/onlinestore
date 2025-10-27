<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $allProducts = Product::latest()->get();
        return view('admin.products.index', compact('allProducts'));
    }

    // Show create form
    public function create()
    {
        // Get only active categories that are NOT soft deleted
        $categories = Category::where('status', 1)
                               
                              ->orderBy('name', 'asc')
                              ->get();
        
       $brands = Brand::all();
        
        return view('admin.products.create', compact('categories','brands'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image'] = $imageName;
        }

        Product::create($data);

        return redirect()->route('products.index')
                       ->with('success', 'Product created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        // Get all active categories (NOT soft deleted) for edit
        // This ensures only valid categories show in dropdown
        $categories = Category::whereNull('deleted_at')
                              ->orderBy('name', 'asc')
                              ->get();
        
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
                File::delete(public_path('uploads/products/' . $product->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('products.index')
                       ->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete image
        if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
            File::delete(public_path('uploads/products/' . $product->image));
        }
        
        $product->delete();
        
        return redirect()->back()
                       ->with('success', 'Product deleted successfully!');
    }
}