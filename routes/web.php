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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'App\Http\Controllers\TestController@welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware' => ['auth', 'admin']], function () {
    // rutas para Productos
    Route::get('/products', 'App\Http\Controllers\ProductController@index');  // listado
    Route::get('/products/create', 'App\Http\Controllers\ProductController@create');  //formulario
    Route::post('/products', 'App\Http\Controllers\ProductController@store');  // registrar
    Route::get('/products/{id}/edit', 'App\Http\Controllers\ProductController@edit'); // formulario edicion
    Route::post('/products/{id}/edit', 'App\Http\Controllers\ProductController@update'); // actualizar
    Route::delete('/products/{id}', 'App\Http\Controllers\ProductController@destroy'); // eliminar

    Route::get('/products/{id}/images', 'App\Http\Controllers\ImageController@index'); //listado
    Route::post('/products/{id}/images', 'App\Http\Controllers\ImageController@store'); // registrar
    Route::delete('/products/{id}/images', 'App\Http\Controllers\ImageController@destroy'); // eliminar

});


