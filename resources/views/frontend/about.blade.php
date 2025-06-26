@extends('frontend.layout.main')
@section('content')
<!--------------- blog-tittle-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="{{ route('index') }}">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">About Us</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">About Us</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- about-section---------------->
<section class="about">
    <div class="container">
        <div class="about-section">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="about-img" data-aos="fade-right">
                        <img src="./assets/images/homepage-one/about/about-img-1.webp" alt="img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content" data-aos="fade-up">
                        <h3 class="about-title">Know More About Us?</h3>
                        <p class="about-info">
                            It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout. It is a long established fact a
                            that a reader will be distracted by the readable content of a page when our
                            looking at its layout.</p>
                        <div class="about-list">
                            <ul>
                                <li>
                                    <span
                                        style="display: inline-flex; align-items: center; justify-content: center; width: 25px; height: 25px; background-color: #AE1C9A; border-radius: 50%;">
                                        <i class="fas fa-arrow-right" style="color: white; font-size: 12px;"></i>
                                    </span>


                                    <p>Complete Sanitization and cleaning of bathroom</p>
                                </li>
                                <li>
                                    <span
                                        style="display: inline-flex; align-items: center; justify-content: center; width: 25px; height: 25px; background-color: #AE1C9A; border-radius: 50%;">
                                        <i class="fas fa-arrow-right" style="color: white; font-size: 12px;"></i>
                                    </span>

                                    <p>when looking at its layout. It is a long established fact </p>
                                </li>
                                <li>
                                    <span
                                        style="display: inline-flex; align-items: center; justify-content: center; width: 25px; height: 25px; background-color: #AE1C9A; border-radius: 50%;">
                                        <i class="fas fa-arrow-right" style="color: white; font-size: 12px;"></i>
                                    </span>

                                    <p>Complete Sanitization and cleaning of bathroom</p>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('contact.us') }}" class="shop-btn">
                            Contact us
                            <span>
                                <i class="fas fa-chevron-right" style="color: white; font-size: 14px;"></i>


                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- about-section-end---------------->

<!--------------- about-service---------------->
<section class="about-service product ">
    <div class="container">
        <div class="about-service-section">
            <div class="about-wrapper">
                <div class="wrapper-img">
                    <span>
                        <i class="fas fa-file-alt" style="font-size: 48px; color: #AE1C9A;"></i>
                    </span>

                </div>
                <div class="wrapper-info">
                    <h5 class="wrapper-details about-details">Choose product</h5>
                    <p>If you are going to use a passage of you
                        need to be sure there isn't anything emc
                        barrassing hidden in the middle</p>
                </div>
            </div>
            <div class="seperator">
            </div>
            <div class="about-wrapper">
                <div class="wrapper-img">
                    <span style="color: #AE1C9A; font-size: 48px;">

                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </span>

                </div>
                <div class="wrapper-info">
                    <h5 class="wrapper-details about-details">Make Your Payment</h5>
                    <p>Experience hassle-free online shopping with our service! Simply choose the product you want
                    </p>
                </div>
            </div>
            <div class="seperator">
            </div>
            <div class="about-wrapper">
                <div class="wrapper-img">
                    <span style="color: #AE1C9A; font-size: 48px;">
                        <i class="fa-solid fa-truck"></i>
                    </span>
                </div>
                <div class="wrapper-info">
                    <h5 class="wrapper-details about-details">Fast Delivery</h5>
                    <p>Experience hassle-free online shopping with our service! enjoy fast delivery right to your
                        doorstep.</p>
                </div>
            </div>
        </div>
    </div>

</section>
<!--------------- about-service-end---------------->

<!--------------- about-promotion-section---------------->
<div class="about-promotion">
    <a href="assets/images/homepage-one/about/advertrisement-vedio.mp4" target="_blank" class="about-btn">
        <span>
            <i class="fas fa-play-circle" style="color: #AE1C9A; font-size: 38px;"></i>
        </span>

    </a>
    <video src="./assets/images/homepage-one/about/advertrisement-vedio.mp4" autoplay loop muted></video>
</div>
<!--------------- about-promotion-end---------------->

