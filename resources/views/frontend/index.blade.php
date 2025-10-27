@extends('frontend.layout.main')

@section('meta_title', $meta->meta_title ?? 'Welcome to Lavanya Tech | Web & Digital Solutions')

@section('meta_description', $meta->meta_description ?? 'Lavanya Tech offers innovative web development, digital marketing, and IT solutions to grow your business online.')

@section('meta_keywords', $meta->meta_keywords ?? 'lavanya tech, web development, digital marketing, IT solutions, SEO, PPC, software development')

@section('meta_tags')
    {!! $meta->meta_tags ?? '' !!}
@endsection

@section('content')
<main class=" main-content">



<!---------Chatbot-------->
<!-- Chatbot Widget -->
<div id="chatbot-container">
  <button id="chatbot-toggle" class="chatbot-toggle-btn">💬</button>

  <div id="chatbot-box" class="chatbot-box">
    <div class="chatbot-header">
      <span>EasyShop Assistant 🤖</span>
      <button id="chatbot-close" class="chatbot-close">×</button>
    </div>

    <div class="chatbot-messages" id="chatbot-messages"></div>

    <div class="chatbot-input">
      <input type="text" id="chatbot-input-field" placeholder="Type a message..." />
      <button id="chatbot-send">Send</button>
    </div>
  </div>
</div>


    <!--------------- hero-section --------------->

    <section id="hero" class="hero position-relative">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper hero-wrapper">

                {{-- 🔹 Slide 1 --}}
                <div class="swiper-slide hero-slider-one d-flex align-items-center">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">
                                        UP TO <span class="wrapper-inner-title">70%</span> OFF
                                    </h5>
                                    <h1 class="wrapper-details">Fashion Collection Summer Sale</h1>
                                    <a href="{{ route('productall') }}" class="shop-btn">
                                        Shop Now
                                        <span><i class="fa-solid fa-greater-than"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 🔹 Slide 2 --}}
                <div class="swiper-slide hero-slider-two d-flex align-items-center">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">
                                        FLAT <span class="wrapper-inner-title">50%</span> DISCOUNT
                                    </h5>
                                    <h1 class="wrapper-details">New Arrival Trends</h1>
                                    <a href="{{ route('productall') }}" class="shop-btn">
                                        Shop Now
                                        <span><i class="fa-solid fa-greater-than"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 🔹 Slide 3 --}}
                <div class="swiper-slide hero-slider-three d-flex align-items-center">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">
                                        UP TO <span class="wrapper-inner-title">60%</span> OFF
                                    </h5>
                                    <h1 class="wrapper-details">Exclusive Winter Collection</h1>
                                    <a href="{{ route('productall') }}" class="shop-btn">
                                        Shop Now
                                        <span><i class="fa-solid fa-greater-than"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ✅ Pagination & Navigation --}}
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
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
                                <a href="{{ route('productall')}}" class="shop-btn">Shop Now
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
                                <a href="{{ route('productall')}}" class="shop-btn">Shop Now
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
    <section class="product-category py-5">
        <div class="container">
            <div class="section-title d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Our Categories</h5>
                <a href="{{ route('productall') }}" class="btn-2 btn-link view">View All</a>
            </div>

            <div class="category-slider position-relative">
                <div class="slider-viewport overflow-hidden">
                    <div class="slider-track d-flex align-items-center gap-3" id="sliderTrack">
                        @forelse($categories as $category)
                        <div class="category-box text-center">
                            <a href="{{ route('productall', ['categories[]' => $category->id]) }}">
                                @if($category->image)
                                <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                    alt="{{ $category->name }}" class="img-fluid rounded w-50">

                                @endif
                                <p class="mt-2">{{ $category->name }}</p>
                            </a>
                        </div>
                        @empty
                        <p class="text-muted">No categories available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--------------- category-section-end--------------->

    <!--------------- arrival-section--------------->
    <section class="product arrival py-5">
        <div class="container">
            <div class="section-title d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">NEW ARRIVALS</h5>
                <a href="#" class=" btn-2 view">View All</a>
            </div>
            <div class="arrival-section mt-5">
                <!-- <h3 class="mb-4 text-center text-primary">New Arrivals</h3> -->
                <div class="row g-4">
                    @forelse ($newArrivalProducts as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper h-100 d-flex flex-column" data-aos="fade-up">
                            <div class="product-img position-relative">
                                @if($product->image)
                                <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid w-100"
                                    style="object-fit: cover; height: 300px;" alt="{{ $product->name }}">
                                @else
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100"
                                    style="object-fit: cover; height: 300px;" alt="No Image">
                                @endif

                                <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">

                                    <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                            style="width: 40px; height: 40px;">
                                            <i class="fas fa-eye text-dark"></i>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }})"
                                        id="wishlist-btn-{{ $product->id }}" class="position-absolute top-0 end-0 m-2">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle border shadow-sm"
                                            style="width: 40px; height: 40px;">
                                            <i class="fa fa-heart text-secondary"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="product-info mt-3 flex-grow-1">
                                <a href="{{ route('product.info', $product->id) }}"
                                    class="product-details fw-bold text-dark d-block mb-2">
                                    {{ $product->name }}
                                </a>
                                <div class="price">
                                    <span class="new-price text-dark fw-bold">₹{{ $product->price }}</span>
                                </div>
                            </div>

                            <div class="product-cart-btn text-center mt-3">
                                <button class="product-btn add-to-cart" data-id="{{ $product->id }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No new arrivals available.</p>
                    </div>
                    @endforelse
                </div>
            </div>


        </div>
    </section>



    <!--------------- arrival-section-end--------------->

    <!--------------- flash-section --------------->
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
                        <span class="text">Seconds</span>
                    </div>
                </div>

                <a href="{{ route('flash.sale') }}" class="btn-2 view">View All</a>
            </div>
            <div class="flash-sale-section mt-5">
                <!-- <h3 class="mb-4 text-center text-danger">Flash Sale</h3> -->
                <div class="row g-4">
                    @forelse ($flashSaleProducts as $product)
                    @php
                    $price = $product->price;
                      $discount = $product->discount ?? 0;
                        $hasDiscount = $discount > 0;
                        $discountedPrice = $hasDiscount ? round($price - ($price * $discount / 100), 2) : $price;
                    @endphp
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img position-relative">
                                <span
                                    class="discount-badge bg-danger text-white px-2 py-1 position-absolute top-0 start-0 rounded-end">
                                    {{ $discount }}% OFF
                                </span>

                                @if($product->image)
                                <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid w-100"
                                    style="object-fit: cover; height: 300px;" alt="{{ $product->name }}">
                                @else
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100"
                                    style="object-fit: cover; height: 300px;" alt="No Image">
                                @endif

                                <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                    <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                            style="width: 40px; height: 40px;">
                                            <i class="fas fa-eye text-dark"></i>
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }})"
                                        id="wishlist-btn-{{ $product->id }}" class="position-absolute top-0 end-0 m-2">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle border shadow-sm"
                                            style="width: 40px; height: 40px;">
                                            <i class="fa fa-heart text-secondary"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="product-info mt-3 flex-grow-1">
                                <a href="{{ route('product.info', $product->id) }}"
                                    class="product-details fw-bold text-dark d-block mb-2 ">
                                    {{ $product->name }}
                                </a>

                                <div class="price">
                                    <span class="new-price text-success fw-bold me-2">₹{{ $discountedPrice }}</span>
                                    <del class="text-muted">₹{{ $price }}</del>
                                </div>
                                 <!-- Savings Info -->
                                @if($hasDiscount)
                                    <p class="text-success small mb-0">
                                        <i class="fa fa-tag"></i> Save ₹{{ number_format($price - $discountedPrice, 2) }}
                                    </p>
                                @endif
                            </div>

                            <div class="product-cart-btn text-center mt-3">
                                <button class="product-btn add-to-cart" data-id="{{ $product->id }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No discounted products right now.</p>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
    <!--------------- flash-section-end --------------->





    <!--------------- weekly-section--------------->
    <section class="product weekly-sale">
        <div class="container">
            <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="{{ route('productall')}}" class="btn-2 view">View All</a>
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
                                    <a href="#" class="product-details">Slim-Fit Shirt
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
                                    <a href="#" class="product-details">Sequin Dress
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
                                    <a href="#" class="product-details">Red Sequin Dress
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
                                    <a href="#" class="product-details">Rainbow Sequin Dress
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
<script>
// 🔥 Set your target date here
const targetDate = new Date("2025-12-31T23:59:59").getTime();

