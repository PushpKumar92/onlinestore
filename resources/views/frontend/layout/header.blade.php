<header id="header" class="header">
    <div class="header-top-section">
        <div class="container">
            <div class="header-top">
                <div class="header-profile">
                    <li><a href="{{ route('user.profile') }}" class="text-white">Account</a></li>
                    <li><a href="{{ route('order') }}" class="text-white"> Track order</a></li>
                    <li><a href="{{ route('faq') }}" class="text-white">Support</a></li>
                </div>
                <div class="header-contact d-none d-lg-block">
                    <a href="tel:+91 967-5700-765">
                        <span class="text-success text-white">Need help? Call us:</span>
                        <span class="contact-number text-white">91-8837810916</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-center-section d-none d-lg-block">
        <div class="container">
            <div class="header-center">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/images/logos/logo.png') }}" alt="logo">
                    </a>

                </div>
                <div class="header-cart-items">
                    <!-- Centered Search Box -->
                    <div class="mx-auto my-2 my-lg-0" style="width: 500px;">
                        <form action="{{ route('search') }}" method="GET" class="d-flex mx-auto my-2"
                            style="width:500px;">
                            <input class="form-control me-2" type="search" name="query" placeholder="Search products..."
                                aria-label="Search" value="{{ request('query') }}" style="border:2px solid #00674f;">
                            <button class="btn-1 btn-success w-auto px-5" type="submit">Search</button>
                        </form>

                    </div>

                    <div class="header-favourite position-relative">
                        <div class="header-favourite">
                            <a href="{{ route('wishlist.index') }}">
                                <i class="fa fa-heart"></i>
                                <span id="watchlist-badge" class="cart-text text-success">Watchlist (<span
                                        id="wishlist-count">0</span>)</span>
                            </a>
                        </div>
                    </div>
                    <div class="header-cart position-relative">
                        <a href="{{ route('cart.show') }}" class="cart-item position-relative">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-text text-success">Cart</span>
                            @php
                            $cartCount = 0;
                            if (Auth::check()) {
                            $cartCount = \App\Models\CartItem::where('user_id', Auth::id())->sum('quantity');
                            } elseif (session('cart')) {
                            $cartCount = collect(session('cart'))->sum('quantity');
                            }
                            @endphp

                            @if($cartCount > 0)
                            <span
                                class="cart-count badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                                {{ $cartCount }}
                            </span>
                            @endif
                        </a>
                    </div>
                    <div class="header-user">
                        @if(Auth::guard('user')->check())
                        @php
                        $user = Auth::guard('user')->user();
                        @endphp
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" id="userDropdown" role="button">
                                <img src="{{ asset('profile_images/' . $user->profile_image) }}" alt="Profile"
                                    style="width:30px; height:30px; border-radius:50%; object-fit:cover;">
                                {{ $user->name }}

                            </a>
                            <ul class="submenu dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                            </ul>
                        </div>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="text-success">Login</a>
                        </li>
                        @endif
                    </div>

                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <nav class="mobile-menu d-block d-lg-none">
        <div class="mobile-menu-header d-flex justify-content-between align-items-center">
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">
                <span>
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="14" height="1" fill="#1D1D1D" />
                        <rect y="8" width="14" height="1" fill="#1D1D1D" />
                        <rect y="4" width="10" height="1" fill="#1D1D1D" />
                    </svg>
                </span>
            </button>
            <a href="{{ route('index') }}" class="mobile-header-logo">
                <img src="./assets/images/logos/logo.png" alt="logo">
            </a>
            <a href="{{ route('cart.show')}}" class="header-cart cart-item">
                <span>
                    <i class="fas fa-shopping-cart" style="font-size: 28px; color: #6E6D79;"></i>
                </span>

            </a>
        </div>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">

            <div class="offcanvas-body">
                <div class="header-top">
                    <div class="header-cart ">
                        <div class="header-favourite">
                            <a href="{{route('wishlist.index')}}" class="cart-item">
                                <span>
                                    <i class="fas fa-search" style="font-size: 24px; color: #00674f;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="shop-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        </button>
                    </div>
                </div>
                <div class="header-input">
                    <input type="text" placeholder="Search....">
                    <span>
                        <i class="fas fa-search" style="font-size: 22px; color: black;"></i>
                    </span>
                </div>

                <div class="category-dropdown">
                    <ul class="category-list">
                        @forelse($categories as $category)
                        <li class="category-list-item">
                            <a href="{{ route('productall', ['category' => $category->id]) }}">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex align-items-center">
                                        @if($category->image)
                                        <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                            alt="{{ $category->name }}" class="img-fluid rounded">
                                        @else
                                        <img src="{{ asset('assets/images/default-category.png') }}" alt="No Image"
                                            class="img-fluid rounded">
                                        @endif
                                        <span class="dropdown-text">{{ $category->name }}</span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @empty
                        <li class="text-muted text-center py-3">No categories available.</li>
                        @endforelse
                    </ul>
                    🧠 What This Does
                    ✅ Dynamically shows all categories from your $categories variable.
                    ✅ Uses the same design layout as your existing hardcoded items.
                    ✅ Adds a scrollbar after 10–12 items (depending on height).
                    ✅ Keeps it clean, responsive, and visually consistent.
                    ✅ Automatically handles cases where category images might be missing.

                    💡 Optional Enhancement
                    If you want to limit the initial view to 10 categories and reveal the rest with a “Show More”
                    button, I can give you a short JS snippet for that version too — do you want that version instead of
                    scroll?
                </div>
            </div>
        </div>
    </nav>


   <!-- MAIN HEADER WRAPPER -->
