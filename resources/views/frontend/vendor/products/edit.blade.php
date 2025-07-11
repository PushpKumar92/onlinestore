@extends('frontend.vendor.layout.main')
@section('content')
<h2>Edit Product (Vendor)</h2>
<form action="{{ route('vendor.products.update') }}" method="POST" enctype="multipart/form-data"
    class="p-4 border rounded shadow-sm bg-white">
    @csrf
    @if(isset($product)) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if(isset($product) && $product->category_id == $category->id)
                selected
                @endif>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4"
            required>{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Discount</label>
        <input type="text" name="discount" class="form-control" value="{{ old('discount', $product->discount ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control"
            value="{{ old('quantity', $product->quantity ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
        @if(isset($product) && $product->image)
        <div class="mt-2">
            <img src="{{ asset('uploads/products/' . $product->image) }}" width="80" class="img-thumbnail">
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary mb-2">Save</button>
</form>
@endsection