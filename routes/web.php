<?php

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


Route::get('home', 'ProductoController@index')->name('home');
Route::get('almacen/{id}', 'ProductoController@getAlmacen')->name('almacen');
Route::get('add', 'ProductoController@addExistencias')->name('almacen.update');
Route::post('store', 'ProductoController@store')->name('almacen.store');
Route::get('get-data-almacenes/{id}', 'ProductoController@getAlmacenes')->name('almacen.byProducto');
