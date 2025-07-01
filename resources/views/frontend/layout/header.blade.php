<header id="header" class="header">
    <div class="header-top-section">
        <div class="container">
            <div class="header-top">
                <div class="header-profile">
                    <li><a href="{{ route('user.profile') }}">Account</a></li>
                    <li><a href="{{ route('order') }}"> Track order</a></li>
                    <li><a href="{{ route('faq') }}">Support</a></li>
                </div>
                <div class="header-contact d-none d-lg-block">
                    <a href="tel:+91 967-5700-765">
                        <span>Need help? Call us:</span>
                        <span class="contact-number">+91 967-5700-765</span>
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
                    <div class="mx-auto my-2 my-lg-0" style="width: 400px;">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>

                    <div class="header-favourite">
                        <a href="{{ route('watchlist.index') }}">
                            <i class="fa fa-heart"></i>
                            <span id="watchlist-badge" class="badge bg-danger">Watchlist</span>
                        </a>
                    </div>
                    <div class="header-cart position-relative">
                        <a href="{{ route('cart.show') }}" class="cart-item position-relative">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-text">Cart</span>
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
                            <a href="{{ route('login') }}">Login</a>
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
        </div>
    </nav>

    <div class="header-bottom d-lg-block d-none">
        <div class="container">
            <div class="header-nav">
                <div class="category-menu-section position-relative">
                    <div class="empty position-fixed" onclick="tooglmenu()"></div>
                    <button class="dropdown-btn" onclick="tooglmenu()">
                        <span class="dropdown-icon">
                            <svg width="14" height="9" viewBox="0 0 14 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="14" height="1" />
                                <rect y="8" width="14" height="1" />
                                <rect y="4" width="10" height="1" />
                            </svg>
                        </span>
                        <span class="list-text">
                            All Categories
                        </span>
                    </button>
                    <div class="category-dropdown position-absolute" id="subMenu">
                        <ul class="category-list">
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item">
                                        <div class="dropdown-list-item">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/dresses.webp"
                                                    alt="dress">
                                            </span>
                                            <span class="dropdown-text">
                                                Dresses
                                            </span>
                                        </div>
                                        <div class="drop-down-list-icon">
                                            <span>
                                                <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                        transform="rotate(45 1.5 0.818359)" fill="#1D1D1D" />
                                                    <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                        transform="rotate(135 5.58984 4.90918)" fill="#1D1D1D" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/bags.webp"
                                                    alt="Bags">
                                            </span>
                                            <span class="dropdown-text">
                                                Bags
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/sweaters.webp"
                                                    alt="sweaters">
                                            </span>
                                            <span class="dropdown-text">
                                                Sweaters
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/shoes.webp"
                                                    alt="sweaters">
                                            </span>
                                            <span class="dropdown-text">
                                                Boots
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/gift.webp"
                                                    alt="gift">
                                            </span>
                                            <span class="dropdown-text">
                                                Gifts
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/sneakers.webp"
                                                    alt="sneakers">
                                            </span>
                                            <span class="dropdown-text">
                                                Sneakers
                                            </span>
                                        </div>
                                        <div class="drop-down-list-icon">
                                            <span>
                                                <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                        transform="rotate(45 1.5 0.818359)" fill="#1D1D1D" />
                                                    <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                        transform="rotate(135 5.58984 4.90918)" fill="#1D1D1D" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/watch.webp"
                                                    alt="watch">
                                            </span>
                                            <span class="dropdown-text">
                                                Watches
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/ring.webp"
                                                    alt="ring">
                                            </span>
                                            <span class="dropdown-text">
                                                Gold Ring
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/cap.webp" alt="cap">
                                            </span>
                                            <span class="dropdown-text">
                                                Cap
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/glass.webp"
                                                    alt="glass">
                                            </span>
                                            <span class="dropdown-text">
                                                Sunglasses
                                            </span>
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
                            <li class="category-list-item">
                                <a href="{{ route('product.sidebar') }}">
                                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                                        <div class="dropdown-list-item d-flex">
                                            <span class="dropdown-img">
                                                <img src="./assets/images/homepage-one/category-img/baby.webp"
                                                    alt="baby">
                                            </span>
                                            <span class="dropdown-text">
                                                Baby Shop
                                            </span>
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
                        </ul>
                    </div>
                </div>
                <div class="header-nav-menu">
                    <ul class="menu-list">
                        <li>
                            <a href="{{ route('index') }}">
                                <span class="list-text">Home</span>
                            </a>
                        <li>
                            <li>
                            <a href="{{ route('product.sidebar') }}">
                                <span class="list-text">shop</span>
                            </a>
                        <li>
                            <a href="#">
                                <span class="list-text">Pages</span>
                                <span>
                                    <i class="fa-solid fa-plus" style="color:white; font-size:18px;"></i>
                                </span>
                            </a>
                            <ul class="header-sub-menu">
                                <li><a href="{{ route('product.info') }}">Product Details</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('product.sidebar') }}">Shop Category Icon</a></li>
                                <li><a href="{{ route('product.sidebar') }}">Shop List View</a></li>
                            </ul>

                        </li>
                        <li>
                            <a href="{{ route('about') }}">
                                <span class="list-text">About</span>
                            </a>

                        </li>
                        <li>
                            <a href="{{ route('blog') }}">
                                <span class="list-text">Blog</span>
                            </a>
                            <ul class="header-sub-menu">
                                <li><a href="{{ route('blog.details') }}">blog details</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('contact.us') }}">
                                <span class="list-text">Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="header-vendor-btn">
                    <a href="{{ route('vendor.register') }}" class="shop-btn">Become Vendor</a>


                    </a>
                </div>
            </div>
        </div>
    </div>
</header>