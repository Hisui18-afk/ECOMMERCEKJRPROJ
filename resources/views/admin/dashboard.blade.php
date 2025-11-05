@extends('layouts.admin_auth')

@section('content')
<div class="row g-4">
  <div class="col-md-4">
    <div class="card shadow-sm border-0 p-4">
      <h5><i class="bi bi-box"></i> Products</h5>
      <p class="text-muted">Manage your product listings.</p>
      <a href="{{ route('admin.products') }}" class="btn btn-dark btn-sm">View Products</a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card shadow-sm border-0 p-4">
      <h5><i class="bi bi-cart"></i> Orders</h5>
      <p class="text-muted">View customer orders (coming soon).</p>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card shadow-sm border-0 p-4">
      <h5><i class="bi bi-people"></i> Customers</h5>
      <p class="text-muted">Manage registered customers (coming soon).</p>
    </div>
  </div>
</div>
@endsection
