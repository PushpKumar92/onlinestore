<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    // Display all brands
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    // Store new brand
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'slug' => 'nullable|string|max:255|unique:brands,slug',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/brands'), $imageName);
            $data['image'] = $imageName;
        }

        // Set status: 1 = Active, 0 = Inactive
        $data['status'] = $request->has('status') ? 1 : 0;

        Brand::create($data);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
    }

    // Update existing brand
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'slug' => 'required|string|max:255|unique:brands,slug,' . $brand->id,
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($brand->image && File::exists(public_path('uploads/brands/' . $brand->image))) {
                File::delete(public_path('uploads/brands/' . $brand->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/brands'), $imageName);
            $data['image'] = $imageName;
        }

        // Set status: 1 = Active, 0 = Inactive
        $data['status'] = $request->has('status') ? 1 : 0;

        $brand->update($data);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
    }

    // Soft delete brand
    public function destroy(Brand $brand)
    {
        $brand->delete(); // Soft deletes the brand
        return redirect()->back()->with('success', 'Brand deleted successfully!');
    }
}