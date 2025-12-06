@extends('frontend.layout.main')

@section('content')



<div class="container py-4 mb-5">

    <div class="checkout-wrapper p-3">

        <h2 class="checkout-title text-center">Checkout</h2>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Check if cart is empty --}}
        @if(empty($cartItems) || count($cartItems) == 0)
            <div class="alert alert-warning text-center">
                <h5>Your cart is empty!</h5>
                <p>Please add items to your cart before checkout.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        @else

        <div class="row g-4">

            {{-- Billing Section --}}
            <div class="col-lg-6 col-md-12">
                <div class="p-3 bg-white rounded shadow-sm">

                    <form action="{{ route('checkout.placeOrder') }}" method="POST" id="checkoutForm">
                        @csrf

                        <h4 class="mb-3">Billing Details</h4>

                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="phone" value="{{ old('phone', $user->mobile ?? '') }}" class="form-control @error('phone') is-invalid @enderror" required pattern="[0-9]{10}" placeholder="10 digit mobile number">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', 'India') }}" required>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2 mb-3">
                                <label class="form-label">Pincode <span class="text-danger">*</span></label>
                                <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{ old('zip') }}" required pattern="[0-9]{6}" placeholder="6 digits">
                                @error('zip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Payment Method <span class="text-danger">*</span></label>
                            <select name="payment_method" class="form-control @error('payment_method') is-invalid @enderror" required>
                                <option value="">Select Payment Method</option>
                                <option value="cod" {{ old('payment_method') == 'cod' ? 'selected' : '' }}>Cash on Delivery</option>
                                <option value="online" {{ old('payment_method') == 'online' ? 'selected' : '' }}>Online Payment</option>
                            </select>
                            @error('payment_method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Hidden field for total --}}
                        @php
                            $finalTotal = 0;
                            foreach($cartItems as $item) {
                                $price = isset($item['discount_price']) && $item['discount_price'] < $item['price']
                                    ? $item['discount_price']
                                    : $item['price'];
                                $finalTotal += $price * $item['quantity'];
                            }
                        @endphp
                        <input type="hidden" name="total" value="{{ $finalTotal }}">

                        <button type="submit" class="btn-1 btn-primary w-100 py-3 mt-3" id="placeOrderBtn">
                            <span id="btnText ">Place Order</span>
                            <span id="btnSpinner" class="d-none">
                                <span class="spinner-border spinner-border-sm me-2"></span>
                                Processing...
                            </span>
                        </button>

                    </form>

                </div>
            </div>

            {{-- Cart Section --}}
            <div class="col-lg-6 col-md-12">
                <div class="p-3 bg-white rounded shadow-sm">
                    <h4 class="mb-3">Your Cart</h4>

                    <ul class="list-group listitems mb-3">
                        @php $finalTotal = 0; @endphp

                        @foreach($cartItems as $item)
                            @php
                                $price = isset($item['discount_price']) && $item['discount_price'] < $item['price']
                                    ? $item['discount_price']
                                    : $item['price'];
                                $itemTotal = $price * $item['quantity'];
                                $finalTotal += $itemTotal;
                            @endphp

                            <li class="list-group-item mb-2">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong>{{ $item['name'] }}</strong>
                                        <br>
                                        <small class="text-muted">Qty: {{ $item['quantity'] }}</small>
                                    </div>
                                    <div class="text-end">
                                        <div>₹{{ number_format($price, 2) }}</div>
                                        <strong>₹{{ number_format($itemTotal, 2) }}</strong>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                        <li class="list-group-item bg-light">
                            <div class="d-flex justify-content-between">
                                <strong>Subtotal</strong>
                                <strong>₹{{ number_format($finalTotal, 2) }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item bg-light">
                            <div class="d-flex justify-content-between">
                                <span>Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                        </li>

                        <li class="list-group-item  text-white">
                            <div class=" d-flex btn-1 justify-content-between">
                                <strong>Total Amount</strong>
                                <strong>₹{{ number_format($finalTotal, 2) }}</strong>
                            </div>
                        </li>

                    </ul>

                    <div class="alert alert-info">
                        <small><i class="fas fa-info-circle"></i> All orders are processed within 24-48 hours</small>
                    </div>
                </div>
            </div>

        </div>

        @endif

    </div>

</div>

<script>
document.getElementById('checkoutForm')?.addEventListener('submit', function() {
    const btn = document.getElementById('placeOrderBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    
    btn.disabled = true;
    btnText.classList.add('d-none');
    btnSpinner.classList.remove('d-none');
});
</script>

@endsection