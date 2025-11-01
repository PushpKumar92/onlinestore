<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response; 
use Illuminate\Support\Facades\Storage;

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
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'nullable|exists:brands,id',
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'quantity' => 'required|integer|min:0',
        'sku_code' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:255',
        'sizes' => 'nullable|string|max:255',
        'tags' => 'nullable|string|max:255',
        'short_description' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
    ]);
    
    $data = [
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
        'price' => $request->price,
        'discount' => $request->discount,
        'quantity' => $request->quantity,
        'sku_code' => $request->sku_code,
        'color' => $request->color,
        'sizes' => $request->sizes,
        'tags' => $request->tags,
        'short_description' => $request->short_description,
        'description' => $request->description,
        'status' => $request->has('status') ? 1 : 0,
    ];
    
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/products'), $imageName);
        $data['image'] = $imageName;
    }
    
    Product::create($data);
    
    return redirect()->route('admin.products.index')
                    ->with('success', 'Product created successfully!');
}


    // Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
         $brands = Brand::all();

        $categories = Category::get();
        
        return view('admin.products.edit', compact('product', 'categories','brands'));
    }

  public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'nullable|exists:brands,id',
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'quantity' => 'required|integer|min:0',
        'sku_code' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:255',
        'sizes' => 'nullable|string|max:255',
        'tags' => 'nullable|string|max:255',
        'short_description' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
    ]);
    
    $data = [
        'name' => $request->name,
        'slug' => \Str::slug($request->name), // Auto-generate slug
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
        'price' => $request->price,
        'discount' => $request->discount,
        'quantity' => $request->quantity,
        'sku_code' => $request->sku_code,
        'color' => $request->color,
        'sizes' => $request->sizes,
        'tags' => $request->tags,
        'short_description' => $request->short_description,
        'description' => $request->description,
        'status' => $request->has('status') ? 1 : 0,
    ];
    
    if ($request->hasFile('image')) {
        if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
            File::delete(public_path('uploads/products/' . $product->image));
        }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/products'), $imageName);
        $data['image'] = $imageName;
    }
    
    $product->update($data);
    
    return redirect()->route('admin.products.index')
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


    public function exportCSV()
{
    $fileName = 'products.csv';
    $products = Product::all();

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$fileName\"",
    ];

    $columns = [
        'id', 'category_id', 'added_by_role', 'name', 'sku_code', 'brand', 'tags',
        'color', 'sizes', 'short_description', 'description', 'price', 'discount',
        'quantity', 'image', 'is_approved', 'status', 'created_at'
    ];

    $callback = function () use ($products, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($products as $product) {
            $data = [];
            foreach ($columns as $col) {
                $data[] = $product->$col;
            }
            fputcsv($file, $data);
        }
        fclose($file);
    };

    return Response::stream($callback, 200, $headers);
}

// public function exportExcel()
// {
//     $fileName = "products.xls";
//     $products = Product::all();

//     header("Content-Type: application/vnd.ms-excel");
//     header("Content-Disposition: attachment; filename=\"$fileName\"");

//     $columns = [
//         'ID','Category ID','Added By','Name','SKU Code','Brand','Tags','Color',
//         'Sizes','Short Description','Description','Price','Discount','Quantity',
//         'Image','Approved','Status','Created At'
//     ];

//     echo implode("\t", $columns) . "\n";

//     foreach ($products as $product) {
//         echo $product->id . "\t" .
//              $product->category_id . "\t" .
//              $product->added_by_role . "\t" .
//              $product->name . "\t" .
//              $product->sku_code . "\t" .
//              $product->brand . "\t" .
//              $product->tags . "\t" .
//              $product->color . "\t" .
//              $product->sizes . "\t" .
//              $product->short_description . "\t" .
//              $product->description . "\t" .
//              $product->price . "\t" .
//              $product->discount . "\t" .
//              $product->quantity . "\t" .
//              $product->image . "\t" .
//              $product->is_approved . "\t" .
//              $product->status . "\t" .
//              $product->created_at . "\n";
//     }
//     exit;
// }

