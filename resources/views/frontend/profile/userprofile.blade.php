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
                                    <div class="col-lg-12">
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

                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="v-pills-order" role="tabpanel"
                            aria-labelledby="v-pills-order-tab" tabindex="0">
                            <div class="cart-section">
                                @foreach($orders as $order)
                                <div class="cart-content">
                                    <h5 class="cart-heading">{{ $order->id }}</h5>
                                    <p>Order Date: <span
                                            class="inner-text">{{ $order->created_at->format('d M, Y') }}</span></p>
                                </div>
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
                                        @foreach($order->items as $item)
                                        <tr class="table-row ticket-row">
                                            <td class="table-wrapper wrapper-product">
                                                <div class="wrapper">
                                                    <div class="wrapper-img"><img
                                                            src="{{ asset('storage/products/'.$item->product->image) }}"
                                                            alt="img"></div>
                                                    <div class="wrapper-content">
                                                        <h5 class="heading">{{ $item->product->name }}</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">${{ $item->price }}</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <div class="quantity"><span
                                                            class="number">{{ $item->quantity }}</span></div>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-total">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">${{ $item->total }}</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center"><span>...</span></div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endforeach
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