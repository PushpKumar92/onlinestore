@extends('frontend.layout.main')

@section('content')

<style>
    .thankyou-wrapper {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        max-width: 800px;
        margin: 50px auto;
    }
    .success-icon {
        width: 80px;
        height: 80px;
        background: #28a745;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        animation: scaleIn 0.5s ease-in-out;
    }
    .success-icon i {
        font-size: 40px;
        color: white;
    }
    @keyframes scaleIn {
        0% { transform: scale(0); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    .order-details {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-top: 30px;
    }
    .order-items {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }
    .item-row {
        padding: 10px 0;
        border-bottom: 1px solid #dee2e6;
    }
    .item-row:last-child {
        border-bottom: none;
    }
    .btn-action {
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
    }
    .timeline {
        margin-top: 20px;
        padding-left: 20px;
    }
    .timeline-item {
        position: relative;
        padding-bottom: 15px;
        padding-left: 30px;
    }
    .timeline-item:before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #28a745;
        border: 3px solid white;
        box-shadow: 0 0 0 2px #28a745;
    }
    .timeline-item:after {
        content: '';
        position: absolute;
        left: 5px;
        top: 17px;
        width: 2px;
        height: calc(100% - 12px);
        background: #dee2e6;
    }
    .timeline-item:last-child:after {
        display: none;
    }
</style>

<div class="container py-5">
    <div class="thankyou-wrapper">
        
        <div class="text-center">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <h2 class="mb-3 text-success">Order Placed Successfully!</h2>
            <p class="lead mb-4">Thank you for your order. We've received it and will process it soon.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="order-details">
            <h5 class="mb-4 pb-3 border-bottom"><i class="fas fa-receipt me-2"></i>Order Details</h5>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="text-muted d-block">Order Number</small>
                        <strong class="fs-5 text-primary">{{ $order->order_number }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Order Date</small>
                        <strong>{{ $order->created_at->format('d M, Y h:i A') }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Order Status</small>
                        <span class="badge bg-warning text-dark fs-6">{{ ucfirst($order->status) }}</span>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="text-muted d-block">Payment Method</small>
                        <strong class="text-capitalize">
                            @if($order->payment_method == 'cod')
                                <i class="fas fa-money-bill-wave me-1"></i> Cash on Delivery
                            @else
                                <i class="fas fa-credit-card me-1"></i> Online Payment
                            @endif
                        </strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Total Amount</small>
                        <strong class="fs-4 text-success">₹{{ number_format($order->total_amount, 2) }}</strong>
                    </div>
                </div>
            </div>

            {{-- Shipping Address --}}
            <div class="mt-4 pt-3 border-top">
                <h6 class="mb-3"><i class="fas fa-shipping-fast me-2"></i>Shipping Address</h6>
                <address>
                    <strong>{{ $order->billing_name }}</strong><br>
                    {{ $order->billing_address }}<br>
                    {{ $order->billing_city }}, {{ $order->billing_zip }}<br>
                    {{ $order->billing_country }}<br>
                    <abbr title="Phone">P:</abbr> {{ $order->billing_phone }}<br>
                    <abbr title="Email">E:</abbr> {{ $order->billing_email }}
                </address>
            </div>

            {{-- Order Timeline --}}
            <div class="mt-4 pt-3 border-top">
                <h6 class="mb-3"><i class="fas fa-clock me-2"></i>Order Timeline</h6>
                <div class="timeline">
                    <div class="timeline-item">
                        <small class="text-muted">{{ $order->created_at->format('d M, Y h:i A') }}</small>
                        <p class="mb-0"><strong>Order Placed</strong></p>
                        <small>Your order has been received and is being processed</small>
                    </div>
                    <div class="timeline-item text-muted">
                        <small>Pending</small>
                        <p class="mb-0">Order Confirmed</p>
                    </div>
                    <div class="timeline-item text-muted">
                        <small>Pending</small>
                        <p class="mb-0">Shipped</p>
                    </div>
                    <div class="timeline-item text-muted">
                        <small>Pending</small>
                        <p class="mb-0">Delivered</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Order Items --}}
        @if($order->orderItems && count($order->orderItems) > 0)
        <div class="order-items">
            <h5 class="mb-3"><i class="fas fa-box me-2"></i>Ordered Items</h5>
            
            @foreach($order->orderItems as $item)
            <div class="item-row">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1">
                        <strong>{{ $item->product_name }}</strong>
                        <div class="text-muted small">
                            Quantity: {{ $item->quantity }} × ₹{{ number_format($item->price, 2) }}
                        </div>
                    </div>
                    <div class="text-end">
                        <strong class="text-primary">₹{{ number_format($item->total, 2) }}</strong>
                    </div>
                </div>
            </div>
            @endforeach
            
            <div class="mt-3 pt-3 border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <strong class="fs-5">Total</strong>
                    <strong class="fs-5 text-success">₹{{ number_format($order->total_amount, 2) }}</strong>
                </div>
            </div>
        </div>
        @endif

        {{-- Confirmation Message --}}
        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Order confirmation email sent to:</strong> {{ $order->billing_email }}
        </div>
        
        {{-- Action Buttons --}}
        <div class="text-center mt-4">
            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-primary btn-action me-2">
                <i class="fas fa-eye me-2"></i>View Order Details
            </a>
            <a href="{{ route('home') }}" class="btn btn-primary btn-action me-2">
                <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
            </a>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary btn-action">
                <i class="fas fa-list me-2"></i>My Orders
            </a>
        </div>

        {{-- Help Section --}}
        <div class="text-center mt-4 pt-4 border-top">
            <p class="text-muted mb-2">Need help with your order?</p>
            <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-headset me-1"></i>Contact Support
            </a>
        </div>
        
    </div>
</div>

@endsection