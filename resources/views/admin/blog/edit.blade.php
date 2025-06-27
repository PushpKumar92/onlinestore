@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Blog</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" rows="6" class="form-control"
                required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Current Image</label><br>
            @if($blog->image)
            <img src="{{ asset($blog->image) }}" width="150">
            @else
            <p>No image</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control"
                value="{{ old('meta_title', $blog->meta_title) }}">
        </div>

        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" rows="3"
                class="form-control">{{ old('meta_description', $blog->meta_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="meta_tags" class="form-label">Meta Tags (comma separated)</label>
            <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags', $blog->meta_tags) }}">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update Blog</button>
        <a href="{{ route('blogs.list') }}" class="btn btn-secondary mb-3">Back</a>
    </form>
</div>
@endsection