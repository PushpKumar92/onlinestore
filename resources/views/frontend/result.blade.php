@extends('frontend.layout.main')
@section('content')
<section class="search-results py-5">
    <div class="container">
        <h3 class="mb-4">Search results for "{{ $query }}"</h3>

        <div class="arrival-section mb-5">
            <div class="row g-4">
                @forelse ($products as $product)
                    @php
                        $price = $product->price;
                        $discount = $product->discount ?? 0;
                        $hasDiscount = $discount > 0;
                        $discountedPrice = $hasDiscount ? round($price - ($price * $discount / 100), 2) : $price;
                    @endphp

                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper h-100 d-flex flex-column" data-aos="fade-up">
                            <div class="product-img position-relative">
                                @if($hasDiscount)
                                <span class="discount-badge bg-danger text-white px-2 py-1 position-absolute top-0 start-0 rounded-end">
                                    {{ $discount }}% OFF
                                </span>
                                @endif

                                <img src="{{ asset('uploads/products/' . $product->image) }}" 
                                     class="img-fluid w-100" 
                                     style="object-fit: cover; height: 300px;" 
                                     alt="{{ $product->name }}">

                                <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                    <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                                        <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                              style="width: 40px; height: 40px;">
                                            <i class="fas fa-arrows-alt text-dark"></i>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0);" onclick="addToWishlist()">
                                        <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                              style="width: 40px; height: 40px;">
                                            <i class="fa fa-heart text-danger"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="product-info mt-3 flex-grow-1">
                                <a href="{{ route('product.info', $product->id) }}"
                                   class="product-details fw-bold text-dark d-block mb-2 text-truncate">
                                   {{ $product->name }}
                                </a>

                                <div class="price d-flex flex-row align-items-center">
                                    @if($hasDiscount)
                                        <span class="new-price text-success fw-bold me-2">₹{{ $discountedPrice }}</span>
                                        <span class="price-cut text-muted" style="font-size: 15px;">
                                            <del>₹{{ $price }}</del>
                                        </span>
                                    @else
                                        <span class="new-price text-dark fw-bold">₹{{ $price }}</span>
                                    @endif
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
                        <p class="text-muted">No products found for "{{ $query }}".</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{ $products->withQueryString()->links() }}
    </div>
</section>
@endsection
