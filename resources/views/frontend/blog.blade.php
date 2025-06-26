@extends('frontend.layout.main')
@section('content')
<!--------------- blog-tittle-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="{{ route('index')}}">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Blogs</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Our Blogs</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- blog-news-section---------------->

<section class="latest product footer-padding">
    <div class="container">
        <div class="blog-section latest-section">
            <div class="row g-5">
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/blog-img-1.webp" alt="img">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details')}}" class="about-details wrapper-details">It’s official!
                                The
                                iPhone 14 Series is on its way! Rumors turned out
                            </a>
                            <div class="divider"></div>

                            <a href="#" class="shop-btn">
                                Learn More
                                   <span>
                                     <i class="fa-solid fa-arrow-right" style="color:#AE1C9A ;font-size:20px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/blog-img-2.webp" alt="img">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details')}}" class="about-details wrapper-details">Must-Have
                                WordPress
                                Plugins for Ecommerce Websites in 2022
                            </a>
                            <div class="divider"></div>

                            <a href="{{ route('blog.details')}}" class="shop-btn">
                                Learn More
                                   <span>
                                     <i class="fa-solid fa-arrow-right" style="color:#AE1C9A ;font-size:20px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/blog-img-3.webp" alt="">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details')}}" class="about-details wrapper-details">15 Best WordPress
                                Newspaper Themes to Look Out for in 2022
                            </a>
                            <div class="divider"></div>
                            <a href="#" class="shop-btn">
                                Learn More
                                   <span>
                                     <i class="fa-solid fa-arrow-right" style="color:#AE1C9A ;font-size:20px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/blog-img-2.webp" alt="img">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details')}}" class="about-details wrapper-details">6 Best WordPress
                                E-commerce Plugins for Online Stores in 2022
                            </a>
                            <div class="divider"></div>
                            <a href="#" class="shop-btn">
                                Learn More
                                   <span>
                                     <i class="fa-solid fa-arrow-right" style="color:#AE1C9A ;font-size:20px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/blog-img-3.webp" alt="">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details')}}" class="about-details wrapper-details">Top 10 Best
                                Professional Ecommerce Blogging Platforms for 2022
                            </a>
                            <div class="divider"></div>
                            <a href="#" class="shop-btn">
                                Learn More
                                   <span>
                                     <i class="fa-solid fa-arrow-right" style="color:#AE1C9A ;font-size:20px;"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/blog-img-1.webp" alt="">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        By Admin
                                    </span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details')}}"
                                class="about-details wrapper-details">Business-to-consumer Ecommerce that involves
                                selling fight products
                            </a>
                            <div class="divider"></div>

                            <a href="#" class="shop-btn">
                                Learn More
                                <span>
                                     <i class="fa-solid fa-arrow-right" style="color:#AE1C9A ;font-size:20px;"></i>
                                </span>
                              
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- blog-news-section---------------->
@endsection