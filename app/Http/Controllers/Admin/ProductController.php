<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // ✅ Display all products
    public function index()
    {
        $allProducts = Product::latest()->paginate(10);
        return view('admin.products.index', compact('allProducts'));
    }

    // ✅ Show create form
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // ✅ Store new product
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'sku_code' => 'required|string|max:100|unique:products,sku_code',
        'brand' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:100',
        'sizes' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:webp,avif,jpeg,png,jpg|max:2048',
    ]);

    $data = $request->only([
        'name', 'sku_code', 'brand', 'color', 'sizes', 'description',
        'price', 'discount', 'quantity', 'category_id'
    ]);

    // ✅ Convert checkbox to boolean
    $data['status'] = $request->has('status') ? 1 : 0;

    // ✅ Assign vendor/admin details
    $data['vendor_id'] = Auth::guard('admin')->id();
    $data['added_by_role'] = 'admin';
    $data['is_approved'] = true;

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/products'), $filename);
        $data['image'] = $filename;
    }

    Product::create($data);

    return redirect()->route('admin.products.index')->with('success', '✅ Product added successfully!');
}


    // ✅ Edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // ✅ Update product
  public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'sku_code' => 'required|string|max:100|unique:products,sku_code,' . $product->id,
        'brand' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:100',
        'sizes' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:webp,avif,jpeg,png,jpg|max:2048',
    ]);

    $data = $request->only([
        'name', 'sku_code', 'brand', 'color', 'sizes', 'description',
        'price', 'discount', 'quantity', 'category_id'
    ]);

    // ✅ Convert checkbox to boolean
    $data['status'] = $request->has('status') ? 1 : 0;

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/products'), $filename);
        $data['image'] = $filename;
    }

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', '✅ Product updated successfully!');
}

    // ✅ Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // delete image if exists
        if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
            unlink(public_path('uploads/products/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', '🗑️ Product deleted successfully!');
    }

    // ✅ Export Products as CSV
    public function exportCsv()
    {
        $products = Product::all();
        $filename = "products_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID', 'Name', 'SKU', 'Brand', 'Color', 'Sizes', 'Price', 'Discount',
                'Quantity', 'Category ID', 'Status', 'Approved'
            ]);

            foreach ($products as $product) {
                fputcsv($file, [
                    $product->id,
                    $product->name,
                    $product->sku_code,
                    $product->brand,
                    $product->color,
                    $product->sizes,
                    $product->price,
                    $product->discount,
                    $product->quantity,
                    $product->category_id,
                    $product->status,
                    $product->is_approved ? 'Yes' : 'No'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // ✅ Import Products from CSV
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');

        if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
            $header = fgetcsv($handle); // skip header

            while (($row = fgetcsv($handle)) !== false) {
                Product::create([
                    'name' => $row[1] ?? '',
                    'sku_code' => $row[2] ?? '',
                    'brand' => $row[3] ?? '',
                    'color' => $row[4] ?? '',
                    'sizes' => $row[5] ?? '',
                    'price' => isset($row[6]) ? floatval($row[6]) : 0,
                    'discount' => isset($row[7]) ? floatval($row[7]) : 0,
                    'quantity' => isset($row[8]) ? intval($row[8]) : 0,
                    'category_id' => isset($row[9]) ? intval($row[9]) : 1,
                    'status' => $row[10] ?? 'active',
                    'is_approved' => isset($row[11]) && strtolower($row[11]) == 'yes' ? 1 : 0,
                    'added_by_role' => 'admin',
                    'vendor_id' => Auth::guard('admin')->id(),
                ]);
            }

            fclose($handle);
        }

        return redirect()->route('admin.products.index')->with('success', '✅ Products imported successfully!');
    }
}
