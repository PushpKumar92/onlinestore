@extends('layouts.admin') {{-- Replace with your admin layout if different --}}

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
