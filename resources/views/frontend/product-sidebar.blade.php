@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- products-sidebar-section--------------->
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-right">
                        <div class="sidebar-section">
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Product Categories</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="mobile" name="mobile">
                                            <label for="mobile">Mobile & Laptops</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="bags" name="bags">
                                            <label for="bags">Bags</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="sweatshirt" name="sweatshirt">
                                            <label for="sweatshirt">Sweatshirt</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="boots" name="boots">
                                            <label for="boots">Boots</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="accessories" name="accessories">
                                            <label for="accessories">Accessories</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="sneakers" name="sneakers">
                                            <label for="sneakers">Sneakers</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="outerwear" name="outerwear">
                                            <label for="outerwear">Outerwear</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="activewear" name="activewear">
                                            <label for="activewear">Activewear</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="grooming" name="grooming">
                                            <label for="grooming">Grooming</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="cosmatics" name="cosmatics">
                                            <label for="cosmatics">Cosmetics</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="watch" name="watch">
                                            <label for="watch">Watch</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper sidebar-range">
                                <h5 class="wrapper-heading">Price Range</h5>
                                <div class="price-slide range-slider">
                                    <div class="price">
                                        <div class="range-slider style-1">
                                            <div id="slider-tooltips" class="slider-range mb-3"></div>
                                            <span class="example-val" id="slider-margin-value-min"></span>
                                            <span>-</span>
                                            <span class="example-val" id="slider-margin-value-max"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Brands</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="thread" name="thread">
                                            <label for="thread">Refined Threads
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="ethereal" name="ethereal">
                                            <label for="ethereal">Ethereal Chic</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="yellow" name="yellow">
                                            <label for="yellow">Yellow</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="esctasy" name="esctasy">
                                            <label for="esctasy">Esctasy</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="urban" name="urban">
                                            <label for="urban">Urban Hive</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="velvet" name="velvet">
                                            <label for="velvet">Velvet Vista</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="boldly" name="boldly">
                                            <label for="boldly">Boldly Blue</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="minted" name="minted">
                                            <label for="minted">Minted Mode</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="ensemble" name="ensemble">
                                            <label for="ensemble">Eclectic Ensemble</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="attire" name="attire">
                                            <label for="attire">BraveAlchemy Attire</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="couture" name="couture">
                                            <label for="couture">Cascade Couture</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Color</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="red" name="red">
                                            <label for="red">Red</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="blue" name="blue">
                                            <label for="blue">blue</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="navy" name="navy">
                                            <label for="navy">Navy</label>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Size</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="small" name="small">
                                            <label for="small">Small</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="medium" name="medium">
                                            <label for="medium">Medium</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="large" name="large">
                                            <label for="large">Large</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="xl" name="xl">
                                            <label for="xl">XL</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="2xl" name="2xl">
                                            <label for="2xl">2XL</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-shop-section">
                            <span class="wrapper-subtitle">TRENDY</span>
                            <h5 class="wrapper-heading">Best wireless Shoes</h5>
                            <a href="{{ route('seller.sidebar')}}" class="shop-btn deal-btn">Shop Now </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="product-sidebar-section" data-aos="fade-up">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="product-sorting-section">
                                    <div class="result">
                                        <p>Showing <span>1–16 of 66 results</span></p>
                                    </div>
                                    <div class="product-sorting">
                                        <span class="product-sort">Sort by:</span>
                                        <div class="product-list">
                                            <span class="default">Default</span>
                                            <span>
                                                <i class="fas fa-chevron-down"
                                                    style="color: #9A9A9A; font-size: 10px;"></i>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-12">
                                <div class="product-deal-section" data-aos="fade-up">
                                    <h5 class="wrapper-heading">Get the best deal for Headphones</h5>
                                    <a href="{{ route('seller.sidebar')}}" class="shop-btn">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                            alt="product-img">

                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-arrows-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('wishlist')}}" class="favourite cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-heart"
                                                        style="font-size: 20px; color: #AE1C9A;"></i>
                                                </span>


                                            </a>
                                            <a href="{{ route('compaire')}}" class="compaire cart-item">
                                                <span
                                                    style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: white; border-radius: 50%;">
                                                    <i class="fas fa-sync-alt"
                                                        style="font-size: 20px; color: #181818;"></i>
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
                                            <a href="{{ route('product.info')}}" class="product-details">Stylish
                                                Statement
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
            </div>
        </div>
    </section>
    <!--------------- products-sidebar-section-end--------------->
</main>

@endsection