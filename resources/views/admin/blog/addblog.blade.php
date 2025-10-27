@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add Blog</h2>

    <form 
        action="{{ route('blogs.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
        class="p-4 border rounded shadow-sm bg-white"
    >
        @csrf

        <div class="row g-3">
            {{-- Title --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Blog Title</label>
                <input type="text" name="title" 
                       class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title') }}" 
                       required>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Content --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Content</label>
                <textarea name="content" rows="6" 
                          class="form-control @error('content') is-invalid @enderror" 
                          required>{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Image --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Blog Image</label>
                <input type="file" name="image" 
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Meta Title --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Meta Title (SEO)</label>
                <input type="text" name="meta_title" 
                       class="form-control @error('meta_title') is-invalid @enderror" 
                       value="{{ old('meta_title') }}">
                @error('meta_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Meta Description --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Meta Description (SEO)</label>
                <textarea name="meta_description" rows="3" 
                          class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Meta Tags --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Meta Tags (SEO)</label>
                <input type="text" name="meta_tags" 
                       class="form-control @error('meta_tags') is-invalid @enderror" 
                       value="{{ old('meta_tags') }}"
                       placeholder="keyword1, keyword2, keyword3">
                @error('meta_tags')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Status Toggle --}}
            <div class="col-md-6 d-flex align-items-center mt-3">
                <div class="form-switch switch-primary d-flex align-items-center gap-3">
                    <input class="form-check-input" type="checkbox" role="switch" 
                           id="statusSwitch" name="status" value="1" checked>
                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" 
                           for="statusSwitch">Active Status</label>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-1">Save Blog</button>
            <a href="{{ route('blogs.list') }}" class="btn btn-1">Cancel</a>
        </div>
    </form>
</div>
@endsection