<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', 'ProductController@index');
Route::get('/product/json-list', 'ProductController@jsonList');
Route::get('/product/detail/{id?}', 'ProductController@detail')->where('id', '[0-9]+');
Route::get('/product/remove/{id?}', 'ProductController@remove')->where('id', '[0-9]+');
Route::match(array('GET' , 'POST'),'/product/form/{id?}', 'ProductController@form')->where('id', '[0-9]+');