<!--------------- about-slider-section---------------->
<section class="about-feedback product">
    <div class="container p-0">
        <div class="position-relative px-5">
            <div class="swiper about-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide testimonial-wrapper">
                        <div class="blockquote">
                            <span>
                                <i class="fas fa-quote-left" style="color: #f6f6f6; font-size: 50px;"></i>

                            </span>
                        </div>
                        <p class="testimonial-details">enean ullamcorper at magna et in to
                            <span class="testimonial-inner-text">
                                the a iaculis. Mauris
                                mattis ac diam
                            </span> a ultricies. Sed pretium.
                        </p>
                        <div class="ratings">
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="divider"></div>
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="./assets/images/homepage-one/about/testimonial-img-1.webp" alt="img">
                            </div>
                            <div class="testimonial-info-details">
                                <h5 class="testimonial-name">Md Abdur Rahman</h5>
                                <p class="testimonial-title">Ceo of <span class="title-inner">DesginCraft</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide testimonial-wrapper">
                        <div class="blockquote">
                            <span>
                                <i class="fas fa-quote-left" style="color: #f6f6f6; font-size: 50px;"></i>

                            </span>
                        </div>
                        <p class="testimonial-details">Almost every imaginable design is possible and customizations
                            are allowed on every level. Some features could make use of better controls. If you know
                            how to operate your mouse, then you are all set to use this pagebuilder.
                        </p>
                        <div class="ratings">
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="divider"></div>
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="./assets/images/homepage-one/about/testimonial-img-2.webp" alt="img">
                            </div>
                            <div class="testimonial-info-details">
                                <h5 class="testimonial-name">Mohammad Sajjad Hossain</h5>
                                <p class="testimonial-title">Cfo of <span class="title-inner">DesginX</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide testimonial-wrapper">
                        <div class="blockquote">
                            <span>
                                <i class="fas fa-quote-left" style="color: #f6f6f6; font-size: 50px;"></i>

                            </span>
                        </div>
                        <p class="testimonial-details">As a digital marketing agency our team works day in and day
                            out on websites of all kinds. Some of the most common errors we see are websites not
                            optimized for SEO because of old, boring, or out of date website themes or designs.
                        </p>
                        <div class="ratings">
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="divider"></div>
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="./assets/images/homepage-one/about/testimonial-img-3.webp" alt="img">
                            </div>
                            <div class="testimonial-info-details">
                                <h5 class="testimonial-name">Stefhen Hoking</h5>
                                <p class="testimonial-title">HR of <span class="title-inner">Desgin360</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide testimonial-wrapper">
                        <div class="blockquote">
                            <span>
                                <i class="fas fa-quote-left" style="color: #f6f6f6; font-size: 50px;"></i>

                            </span>
                        </div>
                        <p class="testimonial-details">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of
                            using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                            opposed to using 'Content here, content here', making it look like readable English
                        </p>
                        <div class="ratings">
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="divider"></div>
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="./assets/images/homepage-one/about/testimonial-img-1.webp" alt="img">
                            </div>
                            <div class="testimonial-info-details">
                                <h5 class="testimonial-name">Abdullah Al Mamun</h5>
                                <p class="testimonial-title">Designer of <span class="title-inner">DesginCode</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide testimonial-wrapper">
                        <div class="blockquote">
                            <span>
                                <i class="fas fa-quote-left" style="color: #f6f6f6; font-size: 50px;"></i>

                            </span>
                        </div>
                        <p class="testimonial-details">Build the perfect online store using our high-converting
                            Brandstore website template
                        </p>
                        <div class="ratings">
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="divider"></div>
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="./assets/images/homepage-one/about/testimonial-img-1.webp" alt="img">
                            </div>
                            <div class="testimonial-info-details">
                                <h5 class="testimonial-name">Mohammad Rashed Khan</h5>
                                <p class="testimonial-title">Ceo of <span class="title-inner">DesginLab</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide testimonial-wrapper">
                        <div class="blockquote">
                            <span>
                                <i class="fas fa-quote-left" style="color: #f6f6f6; font-size: 50px;"></i>

                            </span>
                        </div>
                        <p class="testimonial-details">The lightweight and fully responsive eCommerce website
                            templates are built for speed and conversion, helping you sell more with little extra
                            effort.
                        </p>
                        <div class="ratings">
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="divider"></div>
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="./assets/images/homepage-one/about/testimonial-img-1.webp" alt="img">
                            </div>
                            <div class="testimonial-info-details">
                                <h5 class="testimonial-name">Shuvo Raihan</h5>
                                <p class="testimonial-title">Developer of <span class="title-inner">DesginUX</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section>

<!--------------- about-slider-section-end---------------->

<!--------------- latest-news-section---------------->
<section class="latest product footer-padding">
    <div class="container">
        <div class="section-title text-center">
            <h4 class="about-details">My Latest News</h4>
        </div>
        <div class="latest-section">
            <div class="row g-5">
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up" data-aos-duration="300">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/about-img-2.webp" alt="">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 15px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 15px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details') }}" class="about-details wrapper-details">Top 10 Best
                                Professional Blogging Platforms for 2022
                            </a>
                            <div class="divider"></div>

                            <a href="{{ route('blog.details') }}" class="shop-btn">
                                Learn More
                                <span>
                                    <i class="fas fa-chevron-right" style="color: #AE1C9A; font-size: 11px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up" data-aos-duration="400">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/about-img-3.webp" alt="">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 15px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 15px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details') }}" class="about-details wrapper-details">Logistics of
                                container cargo into
                                ship and cargo plane
                            </a>
                            <div class="divider"></div>

                            <a href="{{ route('blog.details') }}" class="shop-btn">
                                Learn More
                                <span>
                                    <i class="fas fa-chevron-right" style="color: #AE1C9A; font-size: 11px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up" data-aos-duration="600">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/about-img-4.webp" alt="">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 15px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 15px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details') }}" class="about-details wrapper-details">15 Best
                                WordPress
                                Newspaper Themes to Look Out
                            </a>
                            <div class="divider"></div>

                            <a href="{{ route('blog.details') }}" class="shop-btn">
                                Learn More
                                <span>
                                    <i class="fas fa-chevron-right" style="color: #AE1C9A; font-size: 11px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- latest-news-section-end---------------->
@endsection