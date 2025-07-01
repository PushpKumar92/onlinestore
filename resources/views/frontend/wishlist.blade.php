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

    <div class="container mt-5" style="margin-bottom:80px">
        <h2>Your Watchlist</h2>
        <div class="row">
            @forelse($wishlistItems as $item)
            @php
            $product = isset($item->product) ? $item->product : $item; // support both logged-in and guest
            @endphp
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p>Price: ₹{{ $product->price }}</p>
                        <a href="{{ route('watchlist.remove', $product->id) }}" class="btn btn-danger btn-sm">Remove</a>
                    </div>
                </div>
            </div>
            @empty
            <p>No items in your watchlist.</p>
            @endforelse
        </div>

    </div>


    <!--------------- wishlist-end---------------->
</main>
@endsection