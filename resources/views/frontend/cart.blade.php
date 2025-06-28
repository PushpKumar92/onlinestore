@extends('frontend.layout.main')
@section('content')

<main class="main-content">

    <!--------------- blog-title-section ---------------->
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
    <!--------------- blog-title-section-end ---------------->
    @if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(session('cart'))
    <div class="container my-4 mb-5">
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach(session('cart') as $id => $details)
                    @php $subtotal = $details['price'] * $details['quantity'] @endphp
                    @php $total += $subtotal @endphp
                    <tr>
                        <td>
                            <img src="{{ asset($details['image'] ?? 'uploads/products/default.jpg') }}"
                                alt="{{ $details['name'] ?? 'Product' }}" width="60" height="60"
                                class="img-thumbnail" />
                        </td>
                        <td>
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity update-cart" min="1" />
                        </td>
                        <td>₹{{ $details['price'] }}</td>
                        <td class="item-total">₹{{ $details['price'] * $details['quantity'] }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $id) }}">
                                @csrf
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end">
                <h4>Total: ₹{{ number_format($total, 2) }}</h4>
                <a href="{{ route('checkout') }}" class="btn btn-success mt-3">Proceed to Checkout</a>
            </div>
        </div>
    </div>
    @else
    <div class="container text-center my-5 mb-5">
        <p class="fs-4">🛒 Your cart is empty!</p>
        <a href="{{ route('shop') }}" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
    @endif

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.update-cart').forEach(function(input) {
            input.addEventListener('change', function() {
                const row = this.closest('tr');
                const id = row.getAttribute('data-id');
                const quantity = this.value;

                fetch("{{ route('cart.update') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            id: id,
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        row.querySelector('.item-total').textContent = '₹' + data
                        .item_total;
                        document.getElementById('cart-total').textContent = data.cart_total;
                    });
            });
        });
    });
    </script>


</main>
@endsection