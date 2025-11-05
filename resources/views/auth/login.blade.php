@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card border-0 shadow-lg p-4" style="width: 420px; border-radius: 20px;">
    <div class="text-center mb-4">
      <img src="https://cdn-icons-png.flaticon.com/512/891/891462.png" alt="Login Icon" width="60" class="mb-2">
      <h3 class="fw-bold text-dark">Welcome Back 👋</h3>
      <p class="text-muted">Log in to continue shopping</p>
    </div>

    {{-- Error Message --}}
    @if(session('error'))
      <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    {{-- Login Form --}}
    <form action="{{ route('login.perform') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <input type="email" name="email" class="form-control form-control-lg rounded-pill" placeholder="you@example.com" required value="{{ old('email') }}">
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Password</label>
        <input type="password" name="password" class="form-control form-control-lg rounded-pill" placeholder="••••••••" required>
      </div>

      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-dark rounded-pill py-2 fw-semibold shadow-sm">
          Login
        </button>
      </div>
    </form>

    <hr class="my-4">

    <p class="text-center mb-0 text-muted">
      Don’t have an account?
      <a href="{{ route('register.show') }}" class="text-decoration-none fw-semibold">Register here</a>
    </p>
  </div>
</div>
@endsection
