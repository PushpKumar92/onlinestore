@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- products-info-section--------------->
    <section class=" product-sidebar flash footer-padding">
        <div class="container-fluid">
            <div class="product-sidebar-section">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div class="flash-sale" data-aos="fade-up">
                            <div class="countdown-section">
                                <div class="countdown-items">
                                    <span id="day" class="number" style="color: red;">0</span>
                                    <span class="text">Days</span>
                                </div>
                                <div class="countdown-items">
                                    <span id="hour" class="number" style="color: skyblue;">0</span>
                                    <span class="text">Hours</span>
                                </div>
                                <div class="countdown-items">
                                    <span id="minute" class="number" style="color: green;">0</span>
                                    <span class="text">Minutes</span>
                                </div>
                                <div class="countdown-items">
                                    <span id="second" class="number" style="color: red;">0</span>
                                    <span class="text">seconds</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="product-img">

                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Statement
                                        Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$9.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="product-img">

                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Statement
                                        Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$9.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="product-img">

                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Statement
                                        Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$9.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="product-img">

                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Statement
                                        Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$9.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="product-img">

                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Statement
                                        Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$9.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                    alt="product-img">

                                <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-arrows-alt" style="font-size: 20px; color: #181818;"></i>
                                        </span>


                                    </a>
                                    <a href="{{ route('wishlist.index')}}" class="favourite cart-item">
                                        <span
                                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                            <i class="fas fa-heart" style="font-size: 20px; color: #00674f;"></i>
                                        </span>


                                    </a>
                                   
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="{{ route('product.info')}}" class="product-details">Stylish Statement
                                        Earrings
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$20.99</span>
                                        <span class="new-price">$9.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('cart.show')}}" class="product-btn">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- products-info-end--------------->

</main>
<script>
  // 🔥 Set your target date here
  const targetDate = new Date("2025-12-31T23:59:59").getTime();

  const countdown = setInterval(() => {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance <= 0) {
      clearInterval(countdown);
      document.getElementById("day").innerText = "0";
      document.getElementById("hour").innerText = "0";
      document.getElementById("minute").innerText = "0";
      document.getElementById("second").innerText = "0";
      alert("🎉 Countdown Finished!");
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("day").innerText = days;
    document.getElementById("hour").innerText = hours;
    document.getElementById("minute").innerText = minutes;
    document.getElementById("second").innerText = seconds;
  }, 1000);
</script>
@endsection