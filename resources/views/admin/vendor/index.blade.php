@extends('admin.layout.main') {{-- Replace with your admin layout if different --}}

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Vendor Approval Panel</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Vendor Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Profile_image</th>
                <th>Status</th>
                <th>Registered On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vendors as $vendor)
            <tr>
                <td>{{ $vendor->id }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->email }}</td>
                <td>{{ $vendor->mobile }}</td>
                <td>{{ $vendor->address }}</td>
                <td>
                    @if($vendor->profile_image)
                    <img src="{{ asset('vendor/' . $vendor->profile_image) }}" alt="{{ $vendor->name }}" width="60"
                        height="60" style="object-fit: cover; border-radius: 50%;">
                    @else
                    <span>No Image</span>
                    @endif
                </td>
                <td>
                    @if($vendor->is_approved)
                    <span class="badge bg-success">Approved</span>
                    @else
                    <span class="badge bg-warning">Pending</span>
                    @endif
                </td>
                <td>{{ $vendor->created_at->format('d M, Y') }}</td>
                <td>
                    @if(!$vendor->is_approved)
                    <form action="{{ route('admin.vendor.approve', $vendor->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.vendor.decline', $vendor->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                    </form>
                    @else
                    <span class="text-muted">—</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No vendors found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection