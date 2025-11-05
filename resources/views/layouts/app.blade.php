<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KJR Shop')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .navbar-brand { font-weight: 700; color: #0d6efd !important; }
        footer {
            background: #f8f9fa;
            padding: 30px 0;
            margin-top: 50px;
        }
        footer a { color: #6c757d; text-decoration: none; }
        footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>


<!-- 🧭 Navbar -->
<!-- 🧭 Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">KJR Shop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">

                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Shop</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>

                <!-- Cart always visible -->
                <li class="nav-item ms-3">
                    <a href="{{ route('cart.view') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-cart"></i> Cart
                    </a>
                </li>

                <!-- If user is logged in -->
<!-- If user is logged in -->
@if(session()->has('user'))
    <li class="nav-item dropdown ms-2">
        <a class="btn btn-secondary dropdown-toggle btn-sm" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
            👤 {{ session('user')->name }}
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
            <li><hr class="dropdown-divider"></li>

            <li>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                    Logout
                </a>
            </li>
        </ul>
    </li>

@else
    <!-- If user is logged out -->
    <li class="nav-item ms-2">
        <a href="{{ route('login.show') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-person"></i> Login
        </a>
    </li>

    <li class="nav-item ms-2">
        <a href="{{ route('register.show') }}" class="btn btn-success btn-sm">
            Create Account
        </a>
    </li>
@endif





            </ul>
        </div>
    </div>
</nav>

<!-- 🧩 Main Content -->
<main>
    @yield('content')
</main>

<!-- 🦶 Footer -->
<footer class="text-center text-muted">
    <div class="container">
        <p class="mb-1">© {{ date('Y') }} KJR Shop — All Rights Reserved.</p>
        <div>
            <a href="#"><i class="bi bi-facebook me-2"></i></a>
            <a href="#"><i class="bi bi-instagram me-2"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
