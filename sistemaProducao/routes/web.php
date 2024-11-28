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


Route::prefix('/cliente')->group(function (){
    Route::get('/','App\Http\Controllers\ClienteController@index')->name('Cliente.inicio');
    Route::get('/create', 'App\Http\Controllers\ClienteController@createCliente')->name('Cliente.create');
    Route::post('/save',  'App\Http\Controllers\ClienteController@save')->name('Cliente.save');
    Route::get('/edit/{id}' ,'App\Http\Controllers\ClienteController@editCliente' )->name('Cliente.update');
    Route::post('/update', 'App\Http\Controllers\ClienteController@update')->name('Cliente.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\ClienteController@delete')->name('Clinete.delete');
    Route::post('/destroy' , 'App\Http\Controllers\ClienteController@destroy')->name('Cliente.destroy');
    Route::get('/detalhes/{id}', 'App\Http\Controllers\ClienteController@detalhe')->name(('Cliente.detalhe'));
});

Route::prefix('/pedido')->group(function(){
    Route::get('/', 'App\Http\Controllers\PedidoController@index')->name('Pedido.inicio');
    Route::get('/create', 'App\Http\Controllers\PedidoController@createPedido')->name('Pedido.create');
    Route::post('/save', 'App\Http\Controllers\PedidoController@save')->name('Pedido.save');
    Route::get('/detalhes/{id}', 'App\Http\Controllers\PedidoController@detalhes')->name('Pedido.detalhe');
    Route::get('/finalizar/{id}', 'App\Http\Controllers\PedidoController@finalizar')->name('Pedido.finalizar');
    Route::post('/concluir','App\Http\Controllers\PedidoController@concluirPedido')->name('Pedido.concluir');
});