<div class="main-header-wrapper">

    <!-- ──────────────────────────────── -->
    <!-- STICKY MOBILE HEADER (Amazon Style) -->
    <!-- ──────────────────────────────── -->
    <header class="mobile-header d-lg-none">
        <div class="mobile-top">
            <button class="menu-btn text-white" onclick="openMobileMenu()">☰</button>

            <a href="{{ route('index') }}" class="logo-wrap">
                <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo">
            </a>

            <a href="{{ route('cart.show') }}" class="cart-btn position-relative">
                🛒
                <span class="badge-count">
                    {{ session('cart_count', 0) }}
                </span>
            </a>
        </div>

        <!-- <div class="mobile-search">
            <form action="{{ route('productall') }}" method="GET">
                <input type="text" name="search" placeholder="Search products...">
                <button>🔍</button>
            </form>
        </div> -->
    </header>


    <!-- ──────────────────────────────── -->
    <!-- DESKTOP HEADER (Your Existing Code) -->
    <!-- ──────────────────────────────── -->
    <div class="header-bottom bg-dark text-white py-2 d-none d-lg-block" id="stickyHeader">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <!-- Category Menu Desktop -->
                <div class="category-menu-section position-relative">
                    <button class="dropdown-btn d-flex align-items-center" onclick="toggleMenu()">
                        <span class="dropdown-icon me-2">
                            <svg width="20" height="13" viewBox="0 0 14 9" fill="white">
                                <rect width="14" height="1" />
                                <rect y="8" width="14" height="1" />
                                <rect y="4" width="10" height="1" />
                            </svg>
                        </span>
                        <span class="list-text fw-bold text-white">All Categories</span>
                    </button>

                    <div class="category-dropdown shadow-lg rounded bg-white position-absolute mt-2" id="subMenu">
                        <ul class="category-list p-0 m-0">
                            @foreach($categories as $category)
                                <li class="category-list-item">
                                    <a href="{{ route('productall',['category'=>$category->id]) }}" class="d-flex align-items-center justify-content-between p-2 text-dark">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $category->image ? asset('uploads/categories/'.$category->image) : asset('assets/images/default-category.png') }}" class="rounded me-2" width="28" alt="">
                                            <span>{{ $category->name }}</span>
                                        </div>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="header-nav-menu">
                    <ul class="menu-list d-flex gap-4 m-0">
                        <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
                        <li><a href="{{ route('productall') }}" class="text-white">Shop</a></li>
                        <li><a href="{{ route('frontend.sales') }}" class="text-white">Sales</a></li>
                        <li><a href="{{ route('about') }}" class="text-white">About</a></li>
                        <li><a href="{{ route('blog.page') }}" class="text-white">Blog</a></li>
                        <li><a href="{{ route('contact.us') }}" class="text-white">Contact</a></li>
                        <li class="position-relative">
                            <a href="#" class="text-white">Pages</a>
                            <ul class="header-sub-menu shadow rounded py-3">
                                <li><a href="{{ route('allproducts') }}">All Products</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy</a></li>
                                <li><a href="{{ route('terms') }}">Terms</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- MOBILE SLIDE MENU -->
<div id="mobileMenu" class="mobile-menu bg-white">
    <div class="p-3 border-bottom d-flex justify-content-between">
        <h5 class="m-0">Menu</h5>
        <button class="btn" onclick="closeMobileMenu()"><i class="fa-solid fa-xmark fs-3"></i></button>
    </div>

    <ul class="mobile-nav list-unstyled p-3">
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="{{ route('productall') }}">Shop</a></li>
        <li><a href="{{ route('frontend.sales') }}">Sales</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('blog.page') }}">Blog</a></li>
        <li><a href="{{ route('contact.us') }}">Contact</a></li>
        <li><a href="{{ route('allproducts') }}">All Products</a></li>
        <li><a href="{{ route('privacy') }}">Privacy</a></li>
        <li><a href="{{ route('terms') }}">Terms</a></li>
        <li><a href="{{ route('faq') }}">FAQ</a></li>
    </ul>
</div>

</header>