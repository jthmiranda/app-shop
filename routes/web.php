<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::post('/cart', 'CartDetailController@store');

//Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
    // rutas para Admin\Productos
    Route::get('/products', 'ProductController@index');  // listado
    Route::get('/products/create', 'ProductController@create');  //formulario
    Route::post('/products', 'ProductController@store');  // registrar
    Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario edicion
    Route::post('/products/{id}/edit', 'ProductController@update'); // actualizar
    Route::delete('/products/{id}', 'ProductController@destroy'); // eliminar

    Route::get('/products/{id}/images', 'ImageController@index'); //listado
    Route::post('/products/{id}/images', 'ImageController@store'); // registrar
    Route::delete('/products/{id}/images', 'ImageController@destroy'); // eliminar
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // eliminar

});


