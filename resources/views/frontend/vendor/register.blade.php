@extends('frontend.layout.main')
@section('content')

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

                    <div class="form-label-group p-img">
                        <label class="">Profile Image</label>
                        <input type="file" name="profile_image" accept="image/*" class="form-control">
                    </div>
                </div>

                <button type="submit">Register</button>

                <!-- Login Redirect -->
                <div class="here">
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