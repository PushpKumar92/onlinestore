@extends('admin.layout.main')
@section('content')
<h2>Add Product</h2>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Name -->
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <!-- Description -->
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <!-- Discount -->
    <div class="form-group">
        <label>Discount (%)</label>
        <input type="text" name="discount" class="form-control" placeholder="Enter discount e.g. 10%">
    </div>

    <!-- Quantity -->
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>

    <!-- Image -->
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-warning mt-3 mb-3 ">Add Product</button>
</form>
@endsection