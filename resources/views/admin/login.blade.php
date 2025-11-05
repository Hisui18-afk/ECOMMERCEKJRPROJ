@extends('layouts.admin_auth')

@section('content')
<div class="card shadow p-4" style="width: 400px;">
  <h3 class="text-center mb-3">Admin Login</h3>

  @if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
  @endif
<form method="POST" action="{{ route('admin.login.perform') }}">
    @csrf
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-dark w-100">Login</button>
</form>


</div>
@endsection
