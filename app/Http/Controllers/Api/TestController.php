<?php

namespace App\Http\Controllers\Api;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\WelcomeMail;

class TestController extends Controller
{
    public function welcome(){
        Mail::to('havuong3103@gmail.com')->send(new WelcomeMail);
        return response()->json([
            'message'=>'good evening'
        ],200);
    }
    public function goodbye(){
        $product = Product::first();
        return response()->json([
            'message'=>'bye bye',
            // 'product'=> $product,
            'data' =>   [
                'product' => $product
            ],
        ], 400);
    }
}
