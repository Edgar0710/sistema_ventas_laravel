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
Route::get('/','LoginController@index')->name('index');
Route::post('/login','LoginController@Store')->name('login.post');
Route::get('/login/logout','LoginController@logout')->name('login.logout');
/**------- Productos ---------- */
Route::get('/productos', 'ProductoController@index')->name('productos.get');
Route::post('/productos', 'ProductoController@store')->name('productos.post');
Route::put('/productos/put', 'ProductoController@update')->name('productos.put');
Route::delete('/productos/{id}', 'ProductoController@destroy')->name('productos.delete');
/*----------Cliente------*/
Route::get('/clientes', 'clienteController@index')->name('clientes.get');
Route::post('/clientes', 'clienteController@store')->name('clientes.post');
Route::put('/clientes/put', 'clienteController@update')->name('clientes.put');
Route::delete('/clientes/{id}', 'clienteController@destroy')->name('clientes.delete');
/*Pedidio*/
Route::get('/pedidos/{id}', 'PedidoController@index')->name('pedidos.get');
Route::post('/pedidos', 'pedidoController@store')->name('pedidos.post');
Route::post('/addproduct', 'pedidoController@AddProduct')->name('pedidos.addProduct');
Route::delete('/pedidos/{id}', 'pedidoController@destroy')->name('pedidos.delete');
Route::put('/pedidos/enviado/{id}', 'pedidoController@enviado')->name('pedidos.enviado');
Route::get('/detallePedido/{id}', 'pedidoController@DetallePedido')->name('pedidos.detalle');
Route::delete('/removeProducto', 'pedidoController@removeProducto')->name('pedidos.removeProducto');
