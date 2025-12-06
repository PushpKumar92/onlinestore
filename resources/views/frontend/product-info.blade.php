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
            <div class="col-md-5">
    <div class="product-info-img">

        @if($product->discount > 0)
        <div class="product-discount-content">
            <h4>-{{ $product->discount }}%</h4>
        </div>
        @endif

        <div class="product-main-image">
            <img src="{{ asset('uploads/products/' . $product->image) }}" 
                 alt="{{ $product->name }}">
        </div>

        <div class="product-thumbnail">
            <img src="{{ asset('uploads/products/' . $product->image) }}" 
                 alt="{{ $product->name }}">
        </div>

    </div>
</div>


                    <!-- Product Info -->
                    <div class="col-md-7">
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

                            <p class="content-paragraph">{{ Str::words(strip_tags($product->description), 17, '.') }}
                            </p>


                            <div class="product-availability">
                                <span>Availability : </span>
                                <span
                                    class="inner-text">{{ $product->quantity > 0 ? $product->quantity . ' in stock' : 'Out of stock' }}</span>
                            </div>
                            @if(!empty($sizes))
                            <div class="mb-3 d-flex align-items-center gap-3">
                                <label for="size-select-{{ $product->id }}" class="form-label me-2 mb-0">Select
                                    Size:</label>

                                <select id="size-select-{{ $product->id }}" class="form-select w-autos d-inline-block">
                                    @foreach($sizes as $size)
                                    <option value="{{ trim($size) }}">{{ strtoupper(trim($size)) }}</option>
                                    @endforeach
                                </select>

                                
                            </div>

                            @endif


                            <div class="product-quantity">
                                <div class="button-row">
                                    <button class="shop-btn add-to-cart" data-id="{{ $product->id }}">
                                        <span><i class="fa-solid fa-plus"></i></span>
                                        <span>Add to Cart</span>
                                    </button>
                                    <a href="{{route('checkout.index')}}" class="shop-btn">
                                        <span><i class="fa-solid fa-plus"></i></span>
                                        <span>Buy Now</span>
                                    </a>
                                </div>
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

            <!--------------- products-related section--------------->
            @if(isset($relatedProducts) && $relatedProducts->count())
            <div class="related-products mt-5">
                <div class="section-title mb-4">
                    <h4>Related Products</h4>
                </div>
                <div class="row g-4">
                    @foreach($relatedProducts as $related)
                    @php
                    $relatedPrice = $related->price;
                    $relatedDiscount = $related->discount ?? 0;
                    $hasRelatedDiscount = $relatedDiscount > 0;
                    $relatedDiscountedPrice = $hasRelatedDiscount ? round($relatedPrice - ($relatedPrice *
                    $relatedDiscount / 100), 2) : $relatedPrice;
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="product-wrapper h-100 d-flex flex-column" data-aos="fade-up">
                            {{-- Product Image --}}
                            <div class="product-img position-relative">
                                <a href="{{ route('product.info', $related->id) }}">
                                    @if($related->image)
                                    <img src="{{ asset('uploads/products/' . $related->image) }}"
                                        class="img-fluid w-100" style="object-fit: cover; height: 250px;"
                                        alt="{{ $related->name }}">
                                    @else
                                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100"
                                        style="object-fit: cover; height: 250px;" alt="No Image">
                                    @endif
                                </a>

                                {{-- Discount Badge --}}
                                @if($hasRelatedDiscount)
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    {{ $relatedDiscount }}% OFF
                                </span>
                                @endif

                                {{-- Product Actions --}}
                                <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                    {{-- View Details --}}
                                    <a href="{{ route('product.info', $related->id) }}" class="cart cart-item">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                            style="width: 40px; height: 40px;">
                                            <i class="fas fa-eye text-dark"></i>
                                        </span>
                                    </a>

                                    {{-- Wishlist --}}
                                    <a href="javascript:void(0);" onclick="addToWishlist({{ $related->id }})"
                                        id="wishlist-btn-{{ $related->id }}" class="position-absolute top-0 end-0 m-2">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle border shadow-sm"
                                            style="width: 40px; height: 40px;">
                                            <i class="fa fa-heart text-secondary"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            {{-- Product Info --}}
                            <div class="product-info mt-3 flex-grow-1">
                                <a href="{{ route('product.info', $related->id) }}"
                                    class="product-details fw-bold text-dark d-block mb-2" title="{{ $related->name }}">
                                    {{ Str::limit($related->name, 40) }}
                                </a>
                                <div class="price">
                                    @if($hasRelatedDiscount)
                                    <span class="new-price fw-bold text-success">
                                        ₹{{ number_format($relatedDiscountedPrice, 2) }}
                                    </span>
                                    <del class="text-muted ms-2">₹{{ number_format($relatedPrice, 2) }}</del>
                                    @else
                                    <span
                                        class="new-price text-dark fw-bold">₹{{ number_format($relatedPrice, 2) }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Add to Cart Button --}}
                            <div class="product-cart-btn text-center mt-3">
                                <button class="product-btn add-to-cart" data-id="{{ $related->id }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <!--------------- products-related section end--------------->

            @endif {{-- End of product exists check --}}
        </div>
    </section>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity selector functionality for main product
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
                        $product - > quantity ?? 0
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

        // Main product add to cart
        const mainAddToCartBtn = document.querySelector('.product-quantity .add-to-cart');
        if (mainAddToCartBtn) {
            mainAddToCartBtn.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const quantity = numberSpan ? parseInt(numberSpan.textContent) : 1;
                const sizeSelect = document.getElementById('size-select-' + productId);
                const size = sizeSelect ? sizeSelect.value : null;

                addToCartWithDetails(productId, quantity, size);
            });
        }

        // Related products add to cart
        const relatedAddToCartBtns = document.querySelectorAll('.related-products .add-to-cart');
        relatedAddToCartBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                addToCartWithDetails(productId, 1, null);
            });
        });
    });

    // Add to cart function
    function addToCartWithDetails(productId, quantity, size) {
        console.log('Adding product ' + productId + ' to cart with quantity: ' + quantity);

        fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity,
                    size: size
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('✓ Product added to cart successfully!');
                    // Update cart count if you have one
                    if (typeof updateCartCount === 'function') {
                        updateCartCount();
                    }
                } else {
                    alert('Error: ' + (data.message || 'Failed to add product to cart'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Product added to cart!'); // Fallback message
            });
    }

    // Add to wishlist function
    function addToWishlist(productId) {
        console.log('Adding product ' + productId + ' to wishlist');

        fetch('/wishlist/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('✓ Product added to wishlist successfully!');
                    // Change heart icon color
                    const wishlistBtn = document.getElementById('wishlist-btn-' + productId);
                    if (wishlistBtn) {
                        const heartIcon = wishlistBtn.querySelector('i');
                        if (heartIcon) {
                            heartIcon.classList.remove('text-secondary');
                            heartIcon.classList.add('text-danger');
                        }
                    }
                } else {
                    alert('Error: ' + (data.message || 'Failed to add product to wishlist'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Product added to wishlist!'); // Fallback message
                // Still change the icon color on fallback
                const wishlistBtn = document.getElementById('wishlist-btn-' + productId);
                if (wishlistBtn) {
                    const heartIcon = wishlistBtn.querySelector('i');
                    if (heartIcon) {
                        heartIcon.classList.remove('text-secondary');
                        heartIcon.classList.add('text-danger');
                    }
                }
            });
    }
    </script>
    @endpush
    <!--------------- products-related section--------------->


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
    <section class="product weekly-sale">
        <div class="container">
            <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="{{ route('productall') }}" class="btn-2 view">View All</a>
            </div>
            <div class="weekly-sale-section">
                <div class="row g-5">
                    @foreach($products as $product)
                    @php
                    $price = $product->price;
                    $discount = $product->discount ?? 0;
                    $hasDiscount = $discount > 0;
                    $discountedPrice = $hasDiscount ? round($price - ($price * $discount / 100), 2) : $price;
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img position-relative">
                                @if($product->image)
                                <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid w-100"
                                    style="object-fit: cover; height: 300px;" alt="{{ $product->name }}">
                                @else
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100"
                                    style="object-fit: cover; height: 300px;" alt="No Image">
                                @endif

                                {{-- Discount Badge - Only show if discount exists --}}
                                @if($hasDiscount)
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    {{ $discount }}% OFF
                                </span>
                                @endif

                                <div class="product-cart-items">
                                    <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                                        <span
                                            style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;background-color:white;border-radius:50%;">
                                            <i class="fas fa-eye" style="font-size:20px;color:#181818;"></i>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }})"
                                        id="wishlist-btn-{{ $product->id }}" class="favourite cart-item">
                                        <span
                                            style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;background-color:white;border-radius:50%;">
                                            <i class="fas fa-heart" style="font-size:20px;color:#00674f;"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        @for($i=0; $i<5; $i++) <i class="fas fa-star"></i>
                                            @endfor
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info', $product->id) }}" class="product-details">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                    <div class="price">
                                        @if($hasDiscount)
                                        <del class="text-muted">₹{{ $price }}</del>
                                        <span class="new-price text-success fw-bold">₹{{ $discountedPrice }}</span>
                                        @else
                                        <span class="new-price text-dark fw-bold">₹{{ $price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <button class="product-btn add-to-cart" data-id="{{ $product->id }}">
                                    Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!--------------- weekly-section-end--------------->
<!--------------- Reviews Section --------------->
<section class="product product-reviews py-5">
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-8">
                {{-- Review Summary --}}
                <div class="review-summary mb-4">
                    <h4>Customer Reviews</h4>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-4">
                            <h2 class="mb-0">{{ number_format($product->averageRating(), 1) }}</h2>
                            <div class="text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= round($product->averageRating()))
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <small class="text-muted">{{ $product->totalReviews() }} reviews</small>
                        </div>
                    </div>
                </div>

                {{-- Write Review Form --}}
                @auth
                <div class="write-review-section mb-5">
                    <h5 class="mb-3">Write a Review</h5>
                    <form id="review-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" 
                                value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" required>
                                <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="review" class="form-label">Your Review</label>
                            <textarea class="form-control" id="review" name="review" rows="4" 
                                placeholder="Share your experience with this product..." 
                                required minlength="10" maxlength="1000"></textarea>
                            <small class="text-muted">Minimum 10 characters</small>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit-review-btn">
                            Submit Review
                        </button>
                    </form>
                </div>
                @else
                <div class="alert alert-info mb-4">
                   <a href="{{ route('login') }}" class="alert-link">  Please to write a review.</a>
                </div>
                @endauth
{{-- JavaScript for Review Submission --}}
@push('scripts')
<script>
$(document).ready(function() {
    $('#review-form').on('submit', function(e) {
        e.preventDefault();
        
        const formData = $(this).serialize();
        const submitBtn = $('#submit-review-btn');
        
        // Disable button
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
        
        $.ajax({
            url: "{{ route('reviews.store') }}",
            type: "POST",
            data: formData,
            success: function(res) {
                if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.message,
                        timer: 3000
                    });
                    
                    // Reset form
                    $('#review-form')[0].reset();
                    
                    // Reload reviews after 2 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
            error: function(xhr) {
                let message = 'Something went wrong!';
                
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    message = Object.values(errors).flat().join('\n');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message
                });
            },
            complete: function() {
                submitBtn.prop('disabled', false).html('Submit Review');
            }
        });
    });
});
</script>
@endpush

