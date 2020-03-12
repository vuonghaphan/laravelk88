<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('client.cart.index');
    }
    public function complete(){
        return view('client.cart.complete');
    }
    public function checkout(){
        return view('client.cart.checkout');
    }
}
