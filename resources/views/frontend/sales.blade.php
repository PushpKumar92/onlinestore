@extends('frontend.layout.main')

@section('title', 'Flash Sale Products')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">🔥 Flash Sale</h2>

    <div class="row g-4">
        <!-- Sidebar Filters -->
        <div class="col-lg-3">
            <div class="sidebar" data-aos="fade-right">
                <div class="sidebar-section mb-5">
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

                            <button type="submit" class="btn-1 btn-primary w-100">Apply Filters</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="col-lg-9">
            <!-- Sorting Section -->
            <div class="product-sorting-section mb-4 d-flex justify-content-between align-items-center">
                <div class="result">
                    @php
                    $from = ($saleProducts->currentPage() - 1) * $saleProducts->perPage() + 1;
                    $to = $from + $saleProducts->count() - 1;
                    @endphp
                    <p class="mb-0 text-muted">
                        Showing <span class="fw-semibold">{{ $from }}–{{ $to }}</span> of
                        <span class="fw-semibold">{{ $saleProducts->total() }}</span> results
                    </p>
                </div>

                <div class="product-sorting d-flex align-items-center gap-2">
                    <span class="text-muted mx-2">Sort by:</span>
                    <form method="GET" id="sortForm">
                        <select name="sort" id="sortSelect" class="form-select form-select-sm">
                            <option value="">Default</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                Price: High to Low</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                Name: A–Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                Name: Z–A</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                Newest First</option>
                        </select>
                    </form>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="row g-4">
                @forelse ($saleProducts as $product)
                @php
                $discountedPrice = round($product->price - ($product->price * $product->discount / 100));
                @endphp

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper h-100 d-flex flex-column shadow-sm rounded-3 p-2" data-aos="fade-up">
                        <div class="product-img position-relative">
                            <img src="{{ asset('uploads/products/' . $product->image) }}" 
                                 class="img-fluid w-100 rounded-3"
                                 style="object-fit: cover; height: 280px;" 
                                 alt="{{ $product->name }}">

                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 px-3 py-2">
                                {{ $product->discount }}% OFF
                            </span>

                            <!-- Wishlist Button -->
                            <a href="javascript:void(0);" 
                               onclick="addToWishlist({{ $product->id }})"
                               id="wishlist-btn-{{ $product->id }}" 
                               class="position-absolute top-0 end-0 m-2">
                                <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle border shadow-sm"
                                      style="width: 40px; height: 40px;">
                                    <i class="fa fa-heart text-secondary"></i>
                                </span>
                            </a>

                            <!-- View Button -->
                            <div class="product-cart-items position-absolute bottom-0 end-0 p-2">
                                <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm"
                                          style="width: 40px; height: 40px;">
                                        <i class="fas fa-eye text-dark"></i>
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
                <div class="col-12 text-center py-5">
                    <i class="fas fa-tag fa-3x text-muted mb-3"></i>
                    <p class="text-muted fs-5">No products are currently on sale.</p>
                    
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($saleProducts->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $saleProducts->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Auto-submit sort form -->
<script>
document.getElementById('sortSelect')?.addEventListener('change', function() {
    document.getElementById('sortForm').submit();
});
</script>
@endsection