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

Route::get('/', 'Index\HomeController@index');
Route::get('/home', function(){
    return view('index.home');
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//Route::get('auth/check-authenticity-email/', 'Auth\AuthController@checkAuthenticityEmail()');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Util
Route::get('util/postcode/{zipCode?}', 'Util\PostCodeController@getAddress');

Route::group(['prefix' => 'products'], function () {
    Route::match(array('GET', 'POST'), 'form/{id?}', 'Product\ProductController@form')
        ->where('id', '[0-9]+');

    Route::get('', 'Product\ProductController@index');
    Route::get('json-list', 'Product\ProductController@jsonList');
    Route::get('detail/{id?}', 'Product\ProductController@detail')->where('id', '[0-9]+');
    Route::get('remove/{id?}',
        array(
            'uses' => 'Product\ProductController@remove'
        )
    )->where('id', '[0-9]+');
});

Route::group(['prefix' => 'airports'], function () {
    Route::match(array('GET' , 'POST'),'form/{id?}', 'Airport\AirportController@form')
        ->where('id', '[0-9]+');

    Route::get('', 'Airport\AirportController@index');
    Route::get('list', 'Airport\AirportController@getAll');
    Route::get('detail/{id?}', 'Airport\AirportController@detail')->where('id', '[0-9]+');
    Route::get('remove/{id?}',
        array(
            'uses' => 'Airport\AirportController@remove'
        )
    )->where('id', '[0-9]+');
});

Route::group(['prefix' => 'suppliers'], function () {
    Route::match(array('GET' , 'POST'),'form/{id?}', 'Supplier\SupplierController@form')
        ->where('id', '[0-9]+');

    Route::get('', 'Supplier\SupplierController@index');
    Route::get('list', 'Supplier\SupplierController@getAll');
    Route::get('detail/{id?}', 'Supplier\SupplierController@detail')->where('id', '[0-9]+');
    Route::get('remove/{id?}',
        array(
            'uses' => 'Supplier\SupplierController@remove'
        )
    )->where('id', '[0-9]+');
});
