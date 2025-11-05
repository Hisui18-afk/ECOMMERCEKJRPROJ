<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = session('cart', []);
        $products = [];
        $total = 0;
        foreach($cart as $id => $qty){
            $p = Product::find($id);
            if($p){
                $p->qty = $qty;
                $p->subtotal = $p->price * $qty;
                $products[] = $p;
                $total += $p->subtotal;
            }
        }
        return view('cart.index', compact('products','total'));
    }

    public function add(Request $r, Product $product){
        $qty = max(1, (int)$r->qty);
        $cart = session('cart', []);
        if(isset($cart[$product->id])) $cart[$product->id] += $qty;
        else $cart[$product->id] = $qty;
        session(['cart' => $cart]);
        return redirect('/cart')->with('success','Added to cart');
    }

    public function update(Request $r){
        $cart = session('cart', []);
        foreach($r->qty as $id => $q){
            $cart[$id] = max(0, (int)$q);
            if($cart[$id] === 0) unset($cart[$id]);
        }
        session(['cart'=>$cart]);
        return back()->with('success','Cart updated');
    }

    public function clear(){
        session()->forget('cart');
        return back()->with('success','Cart cleared');
    }
}
