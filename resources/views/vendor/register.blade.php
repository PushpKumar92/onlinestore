@extends('frontend.layout.main')
@section('content')
@if(session('message'))
    <div>{{ session('message') }}</div>
@endif
<main class="main-content">
    <!--------------- blog-tittle-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="{{ route('index')}}">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Seller Application</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Become A Seller!</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<div class="form-wrapper">
    <div class="form-section">
        <form action="{{ route('vendor.register.submit') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-label-group">
                    <label>Name</label>
                    <input name="name" placeholder="Name">
                </div>
                <div class="form-label-group">
                    <label>Email</label>
                    <input name="email" type="email" placeholder="Email">
                </div>

                <div class="form-label-group">
                    <label>Mobile</label>
                    <input name="mobile" placeholder="Mobile">
                </div>
                <div class="form-label-group">
                    <label>Address</label>
                    <input name="address" placeholder="Address">
                </div>

                <div class="form-label-group">
                    <label>Shop Name</label>
                    <input name="shop_name" placeholder="Shop Name">
                </div>
                <div class="form-label-group">
                    <label>Shop URL</label>
                    <input name="shop_url" placeholder="Shop URL">
                </div>

                <div class="form-label-group">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="Password">
                </div>
                <div class="form-label-group">
                    <label>Confirm Password</label>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password">
                </div>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

    <div class="vendorimage-section ">
        <img src="{{ asset('assets/images/homepage-one/vendor image.jpeg') }}" alt="Register Illustration">
    </div>
</div>


</main>
@endsection
