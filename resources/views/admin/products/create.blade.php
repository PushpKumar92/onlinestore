@extends('admin.layout.main')
@section('content')
<h2>Add Product</h2>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success mt-3">Add Product</button>
</form>
@endsection