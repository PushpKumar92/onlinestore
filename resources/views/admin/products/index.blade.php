@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-3">Admin Products</h2>

    {{-- Header with Buttons --}}
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h4 class="mb-0">All Products</h4>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>
            <a href="{{ route('products.export') }}" class="btn btn-success">📤 Export Products</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                📥 Import Products
            </button>
        </div>
    </div>

    {{-- Import Modal --}}
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Import Products</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose Excel/CSV File</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Products Table --}}
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Dicounted Price</th>
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
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                   <td>{{ number_format($product->discount, 2) }}%</td>
                    <td>
                        <span class="badge {{ $product->status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <td class="d-flex gap-1">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
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

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3 mx-2">
        {{ $allProducts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection