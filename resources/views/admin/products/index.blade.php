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
                @forelse($allProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if ($product->added_by_role == 'vendor')
                        {{ $product->vendor->name ?? 'Unknown Vendor' }}
                        @elseif ($product->added_by_role == 'admin')
                        {{ $product->admin->name ?? 'Admin' }}
                        @else
                        Unknown
                        @endif
                    </td> {{-- Assumes vendor relationship --}}
                    <td>{{ $product->name }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
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
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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