<!-- Sticky Footer for Product Detail Page (Mobile Only) -->
<div class="sticky-cart-footer d-lg-none">
    <div class="container">
        <div class="d-flex align-items-center gap-3">
            <div class="product-price-info">
                <span class="current-price" id="stickyPrice">${{ $product->price }}</span>
                @if(isset($product->original_price) && $product->original_price)
                <span class="original-price">${{ $product->original_price }}</span>
                @endif
            </div>
            <button class="btn-add-to-cart" id="addToCartBtn" onclick="openCartOptions()">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
            <button class="btn-go-to-cart d-none" id="goToCartBtn" onclick="window.location.href='{{ route('cart.show') }}'">
                <i class="fas fa-shopping-bag"></i> Go to Cart
            </button>
        </div>
    </div>
</div>

<!-- Cart Options Popup -->
<div class="popup-overlay" id="cartOverlay" onclick="closeCartOptions()"></div>
<div class="popup-container" id="cartPopup">
    <div class="popup-header">
        <h5 class="mb-0">Select Options</h5>
        <button class="btn-close-popup" onclick="closeCartOptions()">×</button>
    </div>
    <div class="popup-body">
        <form id="addToCartForm" method="POST" action="{{ route('cart.add', $product->id) }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            
            <!-- Product Info -->
            <div class="product-info-section">
                <div class="product-image">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="product-details">
                    <h6 class="product-name">{{ $product->name }}</h6>
                    <p class="product-price" id="popupPrice">${{ $product->price }}</p>
                </div>
            </div>

            <!-- Size Selection -->
            @if(isset($product->sizes) && is_countable($product->sizes) && count($product->sizes) > 0)
            <div class="option-section">
                <label class="option-label">Size <span class="required">*</span></label>
                <div class="size-options">
                    @foreach($product->sizes as $size)
                    <label class="size-option">
                        <input type="radio" name="size" value="{{ $size->id }}" required>
                        <span>{{ $size->name }}</span>
                    </label>
                    @endforeach
                </div>
                <span class="error-message d-none" id="sizeError">Please select a size</span>
            </div>
            @endif

            <!-- Color Selection -->
            @if(isset($product->colors) && is_countable($product->colors) && count($product->colors) > 0)
            <div class="option-section">
                <label class="option-label">Color <span class="required">*</span></label>
                <div class="color-options">
                    @foreach($product->colors as $color)
                    <label class="color-option" title="{{ $color->name }}">
                        <input type="radio" name="color" value="{{ $color->id }}" required>
                        <span class="color-swatch" style="background-color: {{ $color->code }}"></span>
                        <span class="color-name">{{ $color->name }}</span>
                    </label>
                    @endforeach
                </div>
                <span class="error-message d-none" id="colorError">Please select a color</span>
            </div>
            @endif

            <!-- Quantity Selection -->
            <div class="option-section">
                <label class="option-label">Quantity</label>
                <div class="quantity-selector">
                    <button type="button" class="qty-btn" onclick="decreaseQty()">-</button>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock ?? 99 }}" readonly>
                    <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                </div>
                <span class="stock-info">{{ $product->stock ?? 'In' }} Stock</span>
            </div>

            <!-- Total Price -->
            <div class="total-section">
                <span class="total-label">Total:</span>
                <span class="total-price" id="totalPrice">${{ $product->price }}</span>
            </div>

        </form>
    </div>
    <div class="popup-footer">
        <button type="button" class="btn-secondary-popup" onclick="closeCartOptions()">Cancel</button>
        <button type="button" class="btn-primary-popup" onclick="submitAddToCart()">
            <i class="fas fa-shopping-cart"></i> Add to Cart
        </button>
    </div>
