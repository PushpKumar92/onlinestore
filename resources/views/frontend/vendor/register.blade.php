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

                    <!-- Name -->
                    <div class="form-label-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-label-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email"
                            required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Mobile -->
                    <div class="form-label-group">
                        <label for="mobile">Mobile</label>
                        <input id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile" required>
                        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Address -->
                    <div class="form-label-group">
                        <label for="address">Address</label>
                        <input id="address" name="address" value="{{ old('address') }}" placeholder="Address" required>
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Shop Name -->
                    <div class="form-label-group">
                        <label for="shop_name">Shop Name</label>
                        <input id="shop_name" name="shop_name" value="{{ old('shop_name') }}" placeholder="Shop Name"
                            required>
                        @error('shop_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Shop URL -->
                    <div class="form-label-group">
                        <label for="shop_url">Shop URL</label>
                        <input id="shop_url" name="shop_url" value="{{ old('shop_url') }}" placeholder="Shop URL"
                            required>
                        @error('shop_url') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-label-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Password" required>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-label-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirm Password" required>
                    </div>

                    <!-- Profile Image -->
                    <div class="form-label-group full-width">
                        <label for="profile_image">Profile Image</label>
                        <input id="profile_image" type="file" name="profile_image" accept="image/*">
                        @error('profile_image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="full-width text-center mt-5">
                        <button type="submit" class="btn btn-primary px-5">Register</button>
                    </div>

                    <!-- Login Link -->
                    <div class="here mt-3">
                        Already have an account? <a href="{{ route('vendor.login') }}">Login here</a>
                    </div>
                </div>
            </form>
        </div>


    </div>
</main>

@endsection