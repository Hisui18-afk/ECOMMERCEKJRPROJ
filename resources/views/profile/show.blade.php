@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="fw-bold">{{ auth()->user()->name }}</h5>
                    <p class="text-muted">{{ auth()->user()->email }}</p>

                    <hr>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary w-100 mb-2">
                        Edit Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger w-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Panel -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">Profile Overview</div>
                <div class="card-body">
                    
                    <h6 class="fw-bold">Account Information</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted">Full Name:</td>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Email Address:</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Member Since:</td>
                            <td>{{ auth()->user()->created_at->format('F d, Y') }}</td>
                        </tr>
                    </table>

                    <hr>

                    <h6 class="fw-bold">Order History</h6>
                    <p class="text-muted">No orders yet. Start shopping to see your order list here 😊</p>

                    <a href="{{ route('products.index') }}" class="btn btn-primary">Shop Now</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
