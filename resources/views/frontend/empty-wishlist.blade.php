@extends('frontend.layout.main')
@section('content')
<main class="main-content"> 
    <!--------------- wishlist-section---------------->
    <section class="blog about-blog footer-padding">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Wishlist</a></span>
            </div>
            <div class="blog-item" data-aos="fade-up">
                <div class="cart-img">
                  <img src="{{ asset('assets/images/homepage-one/empty-wishlist.webp') }}" alt="img">
                </div>
                <div class="cart-content">
                    <p class="content-title">Empty! You don’t Cart any Products </p>
                    <a href="{{ route('productall')}}" class="shop-btn">Back to Shop</a>
                </div>
            </div>
        </div>
    </section>
    <!--------------- wishlist-section-end---------------->

</main>
@endsection