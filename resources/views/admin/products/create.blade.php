@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">
        {{ isset($product) ? 'Edit Product' : 'Add Product' }}
    </h2>

    <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
        method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
        @csrf
        @if(isset($product))
        @method('PUT')
        @endif

        <div class="row g-3">
            {{-- Category --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                <select name="category_id" 
                        class="form-select @error('category_id') is-invalid @enderror" 
                        required>
                    <option value="">-- Select Category --</option>
                    
                    @if($categories->isEmpty())
                        <option value="" disabled>No categories available</option>
                    @else
                        @foreach($categories as $category)
                            {{-- Show only active categories on create, show all on edit --}}
                            @if($category->status == 1 || (isset($product) && $product->category_id == $category->id))
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                    @if($category->status == 0)
                                        (Inactive)
                                    @endif
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
                @error('category_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Product Name --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Product Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name ?? '') }}" required>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- SKU Code --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">SKU Code</label>
                <input type="text" name="sku_code" class="form-control @error('sku_code') is-invalid @enderror"
                    value="{{ old('sku_code', $product->sku_code ?? '') }}">
                @error('sku_code')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Brand --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Brand</label>
                <select name="brand_id" 
                        class="form-select @error('brand_id') is-invalid @enderror">
                    <option value="">-- Select Brand --</option>
                    
                    @if($brands->isEmpty())
                        <option value="" disabled>No brand available</option>
                    @else
                        @foreach($brands as $brand)
                            {{-- Show only active brands on create, show all on edit --}}
                            @if($brand->status == 1 || (isset($product) && $product->brand_id == $brand->id))
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                    @if($brand->status == 0)
                                        (Inactive)
                                    @endif
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
                @error('brand_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Color --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Color</label>
                <input type="text" name="color" class="form-control @error('color') is-invalid @enderror"
                    value="{{ old('color', $product->color ?? '') }}" placeholder="e.g., Red, Blue, Green">
                @error('color')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Sizes --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Sizes</label>
                <input type="text" name="sizes" class="form-control @error('sizes') is-invalid @enderror"
                    value="{{ old('sizes', $product->sizes ?? '') }}" placeholder="e.g., S, M, L, XL">
                @error('sizes')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tags --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Tags</label>
                <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror"
                    value="{{ old('tags', $product->tags ?? '') }}" placeholder="e.g., trending, featured">
                @error('tags')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Price --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Price <span class="text-danger">*</span></label>
                <input type="number" name="price" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price ?? '') }}" required min="0">
                @error('price')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Discount --}}
            <div class="col-md-4">
                <label class="form-label fw-bold">Discount (%)</label>
                <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror"
                    value="{{ old('discount', $product->discount ?? '') }}" min="0" max="100" placeholder="0-100">
                @error('discount')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Quantity --}}
            <div class="col-md-6">
                <label class="form-label fw-bold">Quantity <span class="text-danger">*</span></label>
                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                    value="{{ old('quantity', $product->quantity ?? '') }}" required min="0">
                @error('quantity')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Short Description --}}
            <div class="col-md-6">
                <label class="form-label fw-bold">Short Description <span class="text-danger">*</span></label>
                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3" required>{{ old('short_description', $product->short_description ?? '') }}</textarea>
                @error('short_description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Description --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Description <span class="text-danger">*</span></label>
                <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                    required>{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Image --}}
            <div class="col-md-12">
                <label class="form-label fw-bold">Product Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/webp,image/jpeg,image/png,image/jpg">
                @error('image')
                <small class="text-danger">{{ $message }}</small>
                @enderror

                @if(isset($product) && $product->image)
                <div class="mt-3">
                    <label class="form-label">Current Image:</label>
                    <img src="{{ asset('uploads/products/' . $product->image) }}" width="120"
                        class="img-thumbnail rounded d-block">
                </div>
                @endif
            </div>

            {{-- Status --}}
            <div class="col-md-6 d-flex align-items-center mt-2">
                <div class="form-switch switch-primary d-flex align-items-center gap-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="switch1" name="status" value="1"
                        {{ old('status', $product->status ?? 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                        for="switch1">Status</label>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-1">
                {{ isset($product) ? 'Update Product' : 'Save Product' }}
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                Back to List
            </a>
        </div>
    </form>
</div>
@endsection