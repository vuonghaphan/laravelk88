<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    // Route::group(['prefix' => 'products'], function () {
    //     Route::get('', 'ProductController@index');
    //     Route::get('create', 'ProductController@create');
    //     Route::post('', 'ProductController@store');
    //     Route::get('{idProduct}/edit', 'ProductController@edit');
    //     Route::put('{idProduct}', 'ProductController@update');
    //     Route::delete('{idProduct}', 'ProductController@destroy');
    //     Route::get('{idProduct}', 'ProductController@show');
    // });

    Route::get('login','LoginController@showLoginForm');
    Route::post('login','LoginController@login');
    Route::post('logout','LoginController@logout');

    Route::get('','DashboardController');

    Route::group(['prefix' => 'orders'
], function () {
    Route::get('','OderController@index');
    Route::get('processed','OderController@processed');
    Route::get('{idprd}/edit','OderController@edit');
    Route::put('{idprd}','OderController@update');
    });
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductsController');
    Route::resource('category', 'CategoryController');
});
