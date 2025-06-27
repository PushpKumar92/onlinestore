<header class="navbar navbar-expand-lg navbar-dark px-3 py-3 border-bottom">
    <!-- Logo for Mobile -->
    <a class="navbar-brand d-lg-none" href="#">
        <img src="{{ asset('assets/images/logo/logowhite.png') }}" height="40" alt="Brand">
    </a>

    <!-- Toggler for Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
        aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Main Navbar Content -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarMain">
        <!-- Logo + Title for Large Screens -->
        <a class="navbar-brand d-none d-lg-flex align-items-center" href="#">
            <span class="text-white h5 mb-0">Admin Dashboard</span>
        </a>

        <!-- Centered Search Box -->
        <div class="mx-auto my-2 my-lg-0 w-100" style="max-width: 500px;">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>

        <!-- Sidebar Menu (Visible Only on Mobile) -->
        <ul class="navbar-nav d-lg-none">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i>Contact-Data
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-gear me-2"></i>Blog
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class=" nav-link text-white">
                    <i class="bi bi-gear me-2"></i>Navbar
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-gear me-2"></i>Pages
                </a>
            </li>
            <!-- Add other sidebar links here -->
        </ul>

        <!-- User Dropdown -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
                </a>
                <ul class=" dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.change-password.form') }}">
                            Change Password
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>