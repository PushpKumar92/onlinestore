@extends('frontend.layout.main')
@section('content')

<main class="main-content">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span> //
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
            @foreach(session('cart') as $id => $details)
            @php
            $original = $details['price'];
            $discount = isset($details['discount']) ? (float)$details['discount'] : 0;
            $final = $discount > 0 ? round($original - ($original * $discount / 100), 2) : $original;
            $subtotal = $final * $details['quantity'];
            $total += $subtotal;
            @endphp

            <div class="col-12 border rounded p-3 d-flex justify-content-between align-items-center flex-wrap gap-3"
                data-id="{{ $id }}">
                <div class="d-flex gap-3 align-items-center">
                    @if(!empty($details['image']) && file_exists(public_path('uploads/products/' . $details['image'])))
                    <img src="{{ asset('uploads/products/' . $details['image']) }}"
                        style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                    <img src="{{ asset('images/no-image.png') }}" style="width: 80px; height: 80px; object-fit: cover;">
                    @endif

                    <div>
                        <h5>{{ $details['name'] ?? 'No name' }}</h5>
                        <p>{{ $details['description'] ?? 'No description' }}</p>
                        <p>
                            Price:
                            @if($discount > 0)
                            <span style="color:red;">₹{{ number_format($final, 2) }}</span>
                            <small><del>₹{{ number_format($original, 2) }}</del></small>
                            <span class="text-success">({{ $discount }}% OFF)</span>
                            @else
                            ₹{{ number_format($original, 2) }}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center flex-wrap gap-4 justify-content-center text-center">
                    <div>
                        <div class="input-group mx-5" style="width: 120px;">
                            <button class="btn btn-outline-secondary btn-decrease" type="button"
                                data-id="{{ $id }}">−</button>
                            <span class="form-control text-center quantity-display"
                                id="quantity-{{ $id }}">{{ $details['quantity'] }}</span>
                            <button class="btn btn-outline-secondary btn-increase" type="button"
                                data-id="{{ $id }}">+</button>
                        </div>
                    </div>

                    <div>
                        <p>Subtotal: <span class="item-total"
                                id="item-total-{{ $id }}">₹{{ number_format($subtotal, 2) }}</span></p>
                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-end mt-4">
            <h4>Total: ₹<span id="cart-total">{{ number_format($total, 2) }}</span></h4>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary">
                Proceed to Checkout
            </a>
            <a href="{{ route('index') }}" class="shop-btn  mt-3">Continue Shopping</a>
        </div>
    </div>
    @else
    <div class="container text-center mb-5">
        <h2>🛒 Your cart is empty!</h2>
        <a href="{{ route('index') }}" class="shop-btn mt-3">Continue Shopping</a>
    </div>
    @endif
</main>
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
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    id: id,
                    quantity: quantity
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.item_total !== undefined && data.cart_total !== undefined) {
                    document.getElementById(`item-total-${id}`).innerText =
                        `₹${data.item_total.toFixed(2)}`;
                    document.getElementById('cart-total').innerText = data.cart_total.toFixed(2);
                }
            });
    });
});
</script>
@endsection