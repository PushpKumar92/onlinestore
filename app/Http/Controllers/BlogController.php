<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::latest()->get();
        return view('blog', compact('blogs'));
    }
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.list', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.addblog');
    }

  public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_tags' => 'nullable|string|max:255',

    ]);

    $data = $request->only([
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_tags',
   
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/blogs'), $imageName);
        $data['image'] = 'uploads/blogs/' . $imageName;
    }

    Blog::create($data);

    return redirect()->route('blogs.list')->with('success', 'Blog created successfully!');
}

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_tags' => 'nullable|string|max:255',
        'status' => 'required|in:0,1',
    ]);

    $data = $request->only([
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_tags',
        'status'
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/blogs'), $imageName);
        $data['image'] = 'uploads/blogs/' . $imageName;

        // Optionally delete the old image if needed:
        // if (file_exists(public_path($blog->image))) {
        //     unlink(public_path($blog->image));
        // }
    }

    $blog->update($data);

    return redirect()->route('blogs.list')->with('success', 'Blog updated successfully!');
}


    public function destroy(Blog $blog)
    {
        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
    public function blog_details(){
         $blogs = Blog::latest()->get();
        return view('blog-detail', compact('blogs'));
    }
  
}