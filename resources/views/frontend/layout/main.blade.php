<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Online shopping</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper10-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css.map') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>

<body id="body" class="wide-layout">
    @include('frontend.layout.header')

    <div class="main">
        @yield('content')
    </div>


    @include('frontend.layout.footer')
    <!-- jQuery -->
    <script src="{{ asset('js/jquery_3.7.1.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap_5.3.2.bundle.min.js') }}"></script>

    <!-- Range Slider -->
    <script src="{{ asset('js/nouislider.min.js') }}"></script>

    <!-- Scroll Animation (AOS) -->
    <script src="{{ asset('js/aos.3.0.0.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('js/swiper10-bundle.min.js') }}"></script>

    <!-- Custom Additional JS -->
    <script src="{{ asset('js/shopus.js') }}"></script>
<<<<<<< HEAD
    <script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            let productId = this.getAttribute('data-id');

            fetch(`/user/add-to-cart/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.success || "Added to cart");
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
    </script>

=======
      
>>>>>>> 7aeeba0aac2e6dc3b6f082c2d9f9aa4318d0f50d
</body>

</html>