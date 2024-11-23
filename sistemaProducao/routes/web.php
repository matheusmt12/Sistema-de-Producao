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
    Route::get('/','App\Http\Controllers\ClienteController@getCliente')->name('Cliente.inicio');
    Route::get('/create', 'App\Http\Controllers\ClienteController@createCliente')->name('Cliente.create');
    Route::post('/save',  'App\Http\Controllers\ClienteController@save')->name('Cliente.save');
    Route::get('/edit/{id}' ,'App\Http\Controllers\ClienteController@editCliente' )->name('Cliente.update');
    Route::post('/update', 'App\Http\Controllers\ClienteController@update')->name('Cliente.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\ClienteController@delete')->name('Clinete.delete');
    Route::post('/destroy' , 'App\Http\Controllers\ClienteController@destroy')->name('Cliente.destroy');
});