@extends('admin.layout.main')

@section('content')
<!-- Main Content -->

<main class="container py-4">
    <div class="row g-3">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-users text-primary"></i>
                    </div>
                    <div>
                        <p>Total Contact User</p>
                        <h5>5</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-blog text-info"></i>
                    </div>
                    <div>
                        <p>Total Blog Post</p>
                        <h5>5</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection