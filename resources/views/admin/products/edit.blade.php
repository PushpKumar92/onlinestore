@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">{{ isset($product) ? 'Edit Product' : 'Add Product' }} (Admin)</h2>

    <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
        method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
        @csrf
        @if(isset($product))
        @method('PUT')
        @endif

        <div class="row g-3">
            {{-- Category --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Category</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Name --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}"
                    required>
            </div>

            {{-- SKU Code --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">SKU Code</label>
                <input type="text" name="sku_code" class="form-control"
                    value="{{ old('sku_code', $product->sku_code ?? '') }}">
            </div>

            {{-- Price --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Price</label>
                <input type="number" name="price" step="0.01" class="form-control"
                    value="{{ old('price', $product->price ?? '') }}" required>
            </div>

            {{-- Discount --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Discount (%)</label>
                <input type="number" name="discount" class="form-control"
                    value="{{ old('discount', $product->discount ?? '') }}">
            </div>

            {{-- Quantity --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Quantity</label>
                <input type="number" name="quantity" class="form-control"
                    value="{{ old('quantity', $product->quantity ?? '') }}" required>
            </div>

            {{-- Brand --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand ?? '') }}">
            </div>

            {{-- Color --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Color</label>
                <input type="text" name="color" class="form-control" value="{{ old('color', $product->color ?? '') }}">
            </div>

            {{-- Sizes --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Sizes</label>
                <input type="text" name="sizes" class="form-control" value="{{ old('sizes', $product->sizes ?? '') }}">
            </div>

            {{-- Description --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" rows="4" class="form-control"
                    required>{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            {{-- Image --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Product Image</label>
                <input type="file" name="image" class="form-control">
                @if(isset($product) && $product->image)
                <div class="mt-2">
                    <img src="{{ asset('uploads/products/' . $product->image) }}" width="100" class="img-thumbnail">
                </div>
                @endif
            </div>
            <div class="col-md-6 d-flex align-items-center mt-2">
                <div class="form-switch switch-primary d-flex align-items-center gap-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="switch1" name="status" value="1"
                        {{ $product->status ? 'checked' : '' }}>
                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                        for="switch1">Active</label>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                {{ isset($product) ? 'Update Product' : 'Save Product' }}
            </button>
        </div>
    </form>
</div>
@endsection