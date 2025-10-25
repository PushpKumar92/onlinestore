<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Display all categories
   public function index()
{
   $categories = Category::all(); // or paginate(10)
    return view('admin.category.index', compact('categories'));
}

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $imageName);
            $data['image'] = $imageName;
        }

        // Set status: 1 = Active, 0 = Inactive
        $data['status'] = $request->has('status') ? 1 : 0;

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    // Update existing category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image && File::exists(public_path('uploads/categories/' . $category->image))) {
                File::delete(public_path('uploads/categories/' . $category->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $imageName);
            $data['image'] = $imageName;
        }

        // Set status: 1 = Active, 0 = Inactive
        $data['status'] = $request->has('status') ? 1 : 0;

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    // Soft delete category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete(); // Soft deletes the category
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

    // Optional: Restore soft deleted category
    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->back()->with('success', 'Category restored successfully!');
    }

    // Optional: Permanently delete
    public function forceDelete($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        
        // Delete image file
        if ($category->image && File::exists(public_path('uploads/categories/' . $category->image))) {
            File::delete(public_path('uploads/categories/' . $category->image));
        }
        
        $category->forceDelete(); // Permanently deletes
        return redirect()->back()->with('success', 'Category permanently deleted!');
    }

    // Optional: View trashed categories
    public function trashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trashed', compact('categories'));
    }
}