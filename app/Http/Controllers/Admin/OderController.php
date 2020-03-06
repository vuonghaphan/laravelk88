<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OderController extends Controller
{
    public function index(){
        return view('admin.orders.index');
    }
    public function processed(){
        return view('admin.orders.processed');
    }
    public function edit(){
        return view('admin.orders.edit');
    }
    public function update(){

    }
}
