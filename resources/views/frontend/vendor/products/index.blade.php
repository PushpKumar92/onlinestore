@extends('frontend.vendor.layout.main')
@section('content')
<h2>Vendor Products</h2>
<a href="{{ route('vendor.products.create') }}" class="btn btn-success mb-2">Add Product</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>
                @if($product->image)
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" width="60"
                    height="60" style="object-fit: cover;">
                @else
                <span>No Image</span>
                @endif
            </td>

            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount ?? '0%' }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
            <td>
    @if ($product->status == 'approved')
        <span class="badge bg-success">Approved</span>
    @elseif ($product->status == 'pending')
        <span class="badge bg-warning text-dark">Pending</span>
    @elseif ($product->status == 'declined')
        <span class="badge bg-danger">Declined</span>
    @else
        <span class="badge bg-secondary">{{ ucfirst($product->status) }}</span>
    @endif
</td>
            <td>
                <a href="{{ route('vendor.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                 <form action="{{ route('vendor.products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
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