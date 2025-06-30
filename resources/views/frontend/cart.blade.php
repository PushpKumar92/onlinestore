@extends('frontend.layout.main')
@section('content')

<main class="main-content">

    <!-- Title Section -->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Cart</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Cart</h1>
            </div>
        </div>
    </section>

    {{-- Remove all session popups as requested --}}
    {{-- @if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif --}}

    @if(session('cart'))
    <div class="container py-5 mb-5">
        <div class="row g-4">
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $details)
            @php
            $price = $details['price'] ?? 0;
            $discount = isset($details['discount']) ? (float) $details['discount'] : 0;
            $discountedPrice = $discount > 0 ? round($price - ($price * $discount / 100), 2) : $price;
            $subtotal = $discountedPrice * $details['quantity'];
            $total += $subtotal;
            @endphp

            <div class="col-12 border rounded p-3 d-flex flex-wrap align-items-center justify-content-between gap-3"
                data-id="{{ $id }}">

                <div class="d-flex gap-3 align-items-center flex-wrap">
                    {{-- Image with fallback --}}
                    @if(!empty($details['image']) && file_exists(public_path('uploads/products/' . $details['image'])))
                    <img src="{{ asset('uploads/products/' . $details['image']) }}"
                        alt="{{ $details['name'] ?? 'Product Image' }}"
                        style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                    <img src="{{ asset('images/no-image.png') }}" alt="No Image"
                        style="width: 80px; height: 80px; object-fit: cover;">
                    @endif

                    <div>
                        <h5>{{ $details['name'] ?? 'No name available' }}</h5>
                        <p class="text-muted mb-1">{{ $details['description'] ?? 'No description' }}</p>

                        @php
                        $price = $details['original_price'];
                        $finalPrice = $details['price'];
                        $discount = $details['discount'];
                        $subtotal = $finalPrice * $details['quantity'];
                        $total += $subtotal;
                        @endphp

                        <p class="mb-0">
                            Price:
                            @if($discount > 0)
                            <span style="color:red; font-weight:bold;">₹{{ number_format($finalPrice, 2) }}</span>
                            <small><del>₹{{ number_format($price, 2) }}</del></small>
                            <span class="text-success">({{ $discount }}% OFF)</span>
                            @else
                            ₹{{ number_format($finalPrice, 2) }}
                            @endif
                        </p>
                    </div>
                </div>

                <tr class="cart-item-row" data-id="{{ $id }}">
                    <td>
                        <!-- Quantity Buttons -->
                        <div class="input-group quantity-wrapper" style="width: 130px;">
                            <button class="btn btn-outline-secondary btn-decrease" type="button"
                                data-id="{{ $id }}">−</button>
                            <span class="form-control text-center quantity-display"
                                id="quantity-{{ $id }}">{{ $details['quantity'] }}</span>
                            <button class="btn btn-outline-secondary btn-increase" type="button"
                                data-id="{{ $id }}">+</button>
                        </div>
                    </td>

                </tr>
                {{-- Subtotal and Remove --}}
                <div>
                    <p class="fw-semibold mb-1">Subtotal: <span
                            class="item-total">₹{{ number_format($subtotal, 2) }}</span></p>
                    <form method="POST" action="{{ route('cart.remove', $id) }}">
                        @csrf
                        <button class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-end mt-4">
            <h4>Total: ₹<span id="cart-total">{{ number_format($total, 2) }}</span></h4>
            <a href="{{ route('checkout') }}" class="shop-btn py-3 me-3 mt-3">Proceed to Checkout</a>
            <a href="{{ route('index') }}" class="shop-btn py-3 mt-3">Continue Shopping</a>
        </div>
    </div>
    @else
    <div class="container text-center mb-5">
        <h2 class="fs-4">🛒 Your cart is empty!</h2>
        <a href="{{ route('index') }}" class="shop-btn mt-3">Continue Shopping</a>
    </div>
    @endif


</main>
@endsection