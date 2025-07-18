@extends('frontend.layout.main')
@section('content')
<main class="main-content">

    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Wishlist</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Wishlist</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- wishlist-section---------------->

    <div class="container py-5 mb-5">
        <h2>Your Wishlist</h2>
        <div class="row">
            @forelse ($wishlists as $item)
            @php
            $product = Auth::check() ? $item->product : $item;
            @endphp

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">₹{{ number_format($product->price, 2) }}</p>
                        <form method="POST" action="{{ route('wishlist.remove', $product->id) }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <p>No items in wishlist</p>
            @endforelse
        </div>
    </div>

    <script>
    function addToWishlist(productId) {
        fetch("{{ route('wishlist.add') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_id: productId
                })
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                updateWishlistCount();
            });
    }

    function updateWishlistCount() {
        fetch("{{ route('wishlist.count') }}")
            .then(res => res.json())
            .then(data => {
                document.getElementById('wishlist-count').innerText = data.count;
            });
    }

    document.addEventListener('DOMContentLoaded', updateWishlistCount);
    </script>
    @endsection