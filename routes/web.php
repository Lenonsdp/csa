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

Route::resource('', 'ProdutoController');
Route::post('/create', 'ProdutoController@create')->name('create');
Route::get('/add', 'ProdutoController@addProduct')->name('addProduct');
Route::get('/edit/{id}/', 'ProdutoController@edit')->name('editProduct');
Route::put('/update/{id}/', 'ProdutoController@update')->name('update');
