@extends('frontend.layout.main')

@section('content')
<main class="main-content">

    <!--------------- Products Sidebar Section --------------->
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">

                <!-- Sidebar Filters -->
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-right">

                        <!-- Filters Form -->
                        <div class="sidebar-section">
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading mb-3">Filters</h5>
                                <form id="filter-form" method="GET" action="{{ route('productall') }}">

                                    <!-- Categories Filter -->
                                    <h6 class="mb-2">Categories</h6>
                                    <ul class="list-unstyled mb-3">
                                        @foreach($categories as $category)
                                        <li>
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                            {{ $category->name }}
                                        </li>
                                        @endforeach
                                    </ul>

                                    <!-- Brands Filter -->
                                    <h6 class="mb-2">Brands</h6>
                                    <ul class="list-unstyled mb-3">
                                        @foreach($brands as $brand)
                                        <li>
                                            <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                                {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}>
                                            {{ $brand->name }}
                                        </li>
                                        @endforeach
                                    </ul>

                                    <!-- Sizes Filter -->
                                    <h6 class="mb-2">Sizes</h6>
                                    <ul class="list-unstyled mb-3">
                                        @foreach($sizes as $size)
                                        <li>
                                            <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                                {{ in_array($size->id, request('sizes', [])) ? 'checked' : '' }}>
                                            {{ $size->name }}
                                        </li>
                                        @endforeach
                                    </ul>

                                    <!-- Colors Filter -->
                                    <h6 class="mb-2">Colors</h6>
                                    <ul class="list-unstyled mb-3">
                                        @foreach($colors as $color)
                                        <li>
                                            <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                                {{ in_array($color->id, request('colors', [])) ? 'checked' : '' }}>
                                            {{ $color->name }}
                                        </li>
                                        @endforeach
                                    </ul>

                                    <!-- Price Range -->
                                    <h6 class="mb-2">Price Range</h6>
                                    <div class="d-flex gap-2 mb-3">
                                        <input type="number" name="price_min" class="form-control" placeholder="Min"
                                            value="{{ request('price_min') }}">
                                        <input type="number" name="price_max" class="form-control" placeholder="Max"
                                            value="{{ request('price_max') }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                                </form>
                            </div>
                        </div>

                        <!-- Sidebar Promotion -->
                        <div class="sidebar-shop-section mt-4 text-center">
                            <span class="wrapper-subtitle">TRENDY</span>
                            <h5 class="wrapper-heading mb-3">Best Wireless Shoes</h5>
                            <a href="{{ route('seller.sidebar')}}" class="btn btn-outline-primary">Shop Now</a>
                        </div>

                    </div>
                </div>

                <!-- Products List -->
                <div class="col-lg-9">
                    <div class="product-sidebar-section" data-aos="fade-up">

                        <!-- Sorting Section -->
                        <div class="product-sorting-section mb-4 d-flex justify-content-between align-items-center">
                            <div class="result">
                                @php
                                $from = ($products->currentPage() - 1) * $products->perPage() + 1;
                                $to = $from + $products->count() - 1;
                                @endphp
                                <p class="mb-0 text-muted">
                                    Showing <span class="fw-semibold">{{ $from }}–{{ $to }}</span> of
                                    <span class="fw-semibold">{{ $products->total() }}</span> results
                                </p>
                            </div>

                            <div class="product-sorting d-flex align-items-center gap-2">
                                <span class="text-muted mx-2">Sort by:</span>
                                <form method="GET" id="sortForm">
                                    <select name="sort" id="sortSelect" class="form-select form-select-sm">
                                        <option value="">Default</option>
                                        <option value="price_asc"
                                            {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                            Price: Low to High</option>
                                        <option value="price_desc"
                                            {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                            Price: High to Low</option>
                                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                            Name: A–Z</option>
                                        <option value="name_desc"
                                            {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                            Name: Z–A</option>
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                            Newest First</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <!-- Products Grid -->
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
                                        @if($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            class="img-fluid w-100" style="object-fit: cover; height: 300px;"
                                            alt="{{ $product->name }}">
                                        @else
                                        <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100"
                                            style="object-fit: cover; height: 300px;" alt="No Image">
                                        @endif

                                        {{-- Discount Badge --}}
                                        @if($hasDiscount)
                                        <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                            {{ $discount }}% OFF
                                        </span>
                                        @endif

                                        {{-- Product Actions --}}
                                        <div
                                            class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                            {{-- View Details --}}
                                            <a href="{{ route('product.info', $product->id) }}" class="cart cart-item mx-2">
                                                <span
                                                    class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-eye text-dark"></i>
                                                </span>
                                            </a>

                                            {{-- Wishlist --}}
                                            <a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }})"
                                                id="wishlist-btn-{{ $product->id }}"
                                                class="position-absolute top-0 end-0 m-2 mx-2">
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
                                                class="new-price fw-bold {{ $hasDiscount ? 'text-success' : 'text-dark' }}">
                                                ₹{{ $discountedPrice }}
                                            </span>
                                            @if($hasDiscount)
                                            <del class="text-muted ms-2">₹{{ $price }}</del>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Add to Cart Button --}}
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

                        <script>
                        // Wishlist Function
                        function addToWishlist(productId) {
                            console.log('Add to Wishlist:', productId);
                            // You can implement AJAX call here
                        }

                        // Add to Cart Function
                        document.querySelectorAll('.add-to-cart').forEach(function(button) {
                            button.addEventListener('click', function() {
                                let productId = this.getAttribute('data-id');
                                console.log('Add to Cart:', productId);
                                // Implement AJAX call to add product to cart
                            });
                        });
                        </script>



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

<!-- Auto-submit filter form on change -->
<script>
document.querySelectorAll('#filter-form input').forEach(input => {
    input.addEventListener('change', () => {
        document.getElementById('filter-form').submit();
    });
});

document.getElementById('sortSelect').addEventListener('change', function() {
    document.getElementById('sortForm').submit();
});
</script>

@endsection