public function importProducts(Request $request)
{
    if ($request->hasFile('file')) {
        $file = fopen($request->file('file')->getRealPath(), 'r');
        $firstline = true;
        $successCount = 0;
        $errorCount = 0;
        
        // Create directory if it doesn't exist
        $uploadsPath = public_path('uploads/products');
        if (!file_exists($uploadsPath)) {
            mkdir($uploadsPath, 0777, true);
        }
        
        while (($row = fgetcsv($file, 10000, ',')) !== FALSE) {
            if (!$firstline) {
                try {
                    // Convert encoding from Windows-1252 to UTF-8 for all text fields
                    $description = isset($row[10]) ? mb_convert_encoding($row[10], 'UTF-8', 'Windows-1252') : '';
                    $shortDescription = isset($row[9]) ? mb_convert_encoding($row[9], 'UTF-8', 'Windows-1252') : '';
                    $name = isset($row[3]) ? mb_convert_encoding($row[3], 'UTF-8', 'Windows-1252') : '';
                    
                    // Handle image download and storage
                    $imagePath = null;
                    if (!empty($row[14])) {
                        try {
                            $imageUrl = trim($row[14]);
                            
                            // Initialize cURL
                            $ch = curl_init($imageUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                            
                            $imageContents = curl_exec($ch);
                            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                            curl_close($ch);
                            
                            if ($imageContents !== false && $httpCode == 200) {
                                // Generate unique filename
                                $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
                                if (empty($extension) || strlen($extension) > 4) {
                                    $extension = 'jpg';
                                }
                                $filename = 'product_' . time() . '_' . uniqid() . '.' . $extension;
                                
                                // Save to public/uploads/products
                                $fullPath = $uploadsPath . '/' . $filename;
                                file_put_contents($fullPath, $imageContents);
                                
                                // Store relative path for database
                                $imagePath = '' . $filename;
                            } else {
                                // If download fails, store the original URL
                                $imagePath = $imageUrl;
                            }
                        } catch (\Exception $e) {
                            // If image download fails, store the URL instead
                            $imagePath = $row[14];
                            \Log::warning('Image download failed: ' . $e->getMessage());
                        }
                    }
                    
                    Product::create([
                        'category_id'       => !empty($row[1]) ? (int)$row[1] : null,
                        'added_by_role'     => $row[2] ?? 'admin',
                        'name'              => $name,
                        'sku_code'          => $row[4] ?? null,
                        'brand'             => isset($row[5]) ? mb_convert_encoding($row[5], 'UTF-8', 'Windows-1252') : null,
                        'tags'              => isset($row[6]) ? mb_convert_encoding($row[6], 'UTF-8', 'Windows-1252') : null,
                        'color'             => $row[7] ?? null,
                        'sizes'             => $row[8] ?? null,
                        'short_description' => $shortDescription,
                        'description'       => $description,
                        'price'             => !empty($row[11]) ? (float)$row[11] : 0,
                        'discount'          => !empty($row[12]) ? (float)$row[12] : 0,
                        'quantity'          => !empty($row[13]) ? (int)$row[13] : 0,
                        'image'             => $imagePath,
                        'is_approved'       => isset($row[15]) ? (int)$row[15] : 0,
                        'status'            => isset($row[16]) ? (int)$row[16] : 1,
                    ]);
                    $successCount++;
                } catch (\Exception $e) {
                    $errorCount++;
                    \Log::error('Product import error: ' . $e->getMessage());
                }
            }
            $firstline = false;
        }
        fclose($file);
        
        if ($errorCount > 0) {
            return back()->with('warning', "Products Imported: {$successCount} successful, {$errorCount} failed");
        }
        return back()->with('success', "Successfully imported {$successCount} products");
    } else {
        return back()->with('error', 'Please Upload a Valid CSV File');
    }
}
}
