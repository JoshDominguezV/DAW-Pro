<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;


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

Route::get('/home', function () {
    return view('proyLayout/home');
});
/*ENTRADAS Y SALIDAS*/
Route::get('/entrada/create', 'EntradaController@create')->name('entrada.create');
Route::post('/entrada', 'EntradaController@store')->name('entrada.store');
Route::get('/salida/create', 'SalidaController@create')->name('salida.create');
Route::post('/salida', 'SalidaController@store')->name('salida.store');
/*DATOS DEL INVENTARIO*/
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
