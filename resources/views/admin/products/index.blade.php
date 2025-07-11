@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-3">Admin Products</h2>

    <div class="mb-3 text-end">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->vendor->name ?? 'Admin' }}</td> {{-- Assumes vendor relationship --}}
                    <td>{{ $product->name }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td>
                        <span class="badge bg-{{ $product->status == 'approved' ? 'success' : 'warning' }}">
                            {{ ucfirst($product->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection