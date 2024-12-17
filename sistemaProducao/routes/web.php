<?php

use App\Http\Middleware\LogAcessoMiddleware;
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

Route::get('/login','App\Http\Controllers\LoginController@login')->name('login');
Route::post('/loginAcesso','App\Http\Controllers\LoginController@loginAcesso')->name('login.acesso');


Route::middleware('autenticacao')->prefix('/cliente')->group(function (){
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

Route::prefix('/produto')->group(function(){
    Route::get('/', 'App\Http\Controllers\ProdutoController@index')->name('Produto.inicio');
    Route::get('/create', 'App\Http\Controllers\ProdutoController@create')->name('Produto.create');
    Route::post('/save', 'App\Http\Controllers\ProdutoController@save')->name('Produto.save');
    Route::get('/addEstoque/{id}','App\Http\Controllers\ProdutoController@addEstoque')->name('Produto.addEstoque');
    Route::post('/salvarEstoque', 'App\Http\Controllers\ProdutoController@salvarEstoque')->name('Produto.salvarEstoque');

});

Route::prefix('/fornecedor')->group( function(){
    Route::get('/','App\Http\Controllers\FornecedorController@index')->name('Fornecedor.inicio');
    Route::get('/create', 'App\Http\Controllers\FornecedorController@create')->name('Fornecedor.create');
    Route::post('/save', 'App\Http\Controllers\FornecedorController@save')->name('Fornecedor.save');
    Route::get('/editar/{id}','App\Http\Controllers\FornecedorController@edit')->name('Fornecedor.editar');
    Route::post('/saveEdit', 'App\Http\Controllers\FornecedorController@editSave')->name('Fornecedor.editSave');
});