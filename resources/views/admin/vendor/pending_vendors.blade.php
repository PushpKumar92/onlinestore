<h2>Pending Vendor Approvals</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendors as $vendor)
        <tr>
            <td>{{ $vendor->name }}</td>
            <td>{{ $vendor->email }}</td>
            <td>
                <form action="{{ route('admin.vendor.approve', $vendor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Approve</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>