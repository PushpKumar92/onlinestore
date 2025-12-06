@extends('frontend.layout.main')
@section('content')

<main class="main-content">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Breadcrumb Section -->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index') }}">Home</a></span> //
                <span style="font-size:16px;">Cart</span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Cart</h1>
            </div>
        </div>
    </section>

    @if(session('cart'))
    <div class="container py-5 mb-5">
        <div class="row g-4">
            @php $total = 0; @endphp

            <div class="col-lg-6">
                @foreach(session('cart') as $id => $details)
                @php
                $original = $details['price'];
                $discount = isset($details['discount']) ? (float)$details['discount'] : 0;
                $final = $discount > 0 ? round($original - ($original * $discount / 100), 2) : $original;
                $subtotal = $final * $details['quantity'];
                $total += $subtotal;
                @endphp

                <div class="border rounded p-3 mb-3 d-flex gap-3 flex-wrap align-items-center" data-id="{{ $id }}">
                    <div class="flex-shrink-0">
                        @if(!empty($details['image']) && file_exists(public_path('uploads/products/' .
                        $details['image'])))
                        <img src="{{ asset('uploads/products/' . $details['image']) }}"
                            style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                        <img src="{{ asset('images/no-image.png') }}"
                            style="width: 200px; height: 200px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <h5>{{ $details['name'] ?? 'No name' }}</h5>
                        <p>{{ $details['description'] ?? 'No description' }}</p>
                        <p>
                            Price:
                            @if($discount > 0)
                            <span class="text-danger">₹{{ number_format($final, 2) }}</span>
                            <small><del>₹{{ number_format($original, 2) }}</del></small>
                            <span class="text-success">({{ $discount }}% OFF)</span>
                            @else
                            ₹{{ number_format($original, 2) }}
                            @endif
                        </p>

                        <!-- Quantity Selector -->
                        <div class="d-flex align-items-center gap-2 mt-2" >
                            <button class="btn btn-outline-secondary btn-decrease" type="button"
                                data-id="{{ $id }}">−</button>
                            <span class="text-center form-control quantity-display w-50" 
                                id="quantity-{{ $id }}">{{ $details['quantity'] }}</span>
                            <button class="btn btn-outline-secondary btn-increase" type="button"
                                data-id="{{ $id }}">+</button>
                        </div>

                        <p class="mt-2">Subtotal: <span class="item-total"
                                id="item-total-{{ $id }}">₹{{ number_format($subtotal, 2) }}</span></p>

                        <!-- Remove Button -->
                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            <button class="btn-1 btn-sm">Empty Cart</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Right Column: Cart Total & Checkout -->
            <div class="col-lg-5">
                <div class="border rounded p-4 bg-light">
                    <h4>Cart Summary</h4>
                    <hr>
                    <p>Total: <span id="cart-total">₹{{ number_format($total, 2) }}</span></p>

                    <div class="d-flex flex-column gap-3 mt-3">
                        @if($total > 0)
                        @if(Auth::guard('user')->check())
                        {{-- ✅ User logged in → Go to checkout --}}
                        <a href="{{ route('checkout.index') }}" class="btn-1 text-center btn-primary">
                            Proceed to Checkout
                        </a>
                        @else
                        {{-- 🚪 Not logged in → Go to login --}}
                        <a href="{{ route('login') }}" class="btn-1 text-center btn-warning">
                            Login to Checkout
                        </a>
                        @endif
                        @endif

                        {{-- 🛍 Continue shopping always visible --}}
                        <!-- <a href="{{ route('index') }}" class="btn-1 text-center btn-outline-secondary">
                            Continue Shopping
                        </a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    @else
    <!-- Empty Cart Message -->
    <div class="container text-center my-5 mb-5">
        <h2>🛒 Your cart is empty!</h2>
        <a href="{{ route('index') }}" class="btn btn-1 mt-3 mb-5">Continue Shopping
             <span>
                                        <i class="fa-solid fa-greater-than"></i>

                                    </span>
        </a>
    </div>
    @endif
</main>

<!-- Cart Quantity Update Script -->
<script>
document.querySelectorAll('.btn-increase, .btn-decrease').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const quantitySpan = document.getElementById(`quantity-${id}`);
        let quantity = parseInt(quantitySpan.innerText);

        if (this.classList.contains('btn-increase')) {
            quantity++;
        } else if (this.classList.contains('btn-decrease') && quantity > 1) {
            quantity--;
        }

        quantitySpan.innerText = quantity;

        fetch("{{ route('cart.update') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                id: id,
                quantity: quantity
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.item_total !== undefined && data.cart_total !== undefined) {
                // ✅ Update subtotal for item
                const itemTotalElem = document.getElementById(`item-total-${id}`);
                itemTotalElem.innerText = `₹${data.item_total.toFixed(2)}`;

                // ✅ Update overall total
                const cartTotalElem = document.getElementById('cart-total');
                cartTotalElem.innerText = `₹${data.cart_total.toFixed(2)}`;
            }
        })
        .catch(err => console.error('Cart update error:', err));
    });
});
</script>

@endsection