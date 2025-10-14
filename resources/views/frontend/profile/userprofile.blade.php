@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Left Sidebar Tabs -->
        <div class="col-md-3">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                    aria-selected="true">
                    <i class="fa-solid fa-table-columns me-2"></i> Dashboard
                </button>

                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                    aria-selected="false">
                    <i class="fa-solid fa-user me-2"></i> Personal Info
                </button>

                <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment"
                    aria-selected="false">
                    <i class="fa-solid fa-credit-card me-2"></i> Payment Method
                </button>

                <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order"
                    aria-selected="false">
                    <i class="fa-solid fa-cart-shopping me-2"></i> Orders
                </button>

                <button class="nav-link" id="v-pills-wishlist-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-wishlist" type="button" role="tab" aria-controls="v-pills-wishlist"
                    aria-selected="false">
                    <i class="fa-regular fa-heart me-2"></i> Wishlist
                </button>

                <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password"
                    aria-selected="false">
                    <i class="fa-solid fa-lock me-2"></i> Change Password
                </button>

                <a href="{{ route('login') }}" class="nav-link text-danger">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                </a>
            </div>
        </div>

        <!-- Right Tab Content -->
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Dashboard -->
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
                    <h5>Welcome, {{ $user->name }} 👋</h5>
                    <p>Email: {{ $user->email }}</p>
                    <p>Member since: {{ $user->created_at->format('d M Y') }}</p>
                </div>

                <!-- Personal Info -->
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel">
                    <h5>Personal Information</h5>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{ $user->mobile ?? '' }}" class="form-control">
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Payment Method -->
                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel">
                    <h5>Payment Method</h5>
                    <p>You can set your preferred payment options here.</p>
                    <ul>
                        <li>Cash on Delivery (COD)</li>
                        <li>UPI / Net Banking</li>
                        <li>Credit / Debit Card</li>
                    </ul>
                </div>

                <!-- Orders -->
                <div class="tab-pane fade" id="v-pills-order" role="tabpanel">
                    <h5>Your Orders</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order No</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>₹{{ $order->total_amount }}</td>
                                    <td>
                                        <span class="badge bg-{{ $order->status == 'Cancelled' ? 'danger' : ($order->status == 'Delivered' ? 'success' : 'secondary') }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($order->status == 'Pending')
                                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center">No orders found</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Wishlist -->
                <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel">
                    <h5>Your Wishlist</h5>
                    <div class="row">
                        @forelse ($wishlist as $item)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <img src="{{ $item->product->image_url ?? 'https://via.placeholder.com/150' }}"
                                         class="card-img-top" alt="{{ $item->product->name }}">
                                    <div class="card-body">
                                        <h6>{{ $item->product->name }}</h6>
                                        <p>₹{{ $item->product->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No items in your wishlist.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Change Password -->
                <div class="tab-pane fade" id="v-pills-password" role="tabpanel">
                    <h5>Change Password</h5>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button class="btn btn-success">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
