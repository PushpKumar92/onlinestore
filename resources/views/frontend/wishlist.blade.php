@extends('frontend.layout.main')
@section('content')
<main class="main-content">

    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Wishlist</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Wishlist</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- wishlist-section---------------->
    <section class="cart product wishlist footer-padding" data-aos="fade-up">
        <div class="container">
            <div class="cart-section wishlist-section">
                <table>
                    <tbody>
                        <tr class="table-row table-top-row">
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">PRODUCT</h5>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">PRICE</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">ACTION</h5>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row ticket-row">
                            <td class="table-wrapper wrapper-product">
                                <div class="wrapper">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/product-img/product-img-1.webp"
                                            alt="img">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Classic Oxford Shirt</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="heading">$20.00</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <span>
                                        <i class="fas fa-times" style="color: #AAAAAA; font-size: 20px;"></i>
                                    </span>

                                </div>
                            </td>
                        </tr>
                        <tr class="table-row ticket-row">
                            <td class="table-wrapper wrapper-product">
                                <div class="wrapper">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/product-img/product-img-2.webp"
                                            alt="img">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Classic Oxford Shirt</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="heading">$20.00</h5>
                                </div>
                            </td>
                            <td class="table-wrapper ">
                                <div class="table-wrapper-center">
                                    <span>
                                        <i class="fas fa-times" style="color: #AAAAAA; font-size: 20px;"></i>
                                    </span>

                                </div>
                            </td>
                        </tr>
                        <tr class="table-row ticket-row">
                            <td class="table-wrapper wrapper-product">
                                <div class="wrapper">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/product-img/product-img-3.webp"
                                            alt="img">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Classic Oxford Shirt</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="heading">$20.00</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <span>
                                        <i class="fas fa-times" style="color: #AAAAAA; font-size: 20px;"></i>
                                    </span>

                                </div>
                            </td>
                        </tr>
                        <tr class="table-row ticket-row">
                            <td class="table-wrapper wrapper-product">
                                <div class="wrapper">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/product-img/product-img-4.webp"
                                            alt="img">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Classic Oxford Shirt</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="heading">$20.00</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <span>
                                        <i class="fas fa-times" style="color: #AAAAAA; font-size: 20px;"></i>
                                    </span>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="wishlist-btn">
                <a href="{{ route('empty.wishlist')}}" class="clean-btn">Clean Wishlist</a>
                <a href="#" class="shop-btn">View Cards</a>
            </div>
        </div>
    </section>
    <!--------------- wishlist-end---------------->
</main>
@endsection