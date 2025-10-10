@extends('frontend.layout.main')

@section('content')
<div class="container mb-5 py-4">
    <h2>Checkout</h2>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf
                <h4>Billing Details</h4>

                

                <div class="mb-3">
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Mobile:</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->mobile ?? '') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Pincode</label>
                        <input type="text" name="zip" class="form-control" value="{{ old('zip') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Payment Method</label>
                    <select name="payment_method" class="form-control" required>
                        <option value="">Select</option>
                        <option value="cod">Cash on Delivery</option>
                        <option value="online">Online Payment</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-5">Place Order</button>
            </form>

        </div>

        <div class="col-md-6">
            <h4>Your Cart</h4>
            <ul class="list-group mb-3">
                @php $finalTotal = 0; @endphp
                @foreach($cartItems as $item)
                @php
                $price = isset($item['discount_price']) && $item['discount_price'] < $item['price']
                    ? $item['discount_price']
                    : $item['price'];
                    $itemTotal=$price * $item['quantity'];
                    $finalTotal +=$itemTotal;
                    @endphp

                    <li class="list-group-item d-flex justify-content-between flex-column align-items-start">
                    <div>
                        <strong>{{ $item['name'] }}</strong> (x{{ $item['quantity'] }})
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <div>
                            <span>₹{{ number_format($price, 2) }}</span>
                        </div>
                        <div>
                            <strong>₹{{ number_format($itemTotal, 2) }}</strong>
                        </div>
                    </div>
                    </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>₹{{ number_format($finalTotal, 2) }}</strong>
                    </li>
            </ul>
        </div>
    </div>
</div>
@endsection