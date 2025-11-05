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
                <li class="nav-item ms-3">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-cart"></i> Cart
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a href="#" class="btn btn-primary btn-sm">
                        <i class="bi bi-person"></i> Login
                    </a>
                </li>
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
