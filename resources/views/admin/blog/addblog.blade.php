@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2>Create Blog</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" rows="6" class="form-control" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Blog Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
        </div>

        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="meta_tags" class="form-label">Meta Tags (comma separated)</label>
            <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags') }}">
        </div>
        <button type="submit" class="btn btn-success mb-3">Create Blog</button>
        <a href="{{ route('blogs.list') }}" class="btn btn-secondary mb-3">Back</a>
    </form>
</div>
@endsection