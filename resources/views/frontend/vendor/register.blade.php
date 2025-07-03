@extends('frontend.layout.main')
@section('content')

@if(session('message'))
<div class="alert alert-success alert2">{{ session('message') }}</div>
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
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong.</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('vendor.register.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-label-group">
                        <label>Name</label>
                        <input name="name" value="{{ old('name') }}" placeholder="Name" required>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-label-group">
                        <label>Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" placeholder="Email" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <label>Mobile</label>
                        <input name="mobile" value="{{ old('mobile') }}" placeholder="Mobile" required>
                        @error('mobile')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <label>Address</label>
                        <input name="address" value="{{ old('address') }}" placeholder="Address" required>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <label>Shop Name</label>
                        <input name="shop_name" value="{{ old('shop_name') }}" placeholder="Shop Name" required>
                        @error('shop_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <label>Shop URL</label>
                        <input name="shop_url" value="{{ old('shop_url') }}" placeholder="Shop URL" required>
                        @error('shop_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="Password" required>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <label>Confirm Password</label>
                        <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
                    </div>

                    <div class="form-label-group p-img">
                        <label>Profile Image</label>
                        <input type="file" name="profile_image" accept="image/*" class="form-control">
                        @error('profile_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit">Register</button>

                    <!-- Login Redirect -->
                    <div class="here">
                        Already have an account? <a href="{{ route('vendor.login') }}">Login here</a>
                    </div>
            </form>
        </div>


    </div>
</main>

@endsection