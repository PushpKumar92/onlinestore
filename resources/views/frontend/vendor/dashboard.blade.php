@extends('frontend.vendor.layout.main')

@section('content')

<div class="container-fluid py-4">
    <div class="row">


        <!-- Main Dashboard Content Column -->
        <div class="col-md-9">
            <div class="row g-3">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-users text-primary"></i>
                            </div>
                            <div>
                                <p>Total Users</p>
                                <h5>5</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-shopping-cart text-info"></i>
                            </div>
                            <div>
                                <p>Total Orders</p>
                                <h5>5</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- col-md-9 -->
    </div> <!-- row -->
</div> <!-- container -->

@endsection