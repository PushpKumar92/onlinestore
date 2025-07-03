@extends('frontend.layout.main')
@section('content')

@if($errors->any())
<div style="color: red; font-size:22px; text-align:center;">{{ $errors->first() }}</div>
@endif

@if(session('message'))
<div>{{ session('message') }}</div>
@endif

<main class="main-content">
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Vendor Login</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Vendor Login</h1>
            </div>
        </div>
    </section>

    <div class="form-wrapper">
        <div class="form-section">
            <form action="{{ route('vendor.login.submit') }}" method="POST">
                @csrf
                <div>
                    <div class="form-label-group">
                        <label for="email">Email</label><br>
                        <input name="email" type="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-label-group">
                        <label for="password">Password</label><br>
                        <input name="password" type="password" id="password" placeholder="Password" required>
                    </div>
                </div>

                <button type="submit" class="mt-5">Login</button>

                <!-- Optional link back to registration -->
                <div class="here">
                    Don't have an account? <a href="{{ route('vendor.register') }}">Register now</a>
                </div>
            </form>
        </div>

        <div class="vendorimage-section">
            <img src="{{ asset('assets/images/homepage-one/vendor image.jpeg') }}" alt="Login Illustration">
        </div>
    </div>
</main>

@endsection