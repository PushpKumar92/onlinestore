<header class="navbar navbar-expand-lg navbar-dark px-3 py-3 border-bottom">
    <!-- Logo for Mobile -->
    <a class="navbar-brand d-lg-none" href="#">
        <img src="{{ asset('assets/images/logos/logo.png') }}" height="40" alt="Brand">
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
            <span class="text-dark h5 mb-0">Admin Dashboard</span>
        </a>

        <!-- Centered Search Box -->
        <div class="mx-auto my-2 my-lg-0 w-100" style="max-width: 500px;">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light text-dark" type="submit">Search</button>
            </form>
        </div>

        <!-- Sidebar Menu (Visible Only on Mobile) -->
        <ul class="navbar-nav d-lg-none">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="bi bi-people me-2"></i>Contact-Data
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="bi bi-gear me-2"></i>Blog
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class=" nav-link text-dark">
                    <i class="bi bi-gear me-2"></i>Navbar
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="bi bi-gear me-2"></i>Pages
                </a>
            </li>
            <!-- Add other sidebar links here -->
        </ul>

        <!-- User Dropdown -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
                </a>
                <ul class=" dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
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
    <!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('admin.change-password') }}" method="POST">
          @csrf
          
          <div class="mb-3 position-relative">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
          </div>

          <div class="mb-3 position-relative">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
          </div>

          <div class="mb-3 position-relative">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-1 w-100">Update Password</button>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
function togglePassword(fieldId) {
    let field = document.getElementById(fieldId);
    field.type = field.type === "password" ? "text" : "password";
}
</script>

</header>