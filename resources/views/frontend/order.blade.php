@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Order</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Order</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- order-section---------------->
    <section class="order product footer-padding">
        <div class="container">
            <div class="order-title">
                <h5 class="wrapper-heading">Track Your Order</h5>
                <p class="paragraph">Enter your order taracking number and your secreet id.</p>
                <div class="order-section">
                    <div class="row gy-5">
                        <div class="col-lg-8">
                            <div class="login-section">
                                <div class="review-form">
                                    <div class="review-inner-form ">
                                        <div class="review-form-name">
                                            <label for="track-number" class="form-label">Order Tracking Number**</label>
                                            <input type="number" id="track-number" class="form-control"
                                                placeholder="Order Number">
                                        </div>
                                        <div class="review-form-name">
                                            <label for="Delivery" class="form-label">Delivery Date*</label>
                                            <input type="date" id="Delivery" class="form-control">
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Track Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order-img text-center" data-aos="fade-right" data-aos-duration="1000">
                               <img src="{{ asset('assets/images/homepage-one/order.png') }}" alt="product-img">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- order-section-end---------------->

 </main>
@endsection