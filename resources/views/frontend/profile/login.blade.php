<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        background-color: #c8c8c8;
        font-family: 'Open Sans', sans-serif;
    }

    .login-wrap {
        width: 100%;
        max-width: 500px;
        margin: 80px auto;
        padding: 40px;
        border-radius: 15px;
        color: #fff;
        background: linear-gradient(rgba(40, 57, 101, 0.8), rgba(40, 57, 101, 0.8)),
            url('https://play.vsthemes.org/nova/1024576-1/66b/bf266b2c6537b5c2a30fa1c26b0ca9d3.webp') center center / cover no-repeat;
        box-shadow: 0 12px 15px rgba(0, 0, 0, .2);
    }

    .form-label {
        color: #ccc;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: #fff;
        transition: background 0.3s ease;
    }

    .form-control:focus {
        background: #fff;
        color: #000;
    }

    .form-control::placeholder {
        color: #bbb;
    }

    .btn-primary {
        background-color: #1161ee;
        border: none;
    }

    .input-group-text {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: #fff;
    }

    .alert {
        border-radius: 8px;
    }
    </style>
</head>

<body>

    <div class="login-wrap">
        <h2 class="text-center mb-4">Login</h2>

        <!-- Flash Messages -->
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">Email or Mobile</label>
                <input id="login" type="text" name="login" class="form-control" placeholder="Enter email or mobile"
                    value="{{ old('login') }}" required>
                @error('login')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter password" required>
                    <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </span>
                </div>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Sign In</button>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('password.request') }}" class="text-light text-decoration-none">Forgot Password?</a>
                <a href="{{route('register')}}" class="text-light text-decoration-none">Register Here</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Password Toggle -->
    <script>
    const togglePassword = document.querySelector("#togglePassword");
    const passwordInput = document.querySelector("#password");
    const toggleIcon = document.querySelector("#toggleIcon");

    togglePassword.addEventListener("click", function() {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        toggleIcon.classList.toggle("bi-eye");
        toggleIcon.classList.toggle("bi-eye-slash");
    });
    </script>
</body>

</html>