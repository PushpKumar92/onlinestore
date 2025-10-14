@extends('frontend.layout.main')

@section('content')
<div class="container mt-4">
    <h4>Your Orders</h4>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Order No</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>₹{{ $order->total_amount }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'Cancelled' ? 'danger' : ($order->status == 'Delivered' ? 'success' : 'secondary') }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>

                        @if ($order->status == 'Pending')
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
