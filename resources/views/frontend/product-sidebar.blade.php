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
                        <!-- Product Sorting Section -->
                        <div class="product-sorting-section mb-4">
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

                                <!-- Dynamic Result Count -->
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

                                <!-- Sort By Dropdown -->
                                <div class="product-sorting d-flex align-items-center gap-2">
                                    <span class="text-muted mx-5">Sort by:</span>
                                    <form method="GET" id="sortForm">
                                        <select name="sort" id="sortSelect" class="form-select form-select-sm">
                                            <option value="">Default</option>
                                            <option value="price_asc"
                                                {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to
                                                High</option>
                                            <option value="price_desc"
                                                {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to
                                                Low</option>
                                            <option value="name_asc"
                                                {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A–Z</option>
                                            <option value="name_desc"
                                                {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z–A
                                            </option>
                                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                                Newest First</option>
                                        </select>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <!-- Auto-submit when sorting changes -->
                       


                        <!-- Products Section -->
                        <section class="py-5 bg-light">
                            <div class="container">
                                <!-- Section Title -->
                                <div class="section-title text-center mb-5">
                                    <h3 class="fw-bold text-uppercase">Our Latest Products</h3>
                                    <p class="text-muted">Discover our newest arrivals and exclusive deals</p>
                                </div>

                                <!-- Products Grid -->
                                <div class="row g-4">
                                    @forelse($products as $product)
                                    @php
                                    $price = $product->price;
                                    $discount = $product->discount ?? 0;
                                    $hasDiscount = $discount > 0;
                                    $discountedPrice = $hasDiscount ? round($price - ($price * $discount / 100), 2) :
                                    $price;
                                    @endphp

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div
                                            class="card border-0 shadow-sm h-100 position-relative product-card transition-all">

                                            {{-- Discount Badge --}}
                                            @if($hasDiscount)
                                            <span
                                                class="badge bg-danger position-absolute top-0 start-0 m-2 px-2 py-1 rounded">
                                                {{ $discount }}% OFF
                                            </span>
                                            @endif

                                            {{-- Product Image --}}
                                            <a href="{{ route('product.info', $product->id) }}" class="overflow-hidden">
                                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                    alt="{{ $product->name }}" class="card-img-top img-fluid"
                                                    style="object-fit: cover; height: 250px;">
                                            </a>

                                            {{-- Product Info --}}
                                            <div class="card-body text-center">
                                                <a href="{{ route('product.info', $product->id) }}"
                                                    class="text-decoration-none text-dark fw-semibold d-block mb-2 text-truncate">
                                                    {{ $product->name }}
                                                </a>

                                                <div class="d-flex justify-content-center align-items-center mb-3">
                                                    @if($hasDiscount)
                                                    <span
                                                        class="text-success fw-bold me-2 fs-5">₹{{ $discountedPrice }}</span>
                                                    <del class="text-muted small">₹{{ $price }}</del>
                                                    @else
                                                    <span class="text-dark fw-bold fs-5">₹{{ $price }}</span>
                                                    @endif
                                                </div>

                                                {{-- Add to Cart Button --}}
                                                <button class="btn btn-primary w-100 add-to-cart fw-semibold"
                                                    data-id="{{ $product->id }}">
                                                    <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 text-center">
                                        <p class="text-muted">No products found at the moment. Please check back later!
                                        </p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </section>



                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $products->withQueryString()->links() }}
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