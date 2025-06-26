@extends('frontend.layout.main')
@section('content')
<!--------------- blog-tittle-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="{{ route('index')}}">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Blog details</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Blog Details</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- blog-details-section---------------->
<section class="blog-details product footer-padding">
    <div class="container">
        <div class="blog-detail-section">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="blogs-wrapper">
                        <div class="wrapper-img">
                            <img src="./assets/images/homepage-one/about/blog-img-2.webp" alt="img">
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
                                        <i class="fa-regular fa-comment" style="color: #AE1C9A; font-size: 20px;"></i>
                                    </span>
                                    <span class="text">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog')}}"
                                class="about-details wrapper-details blog-details-heading">Business-to-consumer that
                                involves selling fight into the find to a products and services ship and cargo plane
                            </a>
                            <div class="blog-details">
                                <p>
                                    Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri
                                    aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta.
                                    Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu
                                    ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit
                                    iudicabit.

                                    <span class="paragraph-inner-text">
                                        Per ex vero nonumy. Ius eu doming nominavi mediocrem, aliquid efficiantur no
                                        vim, sanctus admodum mnesarchum ad pro. No sea invidunt partiendo. No postea
                                        numquam ocurreret duo, unum abhorreant cu nam, fugit fastidii percipitur nam
                                        id.
                                    </span>
                                    <span class="paragraph-inner-text">
                                        Sit vivendum eleifend adipiscing ea. Modus legere suscipiantur an vel,
                                        melius
                                        patrioque est cu, eum at audire probatus repudiandae. Ei tempor definitiones
                                        eam, sea dico omnium ne. Eam ad ubique tincidunt elaboraret, malis aperiri
                                        sit
                                        et. Ut quo vero inimicus. Sed at munere fuisset noluisse, eleifend senserit
                                        an
                                        vix.
                                    </span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="blogs-form-section">
                        <div class="social-item">
                            <h5>Share:</h5>
                            <a href="https://www.facebook.com/">
                                <span class="icon">
                                    <i class="fa-brands fa-facebook"
                                        style="color:rgb(248, 247, 248); font-size: 18px;"></i>
                                </span>
                            </a>
                            <a href="https://twitter.com/">
                                <span class="icon">
                                    <i class="fa-brands fa-twitter"
                                        style="color:rgb(250, 248, 250); font-size: 18px;"></i>
                                </span>
                            </a>
                        </div>
                        <div class="review-form">
                            <h5 class="comment-title">Leave a comment</h5>
                            <div class="review-inner-form ">
                                <div class="review-form-name">
                                    <label for="name" class="form-label">Name*</label>
                                    <input type="text" id="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="review-form-name">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" id="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <div class="review-textarea">
                                <label for="floatingTextarea">Comment*</label>
                                <textarea class="form-control" placeholder="Write something..........."
                                    id="floatingTextarea" rows="8"></textarea>
                            </div>
                            <div class="review-btn">
                                <a href="#" class="shop-btn">Submit Review</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post-section">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="blog-post search">
                                    <h5 class="post-details">Search</h5>
                                    <hr>
                                    <div class="search-btn">
                                        <input type="text" placeholder="search">
                                        <span class="icon">
                                            <i class="fa-solid fa-magnifying-glass"
                                                style="color: #AE1C9A; font-size: 20px;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog-post Latest-post">
                                    <h5 class="post-details">Latest Post</h5>
                                    <hr>
                                    <div class="blogs-wrapper product-wrapper">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/about/blog-img-1.webp" alt="img">
                                        </div>
                                        <div class="wrapper-info">
                                            <h5 class="about-details wrapper-details">Business-to-consumer that
                                                involves selling fight products
                                            </h5>
                                            <div class="wrapper-data">
                                                <div class="admin wrapper-item">
                                                    <span class="icon">
                                                        <i class="fas fa-calendar-alt"
                                                            style="color: #AE1C9A; font-size: 15px;"></i>
                                                    </span>

                                                    <span class="text">
                                                        02 October 2023
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="blogs-wrapper product-wrapper">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/about/blog-img-2.webp" alt="img">
                                        </div>
                                        <div class="wrapper-info">
                                            <h5 class="about-details wrapper-details">15 Best WordPress Newspaper Themes
                                                to Look Out for in 2022
                                            </h5>
                                            <div class="wrapper-data">
                                                <div class="admin wrapper-item">
                                                                <span class="icon">
                                                        <i class="fas fa-calendar-alt"
                                                            style="color: #AE1C9A; font-size: 15px;"></i>
                                                    </span>
                                                    <span class="text">
                                                        02 October 2023
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="blogs-wrapper product-wrapper">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/about/blog-img-3.webp" alt="img">
                                        </div>
                                        <div class="wrapper-info">
                                            <h5 class="about-details wrapper-details">6 Best WordPress E-commerce
                                                Plugins for Online Stores in 2022
                                            </h5>
                                            <div class="wrapper-data">
                                                <div class="admin wrapper-item">
                                                                <span class="icon">
                                                        <i class="fas fa-calendar-alt"
                                                            style="color: #AE1C9A; font-size: 15px;"></i>
                                                    </span>
                                                    <span class="text">
                                                        02 October 2023
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog-post category-post">
                                    <h5 class="post-details">Categories</h5>
                                    <hr>
                                    <ul class="category-list">
                                        <li>
                                            <a href="#">Development</a>
                                        </li>
                                        <li>
                                            <a href="#">Guide</a>
                                        </li>
                                        <li>
                                            <a href="#">Inspiration</a>
                                        </li>
                                        <li>
                                            <a href="#">Latest News</a>
                                        </li>
                                        <li>
                                            <a href="#">Revenue</a>
                                        </li>
                                        <li>
                                            <a href="#">Start Up</a>
                                        </li>
                                        <li>
                                            <a href="#">Technology</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog-post newsletter">
                                    <h5 class="post-details">Our Newsletter</h5>
                                    <hr>
                                    <p class="blog-paragraph">Follow our newsletter to stay updated about us.</p>
                                    <div class="form">
                                        <input type="text" placeholder="Enter Your Email Address">
                                        <a href="#" class="shop-btn">Subscribe</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- blog-details-section-end---------------->
@endsection