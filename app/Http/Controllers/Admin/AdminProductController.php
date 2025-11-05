<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    // ✅ Show all products
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // ✅ Show form to add product
    public function create()
    {
        return view('admin.products.create');
    }

    // ✅ Save new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Product::create($request->only(['name', 'price', 'description']));

        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }

    // ✅ Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // ✅ Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product->update($request->only(['name', 'price', 'description']));

        return redirect()->route('admin.products')->with('success', 'Product updated!');
    }

    // ✅ Delete product
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products')->with('success', 'Product deleted.');
    }
}
