<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name'
        ]);

        Brand::create($request->all());

        return response()->json(['success' => 'Brand added successfully.']);
    }

    public function edit(Brand $brand)
    {
        return response()->json($brand);
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id
        ]);

        $brand->update($request->all());

        return response()->json(['success' => 'Brand updated successfully.']);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json(['success' => 'Brand deleted successfully.']);
    }
}
