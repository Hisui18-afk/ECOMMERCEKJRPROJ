@extends('layouts.app')

@section('title', 'Explore Our Products')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* ===== Layout ===== */
    body {
        background-color: #f8f9fa;
    }

    h2.section-title {
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    /* ===== Product Card ===== */
    .product-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        transition: all 0.3s ease-in-out;
        position: relative;
    }
    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        height: 260px;
        width: 100%;
        object-fit: cover;
        transition: 0.4s ease;
    }
    .product-card:hover img {
        filter: brightness(90%);
        transform: scale(1.03);
    }

    /* ===== Product Info ===== */
    .product-card .card-body {
        padding: 18px;
    }

    .product-title {
        font-size: 1.05rem;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .product-price {
        color: #198754;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .text-muted.small {
        color: #777 !important;
    }

    /* ===== Add to Cart Button ===== */
    .btn-cart {
        background: #0d6efd;
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 6px 16px;
        font-size: 0.9rem;
        transition: 0.3s;
    }
    .btn-cart:hover {
        background: #084298;
    }

    /* ===== Quick View Overlay ===== */
    .quick-view {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.45);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s ease;
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    .product-card:hover .quick-view {
        opacity: 1;
    }

    /* ===== Empty State ===== */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #6c757d;
    }
    .empty-state i {
        font-size: 60px;
        color: #adb5bd;
        margin-bottom: 10px;
    }

</style>

<div class="container py-5">
    <h2 class="section-title text-center mb-5">🛍 Explore Our Products</h2>

    @if($products->count() > 0)
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 shadow-sm">
                        <div class="position-relative">
                            <img src="{{ $product->image ?? 'https://via.placeholder.com/300x230?text=No+Image' }}" 
                                 alt="{{ $product->name }}">
                            <a href="{{ route('products.show', $product->id) }}" class="quick-view">
                                <i class="bi bi-eye me-2"></i> View Details
                            </a>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <p class="text-muted small flex-grow-1">{{ Str::limit($product->description, 55) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-cart btn-sm">
                                    <i class="bi bi-cart-plus"></i> Add
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>

    @else
        <div class="empty-state">
            <i class="bi bi-box-seam"></i>
            <h5 class="mt-3">No products available at the moment.</h5>
            <p>Check back soon for new arrivals!</p>
        </div>
    @endif
</div>
@endsection
