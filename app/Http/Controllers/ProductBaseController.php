<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductBaseController extends Controller
{
    public function saveProduct(Request $request, $product = null)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|string|max:10',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = $product ?? new Product();
        $product->fill($request->only(['category_id', 'name', 'description', 'price', 'discount', 'quantity']));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        }

        // Check login guard
        if (Auth::guard('admin')->check()) {
            $product->admin_id = Auth::guard('admin')->id();
            $product->vendor_id = null;
            $product->status = 'approved';
        } elseif (Auth::guard('vendor')->check()) {
            $product->vendor_id = Auth::guard('vendor')->id();
            $product->admin_id = null;
            $product->status = 'pending';
        }

        $product->save();
    }
}