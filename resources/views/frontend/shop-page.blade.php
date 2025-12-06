@extends('frontend.layout.main')

@section('content')
<main class="main-content">

    <!--------------- Products Sidebar Section --------------->
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">

                <!-- Sidebar Filters (Desktop Only) -->
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sidebar" data-aos="fade-right">

                        <!-- Filters Form -->
                        <div class="sidebar-section">
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading mb-3">Filters</h5>
                                <form id="desktop-filter-form" method="GET" action="{{ route('productall') }}">

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

                        <!-- Sorting Section (Desktop Only) -->
                        <div class="product-sorting-section mb-4 d-none d-lg-flex justify-content-between align-items-center">
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
                                <form method="GET" id="desktopSortForm">
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
                            $discount = $product->discount ?? 0;
                            @endphp

                            @if($discount == 0)
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

                                        {{-- Product Actions --}}
                                        <div class="product-cart-items position-absolute bottom-0 end-0 p-2 d-flex gap-2">
                                            {{-- View Details --}}
                                            <a href="{{ route('product.info', $product->id) }}" class="cart cart-item">
                                                <span
                                                    class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-eye text-dark"></i>
                                                </span>
                                            </a>

                                            {{-- Wishlist --}}
                                            <a href="javascript:void(0);" onclick="addToWishlist({{ $product->id }})"
                                                id="wishlist-btn-{{ $product->id }}"
                                                class="position-absolute top-0 end-0 m-2">
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
                                            <span class="new-price text-dark fw-bold">₹{{ $product->price }}</span>
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
                            @endif
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

<!-- Sticky Footer (Mobile Only) -->
<div class="sticky-footer d-lg-none">
    <div class="container">
        <div class="d-flex gap-3">
            <button class="btn-footer flex-fill" onclick="toggleFilterPopup()">
                <i class="fas fa-filter"></i> Filters
            </button>
            <button class="btn-footer flex-fill" onclick="toggleSortPopup()">
                <i class="fas fa-sort"></i> Sort By
            </button>
        </div>
    </div>
</div>

