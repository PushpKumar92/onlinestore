@extends('frontend.layout.main')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">My Wishlist</h2>
        @if(!$wishlists->isEmpty())
            <button class="btn btn-danger btn-sm" onclick="clearWishlist()">
                <i class="fa fa-trash"></i> Clear All
            </button>
        @endif
    </div>
    
    @if($wishlists->isEmpty())
        <div class="alert  text-center py-5 mb-5">
            <i class="fa fa-heart fa-3x mb-3 text-muted"></i>
            <h4>Your wishlist is empty</h4>
            <p class="text-muted">Start adding products you love!</p>
            <a href="{{ url('/') }}" class="btn btn-1 mt-3">Continue Shopping
                 <span>
                                        <i class="fa-solid fa-greater-than"></i>

                                    </span>
            </a>
        </div>
    @else
        <div class="arrival-section">
            <div class="row g-4">
                @foreach ($wishlists as $item)
                    @php
                        // Handle both relationship and direct product
                        $product = isset($item->product) ? $item->product : $item;
                        
                        // Calculate prices
                        $price = $product->price;
                        $discount = $product->discount ?? 0;
                        $hasDiscount = $discount > 0;
                        $discountedPrice = $hasDiscount ? round($price - ($price * $discount / 100), 2) : $price;
                    @endphp

                    <div class="col-lg-3 col-sm-6 mb-5" id="wishlist-item-{{ $product->id }}">
                        <div class="product-wrapper h-100 d-flex flex-column" data-aos="fade-up">
                            <div class="product-img position-relative">
                                <!-- Discount Badge -->
                                @if($hasDiscount)
                                <span class="discount-badge bg-danger text-white px-2 py-1 position-absolute top-0 start-0 rounded-end" style="z-index: 5;">
                                    {{ $discount }}% OFF
                                </span>
                                @endif

                                <!-- Remove Button (Top Right) -->
                                <button class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" 
                                        onclick="removeFromWishlist({{ $product->id }})"
                                        style="z-index: 10; width: 35px; height: 35px; border-radius: 50%; padding: 0;"
                                        title="Remove from wishlist">
                                    <i class="fa fa-times"></i>
                                </button>

                                <!-- Product Image -->
                                <img src="{{ asset('uploads/products/' . $product->image) }}" 
                                     class="img-fluid w-100"
                                     style="object-fit: cover; height: 300px;" 
                                     alt="{{ $product->name }}">

                                <!-- Bottom Action Buttons -->
                                <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                    <!-- Quick View Button -->
                                    <a href="{{ route('product.info', $product->id) }}" 
                                       class="cart-action-btn"
                                       title="Quick view">
                                        <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm"
                                              style="width: 40px; height: 40px;">
                                            <i class="fas fa-eye text-dark"></i>
                                        </span>
                                    </a>
                                    
                                    <!-- Wishlist Indicator (Filled Heart) -->
                                    <span class="cart-action-btn" title="In wishlist">
                                        <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm"
                                              style="width: 40px; height: 40px;">
                                            <i class="fa fa-heart text-danger"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="product-info mt-3 flex-grow-1">
                                <!-- Product Name -->
                                <a href="{{ route('product.info', $product->id) }}"
                                   class="product-details fw-bold text-dark d-block mb-2 text-truncate"
                                   title="{{ $product->name }}">
                                    {{ $product->name }}
                                </a>

                                <!-- Product Price -->
                                <div class="price d-flex flex-row align-items-center mb-2">
                                    @if($hasDiscount)
                                        <span class="new-price text-success fw-bold me-2">₹{{ number_format($discountedPrice, 2) }}</span>
                                        <span class="price-cut text-muted" style="font-size: 15px;">
                                            <del>₹{{ number_format($price, 2) }}</del>
                                        </span>
                                    @else
                                        <span class="new-price text-dark fw-bold">₹{{ number_format($price, 2) }}</span>
                                    @endif
                                </div>

                                <!-- Savings Info -->
                                @if($hasDiscount)
                                    <p class="text-success small mb-0">
                                        <i class="fa fa-tag"></i> Save ₹{{ number_format($price - $discountedPrice, 2) }}
                                    </p>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="product-cart-btn text-center mt-3">
                                <button class="product-btn add-to-cart w-100" data-id="{{ $product->id }}">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection


<script>
// Remove from Wishlist
function removeFromWishlist(productId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'Remove this product from wishlist?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Removing...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "/wishlist/remove/" + productId,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    if (res.status === 'removed') {
                        // Fade out the item
                        $('#wishlist-item-' + productId).fadeOut(400, function() {
                            $(this).remove();
                            
                            // Check if wishlist is empty
                            if ($('.product-wrapper').length === 0) {
                                location.reload();
                            }
                        });

                        Swal.fire({
                            icon: 'success',
                            title: 'Removed!',
                            text: res.message || 'Product removed from wishlist',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Update wishlist count in navbar if exists
                        updateWishlistCount();
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }
            });
        }
    });
}

// Clear All Wishlist
function clearWishlist() {
    Swal.fire({
        title: 'Clear Wishlist?',
        text: 'Are you sure you want to remove all products from your wishlist?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, clear all!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Get all product IDs
            let productIds = [];
            $('.product-wrapper').each(function() {
                let id = $(this).find('.add-to-cart').data('id');
                productIds.push(id);
            });

            // Remove each item
            let promises = productIds.map(id => {
                return $.ajax({
                    url: "/wishlist/remove/" + id,
                    type: "DELETE",
                    data: { _token: "{{ csrf_token() }}" }
                });
            });

            Promise.all(promises).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Cleared!',
                    text: 'All products removed from wishlist',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
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
            if ($('#wishlist-count').length) {
                $('#wishlist-count').text(res.count);
                if (res.count > 0) {
                    $('#wishlist-count').show();
                } else {
                    $('#wishlist-count').hide();
                }
            }
            if ($('#nav-wishlist-count').length) {
                $('#nav-wishlist-count').text(res.count);
                if (res.count > 0) {
                    $('#nav-wishlist-count').show();
                } else {
                    $('#nav-wishlist-count').hide();
                }
            }
        }
    });
}

// Add to Cart functionality
$(document).ready(function() {
    $('.add-to-cart').on('click', function() {
        let productId = $(this).data('id');
        let button = $(this);
        
        // Disable button during request
        button.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Adding...');
        
        $.ajax({
            url: "/cart/add/" + productId,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                quantity: 1
            },
            success: function(res) {
                // Update cart count if element exists
                if ($('#cart-count').length) {
                    $('#cart-count').text(res.cart_count);
                    $('#cart-count').show();
                }
                
                Swal.fire({
                    icon: 'success',
                    title: 'Added to Cart!',
                    text: res.message || 'Product added to your cart successfully',
                    showConfirmButton: true,
                    confirmButtonText: 'View Cart',
                    showCancelButton: true,
                    cancelButtonText: 'Continue Shopping'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('cart.show') }}";
                    }
                });
                
                // Re-enable button
                button.prop('disabled', false).html('<i class="fa fa-shopping-cart"></i> Add to Cart');
            },
            error: function(xhr) {
                let errorMsg = 'Could not add to cart!';
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMsg,
                });
                
                // Re-enable button
                button.prop('disabled', false).html('<i class="fa fa-shopping-cart"></i> Add to Cart');
            }
        });
    });
});
</script>
