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
            <span class="text-white h5 mb-0">Vendor Dashboard</span>
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
                <a href="{{ route('vendor.dashboard') }}" class="nav-link text-white">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i>Products
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-gear me-2"></i>Orders
                </a>
            </li>


            <!-- Add other sidebar links here -->
        </ul>

        <!-- User Dropdown -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::guard('vendor')->user()->name ?? 'Vendor' }}
                </a>
                <ul class=" dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('vendor.change-password.form') }}">
                            Change Password
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('vendor.logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>