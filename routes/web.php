<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\AdmEntradas;


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
/*PAGINA PARA ADMINISTRADOR*/
Route::get('/adm_home', function () {
    return view('administrador/proyLayout/home');
});
/*DATOS DEL INVENTARIO ADMINISTRADOR*/
Route::get('/inventario',   [InventarioController::class, 'index'])->name('administrador.inventario.index');
Route::get('entrada/create', [AdmEntradas::class, 'create'])->name('entrada.create');
Route::post('entrada', [AdmEntradas::class, 'store'])->name('entrada.store');
Route::resource('entrada', AdmEntradas::class);
/*PAGINA PARA INVITADOS*/
Route::get('/inv_home', function () {
    return view('invitados/proyLayout/home');
});
/*ENTRADAS Y SALIDAS*/
Route::resource('entradas', EntradaController::class);






/*PRUEBA DE ENRUTAMIENTOS */
Route::get('/p', function () {
    return view('invitados/bodega/entradas/index');
});