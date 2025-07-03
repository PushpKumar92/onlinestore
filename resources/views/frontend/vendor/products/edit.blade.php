@extends('frontend.vendor.layout.main')

@section('content')
<h2>Edit Product</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Category -->
    <div class="form-group">
        <label>Select Category</label>
        <select name="category_id" class="form-control" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Name -->
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Description -->
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Price -->
    <div class="form-group">
        <label>Price</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">
        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Discount -->
    <div class="form-group">
        <label>Discount (%)</label>
        <input type="text" name="discount" class="form-control" value="{{ $product->discount }}">
        @error('discount') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Quantity -->
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
        @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Image -->
    <div class="form-group">
        <label>Image</label><br>
        @if($product->image)
        <img src="{{ asset('uploads/products/' . $product->image) }}" width="80"><br><br>
        @endif
        <input type="file" name="image" class="form-control">
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-success mt-3 mb-3">Update Product</button>
</form>
@endsection