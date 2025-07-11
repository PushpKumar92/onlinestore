<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        $products = Product::where('added_by_type', 'vendor')
            ->where('added_by_id', Auth::guard('vendor')->id())
            ->get();

        return view('frontend.vendor.products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('frontend.vendor.products.create', compact('categories'));
    }

    public function store(Request $request) {
        $product = $this->saveProduct($request);
        return redirect()->route('vendor.products.index')->with('success', 'Product submitted for approval.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('frontend.vendor.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $this->saveProduct($request, $product);
        return redirect()->route('vendor.products.index')->with('success', 'Product updated.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted.');
    }

    protected function saveProduct(Request $request, $product = null) {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'discount' => 'nullable|string',
            'quantity' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        if (!$product) $product = new Product();

        $product->fill($data);
        $product->status = 'pending';
        $product->added_by_type = 'vendor';
        $product->added_by_id = Auth::guard('vendor')->id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return $product;
    }
}