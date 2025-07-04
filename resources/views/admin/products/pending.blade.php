@extends('admin.layout.main') {{-- Adjust layout path as needed --}}

@section('content')
<h2>Pending Vendor Products</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Vendor</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pendingProducts as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->vendor->name ?? 'N/A' }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td><span class="badge bg-warning text-dark">Pending</span></td>
            <td>
                <form action="{{ route('products.approve', $product->id) }}" method="POST">
                    @csrf
                    <!-- REMOVE: @method('PUT') -->
                    <button type="submit">Approve</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">No pending products</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection