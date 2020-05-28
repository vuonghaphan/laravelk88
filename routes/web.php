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
    'namespace' => 'Admin' // nằm trong thư mục admin của controller
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
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login','LoginController@showLoginForm')->name('admin.login');
        Route::post('login','LoginController@login');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout','LoginController@logout');

        Route::get('','DashboardController')->name('dashboard');

        Route::group(['prefix' => 'orders'], function () {
            Route::get('','OderController@index');
            Route::get('processed','OderController@processed');
            Route::get('{idprd}/edit','OderController@edit');
            Route::put('{idprd}','OderController@update');
        });
        Route::resource('users', 'UserController');
        Route::resource('products', 'ProductsController');
        Route::resource('category', 'CategoryController');
    });
});



Route::group(['namespace' => 'client'], function () {
    Route::get('','HomeController@index');
    Route::get('about','HomeController@about');
    Route::get('contact','HomeController@contact');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('', 'CartController@index');
        Route::get('checkout', 'CartController@checkout');
        Route::get('complete', 'CartController@complete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'ProductController@index');
        Route::get('{idCate}', 'ProductController@index');
        Route::get('{idCate}/{idPrd}', 'ProductController@detail');
    });
});
