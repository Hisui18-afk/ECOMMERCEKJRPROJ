<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #212529;
            color: #fff;
            padding: 25px 15px;
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
        }
        .sidebar h4 {
            color: #fff;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 12px;
            border-radius: 6px;
            margin-bottom: 8px;
            transition: 0.3s;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }
        .main-content {
            margin-left: 260px;
            padding: 40px;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 600;
            color: #212529;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="text-center mb-4">🛒 Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.products') }}" class="{{ request()->is('admin/products*') ? 'active' : '' }}">Manage Products</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        {{-- Top Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Welcome, Admin</span>
            </div>
        </nav>

        {{-- Page Content --}}
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
