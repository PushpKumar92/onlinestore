<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
public function index()
{
    $vendorId = Auth::guard('vendor')->id(); // ✅ Use correct guard if vendors use a separate login

    if (!$vendorId) {
        return redirect()->route('vendor.login')->with('error', 'Please login as vendor.');
    }

    $products = Product::where('added_by', $vendorId)
        ->where('added_by_role', 'vendor')
        ->latest()
        ->paginate(10);

    return view('frontend.vendor.products.index', compact('products'));
}
    public function create()
    {
       $categories = Category::all();
        return view('frontend.vendor.products.create',compact('categories'));
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

    $vendorId = Auth::guard('vendor')->id();

    if (!$vendorId) {
        return redirect()->back()->with('error', 'Unauthorized vendor.');
    }

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount = $request->discount ?? 0;
    $product->quantity = $request->quantity;
    $product->category_id = $request->category_id;

    // ✅ Vendor product is not auto-approved
    $product->is_approved = false;
    $product->added_by = $vendorId;
    $product->added_by_role = 'vendor';

    // ✅ Upload image
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/products'), $filename);
        $product->image = $filename;
    }

    $product->save();

    return redirect()->route('vendor.products.index')->with('success', 'Product added and pending admin approval.');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); // ✅ Fetch all categories

    return view('frontend.vendor.products.edit', compact('product', 'categories'));
}
   public function update(Request $request, $id)
{
    $product = Product::where('vendor_id', Auth::guard('vendor')->id())
                     ->where('id', $id)
                     ->firstOrFail();

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