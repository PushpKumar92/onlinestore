@extends('frontend.layout.main')
@section('content')

<main class="main-content">
    <!--------------- hero-section --------------->

    <section id="hero" class="hero">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper hero-wrapper">
                <div class="swiper-slide hero-slider-one">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">UP TO <span class="wrapper-inner-title">70%</span> OFF
                                    </h5>
                                    <h1 class="wrapper-details">Fashion Collection
                                        Summer Sale</h1>
                                    <a href="{{ route('product.sidebar')}}" class="shop-btn">Shop Now
                                        <span>
                                            <i class="fa-solid fa-greater-than"></i>

                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide hero-slider-two">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">UP TO <span class="wrapper-inner-title">70%</span> OFF
                                    </h5>
                                    <h1 class="wrapper-details">Fashion Collection
                                        Summer Sale</h1>
                                    <a href="#" class="shop-btn">Shop Now
                                        <span>
                                            <i class="fa-solid fa-greater-than"></i>

                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide hero-slider-three">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">UP TO <span class="wrapper-inner-title">70%</span> OFF
                                    </h5>
                                    <h1 class="wrapper-details">Fashion Collection
                                        Summer Sale</h1>
                                    <a href="#" class="shop-btn">Shop Now
                                        <span>
                                            <i class="fa-solid fa-greater-than"></i>

                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!--------------- hero-section-end --------------->

    <!--------------- style-section --------------->
    <section class="product fashion-style">
        <div class="container">
            <div class="style-section">
                <div class="row gy-4 gx-5 gy-lg-0">
                    <div class="col-lg-6">
                        <div class="product-wrapper wrapper-one" data-aos="fade-right">
                            <div class="wrapper-info">
                                <span class="wrapper-subtitle">NEW STYLE</span>
                                <h4 class="wrapper-details">Get 65% Offer
                                    <span class="wrapper-inner-title">& Make New</span> Fusion.
                                </h4>
                                <a href="{{ route('product.sidebar')}}" class="shop-btn">Shop Now
                                    <span>
                                        <i class="fa-solid fa-greater-than"></i>

                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-wrapper wrapper-two" data-aos="fade-up">
                            <div class="wrapper-info">
                                <span class="wrapper-subtitle">Mega OFFER</span>
                                <h4 class="wrapper-details">
                                    Make your New
                                    <span class="wrapper-inner-title">Styles with Our</span>
                                    Products
                                </h4>
                                <a href="{{ route('product.sidebar')}}" class="shop-btn">Shop Now
                                    <span>
                                        <i class="fa-solid fa-greater-than"></i>

                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- style-section-end --------------->

    <!--------------- category-section--------------->
    <section class="product-category ">
        <div class="container">
            <div class="section-title">
                <h5>Our Categories</h5>
                <a href="{{ route('product.sidebar')}}" class="view">View All</a>
            </div>
            <div class="category-section">
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/dresses.webp') }}" alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Dresses</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="200">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/bags.webp') }}" alt="bags">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Leather Bags</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="300">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/sweaters.webp') }}" alt="sweaters">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Sweaters</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="400">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/shoes.webp') }}" alt="shoes">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Boots</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="500">
                    <div class="wrapper-img">
                        <img src="./assets/images/homepage-one/category-img/gift.webp" alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Gift for Him</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="600">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/sneakers.webp') }}" alt="sneakers">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Sneakers</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/watch.webp') }}" alt="watch">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Watch</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="200">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/ring.webp') }}" alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Gold Rings</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="300">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/cap.webp') }}" alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Cap</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="400">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/glass.webp') }}" alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Sunglass</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="500">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/baby.webp') }}" alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Baby Shop</a>
                    </div>
                </div>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="200">
                    <div class="wrapper-img">
                        <img src="{{ asset('assets/images/homepage-one/category-img/bags.webp') }}" alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product.sidebar')}}" class="wrapper-details">Leather Bags</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- category-section-end--------------->

    <!--------------- arrival-section--------------->
    <section class="product arrival">
        <div class="container">
            <div class="section-title d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">NEW ARRIVALS</h5>
                <a href="{{ route('product.sidebar') }}" class="view">View All</a>
            </div>

            <div class="arrival-section">
                <div class="row g-4">
                    <div id="cart-alert"
                        style="display:none; position: fixed; top: 20px; right: 20px; background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; z-index: 1000;">
                        Product added to cart successfully!
                    </div>

                    @foreach ($products as $product)
                    @php
                    $price = $product->price;
                    $discount = $product->discount ?? 0;
                    $hasDiscount = $discount > 0;
                    $discountedPrice = $hasDiscount ? round($price - ($price * $discount / 100), 2) : $price;
                    @endphp

                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img position-relative">

                                {{-- Discount Badge --}}
                                @if($hasDiscount)
                                <span
                                    class="discount-badge position-absolute top-0 start-0 bg-danger text-white px-2 py-1 rounded-end">
                                    {{ $discount }}% OFF
                                </span>
                                @endif

                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid w-100" style="object-fit: cover; height: 300px;">

                                <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                            style="width: 40px; height: 40px;">
                                            <i class="fas fa-arrows-alt text-dark"></i>
                                        </span>
                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                            style="width: 40px; height: 40px;">
                                            <i class="fas fa-heart text-success"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="product-info mt-3">
                                <div class="product-description">
                                    <a href="{{ route('product.info', $product->id) }}"
                                        class="product-details fw-bold text-dark d-block mb-2">
                                        {{ $product->name }}
                                    </a>

                                    <div class="price">
                                        @if($hasDiscount)
                                        <span class="new-price text-success fw-bold me-2">₹{{ $discountedPrice }}</span>
                                        <span class="price-cut text-muted"><del>₹{{ $price }}</del></span>
                                        @else
                                        <span class="new-price text-dark fw-bold">₹{{ $price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="product-cart-btn text-center mt-3">
                                <button class="product-btn add-to-cart" data-id="{{ $product->id }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--------------- arrival-section-end--------------->

    <!--------------- flash-section--------------->
    <section class="product flash-sale">
        <div class="container">
            <div class="section-title">
                <h5>Flash Sale</h5>
                <div class="countdown-section">
                    <div class="countdown-items">
                        <span id="day" class="number" style="color: red;">0</span>
                        <span class="text">Days</span>
                    </div>
                    <div class="countdown-items">
                        <span id="hour" class="number" style="color: skyblue;">0</span>
                        <span class="text">Hours</span>
                    </div>
                    <div class="countdown-items">
                        <span id="minute" class="number" style="color: green;">0</span>
                        <span class="text">Minutes</span>
                    </div>
                    <div class="countdown-items">
                        <span id="second" class="number" style="color: red;">0</span>
                        <span class="text">seconds</span>
                    </div>
                </div>
                <a href="{{ route('flash.sale')}}" class="view">View All</a>
            </div>
            <div class="flash-sale-section">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-5.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Leather Dress Shoes
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$22.99</span>
                                        <span class="new-price">$13.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right" data-aos-duration="200">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Trendy Bucket Hat
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$39.99</span>
                                        <span class="new-price">$23.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right" data-aos-duration="300">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Statement
                                        Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$39.99</span>
                                        <span class="new-price">$26.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right" data-aos-duration="400">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-9.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Rainbow Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$29.99</span>
                                        <span class="new-price">$16.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- flash-section-end--------------->

    <!--------------- top-sell-section--------------->
    <section class="product top-selling">
        <div class="container">
            <div class="section-title">
                <h5>Top Selling Prodcuts</h5>
                <a href="{{ route('product.sidebar')}}" class="view">View All</a>
            </div>
            <div class="top-selling-section">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-5.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Leather Dress Shoes
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$19.99</span>
                                        <span class="new-price">$13.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Wool Peacoat
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$15.99</span>
                                        <span class="new-price">$8.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$17.99</span>
                                        <span class="new-price">$9.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-7.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Leather Dress Shoes
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$8.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-8.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Trendy Bucket Hat
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$13.99</span>
                                        <span class="new-price">$7.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-10.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Rainbow Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- top-sell-section-end--------------->

  
    <!--------------- weekly-section--------------->
    <section class="product weekly-sale">
        <div class="container">
            <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="{{ route('product.sidebar')}}" class="view">View All</a>
            </div>
            <div class="weekly-sale-section">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-5.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Slim-Fit Shirt
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$14.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$30.99</span>
                                        <span class="new-price">$15.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Red Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$13.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-9.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>

                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Rainbow Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$19.99</span>
                                        <span class="new-price">$16.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- weekly-section-end--------------->
</main>
@endsection