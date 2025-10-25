@extends('frontend.layout.main')

@section('content')
<main class="main-content">

    <!--------------- Products Sidebar Section --------------->
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">

                <!-- Products List -->
                <div class="col-lg-9">
                    <div class="product-sidebar-section" data-aos="fade-up">



                        <div class="row g-4">
                            @forelse($products as $product)
                            @php
                            $price = $product->price;
                            $discount = $product->discount ?? 0;
                            $hasDiscount = $discount > 0;
                            $discountedPrice = $hasDiscount ? round($price - ($price * $discount / 100), 2) : $price;
                            @endphp
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product-wrapper h-100 d-flex flex-column" data-aos="fade-up">

                                    {{-- Product Image --}}
                                    <div class="product-img position-relative">
                                        @if($hasDiscount)
                                        <span
                                            class="discount-badge bg-danger text-white px-2 py-1 position-absolute top-0 start-0 rounded-end">
                                            {{ $discount }}% OFF
                                        </span>
                                        @endif

                                        @if($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            class="img-fluid w-100" style="object-fit: cover; height: 300px;"
                                            alt="{{ $product->name }}">
                                        @else
                                        <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100"
                                            style="object-fit: cover; height: 300px;" alt="No Image">
                                        @endif

                                        <div
                                            class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                            <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                                                <span
                                                    class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-eye text-dark"></i>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }})"
                                                id="wishlist-btn-{{ $product->id }}">
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
                                        <a href="{{ route('product.info', $product->id) }}"
                                            class="product-details fw-bold text-dark d-block mb-2">
                                            {{ $product->name }}
                                        </a>

                                        <div class="price">
                                            <span
                                                class="new-price fw-bold {{ $hasDiscount ? 'text-success' : 'text-dark' }}">₹{{ $discountedPrice }}</span>
                                            @if($hasDiscount)
                                            <del class="text-muted ms-2">₹{{ $price }}</del>
                                            @endif
                                        </div>

                                        {{-- Savings Info --}}
                                        @if($hasDiscount)
                                        <p class="text-success small mb-0">
                                            <i class="fa fa-tag"></i> Save
                                            ₹{{ number_format($price - $discountedPrice, 2) }}
                                        </p>
                                        @endif
                                    </div>

                                    {{-- Add to Cart --}}
                                    <div class="product-cart-btn text-center mt-3">
                                        <button class="product-btn add-to-cart" data-id="{{ $product->id }}">
                                            Add to Cart
                                        </button>
                                    </div>

                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center">
                                <p class="text-muted">No products available.</p>
                            </div>
                            @endforelse
                        </div>


                        <!-- Pagination -->
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--------------- Products Sidebar Section End --------------->
</main>



@endsection