<!-- Filter Popup (Mobile Only) -->
<div class="popup-overlay d-lg-none" id="filterOverlay" onclick="toggleFilterPopup()"></div>
<div class="popup-container d-lg-none" id="filterPopup">
    <div class="popup-header">
        <h5 class="mb-0">Filters</h5>
        <button class="btn-close-popup" onclick="toggleFilterPopup()">×</button>
    </div>
    <div class="popup-body">
        <form id="mobile-filter-form" method="GET" action="{{ route('productall') }}">
            
            <!-- Preserve sort parameter -->
            @if(request('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}">
            @endif
            
            <!-- Categories Filter -->
            <div class="filter-section">
                <h6 class="filter-heading">Categories</h6>
                <ul class="filter-list">
                    @foreach($categories as $category)
                    <li>
                        <label class="filter-label">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                            <span>{{ $category->name }}</span>
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Brands Filter -->
            <div class="filter-section">
                <h6 class="filter-heading">Brands</h6>
                <ul class="filter-list">
                    @foreach($brands as $brand)
                    <li>
                        <label class="filter-label">
                            <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}>
                            <span>{{ $brand->name }}</span>
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Sizes Filter -->
            <div class="filter-section">
                <h6 class="filter-heading">Sizes</h6>
                <ul class="filter-list">
                    @foreach($sizes as $size)
                    <li>
                        <label class="filter-label">
                            <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                {{ in_array($size->id, request('sizes', [])) ? 'checked' : '' }}>
                            <span>{{ $size->name }}</span>
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Colors Filter -->
            <div class="filter-section">
                <h6 class="filter-heading">Colors</h6>
                <ul class="filter-list">
                    @foreach($colors as $color)
                    <li>
                        <label class="filter-label">
                            <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                {{ in_array($color->id, request('colors', [])) ? 'checked' : '' }}>
                            <span>{{ $color->name }}</span>
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Price Range -->
            <div class="filter-section">
                <h6 class="filter-heading">Price Range</h6>
                <div class="d-flex gap-2">
                    <input type="number" name="price_min" class="form-control" placeholder="Min"
                        value="{{ request('price_min') }}">
                    <input type="number" name="price_max" class="form-control" placeholder="Max"
                        value="{{ request('price_max') }}">
                </div>
            </div>

        </form>
    </div>
    <div class="popup-footer">
        <button type="button" class="btn-secondary-popup" onclick="clearFilters()">Clear All</button>
        <button type="submit" form="mobile-filter-form" class="btn-primary-popup">Apply Filters</button>
    </div>
</div>

<!-- Sort Popup (Mobile Only) -->
<div class="popup-overlay d-lg-none" id="sortOverlay" onclick="toggleSortPopup()"></div>
<div class="popup-container d-lg-none" id="sortPopup">
    <div class="popup-header">
        <h5 class="mb-0">Sort By</h5>
        <button class="btn-close-popup" onclick="toggleSortPopup()">×</button>
    </div>
    <div class="popup-body">
        <form method="GET" id="mobileSortForm">
            
            <!-- Preserve all filter parameters -->
            @if(request('categories'))
                @foreach(request('categories') as $cat)
                <input type="hidden" name="categories[]" value="{{ $cat }}">
                @endforeach
            @endif
            
            @if(request('brands'))
                @foreach(request('brands') as $brand)
                <input type="hidden" name="brands[]" value="{{ $brand }}">
                @endforeach
            @endif
            
            @if(request('sizes'))
                @foreach(request('sizes') as $size)
                <input type="hidden" name="sizes[]" value="{{ $size }}">
                @endforeach
            @endif
            
            @if(request('colors'))
                @foreach(request('colors') as $color)
                <input type="hidden" name="colors[]" value="{{ $color }}">
                @endforeach
            @endif
            
            @if(request('price_min'))
            <input type="hidden" name="price_min" value="{{ request('price_min') }}">
            @endif
            
            @if(request('price_max'))
            <input type="hidden" name="price_max" value="{{ request('price_max') }}">
            @endif
            
            <div class="sort-options">
                <label class="sort-option">
                    <input type="radio" name="sort" value="" {{ request('sort') == '' ? 'checked' : '' }}>
                    <span>Default</span>
                </label>
                <label class="sort-option">
                    <input type="radio" name="sort" value="price_asc" {{ request('sort') == 'price_asc' ? 'checked' : '' }}>
                    <span>Price: Low to High</span>
                </label>
                <label class="sort-option">
                    <input type="radio" name="sort" value="price_desc" {{ request('sort') == 'price_desc' ? 'checked' : '' }}>
                    <span>Price: High to Low</span>
                </label>
                <label class="sort-option">
                    <input type="radio" name="sort" value="name_asc" {{ request('sort') == 'name_asc' ? 'checked' : '' }}>
                    <span>Name: A–Z</span>
                </label>
                <label class="sort-option">
                    <input type="radio" name="sort" value="name_desc" {{ request('sort') == 'name_desc' ? 'checked' : '' }}>
                    <span>Name: Z–A</span>
                </label>
                <label class="sort-option">
                    <input type="radio" name="sort" value="newest" {{ request('sort') == 'newest' ? 'checked' : '' }}>
                    <span>Newest First</span>
                </label>
            </div>
        </form>
    </div>
    <div class="popup-footer">
        <button type="submit" form="mobileSortForm" class="btn-primary-popup w-100">Apply Sort</button>
    </div>
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

// Mobile Popup Functions
function toggleFilterPopup() {
    const overlay = document.getElementById('filterOverlay');
    const popup = document.getElementById('filterPopup');
    
    overlay.classList.toggle('active');
    popup.classList.toggle('active');
    
    if (popup.classList.contains('active')) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
}

function toggleSortPopup() {
    const overlay = document.getElementById('sortOverlay');
    const popup = document.getElementById('sortPopup');
    
    overlay.classList.toggle('active');
    popup.classList.toggle('active');
    
    if (popup.classList.contains('active')) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
}

function clearFilters() {
    const form = document.getElementById('mobile-filter-form');
    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
    const numberInputs = form.querySelectorAll('input[type="number"]');
    
    checkboxes.forEach(checkbox => checkbox.checked = false);
    numberInputs.forEach(input => input.value = '');
}

// Desktop auto-submit
document.addEventListener('DOMContentLoaded', function() {
    // Desktop filter auto-submit
    const desktopFilterForm = document.getElementById('desktop-filter-form');
    if (desktopFilterForm) {
        desktopFilterForm.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', () => {
                desktopFilterForm.submit();
            });
        });
    }
    
    // Desktop sort auto-submit
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            document.getElementById('desktopSortForm').submit();
        });
    }
    
    // Mobile sort auto-submit
    const mobileSortForm = document.getElementById('mobileSortForm');
    if (mobileSortForm) {
        const radioButtons = mobileSortForm.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                mobileSortForm.submit();
            });
        });
    }
});
</script>
@endsection