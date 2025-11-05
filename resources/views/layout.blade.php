<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KJR ECOMMERCE</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="/" class="brand">MyShop</a>
            <nav>
                <a href="/">Home</a>
                <a href="/products">Products</a>
                @auth
                    <a href="/cart">Cart</a>
                    <form action="/logout" method="POST" style="display:inline">
                        @csrf
                        <button class="link-like">Logout</button>
                    </form>
                @else
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <p>© {{ date('Y') }} KJR ECOMMERCE SHOP</p>
    </footer>
</body>
</html>
