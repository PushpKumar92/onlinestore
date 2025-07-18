<nav id="sidebarMenu" class="sidebar d-none min-vh-100 d-lg-block">
    <div class="p-3">
        <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
            <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo" width="150">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('vendor.dashboard') }}" class="nav-link text-white">
                    <i class="fas fa-home text-warning me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('vendor.products.index') }}">
                    <i class="fas fa-box text-warning"></i>
                    <span>Products</span>
                </a>
            </li>


            <li>
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-shopping-cart text-warning me-2"></i>Orders
                </a>
            </li>

        </ul>
    </div>
</nav>