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
                        <a href="{{ route('wishlist.index') }}">
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

            <div class="offcanvas-body">
                <div class="header-top">
                    <div class="header-cart ">
                        <div class="header-favourite">
                            <a href="{{route('wishlist.index')}}" class="cart-item">
                                <span>
                                    <svg width="35" height="27" viewBox="0 0 35 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.4047 8.54989C11.6187 8.30247 11.8069 8.07783 12.0027 7.86001C15.0697 4.45162 20.3879 5.51717 22.1581 9.60443C23.4189 12.5161 22.8485 15.213 20.9965 17.6962C19.6524 19.498 17.95 20.9437 16.2722 22.4108C15.0307 23.4964 13.774 24.5642 12.5246 25.6408C11.6986 26.3523 11.1108 26.3607 10.2924 25.6397C8.05177 23.6657 5.79225 21.7125 3.59029 19.6964C2.35865 18.5686 1.33266 17.2553 0.638823 15.7086C-0.626904 12.8872 0.0324709 9.41204 2.22306 7.41034C4.84011 5.01855 8.81757 5.36918 11.1059 8.19281C11.1968 8.30475 11.2907 8.41404 11.4047 8.54989Z"
                                            fill="#6E6D79" />
                                        <circle cx="26.7662" cy="8" r="8" fill="#00674f" />
                                        <path
                                            d="M26.846 13.1392C26.1632 13.1392 25.5534 13.0215 25.0164 12.7862C24.4828 12.5509 24.0602 12.2244 23.7487 11.8068C23.4404 11.3859 23.2747 10.8987 23.2515 10.3452H24.8126C24.8325 10.6468 24.9336 10.9086 25.1159 11.1307C25.3015 11.3494 25.5434 11.5185 25.8417 11.6378C26.14 11.7571 26.4715 11.8168 26.836 11.8168C27.2371 11.8168 27.5917 11.7472 27.9 11.608C28.2115 11.4687 28.4551 11.2749 28.6308 11.0263C28.8065 10.7744 28.8943 10.4844 28.8943 10.1562C28.8943 9.81487 28.8065 9.51491 28.6308 9.25639C28.4584 8.99455 28.2049 8.78906 27.8701 8.63991C27.5387 8.49077 27.1377 8.41619 26.667 8.41619H25.8069V7.16335H26.667C27.0448 7.16335 27.3763 7.09541 27.6613 6.95952C27.9497 6.82363 28.1751 6.63471 28.3375 6.39276C28.4999 6.14749 28.5811 5.8608 28.5811 5.53267C28.5811 5.2178 28.5098 4.94437 28.3673 4.71236C28.2281 4.47704 28.0292 4.29309 27.7707 4.16051C27.5155 4.02794 27.2139 3.96165 26.8659 3.96165C26.5344 3.96165 26.2245 4.02296 25.9362 4.1456C25.6511 4.26491 25.4191 4.43726 25.2402 4.66264C25.0612 4.88471 24.9651 5.15151 24.9518 5.46307H23.4653C23.4819 4.91288 23.6443 4.42898 23.9525 4.01136C24.2641 3.59375 24.6751 3.26728 25.1855 3.03196C25.6959 2.79664 26.2627 2.67898 26.8858 2.67898C27.5387 2.67898 28.1021 2.80658 28.5761 3.06179C29.0534 3.31368 29.4213 3.65009 29.6798 4.07102C29.9416 4.49195 30.0709 4.95265 30.0676 5.45312C30.0709 6.0232 29.9118 6.5071 29.5903 6.90483C29.2721 7.30256 28.8479 7.56937 28.3176 7.70526V7.7848C28.9937 7.88755 29.5174 8.15601 29.8886 8.5902C30.2631 9.02438 30.4487 9.56297 30.4454 10.206C30.4487 10.7661 30.293 11.2682 29.9781 11.7124C29.6665 12.1565 29.2406 12.5062 28.7004 12.7614C28.1601 13.0133 27.542 13.1392 26.846 13.1392Z"
                                            fill="#F9FFFB" />
                                    </svg>
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
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.9708 16.4151C12.5227 17.4021 10.9758 17.9723 9.27353 18.0062C5.58462 18.0802 2.75802 16.483 1.05056 13.1945C-1.76315 7.77253 1.33485 1.37571 7.25086 0.167548C12.2281 -0.848249 17.2053 2.87895 17.7198 7.98579C17.9182 9.95558 17.5566 11.7939 16.5852 13.5061C16.4512 13.742 16.483 13.8725 16.6651 14.0553C18.2412 15.6386 19.8112 17.2272 21.3735 18.8244C22.1826 19.6513 22.2058 20.7559 21.456 21.4932C20.7697 22.1678 19.7047 22.1747 18.9764 21.4793C18.3623 20.8917 17.7774 20.2737 17.1796 19.6688C16.118 18.5929 15.0564 17.5153 13.9708 16.4151ZM2.89545 9.0364C2.91692 12.4172 5.59664 15.1164 8.91967 15.1042C12.2384 15.092 14.9138 12.3493 14.8889 8.98505C14.864 5.63213 12.1826 2.92508 8.89047 2.92857C5.58204 2.93118 2.87397 5.68958 2.89545 9.0364Z"
                                fill="black"></path>
                        </svg>
                    </span>
                </div>

                <div class="category-dropdown">
                    <ul class="category-list">
                        <li class="category-list-item">
                            <a href="{{ route('product.sidebar') }}">Link Text</a>

                            <div class="dropdown-item d-flex justify-content-between align-items-center">
                                <div class="dropdown-list-item d-flex">
                                    <span class="dropdown-img">
                                        <img src="./assets/images/homepage-one/category-img/dresses.webp" alt="dress">
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
                                            <img src="./assets/images/homepage-one/category-img/bags.webp" alt="Bags">
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
                                            <img src="./assets/images/homepage-one/category-img/gift.webp" alt="gift">
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
                                            <img src="./assets/images/homepage-one/category-img/watch.webp" alt="watch">
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
                                            <img src="./assets/images/homepage-one/category-img/ring.webp" alt="ring">
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
                                            <img src="./assets/images/homepage-one/category-img/glass.webp" alt="glass">
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
                                            <img src="./assets/images/homepage-one/category-img/baby.webp" alt="baby">
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
                        @if(Auth::guard('vendor')->check())
                        @php
                        $vendor = Auth::guard('vendor')->vendor();
                        @endphp
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" id="userDropdown" role="button">
                                <img src="{{ asset('profile_images/' . $user->profile_image) }}" alt="Profile"
                                    style="width:30px; height:30px; border-radius:50%; object-fit:cover;">
                                {{ $vendor->name }}

                            </a>
                            <ul class="submenu dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                            </ul>
                        </div>
                        @else
                        <li>
                            <a href="{{ route('vendor.register') }}" class="shop-btn">Become Vendor</a>
                        </li>
                        @endif


                        </a>
                    </div>
            </div>
        </div>
    </div>
</header>