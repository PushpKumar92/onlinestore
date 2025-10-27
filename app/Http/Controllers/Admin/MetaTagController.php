<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MetaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class MetaTagController extends Controller
{
    public function index()
    {
        $metaTags = MetaTag::latest()->get();
        return view('admin.meta_tag.index', compact('metaTags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255|unique:meta_tags,page_name',
            'meta_title' => 'required|string|max:255',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $meta = MetaTag::create($validated);

        return redirect()->back()->with('success', 'Meta Tag added successfully!');
    }

    public function edit($id)
    {
        $meta = MetaTag::find($id);

        if (! $meta) {
            return response()->json(['success' => false, 'message' => 'Meta tag not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $meta]);
    }

    public function update(Request $request, $id)
    {
        $meta = MetaTag::findOrFail($id);

        $validated = $request->validate([
            'page_name' => 'required|string|max:255|unique:meta_tags,page_name,' . $meta->id,
            'meta_title' => 'required|string|max:255',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $meta->update($validated);

       return redirect()->back()->with('success', 'Meta Tag updated successfully!');
    }

    public function destroy($id)
    {
        $meta = MetaTag::find($id);
        if (! $meta) {
            return response()->json(['success' => false, 'message' => 'Not found'], 404);
        }
        $meta->delete();

        return redirect()->back()->with('success', 'Meta Tag deleted successfully!');
    }
}
