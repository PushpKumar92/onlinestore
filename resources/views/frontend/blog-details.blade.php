@extends('frontend.layout.main')

@section('content')
<!--------------- blog-tittle-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="{{ route('index') }}">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Blog details</a></span>
        </div>
        <!-- <div class="blog-heading about-heading">
            <h1 class="heading">{{ $blog->title }}</h1>
        </div> -->
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
                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <i class="fas fa-user" style="color: #00674f; font-size: 15px;"></i>
                                    </span>
                                    <span class="text">By {{ $blog->author ?? 'Admin' }}</span>
                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <i class="fa-regular fa-calendar" style="color: #00674f; font-size: 18px;"></i>
                                    </span>
                                    <span class="text">{{ $blog->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <h2 class="about-details wrapper-details blog-details-heading">
                                {{ $blog->title }}
                            </h2>

                            <div class="blog-details">
                                <p>{{ $blog->content }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="blogs-form-section">
                        <div class="social-item">
                            <h5>Share:</h5>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                target="_blank">
                                <span class="icon">
                                    <i class="fa-brands fa-facebook" style="color:#fff; font-size:18px;"></i>
                                </span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}"
                                target="_blank">
                                <span class="icon">
                                    <i class="fa-brands fa-twitter" style="color:#fff; font-size:18px;"></i>
                                </span>
                            </a>
                        </div>


                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class="col-lg-4">
                    <div class="blog-post-section">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <!-- Latest Posts -->
                                <div class="blog-post Latest-post">
                                    <h5 class="post-details">Latest Posts</h5>
                                    <hr>
                                    @if($latestBlogs->count())
                                    @foreach($latestBlogs as $latest)
                                    <div class="blogs-wrapper product-wrapper d-flex mb-3">
                                        <div class="wrapper-img me-3">
                                            <a href="{{ route('blog.details', $latest->slug) }}">
                                                <img src="{{ asset('uploads/blogs/' . $latest->image) }}"
                                                    alt="{{ $latest->title }}"
                                                    style="width: 80px; height: 60px; object-fit: cover; border-radius: 6px;">
                                            </a>
                                        </div>
                                        <div class="wrapper-info flex-grow-1">
                                            <h6 class="mb-1">
                                                <a href="{{ route('blog.details', $latest->slug) }}"
                                                    class="text-dark text-decoration-none">
                                                    {{ $latest->title }}
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar-alt"
                                                    style="color:#00674f; font-size:13px;"></i>
                                                {{ $latest->created_at->format('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <p class="text-muted">No latest posts found.</p>
                                    @endif
                                </div>


                            </div>

                            <!-- Category + Newsletter (Static) -->
                            <div class="col-lg-12">
                                <!-- Categories -->
                                <div class="blog-post category-post">
                                    <h5 class="post-details">Categories</h5>
                                    <hr>
                                    @if($categories->count())
                                    <ul class="category-list">
                                        @foreach($categories as $category)
                                        <li><a
                                                href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <p class="text-muted">No categories available.</p>
                                    @endif
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
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
</section>
<!--------------- blog-details-section-end---------------->
@endsection