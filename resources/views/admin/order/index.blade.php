@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <h4>All Orders</h4>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Order No</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>₹{{ $order->total_amount }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            <select name="status" class="form-select form-select-sm">
                                @foreach(['Pending','Processing','Shipped','Delivered','Cancelled'] as $status)
                                    <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
