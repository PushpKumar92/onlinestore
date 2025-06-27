<nav id="sidebarMenu" class="sidebar d-none min-vh-100 d-lg-block">
    <div class="p-3">
        <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
            <img src="{{ asset('assets/images/logo/logowhite.png') }}" alt="Logo" width="150">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="#">
                    <i class="fa-solid fa-phone-volume me-2"></i> Contact-Data
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="#">
                    <i class="fa-solid fa-blog me-2"></i> Blog
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="#">
                    <i class=" fa-solid fa-bars me-2"></i> Navbar
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="#">
                    <i class="fa-solid fa-pager me-2"></i> Pages
                </a>
            </li>
        </ul>
    </div>
</nav>