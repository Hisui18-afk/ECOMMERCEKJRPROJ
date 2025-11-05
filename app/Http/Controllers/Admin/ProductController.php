<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){ $this->middleware('admin'); }

        public function index()
        {
            $products = Product::all();
            return view('products.index', compact('products'));
        }

    public function create(){ return view('admin.products.create'); }

    public function store(Request $r){
        $r->validate(['name'=>'required','price'=>'required|numeric']);
        $data = $r->only(['name','description','price','stock']);
        if($r->hasFile('image')){
            $file = $r->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Created');
    }

    public function edit(Product $product){ return view('admin.products.edit', compact('product')); }

    public function update(Request $r, Product $product){
        $r->validate(['name'=>'required','price'=>'required|numeric']);
        $data = $r->only(['name','description','price','stock']);
        if($r->hasFile('image')){
            $file = $r->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success','Updated');
    }

    public function destroy(Product $product){
        $product->delete();
        return back()->with('success','Deleted');
    }
}
