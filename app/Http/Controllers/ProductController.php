<?php
namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::take(8)->get();
        return view('products.home', compact('products'));
    }

    public function index()
    {
        $products = Product::paginate(12);
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
