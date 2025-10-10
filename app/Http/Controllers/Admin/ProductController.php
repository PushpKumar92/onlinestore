<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    // Display all products (admin can manage all, including )
    public function index()
    {
        $allProducts = Product::latest()->paginate(10); // all products
        return view('admin.products.index', compact('allProducts'));
    }

    // Show create product form
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Store new product
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

        $product = new Product($request->only([
            'name', 'description', 'price', 'discount', 'quantity', 'category_id'
        ]));

        // Admin settings
        $product->is_approved = true;

        // Handle image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product added and published.');
    }

    // Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $data['image'] = $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product updated successfully.');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product deleted successfully.');
    }

    // Show pending products
    public function pending()
    {
        $products = Product::where('status', 'pending')->latest()->get();
        return view('admin.products.pending', compact('products'));
    }

    // Approve product
    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'approved';
        $product->save();

        return back()->with('success', 'Product approved successfully.');
    }

    // Decline product
    public function decline($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'declined';
        $product->save();

        return back()->with('error', 'Product declined.');
    }
    public function exportCsv()
    {
        $products = Product::all();

        $filename = "products_" . date('Y-m-d_H-i-s') . ".csv";

        // Headers for browser
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // Callback to write CSV
        $callback = function() use ($products) {
            $file = fopen('php://output', 'w');

            // CSV header row
            fputcsv($file, [
                'ID', 'Name', 'Description', 'Price', 'Discount', 'Quantity', 'Category ID', 'Approved'
            ]);

            // CSV data rows
            foreach ($products as $product) {
                fputcsv($file, [
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->price,
                    $product->discount,
                    $product->quantity,
                    $product->category_id,
                    $product->is_approved ? 'Yes' : 'No'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,txt',
    ]);

    $file = $request->file('file');

    if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
        $header = fgetcsv($handle); // skip header row

        while (($row = fgetcsv($handle)) !== false) {
            // Map columns by index (adjust according to your CSV)
            \App\Models\Product::create([
                'name' => $row[1] ?? '',            // 1st column = name
                'description' => $row[2] ?? '',     // 2nd column = description
                'price' => isset($row[3]) ? floatval($row[3]) : 0,    // 3rd column = price
                'discount' => isset($row[4]) ? floatval($row[4]) : 0, // 4th column = discount
                'quantity' => isset($row[5]) ? intval($row[5]) : 0,   // 5th column = quantity
                'category_id' => isset($row[6]) ? intval($row[6]) : 1,// 6th column = category
                'is_approved' => isset($row[7]) && strtolower($row[7]) == 'yes' ? 1 : 0, // 7th column = approved
                'added_by_role' => 'admin',
                'status' => $row[8] ?? 'active',  // 8th column = status
            ]);
        }

        fclose($handle);
    }

    return redirect()->route('admin.products.index')->with('success', 'Products imported successfully!');
}

}