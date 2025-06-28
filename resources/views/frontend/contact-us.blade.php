@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Contact</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Contact</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- contact-section---------------->
    <section class="contact product footer-padding">
        <div class="container">
            <div class="contact-section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info-section">
                            <div class="contact-information">
                                <h5 class="wrapper-heading">Contact Information</h5>
                                <p class="paragraph">Fill the form below or write us .We will help you as soon as
                                    possible.</p>
                                <div class="contact-wrapper">
                                    <div class="row gy-5">
                                        <div class="col-sm-6">
                                            <div class="wrapper phone">
                                                <div class="wrapper-img">
                                                    <div class="wrapper-img">
                                                        <span>
                                                            <i class="fa-solid fa-phone-volume"
                                                                style="font-size: 50px; color: #00674f;"></i>
                                                        </span>

                                                    </div>

                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="wrapper-heading">Phone</h5>
                                                    <p class="paragraph">+1347-430-9510</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="wrapper phone">
                                                <div class="wrapper-img">
                                                    <span>
                                                        <i class="fa-solid fa-envelope"
                                                            style="font-size: 50px; color: #00674f;"></i>
                                                    </span>
                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="wrapper-heading">Email</h5>
                                                    <p class="paragraph">User@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="address">
                                                <div class="contact-address">
                                                    <div class="address-icon">
                                                        <i class="fa-solid fa-location-dot"
                                                            style="font-size: 50px; color: #00674f;"></i>
                                                    </div>
                                                    <div class="address-content">
                                                        <h5 class="wrapper-heading">Address</h5>
                                                        <p class="paragraph">2140 W Thunderbird Rd, Phoenix, Arkansas
                                                            85023, United States</p>
                                                    </div>
                                                </div>
                                                <div class="contact-map">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.2527999867!2d-74.14448761897569!3d40.6976312333577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1691924335610!5m2!1sen!2sbd"
                                                        width="524" height="206" allowfullscreen="" loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="question-section login-section ">
                            <div class="review-form">
                                <h5 class="comment-title">Get In Touch</h5>
                                <div class=" account-inner-form">
                                    <div class="review-form-name">
                                        <label for="fname" class="form-label">Name*</label>
                                        <input type="text" id="fname" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="review-form-name">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" id="email" class="form-control"
                                            placeholder="user@gmail.com">
                                    </div>
                                    <div class="review-form-name">
                                        <label for="subject" class="form-label">Subject*</label>
                                        <input type="text" id="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="review-textarea">
                                    <label for="floatingTextarea">Massage*</label>
                                    <textarea class="form-control" placeholder="Write Massage..........."
                                        id="floatingTextarea" rows="3"></textarea>
                                </div>
                                <div class="login-btn">
                                    <a href="#" class="shop-btn">Send Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- contact-section-end---------------->
</main>
@endsection