@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index') }}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Dashboard</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">User Dashboard</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!---------------user-profile-section---------------->
    <section class="user-profile footer-padding">
        <div class="container">
            <div class="user-profile-section">

                <div class="user-dashboard">
                    <div class="nav nav-item nav-pills  me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">

                        <!-- nav-buttons -->
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">
                            <span>
                                <i class="fa-solid fa-table-columns" style="color: #9A9A9A; font-size: 20px;"></i>
                            </span>


                            <span class="text">Dashboard</span>
                        </button>

                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                            <span>
                                <i class="fa-solid fa-user" style="color: #9A9A9A; font-size: 20px;"></i>
                            </span>
                            <span class="text">
                                Personal Info
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment"
                            aria-selected="false">
                            <span>
                                <i class="fa-solid fa-credit-card" style="color: #9A9A9A; font-size: 20px;"></i>
                            </span>
                            <span class="text">
                                Payment Method
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order"
                            aria-selected="false">
                            <span>
                                <i class="fa-solid fa-cart-shopping" style="color: #9A9A9A; font-size: 20px;"></i>
                            </span>
                            <span class="text">
                                Order
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-wishlist-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-wishlist" type="button" role="tab" aria-controls="v-pills-wishlist"
                            aria-selected="false">
                            <span>
                                <i class="fa-regular fa-heart" style="color: #9A9A9A; font-size: 20px;"></i>
                            </span>
                            <span class="text">
                                Wishlist
                            </span>
                        </button>
                        <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password"
                            aria-selected="false">
                            <span>
                                <i class="fa-solid fa-lock" style="color: #9A9A9A; font-size: 20px;"></i>
                            </span>
                            <span class="text">
                                Change Password
                            </span>
                        </button>
                        <div class="nav-link">
                            <a href="{{ route('login') }}">
                                <span>
                                    <i class="fa-solid fa-right-from-bracket"
                                        style="color: #9A9A9A; font-size: 20px;"></i>
                                </span>
                                <span class="text">
                                    Logout
                                </span>
                            </a>
                        </div>

                    </div>

                    <!-- nav-content -->
                    <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">

                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="user-profile">
                                <div class="user-title">
                                    <p class="paragraph">Hello, {{ $user->name ?? 'N/A' }}</p>
                                    <h5 class="heading">Welcome to your Profile </h5>
                                </div>
                                <div class="profile-section">
                                    <div class="row g-5">

                                        <div class="col-lg-12">
                                            <div class="info-section">
                                                <div class="seller-info">
                                                    <h5 class="heading">Personal Information</h5>
                                                    @php
                                                    $user = Auth::guard('user')->user(); // Adjust
                                                    @endphp
                                                    <div class="info-list">
                                                        <div class="info-title">
                                                            <p>Name:</p>
                                                            <p>Email:</p>
                                                            <p>Phone:</p>
                                                            <p>Address:</p>
                                                            <p>City:</p>
                                                            <p>Pincode:</p>
                                                        </div>
                                                        <div class="info-details">
                                                            <p>{{ $user->name ?? 'N/A' }}</p>
                                                            <p>{{ $user->email ?? 'N/A' }}</p>
                                                            <p>{{ $user->mobile ?? 'N/A' }}</p>
                                                            <p>{{ $user->address ?? 'N/A' }}</p>
                                                            <p>{{ $user->city ?? 'N/A' }}</p>
                                                            <p>{{ $user->pincode ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="seller-application-section">
                                <div class="row ">
                                    <div class="col-lg-7">
                                        <div class=" account-section">
                                            <form action="{{ route('user.profile.update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <!-- First & Last Name -->
                                                <div class="account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="firname" class="form-label">First Name*</label>
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            value="{{ old('name', $user->name ?? '') }}"
                                                            placeholder="First Name">
                                                    </div>

                                                </div>

                                                <!-- Email & Phone -->
                                                <div class="account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="gmail" class="form-label">Email*</label>
                                                        <input type="email" id="gmail" name="email" class="form-control"
                                                            value="{{ old('email', $user->email ?? '') }}"
                                                            placeholder="user@gmail.com">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="telephone" class="form-label">Phone*</label>
                                                        <input type="tel" id="telephone" name="mobile"
                                                            class="form-control"
                                                            value="{{ old('mobile', $user->mobile ?? '') }}"
                                                            placeholder="+880388**0899">
                                                    </div>
                                                </div>

                                                <!-- Country -->
                                                <div class="review-form-name">
                                                    <label for="region" class="form-label">Country*</label>
                                                    <input type="text" id="region" name="country" class="form-control"
                                                        value="{{ old('country', $user->country ?? '') }}"
                                                        placeholder="Country">
                                                </div>

                                                <!-- Address -->
                                                <div class="review-form-name address-form">
                                                    <label for="addres" class="form-label">Address*</label>
                                                    <input type="text" id="addres" name="address" class="form-control"
                                                        value="{{ old('address', $user->address ?? '') }}"
                                                        placeholder="Enter your Address">
                                                </div>

                                                <!-- City and Zip -->
                                                <div class="account-inner-form city-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="teritory" class="form-label">Town / City*</label>
                                                        <input type="text" id="teritory" name="city"
                                                            class="form-control"
                                                            value="{{ old('city', $user->city ?? '') }}"
                                                            placeholder="City">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="post" class="form-label">Postcode / ZIP*</label>
                                                        <input type="text" id="post" name="pincode" class="form-control"
                                                            value="{{ old('pincode', $user->pincode ?? '') }}"
                                                            placeholder="0000">
                                                    </div>
                                                </div>

                                                <!-- Image Upload -->
                                                <div class="logo-upload">
                                                    <img src="{{ asset('profile_images/' . $user->profile_image) }}"
                                                        class="upload-img" id="upload-img">
                                                    <div class="upload-input">
                                                        <label for="input-file">Upload Image</label>
                                                        <input type="file" name="profile_image" id="input-file"
                                                            accept="image/jpeg, image/jpg, image/png, image/webp">
                                                    </div>
                                                </div>

                                                <!-- Submit Buttons -->
                                                <div class="submit-btn">
                                                    <a href="{{ route('user.profile') }}"
                                                        class="shop-btn cancel-btn">Cancel</a>
                                                    <button type="submit" class="shop-btn update-btn">Update
                                                        Profile</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="img-upload-section">
                                            <div class="logo-wrapper">
                                                <h5 class="comment-title">Update Logo</h5>
                                                <p class="paragraph">Size300x300. Gifs work
                                                    too.Max 5mb.</p>
                                                <div class="logo-upload">
                                                    <img src="assets/images/homepage-one/sallers-cover.png" alt="upload"
                                                        class="upload-img" id="upload-img">
                                                    <div class="upload-input">
                                                        <label for="input-file">
                                                            <span>
                                                                <svg width="32" height="32" viewBox="0 0 32 32"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z"
                                                                        fill="white"></path>
                                                                    <path
                                                                        d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z"
                                                                        fill="white"></path>
                                                                </svg>
                                                            </span>
                                                        </label>
                                                        <input type="file"
                                                            accept="image/jpeg, image/jpg, image/png, image/webp"
                                                            id="input-file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                            aria-labelledby="v-pills-order-tab" tabindex="0">
                            <div class="payment-section">
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-1.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Dutch Bangl Bank Lmtd</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-2.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Master Card</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-3.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Paypal Account</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-4.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Visa Card</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper-btn">
                                    <a href="#" class="shop-btn" onclick="modalAction('.cart')">Add Cart</a>

                                    <!-- cart-modal -->
                                    <div class="modal-wrapper cart">
                                        <div onclick="modalAction('.cart')" class="anywhere-away"></div>

                                        <!-- change this -->
                                        <div class="login-section account-section modal-main">
                                            <div class="review-form">
                                                <div class="review-content">
                                                    <h5 class="comment-title">Add New Card</h5>
                                                    <div class="close-btn">
                                                        <img src="./assets/images/homepage-one/close-btn.png"
                                                            onclick="modalAction('.cart')" alt="close-btn">
                                                    </div>
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="cnumber" class="form-label">Card Number*</label>
                                                    <input type="number" id="cnumber" class="form-control"
                                                        placeholder="*** *** ***">
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="holdername" class="form-label">Card Holder Name*</label>
                                                    <input type="text" id="holdername" class="form-control"
                                                        placeholder="Demo Name">
                                                </div>
                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="expirydate" class="form-label">Expiry Date*</label>
                                                        <input type="date" id="expirydate" class="form-control">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="cvv" class="form-label">CVV*</label>
                                                        <input type="number" id="cvv" class="form-control"
                                                            placeholder="21232">
                                                    </div>
                                                </div>
                                                <div class="login-btn text-center">
                                                    <a href="#" onclick="modalAction('.cart')" class="shop-btn">Add
                                                        Card</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- change this -->

                                    </div>
                                    <a href="#" class="shop-btn bank-btn" onclick="modalAction('.bank')">Add Bank</a>

                                    <!-- bank-modal -->
                                    <div class="modal-wrapper bank">
                                        <div onclick="modalAction('.bank')" class="anywhere-away"></div>

                                        <!-- change this -->
                                        <div class="login-section account-section modal-main">
                                            <div class="review-form">
                                                <div class="review-content">
                                                    <h5 class="comment-title">Add Bank Account</h5>
                                                    <div class="close-btn">
                                                        <img src="./assets/images/homepage-one/close-btn.png"
                                                            onclick="modalAction('.bank')" alt="close-btn">
                                                    </div>
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="accountnumber" class="form-label">Account
                                                        Number*</label>
                                                    <input type="number" id="accountnumber" class="form-control"
                                                        placeholder="*** *** ***">
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="accountholdername" class="form-label">Card Holder
                                                        Name*</label>
                                                    <input type="text" id="accountholdername" class="form-control"
                                                        placeholder="Demo Name">
                                                </div>
                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="branchname" class="form-label">Branch*</label>
                                                        <input type="text" id="branchname" class="form-control"
                                                            placeholder="Demo Branch">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="ipscode" class="form-label">IPSC Code</label>
                                                        <input type="number" id="ipscode" class="form-control"
                                                            placeholder="21232">
                                                    </div>
                                                </div>
                                                <div class="login-btn text-center">
                                                    <a href="#" onclick="modalAction('.bank')" class="shop-btn">Add Bank
                                                        Account</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- change this -->

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-order" role="tabpanel"
                            aria-labelledby="v-pills-order-tab" tabindex="0">
                            <div class="cart-section">
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
                                                    <h5 class="table-heading">QUANTITY</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-total">
                                                <div class="table-wrapper-center">
                                                    <h5 class="table-heading">TOTAL</h5>
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
                                                        <h5 class="heading">Classic Design Skart</h5>
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
                                                    <div class="quantity">
                                                        <span class="minus">
                                                            -
                                                        </span>
                                                        <span class="number">1</span>
                                                        <span class="plus">
                                                            +
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-total">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">$40.00</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <span>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                fill="#AAAAAA"></path>
                                                        </svg>
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
                                                        <h5 class="heading">Classic Black Suit</h5>
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
                                                    <div class="quantity">
                                                        <span class="minus">
                                                            -
                                                        </span>
                                                        <span class="number">1</span>
                                                        <span class="plus">
                                                            +
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-total">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">$40.00</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper ">
                                                <div class="table-wrapper-center">
                                                    <span>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                fill="#AAAAAA"></path>
                                                        </svg>
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
                                                        <h5 class="heading">Blue Party Dress</h5>
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
                                                    <div class="quantity">
                                                        <span class="minus">
                                                            -
                                                        </span>
                                                        <span class="number">1</span>
                                                        <span class="plus">
                                                            +
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-total">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">$40.00</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <span>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                fill="#AAAAAA"></path>
                                                        </svg>
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
                                                        <h5 class="heading">Classic Party Dress</h5>
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
                                                    <div class="quantity">
                                                        <span class="minus">
                                                            -
                                                        </span>
                                                        <span class="number">1</span>
                                                        <span class="plus">
                                                            +
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-total">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">$40.00</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <span>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                fill="#AAAAAA"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel"
                            aria-labelledby="v-pills-wishlist-tab" tabindex="0">

                            <div class="wishlist">
                                <div class="cart-content">
                                    <h5 class="cart-heading">SpaceRace</h5>
                                    <p>Order ID: <span class="inner-text">#4345</span></p>
                                </div>
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
                                                            <h5 class="heading">Classic Design Skart</h5>
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
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                    fill="#AAAAAA"></path>
                                                            </svg>
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
                                                            <h5 class="heading">Classic Black Suit</h5>
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
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                    fill="#AAAAAA"></path>
                                                            </svg>
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
                                                            <h5 class="heading">Blue Party Dress</h5>
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
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                    fill="#AAAAAA"></path>
                                                            </svg>
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
                                                            <h5 class="heading">Classic Party Dress</h5>
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
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                    fill="#AAAAAA"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="wishlist-btn">
                                    <a href="#" class="clean-btn">Clean Wishlist</a>
                                    <a href="#" class="shop-btn">View Cards</a>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                            aria-labelledby="v-pills-password-tab" tabindex="0">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="form-section">
                                        <form action="{{ route('user.update.password') }}" method="POST">
                                            @csrf
                                            <div class="currentpass form-item">
                                                <label for="currentpass" class="form-label">Current Password*</label>
                                                <input type="password" class="form-control" id="currentpass"
                                                    name="current_password" required placeholder="******">
                                            </div>
                                            <div class="password form-item">
                                                <label for="pass" class="form-label">New Password*</label>
                                                <input type="password" class="form-control" id="pass" name="password"
                                                    required placeholder="******">
                                            </div>
                                            <div class="re-password form-item">
                                                <label for="repass" class="form-label">Re-enter Password*</label>
                                                <input type="password" class="form-control" id="repass"
                                                    name="password_confirmation" required placeholder="******">
                                            </div>
                                            <div class="form-btn mt-3">
                                                <button type="submit" class="shop-btn">Update Password</button>
                                                <a href="#" class="shop-btn cancel-btn">Cancel</a>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="reset-img text-end">
                                        <img src="{{asset('assets/images/homepage-one/reset.webp')}}" alt="reset">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- user-profile-section-end --------------->
</main>


@endsection