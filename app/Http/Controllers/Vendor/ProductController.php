<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('vendor_id', Auth::guard('vendor')->id())->get();
        return view('frontend.vendor.products.index', compact('products'));
    }

    public function create()
    {
       $categories = Category::all();
        return view('frontend.vendor.products.create',compact('categories'));
    }

  public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0|max:100',
        'image' => 'nullable|image',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $data['vendor_id'] = Auth::guard('vendor')->id();
    $data['added_by'] = 'vendor';
    $data['is_approved'] = false;
    $data['discount'] = $request->discount ?? 0; // Set default discount to 0 if not given

    Product::create($data);

    return redirect()->route('vendor.products.index')->with('success', 'Product submitted for approval.');
}

    public function edit($id)
    {
        $product = Product::where('vendor_id', Auth::guard('vendor')->id())->findOrFail($id);
        return view('frontend.vendor.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('vendor_id', Auth::guard('vendor')->id())->findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $data['is_approved'] = false;

        $product->update($data);

        return redirect()->route('vendor.products.index')->with('success', 'Product updated and pending approval.');
    }

    public function destroy($id)
    {
        $product = Product::where('vendor_id', Auth::guard('vendor')->id())->findOrFail($id);
        $product->delete();

        return redirect()->route('vendor.products.index')->with('success', 'Product deleted.');
    }
}