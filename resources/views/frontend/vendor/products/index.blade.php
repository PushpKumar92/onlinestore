@extends('admin.layout.main')
@section('content')
<h2>Product List</h2>
<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Discount</th> <!-- New Discount Column -->
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>
                @if($product->image)
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" width="60"
                    height="60" style="object-fit: cover;">
                @else
                <span>No Image</span>
                @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount ?? '0%' }}</td> <!-- Display Discount -->
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                    style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection