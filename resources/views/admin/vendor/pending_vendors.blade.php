<h2 class="fw-bold mb-3">Pending Vendor Approvals</h2>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Vendor Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vendors as $vendor)
            <tr>
                <td>{{ $vendor->id }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->email }}</td>
                <td>
                    <form action="{{ route('admin.vendor.approve', $vendor->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No pending vendors.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>