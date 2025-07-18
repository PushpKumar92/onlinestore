@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Checkout</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   @if(!empty($cartItems) && count($cartItems) > 0)
        <p>Your cart is empty.</p>
    @else
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('checkout.placeOrder') }}" method="POST">
                    @csrf
                    <h4>Billing Details</h4>

                    <div class="mb-3">
                        <label>Name:</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Address:</label>
                        <textarea name="address" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>

            <div class="col-md-4">
                <h4>Your Cart</h4>
                <ul class="list-group mb-3">
                    @foreach($cartItems as $item)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $item['name'] }} (x{{ $item['quantity'] }})
                            <span>₹{{ $item['price'] * $item['quantity'] }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>₹{{ $total }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>
@endsection
