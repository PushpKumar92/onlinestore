<nav id="sidebarMenu" class="sidebar d-none min-vh-100 d-lg-block">
    <div class="p-3">
        <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo" width="150">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">
                    <i class="fas fa-home  me-2"></i> Dashboard
                </a>
            </li>

            <li>
                <a class="nav-link text-dark" href="{{ route('users.index') }}">
                    <i class="fas fa-users  me-2"></i>Users
                </a>
            </li>
            <li>
                <a class="nav-link text-dark" href="{{route('category.index')}}">
                    <i class="fa-solid fa-layer-group me-2"></i>Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('admin.products.index') }}">
                    <i class="fa-brands fa-product-hunt"></i>
                    <span>Products</span>
                </a>
            </li>
           
            <li>
                <a class="nav-link text-dark" href="{{route('admin.orders.index')}}">
                    <i class="fas fa-shopping-cart  me-2"></i>Orders
                </a>
            </li>
            <li>
                <a class="nav-link text-dark" href="{{route('brands.index')}}">
                    <i class="fa-solid fa-tag me-2"></i>Brands
                </a>
            </li>
            <li>
                <a class="nav-link text-dark" href="{{route('blogs.list')}}">
                    <i class="fas fa-blog me-2"></i>Blogs
                </a>
            </li>
            <li>
                <a class="nav-link text-dark" href="{{route('meta-tags.index')}}">
                    <i class="fa-brands fa-meta me-2"></i>Meta-Tags
                </a>
            </li>
            <li>
                <a class="nav-link text-dark" href="{{route('admin.contacts.index')}}">
               <i class="fa-solid fa-phone me-2"></i>Contact-Data
                </a>
            </li>
        </ul>
    </div>
</nav>