<nav id="sidebarMenu" class="sidebar d-none min-vh-100 d-lg-block">
    <div class="p-3">
        <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
            <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo" width="150">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    <i class="fas fa-home text-warning me-2"></i> Dashboard
                </a>
            </li>

            <li>
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-users text-warning me-2"></i>Users
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('category.index')}}">
                    <i class="fas fa-users text-warning me-2"></i>Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-box text-warning"></i>
                    <span>All Products</span>
                </a>
            </li>
           
            <li>
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-shopping-cart text-warning me-2"></i>Orders
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('blogs.list')}}">
                    <i class="fas fa-blog text-warning me-2"></i>Blogs
                </a>
            </li>
        </ul>
    </div>
</nav>