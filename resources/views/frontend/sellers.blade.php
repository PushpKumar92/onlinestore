@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Sellers</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">All Seller</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- Seller-section---------------->
    <section class="product sellers footer-padding">
        <div class="container">
            <div class="seller-section">
                <div class="row g-5">
                    <div class="col-md-6">
                        <div class="seller-wrapper" data-aos="fade-right">
                            <div class="seller-info">
                                <h5>mexuvo</h5>
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>(4.0)</span>
                                </div>
                                <div class="seller-address">
                                    <div class="address email">
                                        <span>
                                            <i class="fa-regular fa-message" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            cacixi5247@corylan. 
                                        </span>
                                    </div>
                                    <div class="address tel">
                                        <span>
                                            <i class="fa-solid fa-phone" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            01300988957
                                        </span>
                                    </div>
                                    <div class="address location">
                                        <span>
                                            <i class="fa-solid fa-location-dot"
                                                style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            Farmgate,Dhaka,Bangladesh
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('seller.sidebar')}}" class="shop-btn">Shop Now</a>
                            </div>
                            <div class="seller-details">
                                <div class="seller-img">
                                    <img src="{{ asset('assets/images/homepage-one/seller-img/seller-img-1.png') }}"
                                        alt="product-img">
                                </div>
                                <div class="aurthor">
                                    <h5>mexuvo</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="seller-wrapper" data-aos="fade-right">
                            <div class="seller-info">
                                <h5>rayhans</h5>
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>(4.0)</span>
                                </div>
                                <div class="seller-address">
                                    <div class="address email">
                                        <span>
                                            <i class="fa-regular fa-message" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            cacixi5247@corylan.com
                                        </span>
                                    </div>
                                    <div class="address tel">
                                        <span>
                                            <i class="fa-solid fa-phone" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            01300988957
                                        </span>
                                    </div>
                                    <div class="address location">
                                        <span>
                                            <i class="fa-solid fa-location-dot"
                                                style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            Farmgate,Dhaka,Bangladesh
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('seller.sidebar')}}" class="shop-btn">Shop Now</a>
                            </div>
                            <div class="seller-details">
                                <div class="seller-img">
                                    <img src="{{ asset('assets/images/homepage-one/seller-img/seller-img-6.png') }}"
                                        alt="product-img">
                                </div>
                                <div class="aurthor">
                                    <h5>rayhans</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="seller-wrapper" data-aos="fade-right">
                            <div class="seller-info">
                                <h5>Habbriyi</h5>
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>(4.0)</span>
                                </div>
                                <div class="seller-address">
                                    <div class="address email">
                                        <span>
                                            <i class="fa-regular fa-message" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            cacixi5247@corylan.com
                                        </span>
                                    </div>
                                    <div class="address tel">
                                        <span>
                                            <i class="fa-solid fa-phone" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            01300988957
                                        </span>
                                    </div>
                                    <div class="address location">
                                        <span>
                                            <i class="fa-solid fa-location-dot"
                                                style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            Farmgate,Dhaka,Bangladesh
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('seller.sidebar')}}" class="shop-btn">Shop Now</a>
                            </div>
                            <div class="seller-details">
                                <div class="seller-img">
                                    <img src="{{ asset('assets/images/homepage-one/seller-img/seller-img-5.png') }}"
                                        alt="product-img">
                                </div>
                                <div class="aurthor">
                                    <h5>Habbriyi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="seller-wrapper" data-aos="fade-left">
                            <div class="seller-info">
                                <h5>Rikayi Rox</h5>
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>(4.0)</span>
                                </div>
                                <div class="seller-address">
                                    <div class="address email">
                                        <span>
                                            <i class="fa-regular fa-message" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            cacixi5247@corylan.com
                                        </span>
                                    </div>
                                    <div class="address tel">
                                        <span>
                                            <i class="fa-solid fa-phone" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            01300988957
                                        </span>
                                    </div>
                                    <div class="address location">
                                        <span>
                                            <i class="fa-solid fa-location-dot"
                                                style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            Farmgate,Dhaka,Bangladesh
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('seller.sidebar')}}" class="shop-btn">Shop Now</a>
                            </div>
                            <div class="seller-details">
                                <div class="seller-img">
                                    <img src="{{ asset('assets/images/homepage-one/seller-img/seller-img-4.png') }}"
                                        alt="product-img">
                                </div>
                                <div class="aurthor">
                                    <h5>Rikayi Rox</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="seller-wrapper" data-aos="fade-right">
                            <div class="seller-info">
                                <h5>Fusion X</h5>
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>(4.0)</span>
                                </div>
                                <div class="seller-address">
                                    <div class="address email">
                                        <span>
                                            <i class="fa-regular fa-message" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            cacixi5247@corylan.com
                                        </span>
                                    </div>
                                    <div class="address tel">
                                        <span>
                                            <i class="fa-solid fa-phone" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            01300988957
                                        </span>
                                    </div>
                                    <div class="address location">
                                        <span>
                                            <i class="fa-solid fa-location-dot"
                                                style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            Farmgate,Dhaka,Bangladesh
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('seller.sidebar')}}" class="shop-btn">Shop Now</a>
                            </div>
                            <div class="seller-details">
                                <div class="seller-img">
                                    <img src="{{ asset('assets/images/homepage-one/seller-img/seller-img-3.png') }}"
                                        alt="product-img">
                                </div>
                                <div class="aurthor">
                                    <h5>Fusion X</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="seller-wrapper" data-aos="fade-left">
                            <div class="seller-info">
                                <h5>Eecoms Shop</h5>
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>(4.0)</span>
                                </div>
                                <div class="seller-address">
                                    <div class="address email">
                                        <span>
                                            <i class="fa-regular fa-message" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            cacixi5247@corylan.com
                                        </span>
                                    </div>
                                    <div class="address tel">
                                        <span>
                                            <i class="fa-solid fa-phone" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            01300988957
                                        </span>
                                    </div>
                                    <div class="address location">
                                        <span>
                                            <i class="fa-solid fa-location-dot"
                                                style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">
                                            Farmgate,Dhaka,Bangladesh
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('seller.sidebar')}}" class="shop-btn">Shop Now</a>
                            </div>
                            <div class="seller-details">
                                <div class="seller-img">
                                    <img src="{{ asset('assets/images/homepage-one/seller-img/seller-img-2.png') }}"
                                        alt="product-img">
                                </div>
                                <div class="aurthor">
                                    <h5>Eecoms Shop</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- Seller-section-end---------------->

</main>
@endsection