const countdown = setInterval(() => {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance <= 0) {
        clearInterval(countdown);
        document.getElementById("day").innerText = "0";
        document.getElementById("hour").innerText = "0";
        document.getElementById("minute").innerText = "0";
        document.getElementById("second").innerText = "0";
        alert("🎉 Countdown Finished!");
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("day").innerText = days;
    document.getElementById("hour").innerText = hours;
    document.getElementById("minute").innerText = minutes;
    document.getElementById("second").innerText = seconds;
}, 1000);


// Add to Wishlist Function
function addToWishlist(productId) {
    console.log('Adding product:', productId);

    $.ajax({
        url: "/wishlist/add",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            product_id: productId
        },
        success: function(res) {
            console.log('Response:', res);

            let icon = $('#wishlist-btn-' + productId).find('i');

            if (res.status === 'added') {
                icon.removeClass('text-secondary').addClass('text-danger');
                updateWishlistCount();

                Swal.fire({
                    icon: 'success',
                    title: 'Added!',
                    text: res.message,
                    timer: 2000,
                    showConfirmButton: false
                });
            } else if (res.status === 'exists') {
                icon.removeClass('text-secondary').addClass('text-danger');

                Swal.fire({
                    icon: 'info',
                    title: 'Already Added',
                    text: res.message,
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr) {
            console.error('Error:', xhr);

            let message = 'Something went wrong!';

            if (xhr.status === 419) {
                message = 'Session expired. Please refresh the page.';
            } else if (xhr.status === 404) {
                message = 'Route not found. Please check configuration.';
            } else if (xhr.status === 500) {
                message = 'Server error occurred.';
            }

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
            });
        }
    });
}

// Update Wishlist Count
function updateWishlistCount() {
    $.ajax({
        url: "/wishlist/count",
        type: "GET",
        success: function(res) {
            $('#wishlist-count').text(res.count);

            if (res.count > 0) {
                $('#wishlist-count').show();
            } else {
                $('#wishlist-count').hide();
            }
        }
    });
}

// Initialize on page load
$(document).ready(function() {
    console.log('Initializing wishlist...');

    // Update count
    updateWishlistCount();

    // Mark wishlisted items
    $.ajax({
        url: "/wishlist/items",
        type: "GET",
        success: function(res) {
            console.log('Wishlist items:', res.wishlist_items);

            if (res.wishlist_items && res.wishlist_items.length > 0) {
                res.wishlist_items.forEach(function(productId) {
                    $('#wishlist-btn-' + productId).find('i')
                        .removeClass('text-secondary')
                        .addClass('text-danger');
                });
            }
        }
    });
});
</script>

@endsection