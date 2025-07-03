@extends('admin.layout.main')
@section('content')
<h2>Edit Product</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Name -->
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>

    <!-- Description -->
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label>Price</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">
    </div>

    <!-- Discount -->
    <div class="form-group">
        <label>Discount (%)</label>
        <input type="text" name="discount" class="form-control" value="{{ $product->discount }}">
    </div>

    <!-- Quantity -->
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
    </div>

    <!-- Image -->
    <div class="form-group">
        <label>Image</label><br>
        @if($product->image)
        <img src="{{ asset('uploads/products/' . $product->image) }}" width="80"><br><br>
        @endif
        <input type="file" name="image" class="form-control">
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-success mt-3 mb-3">Update Product</button>
</form>
@endsection