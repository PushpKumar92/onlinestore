@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- products-info-section--------------->
    <section class="product product-info">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="{{ route('productall')}}">Shop</a></span>
                <span class="devider">/</span>
                <span><a href="#">Product Details</a></span>
            </div>
            <div class="product-info-section">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="product-info-img" data-aos="fade-right">
                            <div class="swiper product-top">
                                <div class="product-discount-content">
                                    <h4>-50%</h4>
                                </div>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-14.webp') }}"
                                            alt="product-img">

                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                            alt="product-img">

                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-2.webp') }}"
                                            alt="product-img">

                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                            alt="product-img">

                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                            alt="product-img">

                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-2.webp') }}"
                                            alt="product-img">

                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                            alt="product-img">

                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                            alt="product-img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-2.webp') }}"
                                            alt="product-img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                            alt="product-img">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper product-bottom">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-16.png') }}"
                                            alt="product-img">
                                    </div>
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-17.png') }}"
                                            alt="product-img">
                                    </div>
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-slider-img-1.webp') }}"
                                            alt="product-img">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-info-content" data-aos="fade-left">
                            <span class="wrapper-subtitle">BOY'S FASHION</span>
                            <h5>Rainbow Sequin Profresonal Coat
                            </h5>
                            <div class="ratings">
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="text">6 Reviews</span>
                            </div>
                            <div class="price">
                                <span class="price-cut">$9.99</span>
                                <span class="new-price">$6.99</span>
                            </div>
                            <p class="content-paragraph">It is a long established fact that a reader will be distracted
                                by <span class="inner-text">the readable there content of a page.</span></p>
                            <hr>
                            <div class="product-availability">
                                <span>Availabillity : </span>
                                <span class="inner-text">132 Products Available</span>
                            </div>
                            <div class="product-size">
                                <P class="size-title">Size</P>
                                <div class="size-section">
                                    <span class="size-text">Select your size</span>
                                    <div class="toggle-btn">
                                        <span class="toggle-btn2"></span>
                                        <span class="chevron">
                                            <i class="fas fa-chevron-down" style="color: #222222; font-size: 11px;"></i>

                                        </span>
                                    </div>
                                </div>
                                <ul class="size-option">
                                    <li class="option">
                                        <span class="option-text">Small</span>
                                        <span class="option-measure">3”W x 3”D x 5”H</span>
                                    </li>
                                    <li class="option">
                                        <span class="option-text">Medium</span>
                                        <span class="option-measure">3”W x 3”D x 6”H</span>
                                    </li>
                                    <li class="option">
                                        <span class="option-text">Large</span>
                                        <span class="option-measure">6”W x 3”D x 7”H</span>
                                    </li>
                                    <li class="option">
                                        <span class="option-text">Extra Large</span>
                                        <span class="option-measure">8”W x 4”D x 8”H</span>
                                    </li>
                                    <li class="option">
                                        <span class="option-text">2XL</span>
                                        <span class="option-measure">10”W x 5”D x 9”H</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-quantity">
                                <div class="quantity-wrapper">
                                    <div class="quantity">
                                        <span class="minus">
                                            -
                                        </span>
                                        <span class="number">1</span>
                                        <span class="plus">
                                            +
                                        </span>
                                    </div>
                                    <div class="wishlist">
                                        <span>
                                            <i class="fas fa-heart" style="color: #797979; font-size: 24px;"></i>

                                        </span>
                                    </div>
                                </div>
                                <a href="#" class="shop-btn">
                                    <span>
                                        <i class="fa-solid fa-plus" style="color:white; font-size:25px:"></i>
                                    </span>
                                    <span>Add to Cart</span>
                                </a>
                            </div>
                            <hr>
                            <div class="product-details">
                                <p class="category">Category : <span class="inner-text">Kitchen</span></p>
                                <p class="tags">Tags : <span class="inner-text">Beer, Foamer</span></p>
                                <p class="sku">SKU : <span class="inner-text">KE-91039</span></p>
                            </div>
                            <hr>
                            <div class="product-report">
                                <a href="#" class="report" onclick="modalAction('.action')">
                                    <span>
                                        <i class="fa-solid fa-flag" style="color: #EB5757; font-size: 16px;"></i>
                                    </span>

                                    <span>Report This Item</span>
                                </a>
                                <!-- modal -->
                                <div class="modal-wrapper action">
                                    <div onclick="modalAction('.action')" class="anywhere-away"></div>

                                    <!-- change this -->
                                    <div class="login-section account-section modal-main">
                                        <div class="review-form">
                                            <div class="review-content">
                                                <h5 class="comment-title">Report Products</h5>
                                                <div class="close-btn">
                                                    <img src="./assets/images/homepage-one/close-btn.png"
                                                        onclick="modalAction('.action')" alt="close-btn">
                                                </div>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="reporttitle" class="form-label">Enter Report Ttile*</label>
                                                <input type="text" id="reporttitle" class="form-control"
                                                    placeholder="Reports Headline here">
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="reportnote" class="form-label">Enter Report Note*</label>
                                                <textarea name="ticketmassage" id="reportnote" cols="40" rows="3"
                                                    class="form-control" placeholder="Type Here"></textarea>
                                            </div>
                                            <div class="login-btn text-center">
                                                <a href="#" onclick="modalAction('.action')" class="shop-btn">Submit
                                                    Report</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- change this -->

                                </div>
                            </div>
                            <div class="product-share">
                                <p>Share This:</p>
                                <div class="social-icons">
                                    <a href="#">
                                        <span class="facebook">
                                            <i class="fab fa-facebook-f" style="color: #3E75B2; font-size: 18px;"></i>
                                        </span>

                                    </a>
                                    <a href="#">
                                        <span class="pinterest">
                                            <i class="fab fa-pinterest-p" style="color: #E12828; font-size: 18px;"></i>
                                        </span>

                                    </a>
                                    <a href="#">
                                        <span class="twitter">
                                            <i class="fab fa-twitter" style="color: #3FD1FF; font-size: 18px;"></i>
                                        </span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- products-info-end--------------->

    <!--------------- products-details-section--------------->
    <section class="product product-description">
        <div class="container">
            <div class="product-detail-section">
                <nav>
                    <div class="nav nav-tabs nav-item" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Description</button>
                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review"
                            type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews</button>
                        <button class="nav-link" id="nav-seller-tab" data-bs-toggle="tab" data-bs-target="#nav-seller"
                            type="button" role="tab" aria-controls="nav-seller" aria-selected="false">Seller
                            Info</button>

                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="product-intro-section">
                            <h5 class="intro-heading">Introduction</h5>
                            <p class="product-details">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries but also the on leap into electronic typesetting,
                                remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop
                                publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a
                                type specimen book.
                            </p>
                        </div>
                        <div class="product-feature">
                            <h5 class="intro-heading">Features :</h5>
                            <ul>
                                <li>
                                    <p>slim body with metal cover</p>
                                </li>
                                <li>
                                    <p>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</p>
                                </li>
                                <li>
                                    <p>8GB DDR4 RAM and fast 512GB PCIe SSD</p>
                                </li>
                                <li>
                                    <p>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with
                                        gesture support</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab"
                        tabindex="0">
                        <div class="product-review-section" data-aos="fade-up">
                            <h5 class="intro-heading">Reviews</h5>

                            <div class="review-wrapper">
                                <div class="wrapper">
                                    <div class="wrapper-aurthor">
                                        <div class="wrapper-info">
                                            <div class="aurthor-img">
                                                <img src="./assets/images/homepage-one/aurthor-img-1.webp"
                                                    alt="aurthor-img">
                                            </div>
                                            <div class="author-details">
                                                <h5>Sajjad Hossain</h5>
                                                <p>London, UK</p>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>(5.0)</span>
                                        </div>
                                    </div>
                                    <div class="wrapper-description">
                                        <p class="wrapper-details">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the redi 1500s, when an unknown printer took a galley of
                                            type and scrambled it to make a type specimen book. It has survived not only
                                            five centuries but also the on leap into electronic typesetting, remaining
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- products-details-end--------------->

    <!--------------- weekly-section--------------->
    <section class="product weekly-sale product-weekly footer-padding">
        <div class="container">
            <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="#" class="view">View All</a>
            </div>
            <div class="weekly-sale-section">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$30.99</span>
                                        <span class="new-price">$15.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$30.99</span>
                                        <span class="new-price">$15.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$30.99</span>
                                        <span class="new-price">$15.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                    alt="Product Image">
                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$30.99</span>
                                        <span class="new-price">$15.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- weekly-section-end--------------->
</main>

@endsection