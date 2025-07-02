@extends('frontend.layout.main')
@section('content')
<<<<<<< HEAD
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
=======

@if(session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

<main class="main-content">
    <!-- Breadcrumb Section -->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index') }}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Seller Application</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Become A Seller!</h1>
            </div>
        </div>
    </section>

    <!-- Registration Form Section -->
    <div class="form-wrapper">
        <div class="form-section">
            <form action="{{ route('vendor.register.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-label-group">
                        <label>Name</label>
                        <input name="name" placeholder="Name" required>
                    </div>
                    <div class="form-label-group">
                        <label>Email</label>
                        <input name="email" type="email" placeholder="Email" required>
                    </div>
                    <div class="form-label-group">
                        <label>Mobile</label>
                        <input name="mobile" placeholder="Mobile" required>
                    </div>
                    <div class="form-label-group">
                        <label>Address</label>
                        <input name="address" placeholder="Address" required>
                    </div>
                    <div class="form-label-group">
                        <label>Shop Name</label>
                        <input name="shop_name" placeholder="Shop Name" required>
                    </div>
                    <div class="form-label-group">
                        <label>Shop URL</label>
                        <input name="shop_url" placeholder="Shop URL" required>
                    </div>
                    <div class="form-label-group">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="form-label-group">
                        <label>Confirm Password</label>
                        <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
                    </div>

                    <div class="form-label-group">
                        <label>Profile Image</label>
                        <input type="file" name="profile_image" accept="image/*" class="form-control">
                    </div>
                </div>

                <button type="submit">Register</button>

                <!-- Login Redirect -->
                <div style="margin-top: 15px;">
                    Already have an account? <a href="{{ route('vendor.login') }}">Login here</a>
                </div>
            </form>

        </div>

        <!-- Image Section -->
        <div class="vendorimage-section">
            <img src="{{ asset('assets/images/homepage-one/vendor image.jpeg') }}" alt="Register Illustration">
        </div>
    </div>
</main>

@endsection
>>>>>>> 0161bf082f917d3a69b95e68b08af608df7c13ff
