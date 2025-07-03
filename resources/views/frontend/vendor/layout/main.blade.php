<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Vendor Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>
    <div class="wrapper d-flex">
        <div class="sidebar">
            @include('frontend.vendor.layout.sidebar')
        </div>

        <div class="main-panel">
            @include('frontend.vendor.layout.header')


            <div class="container">
                @yield('content')
            </div>

            @include('frontend.vendor.layout.footer')
        </div>
        <script src="{{ asset('js/bootstrap_5.3.2.bundle.min.js') }}"></script>
        <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebarMenu').classList.toggle('show');
        });
        </script>

</body>

</html>