@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- products-info-section--------------->

    <section class="product product-info">
        <div class="container">
            {{-- Check if product exists --}}
            @if(!isset($product))
            <div class="alert alert-danger">
                <h4>Error: Product not found!</h4>
                <p>The product data is missing. Please <a href="{{ route('productall') }}">go back to shop</a>.</p>
            </div>
            @else

            <div class="blog-bradcrum">
                <span><a href="{{ route('index') }}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="{{ route('productall') }}">Shop</a></span>
                <span class="devider">/</span>
                <span>Product Details</span>
            </div>

            <div class="product-info-section">
                <div class="row">
                    <!-- Product Images -->
                    <div class="col-md-6">
                        <div class="product-info-img">
                            <div class="swiper product-top">
                                @if($product->discount > 0)
                                <div class="product-discount-content">
                                    <h4>-{{ $product->discount }}%</h4>
                                </div>
                                @endif
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            alt="{{ $product->name }}">
                                    </div>

                                </div>
                            </div>

                            <div class="swiper product-bottom">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            alt="{{ $product->name }}">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-md-6">
                        <div class="product-info-content">
                            <span class="wrapper-subtitle">{{ strtoupper(optional($product->category)->name) }}</span>
                            <h5>{{ $product->name }}</h5>

                            <div class="ratings">
                                <span class="text-warning">
                                    @for($i=0; $i<5; $i++) <i class="fas fa-star"></i>
                                        @endfor
                                </span>
                                <span class="text">(6 Reviews)</span>
                            </div>

                            <div class="price">
                                @if($product->discount > 0)
                                @php
                                $discountedPrice = round($product->price - ($product->price * $product->discount / 100),
                                2);
                                @endphp
                                <span class="price-cut">₹{{ number_format($product->price, 2) }}</span>
                                <span class="new-price">₹{{ number_format($discountedPrice, 2) }}</span>
                                @else
                                <span class="new-price">₹{{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>

                           <p class="content-paragraph">{{ Str::words(strip_tags($product->description), 17, '.') }}</p>


                            <div class="product-availability">
                                <span>Availability : </span>
                                <span
                                    class="inner-text">{{ $product->quantity > 0 ? $product->quantity . ' in stock' : 'Out of stock' }}</span>
                            </div>
                            @if(!empty($sizes))
                            <div class="mb-3">
                                <label for="size-select-{{ $product->id }}" class="form-label">Select Size:</label>
                                <select id="size-select-{{ $product->id }}" class="form-select w-auto d-inline-block">
                                    @foreach($sizes as $size)
                                    <option value="{{ trim($size) }}">{{ strtoupper(trim($size)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif


                            <div class="product-quantity">
                                <div class="quantity-wrapper">
                                    <div class="quantity">
                                        <span class="minus">-</span>
                                        <span class="number">1</span>
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="wishlist">
                                        <button onclick="addToWishlist({{ $product->id }})">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="shop-btn add-to-cart" data-id="{{ $product->id }}">
                                    <span><i class="fa-solid fa-plus"></i></span>
                                    <span>Add to Cart</span>
                                </button>
                            </div>

                            <div class="product-details">
                                <p>Category : <span>{{ optional($product->category)->name }}</span></p>
                                <p>Tags : <span>{{ $product->tags ?? 'No tags' }}</span></p>
                                <p>SKU : <span>{{ $product->sku_code ?? 'N/A' }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Related Products --}}
            @if(isset($relatedProducts) && $relatedProducts->count())
            <div class="related-products mt-5">
                <h4 class="mb-4">Related Products</h4>
                <div class="row g-4">
                    @foreach($relatedProducts as $related)
                    <div class="col-md-3 col-6">
                        <div class="product-card text-center">
                            {{-- Use slug if available, otherwise use ID --}}
                            <a href="{{ route('product.info', $related->id) }}">
                                <img src="{{ asset('uploads/products/' . $related->image) }}"
                                    alt="{{ $related->name }}">
                                <h6>{{ $related->name }}</h6>
                            </a>
                            <p class="price mb-0">
                                ₹{{ $related->discount > 0 ? round($related->price - ($related->price * $related->discount / 100)) : $related->price }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @endif {{-- End of product exists check --}}
        </div>
    </section>


    @push('scripts')
    <script>
    function addToCart(productId) {
        console.log('Adding product ' + productId + ' to cart');
        alert('Product added to cart!');
    }

    function addToWishlist(productId) {
        console.log('Adding product ' + productId + ' to wishlist');
        alert('Product added to wishlist!');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const minusBtn = document.querySelector('.quantity .minus');
        const plusBtn = document.querySelector('.quantity .plus');
        const numberSpan = document.querySelector('.quantity .number');

        if (minusBtn && plusBtn && numberSpan) {
            minusBtn.addEventListener('click', function() {
                let currentValue = parseInt(numberSpan.textContent);
                if (currentValue > 1) {
                    numberSpan.textContent = currentValue - 1;
                }
            });

            plusBtn.addEventListener('click', function() {
                let currentValue = parseInt(numberSpan.textContent);
                @if(isset($product))
                let stock = {
                    {
                        $product - > stock ?? 0
                    }
                };
                if (currentValue < stock) {
                    numberSpan.textContent = currentValue + 1;
                } else {
                    alert('Maximum stock reached!');
                }
                @endif
            });
        }
    });
    </script>
    @endpush



    <!--------------- products-info-end--------------->

    <!--------------- products-details-section--------------->
    <section class="product product-description">
        <div class="container">
            <div class="product-detail-section">
                <nav>
                    <div class="nav nav-tabs nav-item" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Description</button>
                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review"
                            type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews</button>
                        <button class="nav-link" id="nav-seller-tab" data-bs-toggle="tab" data-bs-target="#nav-seller"
                            type="button" role="tab" aria-controls="nav-seller" aria-selected="false">Seller
                            Info</button>

                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="product-intro-section">
                            <h5 class="intro-heading">{{ $product->name }}</h5>
                            <p class="product-details">
                                {{ $product->description }}
                            </p>
                        </div>
                      
                    </div>
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab"
                        tabindex="0">
                        <div class="product-review-section" data-aos="fade-up">
                            <h5 class="intro-heading">Reviews</h5>

                            <div class="review-wrapper">
                                <div class="wrapper">
                                    <div class="wrapper-aurthor">
                                        <div class="wrapper-info">
                                            <div class="aurthor-img">
                                                <img src="./assets/images/homepage-one/aurthor-img-1.webp"
                                                    alt="aurthor-img">
                                            </div>
                                            <div class="author-details">
                                                <h5>Sajjad Hossain</h5>
                                                <p>London, UK</p>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>(5.0)</span>
                                        </div>
                                    </div>
                                    <div class="wrapper-description">
                                        <p class="wrapper-details">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the redi 1500s, when an unknown printer took a galley of
                                            type and scrambled it to make a type specimen book. It has survived not only
                                            five centuries but also the on leap into electronic typesetting, remaining
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- products-details-end--------------->

    <!--------------- weekly-section--------------->
    <section class="product weekly-sale product-weekly footer-padding">
        <div class="container">
            <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="#" class="view">View All</a>
            </div>
            <div class="weekly-sale-section">
                <div class="row g-5">
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
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
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
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
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
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
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
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
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
                </div>
            </div>
        </div>
    </section>
    <!--------------- weekly-section-end--------------->
</main>

@endsection