@extends('admin.layout.main')
@section('content')
<h2>Edit Product</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control">

        @if($product->image)
        <br>
        <img src="{{ asset('uploads/products/' . $product->image) }}" width="100" alt="Current Image">
        @endif
    </div>
    <button type="submit" class="btn btn-primary mt-3 mb-3">Update Product</button>
</form>
@endsection