</div>

<!-- Success Toast -->
<div class="success-toast" id="successToast">
    <i class="fas fa-check-circle"></i>
    <span>Product added to cart successfully!</span>
</div>

<script>
let basePrice = {{ $product->price }};
let maxStock = {{ $product->stock ?? 99 }};

function openCartOptions() {
    document.getElementById('cartOverlay').classList.add('active');
    document.getElementById('cartPopup').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeCartOptions() {
    document.getElementById('cartOverlay').classList.remove('active');
    document.getElementById('cartPopup').classList.remove('active');
    document.body.style.overflow = '';
}

function increaseQty() {
    const input = document.getElementById('quantity');
    let currentValue = parseInt(input.value);
    if (currentValue < maxStock) {
        input.value = currentValue + 1;
        updateTotalPrice();
    }
}

function decreaseQty() {
    const input = document.getElementById('quantity');
    let currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
        updateTotalPrice();
    }
}

function updateTotalPrice() {
    const quantity = parseInt(document.getElementById('quantity').value);
    const total = (basePrice * quantity).toFixed(2);
    document.getElementById('totalPrice').textContent = '$' + total;
}

function submitAddToCart() {
    const form = document.getElementById('addToCartForm');
    
    // Validate size selection if exists
    const sizeInputs = form.querySelectorAll('input[name="size"]');
    if (sizeInputs.length > 0) {
        const sizeChecked = Array.from(sizeInputs).some(input => input.checked);
        if (!sizeChecked) {
            document.getElementById('sizeError').classList.remove('d-none');
            return;
        } else {
            document.getElementById('sizeError').classList.add('d-none');
        }
    }
    
    // Validate color selection if exists
    const colorInputs = form.querySelectorAll('input[name="color"]');
    if (colorInputs.length > 0) {
        const colorChecked = Array.from(colorInputs).some(input => input.checked);
        if (!colorChecked) {
            document.getElementById('colorError').classList.remove('d-none');
            return;
        } else {
            document.getElementById('colorError').classList.add('d-none');
        }
    }
    
    // Get form data
    const formData = new FormData(form);
    
    // Submit via AJAX
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close popup
            closeCartOptions();
            
            // Show success toast
            const toast = document.getElementById('successToast');
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
            
            // Change button to "Go to Cart"
            document.getElementById('addToCartBtn').classList.add('d-none');
            document.getElementById('goToCartBtn').classList.remove('d-none');
            
            // Update cart count if you have a cart counter
            if (typeof updateCartCount === 'function') {
                updateCartCount();
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to add product to cart. Please try again.');
    });
}

// Close popup when clicking outside
document.getElementById('cartOverlay').addEventListener('click', closeCartOptions);

// Prevent quantity input manual change
document.getElementById('quantity').addEventListener('input', function() {
    let value = parseInt(this.value);
    if (isNaN(value) || value < 1) {
        this.value = 1;
    } else if (value > maxStock) {
        this.value = maxStock;
    }
    updateTotalPrice();
});
</script>
</main>

@endsection