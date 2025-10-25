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
                @forelse($blogs as $blog)
                <div class="col-lg-4 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}"
                                class="img-fluid">
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data d-flex justify-content-between">
                                <div class="admin wrapper-item">
                                    <i class="fas fa-user text-success"></i>
                                    <span>By {{ $blog->author ?? 'Admin' }}</span>
                                </div>
                                <div class="comments wrapper-item">
                                    <i class="fa-regular fa-comment text-success"></i>
                                    <span>{{ $blog->comments_count ?? 0 }} Comments</span>
                                </div>
                            </div>
                            <a href="{{ route('blog.details', $blog->slug) }}"
                                class="about-details wrapper-details d-block mt-2">
                                {{ Str::limit($blog->title, 80) }}
                            </a>
                            <div class="divider my-2"></div>
                            <a href="{{ route('blog.details', $blog->slug) }}" class="shop-btn">
                                Learn More
                                <span><i class="fa-solid fa-arrow-right text-success"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="text-muted py-5">No blogs found.</p>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</section>
<!--------------- blog-news-section-end---------------->
@endsection