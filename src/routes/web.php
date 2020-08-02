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
    return view('inicio');
});


// ROTA DE CLIENTES
Route::resource('/clientes', 'ClienteController');

// ROTA DE AUTORES
Route::resource('/autores', 'AutorController');

// ROTA DE EDITORAS
Route::resource('/editoras', 'EditoraController');