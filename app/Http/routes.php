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


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', 'Product\ProductController@index');
Route::match(array('GET' , 'POST'),'/products/form/{id?}', 'Product\ProductController@form')
    ->where('id', '[0-9]+');

Route::get('/products', 'Product\ProductController@index');
Route::get('/products/json-list', 'Product\ProductController@jsonList');
Route::get('/products/detail/{id?}', 'Product\ProductController@detail')->where('id', '[0-9]+');
Route::get('/products/remove/{id?}',
    array(
        'uses' => 'Product\ProductController@remove'
    )
)->where('id', '[0-9]+');
