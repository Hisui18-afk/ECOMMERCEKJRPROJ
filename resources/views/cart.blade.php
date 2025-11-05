@extends('layouts.app')

@section('content')
<h2 class="mb-4">🛒 Your Cart</h2>

@if(count($cart))
<table class="table table-striped">
  <thead>
    <tr>
      <th>Product</th><th>Price</th><th>Qty</th><th>Total</th><th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($cart as $item)
    <tr>
      <td>{{ $item['name'] }}</td>
      <td>₱{{ number_format($item['price'], 2) }}</td>
      <td>{{ $item['quantity'] }}</td>
      <td>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
      <td><a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-danger btn-sm">Remove</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="text-end">
  <h5>Total: ₱{{ number_format($total, 2) }}</h5>
  <a href="#" class="btn btn-success">Checkout</a>
</div>
@else
<div class="alert alert-info">Your cart is empty.</div>
@endif
@endsection
