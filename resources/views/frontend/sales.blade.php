@extends('frontend.layout.main')

@section('title', 'Flash Sale Products')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">🔥 Flash Sale</h2>

    <div class="row g-4">
        @forelse ($saleProducts as $product)
        @php
            $discountedPrice = round($product->price - ($product->price * $product->discount / 100));
        @endphp

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="product-wrapper h-100 d-flex flex-column shadow-sm rounded-3 p-2" data-aos="fade-up">
                <div class="product-img position-relative">
                    <img src="{{ asset('uploads/products/' . $product->image) }}"
                         class="img-fluid w-100 rounded-3"
                         style="object-fit: cover; height: 280px;"
                         alt="{{ $product->name }}">

                    <span class="badge bg-danger position-absolute top-0 start-0 m-2 px-3 py-2">
                        {{ $product->discount }}% OFF
                    </span>

                    <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                        <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                            <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                  style="width: 40px; height: 40px;">
                                <i class="fas fa-eye text-dark"></i>
                            </span>
                        </a>

                        <a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }})"
                           id="wishlist-btn-{{ $product->id }}" class="position-absolute top-0 end-0 m-2">
                            <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle border shadow-sm"
                                  style="width: 40px; height: 40px;">
                                <i class="fa fa-heart text-secondary"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="product-info mt-3 text-center flex-grow-1">
                    <a href="{{ route('product.info', $product->id) }}"
                       class="fw-bold text-dark d-block mb-2 text-truncate">
                        {{ $product->name }}
                    </a>
                    <div class="price">
                        <span class="new-price text-danger fw-bold me-2">₹{{ $discountedPrice }}</span>
                        <span class="old-price text-muted text-decoration-line-through">₹{{ $product->price }}</span>
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
            <p class="text-muted fs-5">No products are currently on sale.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $saleProducts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
