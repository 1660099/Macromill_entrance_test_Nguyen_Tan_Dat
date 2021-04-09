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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', function () {
    return view('page.admin_template');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'CategoryController@index')->name('category');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store')->name('category.store');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@index')->name('product');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/store', 'ProductController@store')->name('product.store');
});


