@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- faq-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">FAQ</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">FAQ's</h1>
            </div>
        </div>
    </section>
    <!--------------- faq-tittle-section-end---------------->

    <!--------------- faq-section---------------->
    <section class="faq product footer-padding">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="faq-accordion accordion accordion-flush" id="accordionFlushExample"
                        data-aos="fade-right">
                        <h5>Frequently Asked Questions</h5>
                        <div class="faq-item accordion-item">
                            <h2 class="accordion-header">
                                <button class="faq-button accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <span class="faq-heading">
                                        Do you offer international shipping?
                                    </span>
                                    <span class="plus">
                                        <i class="fa-solid fa-plus" style="font-size: 25px; color: #00674f;"></i>
                                    </span>
                                    <span class="minus">
                                        <i class="fa-solid fa-minus" style="font-size: 25px; color:white;"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <h5 class="paragraph">
                                        Yes, we offer international shipping to many countries around the world.
                                        However,
                                        shipping times and fees may vary depending on your location. Please check our
                                        shipping policy page for more information about international shipping.
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="faq-item accordion-item">
                            <h2 class="accordion-header">
                                <button class="faq-button accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapsetwo" aria-expanded="false"
                                    aria-controls="flush-collapsetwo">
                                    <span class="faq-heading">
                                        What is your return policy?
                                    </span>
                                  <span class="plus">
                                        <i class="fa-solid fa-plus" style="font-size: 25px; color: #00674f;"></i>
                                    </span>
                                 <span class="minus">
                                        <i class="fa-solid fa-minus" style="font-size: 25px; color:white;"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-collapsetwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <h5 class="paragraph">
                                        We want you to be completely satisfied with your purchase, so we offer a
                                        hassle-free return policy. If you are not satisfied with your purchase, you can
                                        return it within a certain timeframe for a refund or exchange. Please see our
                                        returns policy page for more information.
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="faq-item accordion-item">
                            <h2 class="accordion-header">
                                <button class="faq-button accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapsethree"
                                    aria-expanded="false" aria-controls="flush-collapsethree">
                                    <span class="faq-heading">
                                        What payment methods do you accept?
                                    </span>
                                   <span class="plus">
                                        <i class="fa-solid fa-plus" style="font-size: 25px; color: #00674f;"></i>
                                    </span>
                                    <span class="minus">
                                        <i class="fa-solid fa-minus" style="font-size: 25px; color:white;"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-collapsethree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <h5 class="paragraph">
                                        We accept a variety of payment methods, including credit and debit cards,
                                        PayPal, and other third-party payment platforms. All payments are processed
                                        securely to ensure the safety of your personal information.
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="faq-item accordion-item">
                            <h2 class="accordion-header">
                                <button class="faq-button accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false"
                                    aria-controls="flush-collapsefour">
                                    <span class="faq-heading">
                                        How can I track my order?
                                    </span>
                                     <span class="plus">
                                        <i class="fa-solid fa-plus" style="font-size: 25px; color: #00674f;"></i>
                                    </span>
                                   <span class="minus">
                                        <i class="fa-solid fa-minus" style="font-size: 25px; color:white;"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-collapsefour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <h5 class="paragraph">
                                        Once your order has been shipped, we will provide you with a tracking number
                                        that you can use to track your package. You can use this number to track your
                                        package on our website or through the carrier's website.
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="faq-item accordion-item">
                            <h2 class="accordion-header">
                                <button class="faq-button accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false"
                                    aria-controls="flush-collapsefive">
                                    <span class="faq-heading">
                                        How do I place an order on your website?
                                    </span>
                                  <span class="plus">
                                        <i class="fa-solid fa-plus" style="font-size: 25px; color: #00674f;"></i>
                                    </span>
                                   <span class="minus">
                                        <i class="fa-solid fa-minus" style="font-size: 25px; color:white;"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-collapsefive" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <h5 class="paragraph">
                                        To place an order on our website, simply browse our products and add the items
                                        you want to your cart. Once you are ready to checkout, follow the prompts to
                                        enter your shipping and payment information. Once your order is confirmed, we
                                        will process and ship it to you as soon as possible.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="question-section login-section " data-aos="fade-left">
                        <div class="review-form">
                            <h5 class="comment-title">Have Any Question</h5>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="fname" class="form-label">Name*</label>
                                    <input type="text" id="fname" class="form-control" placeholder="Name">
                                </div>
                                <div class="review-form-name">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" id="email" class="form-control" placeholder="user@gmail.com">
                                </div>
                                <div class="review-form-name">
                                    <label for="subject" class="form-label">Subject*</label>
                                    <input type="text" id="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="review-textarea">
                                <label for="floatingTextarea">Massage*</label>
                                <textarea class="form-control" placeholder="Write Massage..........."
                                    id="floatingTextarea" rows="3"></textarea>
                            </div>
                            <div class="login-btn">
                                <a href="#" class="shop-btn">Send Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- faq-section-end---------------->

</main>

@endsection