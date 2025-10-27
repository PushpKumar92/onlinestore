<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ✅ Dynamic Meta Sections --}}
    <title>@yield('meta_title', 'Online Shopping | Lavanya Tech')</title>
    <meta name="description" content="@yield('meta_description', 'Lavanya Tech offers innovative web development, digital marketing, and IT solutions to grow your business online.')">
    <meta name="keywords" content="@yield('meta_keywords', 'lavanya tech, web development, digital marketing, IT solutions, SEO, PPC, software development')">
    <meta name="meta_tags" content="@yield('meta_tags', 'lavanya tech default tags')">

    {{-- ✅ Styles --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper10-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body id="body" class="wide-layout">
    {{-- ✅ Header --}}
    @include('frontend.layout.header')

    <div class="main">
        @yield('content')
    </div>

    {{-- ✅ Footer --}}
    @include('frontend.layout.footer')

    {{-- ✅ Scripts --}}
    <script src="{{ asset('js/jquery_3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap_5.3.2.bundle.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/aos.3.0.0.js') }}"></script>
    <script src="{{ asset('js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('js/shopus.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/pushp.js') }}"></script>
</body>

</html>
