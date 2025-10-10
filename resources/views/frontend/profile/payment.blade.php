@extends('frontend.layout.main')

@section('content')
<div class="container my-5">
    <h3>Order Payment</h3>
    <p>Order #: <strong>{{ $order->order_number }}</strong></p>
    <p>Total Amount: ₹{{ number_format($order->total_amount, 2) }}</p>
    <p>Payment Method: {{ ucfirst($order->payment_method) }}</p>

    <form method="POST" action="{{ route('payment.process', $order->id) }}">
        @csrf
        <button type="submit" class="btn btn-success">Pay Now</button>
    </form>
</div>
@endsection
