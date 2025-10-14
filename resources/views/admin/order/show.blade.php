@extends('frontend.layout.main')

@section('content')
<div class="container mt-4">
    <h4>Order Details — {{ $order->order_number }}</h4>
    <hr>
    <p><strong>Total Amount:</strong> ₹{{ $order->total_amount }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Payment:</strong> {{ $order->payment_method }}</p>
    <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
</div>
@endsection
