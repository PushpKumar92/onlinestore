@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Compaire</a></span>
            </div>
            <div class="blog-heading">
                <h1 class="heading">Product Comparison</h1>
            </div>
        </div>

    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- comaprison-section---------------->
    <section class="product-cart product product-compair footer-padding">
        <div class="container">
            <div class="cart-section">
                <table>
                    <tbody>
                        <tr class="cart-top">
                            <td class=" cart-item cart-grey-bg vertical-cart">
                                <div class="wrapper-title">
                                    <h5 class="comment-title">Product Comparison</h5>
                                    <p class="paragraph">Select products to see the differences and similarities between
                                        them</p>
                                </div>
                            </td>
                            <td class="cart-center cart-item">
                                <div class="wrapper-data">
                                    <div class="search">
                                        <input type="text">
                                        <span>
                                            <i class="fas fa-search" style="font-size: 20px; color: #AE1C9A;"></i>
                                        </span>



                                    </div>
                                    <div class="wrapper">
                                        <div class="wrapper-img">
                                            <img src="{{ asset('assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                alt="">
                                        </div>

                                        <div class="wrapper-content">
                                            <h5 class="wrapper-details">Leather</h5>
                                            <div class="price">
                                                <span class="new-price">$6.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-center cart-item">
                                <div class="wrapper-data">
                                    <div class="search">
                                        <input type="text">
                                        <span>
                                            <i class="fas fa-search" style="font-size: 20px; color: #AE1C9A;"></i>
                                        </span>

                                    </div>
                                    <div class="wrapper">
                                        <div class="wrapper-img">
                                            <img src="{{ asset('assets/images/homepage-one/product-img/product-img-2.webp') }}"
                                                alt="">
                                        </div>

                                        <div class="wrapper-content">
                                            <h5 class="wrapper-details">Bags</h5>
                                            <div class="price">
                                                <span class="new-price">$8.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-center cart-item">
                                <div class="wrapper-data">
                                    <div class="search">
                                        <input type="text">
                                        <span>
                                            <i class="fas fa-search" style="font-size: 20px; color: #AE1C9A;"></i>
                                        </span>

                                    </div>
                                    <div class="wrapper">
                                        <div class="wrapper-img">
                                            <img src="{{ asset('assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                                alt="">
                                        </div>

                                        <div class="wrapper-content">
                                            <h5 class="wrapper-details">Shoe</h5>
                                            <div class="price">
                                                <span class="new-price">$10.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="cart-top cart-bottom ">
                            <td class=" cart-item cart-grey-bg">
                                <div class="wrapper-title">
                                    <h5 class="comment-title">Star Rating</h5>
                                </div>
                            </td>
                            <td class=" cart-item">
                                <div class="wrapper-data">
                                    <div class="ratings">
                                        <span class="text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-item">
                                <div class="wrapper-data">
                                    <div class="ratings">
                                        <span class="text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>


                                    </div>
                                </div>
                            </td>
                            <td class="cart-item">
                                <div class="wrapper-data">
                                    <div class="ratings">
                                        <span class="text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>


                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="cart-top cart-bottom ">
                            <td class=" cart-item cart-grey-bg">
                                <div class="wrapper-title">
                                    <h5 class="comment-title">Availability</h5>
                                </div>
                            </td>
                            <td class=" cart-item">
                                <div class="wrapper-data">
                                    <p class="stock">In Stock</p>
                                </div>
                            </td>
                            <td class=" cart-item">
                                <div class="wrapper-data">
                                    <p class="stock">In Stock</p>
                                </div>
                            </td>
                            <td class=" cart-item">
                                <div class="wrapper-data">
                                    <p class="stock">In Stock</p>
                                </div>
                            </td>
                        </tr>
                        <tr class="cart-top cart-bottom ">
                            <td class=" cart-item cart-grey-bg">
                                <div class="wrapper-title">
                                    <h5 class="comment-title">Specification</h5>
                                </div>
                            </td>
                            <td class=" cart-item">
                                <div class="wrapper-data">
                                    <p>N/A</p>
                                </div>
                            </td>
                            <td class=" cart-item">
                                <div class="wrapper-data">
                                    <p>N/A</p>
                                </div>
                            </td>
                            <td class=" cart-item">
                                <div class="wrapper-data">
                                    <p>N/A</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--------------- comaprison-section---------------->

</main>

@endsection