<h2>Pending Vendors</h2>
@foreach($vendors as $vendor)
    <div>
        <p>{{ $vendor->name }} ({{ $vendor->email }})</p>
        <form method="POST" action="{{ route('admin.vendor.approve', $vendor->id) }}">
            @csrf
            <button type="submit">Approve</button>
        </form>
    </div>
@endforeach
