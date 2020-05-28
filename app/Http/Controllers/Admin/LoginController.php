<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm(){
        return view('admin.auth.login');
    }
    public function login(Request $r){
        $r->validate([
            'email'=>'required|email',
            'password'=>'required|min:1'
        ]);
        $credentials = $r->only(['email','password']);
        if (Auth::attempt($credentials)){
            return redirect('/admin');
        } else {
            return back()->withInput(['email'])
                ->withErrors(['email'=>'Invalid credentials']);
        }
    }
    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect('/admin/login');
    }
}
