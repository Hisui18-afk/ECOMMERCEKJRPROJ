@extends('layouts.app')

@section('title', 'KJR Shop - Home')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* ===== Hero Section ===== */
    .hero {
        background: linear-gradient(to right, #e5e5e5 40%, #fff 100%);
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 0;
    }
    .hero-content {
        max-width: 600px;
    }
    .hero h1 {
        font-weight: 700;
        font-size: 3rem;
    }
    .hero p {
        font-size: 1.2rem;
        color: #555;
    }
    .hero .btn-primary {
        background-color: #0d6efd;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
    }

    /* ===== Category Section ===== */
    .category-card {
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid #eee;
        background: #fff;
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .category-card img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }
    .category-card h6 {
        font-weight: 600;
        margin-top: 10px;
    }
    .category-card small {
        color: #888;
    }

    /* ===== Products ===== */
    .product-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 10px;
    }
    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }
    .product-card img {
        height: 250px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }

    .product-card .product-title {
        font-size: 1rem;
        font-weight: 600;
        color: #212529;
    }

    .product-card .product-price {
        color: #198754;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .btn-cart {
        background: #0d6efd;
        color: #fff;
        border: none;
        border-radius: 50px;
        transition: 0.3s;
    }
    .btn-cart:hover {
        background: #084298;
    }
</style>

<!-- 🌈 Hero Section -->
<section class="hero">
    <div class="container d-flex flex-wrap align-items-center justify-content-between">
        <div class="hero-content">
            <h1>SUMMER COLLECTION</h1>
            <p>Cool styles for everyone — up to <strong>40% OFF</strong> this season!</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Shop Now</a>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1593032465174-8b742cac9b47?auto=format&fit=crop&w=600&q=80"
                 alt="Summer Collection" class="img-fluid rounded">
        </div>
    </div>
</section>

<!-- 🏷️ Category Section -->
<section class="container py-5">
    <div class="text-center mb-4">
        <h3 class="fw-bold">Shop by Category</h3>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="category-card p-3">
                <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=800&q=80" alt="Ladies Boots">
                <h6>Stylish Ladies Boots</h6>
                <small>Up to 30% Off</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category-card p-3">
                <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?auto=format&fit=crop&w=800&q=80" alt="Mens Jackets">
                <h6>Cool Men’s Jackets</h6>
                <small>Sale Up to 15%</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category-card p-3">
                <img src="https://images.unsplash.com/photo-1598033129183-cd3d081b6acb?auto=format&fit=crop&w=800&q=80" alt="School Bags">
                <h6>Trendy School Bags</h6>
                <small>Up to 70% Off</small>
            </div>
        </div>
    </div>
</section>

<!-- 🛍️ Product Showcase -->
<section class="container py-5">
    <div class="text-center mb-4">
        <h3 class="fw-bold">Recommended Products</h3>
    </div>

    @if($products->count() > 0)
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card product-card shadow-sm h-100">
                        <img src="{{ $product->image ?? 'https://via.placeholder.com/300x230?text=No+Image' }}" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <p class="text-muted small flex-grow-1">{{ Str::limit($product->description, 50) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-cart btn-sm">
                                    <i class="bi bi-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-muted py-5">
            <i class="bi bi-box-seam" style="font-size: 3rem;"></i>
            <h5 class="mt-3">No products available right now.</h5>
        </div>
    @endif
</section>
@endsection
