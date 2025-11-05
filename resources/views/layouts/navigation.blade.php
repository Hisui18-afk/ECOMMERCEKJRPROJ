@php
    use App\Models\User;
    $loggedUser = session()->has('user_id') ? User::find(session('user_id')) : null;
@endphp

<nav class="flex justify-between items-center px-8 py-4 border-b bg-white">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="text-xl font-bold">KJR Shop</a>

    <!-- Menu Links -->
    <div class="flex items-center gap-6">
        <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
        <a href="{{ route('products.index') }}" class="hover:text-blue-600">Shop</a>
        <a href="#" class="hover:text-blue-600">About</a>
        <a href="#" class="hover:text-blue-600">Contact</a>
    </div>

    <!-- Right Side -->
<!-- Right Side -->
<div class="flex items-center gap-4">

    @if(session()->has('user_id'))
        <!-- Cart -->
        <a href="{{ route('cart') }}" class="flex items-center gap-1 hover:text-blue-600">
            🛒 Cart
        </a>

        <!-- Profile Dropdown -->
        <div class="relative group">
            <button class="flex items-center gap-2 px-3 py-2 rounded-md bg-gray-100 hover:bg-gray-200">
                👤 {{ \App\Models\User::find(session('user_id'))->name }}
            </button>

            <div class="absolute hidden group-hover:block right-0 mt-2 w-48 bg-white rounded-md shadow-lg border z-50">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Profile
                </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>


            </div>
        </div>

    @else
        <!-- Cart -->
        <a href="{{ route('cart') }}" class="flex items-center gap-1 hover:text-blue-600">
            🛒 Cart
        </a>

        <!-- Login -->
        <a href="{{ route('login.show') }}" class="px-4 py-2 border rounded-md hover:bg-gray-100">
            Login
        </a>

        <!-- Register -->
        <a href="{{ route('register.show') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Create Account
        </a>
    @endif

</div>

</nav>
