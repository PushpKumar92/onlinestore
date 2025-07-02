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

                    @foreach($vendors as $vendor)
                    <div class="col-md-6">
                        <div class="seller-wrapper" data-aos="fade-right">
                            <div class="seller-info">
                                <h5>{{ $vendor->name }}</h5>
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>({{ $vendor->rating ?? '4.0' }})</span>
                                    {{-- Default to 4.0 if not available --}}
                                </div>
                                <div class="seller-address">
                                    <div class="address email">
                                        <span>
                                            <i class="fa-regular fa-message" style="color:black; font-size:18px;"></i>
                                        </span>
<<<<<<< HEAD
                                        <span class="inner-text">
                                            cacixi5247@corylan. 
                                        </span>
=======
                                        <span class="inner-text">{{ $vendor->email }}</span>
>>>>>>> 0161bf082f917d3a69b95e68b08af608df7c13ff
                                    </div>
                                    <div class="address tel">
                                        <span>
                                            <i class="fa-solid fa-phone" style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">{{ $vendor->mobile }}</span>
                                    </div>
                                    <div class="address location">
                                        <span>
                                            <i class="fa-solid fa-location-dot"
                                                style="color:black; font-size:18px;"></i>
                                        </span>
                                        <span class="inner-text">{{ $vendor->address }}</span>
                                    </div>
                                </div>
                                <a href="" class="shop-btn">Shop Now</a>
                            </div>
                            <div class="seller-details">
                                <div class="seller-img">
                                    <img src="{{ asset('vendor/' . $vendor->profile_image) }}" alt="{{ $vendor->name }}"
                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                                </div>
                                <div class="aurthor">
                                    <h5>{{ $vendor->name }}</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--------------- Seller-section-end---------------->

</main>
@endsection