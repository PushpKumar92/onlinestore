<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    // Show active blogs on frontend
    public function blogPage()
    {
            $categories = Category::all();
        $blogs = Blog::where('status', 1)->latest()->take(9)->get();
        return view('frontend.blog', compact('blogs','categories'));
    }

    // Admin: list all non-deleted blogs
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
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? 1 : 0;

        Blog::create($data);

        $message = $data['status'] == 1 ? 'Blog created and activated!' : 'Blog created as inactive!';
        return redirect()->route('blogs.list')->with('success', $message);
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
        ]);

        $data = $request->only([
            'title',
            'content',
            'meta_title',
            'meta_description',
            'meta_tags',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image && File::exists(public_path('uploads/blogs/' . $blog->image))) {
                File::delete(public_path('uploads/blogs/' . $blog->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? 1 : 0;

        $blog->update($data);

        $message = $data['status'] == 1 ? 'Blog updated and activated!' : 'Blog updated and set to inactive!';
        return redirect()->route('blogs.list')->with('success', $message);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }

    // Show single blog with related posts and sidebar data
    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 1)->first();

        if (!$blog) {
            return redirect()->route('blog.page')->with('error', 'Blog not found.');
        }

        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        $latestBlogs = Blog::where('status', 1)->latest()->take(5)->get(); // Sidebar latest posts
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get(); // Sidebar categories

        return view('frontend.blog-details', compact('blog', 'relatedBlogs', 'latestBlogs', 'categories'));
    }

    // Show blogs by category
    public function categoryBlogs($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $blogs = Blog::where('category_id', $category->id)->where('status', 1)->latest()->paginate(9);
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        $latestBlogs = Blog::where('status', 1)->latest()->take(5)->get();

        return view('frontend.blog-category', compact('category', 'blogs', 'categories', 'latestBlogs'));
    }
}
