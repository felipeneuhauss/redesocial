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
Route::get('home', 'Index\HomeController@index');

Route::get('/', 'Product\ProductController@redbean');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/product', 'Product\ProductController@index');
Route::get('/product/json-list', 'Product\ProductController@jsonList');
Route::get('/product/detail/{id?}', 'Product\ProductController@detail')->where('id', '[0-9]+');
Route::get('/product/remove/{id?}',
    array(
        'uses' => 'Product\ProductController@remove'
    )
)->where('id', '[0-9]+');
Route::match(array('GET' , 'POST'),'/product/form/{id?}', 'Product\ProductController@form')->where('id', '[0-9]+');