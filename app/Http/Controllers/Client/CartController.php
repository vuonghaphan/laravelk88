<?php

namespace App\Http\Controllers\Client;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::getContent();
        // dd($cart);

        return view('client.cart.index',compact('cart'));
    }
    public function complete(){
        return view('client.cart.complete');
    }
    public function checkout(){
        return view('client.cart.checkout');
    }
    public function add(Request $r){
        // Cart::clear();
        $r->validate([
            'product_id' => ' required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);
        $product = Product::findOrFail($r->product_id);
        Cart::add([
            'id' => $r->product_id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $r->quantity,
            'attributes' => [
                'sku' => $product->sku,
                'avatar' => $product->avatar
            ]
        ]);

        return response()->json([
            'cartTotalQuantity' => Cart::getTotalQuantity()
        ],200);
    }
    public function remove(Request $r){
        $r->validate([
            'product_id' => ' required',
        ]);
        Cart::remove($r->product_id);
        return response()->json([], 204);
    }
    public function update(Request $r){
        $r->validate([
            'product_id' => ' required',
            'quantity' => 'required|numeric'
        ]);
        Cart::update($r->product_id,[
            'quantity' => [
                'relative' => false,
                'value' =>$r->quantity
            ]
        ]);
        return response()->json([
            'itemSubTotal' => number_format(Cart::get($r->product_id)->getPriceSum()),
            'total' => number_format(Cart::getTotal())
        ], 200);
    }
}
