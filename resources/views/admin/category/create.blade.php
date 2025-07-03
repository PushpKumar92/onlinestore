@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2>Add New Category</h2>
    <a href="{{ route('category.index') }}" class="btn btn-secondary">← Back to Categories</a>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection