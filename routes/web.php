<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdmEntradas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CategoriasController;
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
/*PAGINA PARA ADMINISTRADOR
Route::get('/adm_home', function () {
    return view('administrador/proyLayout/home');
});
/*DATOS DEL INVENTARIO ADMINISTRADOR
Route::get('/inventario',   [InventarioController::class, 'index'])->name('administrador.inventario.index');
Route::get('entrada/create', [AdmEntradas::class, 'create'])->name('entrada.create');
Route::post('entrada', [AdmEntradas::class, 'store'])->name('entrada.store');
Route::resource('entrada', AdmEntradas::class);
/*PAGINA PARA INVITADOS
Route::get('/inv_home', function () {
    return view('invitados/proyLayout/home');
});
/*ENTRADAS Y SALIDAS
Route::resource('entradas', EntradaController::class);*/




Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    /*DATOS DEL INVENTARIO ADMINISTRADOR*/
    Route::get('/inventario', [InventarioController::class, 'index'])->name('administrador.inventario.index');
    Route::get('entrada/create', [AdmEntradas::class, 'create'])->name('entrada.create');
    Route::post('entrada', [AdmEntradas::class, 'store'])->name('entrada.store');
    Route::resource('entrada', AdmEntradas::class);
    /*ENTRADAS Y SALIDAS*/
    Route::resource('entradas', EntradaController::class);



    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{categoria}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{categoria}', [CategoriasController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');



    Route::get('/bodegas', [BodegaController::class, 'index'])->name('bodega.index');
    Route::get('/bodegas/create', [BodegaController::class, 'create'])->name('bodega.create');
    Route::post('/bodegas', [BodegaController::class, 'store'])->name('bodegas.store');
    Route::get('/bodegas/{bodega}/edit', [BodegaController::class, 'edit'])->name('bodegas.edit');
    Route::put('/bodegas/{bodega}', [BodegaController::class, 'update'])->name('bodegas.update');
    Route::delete('/bodegas/{bodega}', [BodegaController::class, 'destroy'])->name('bodegas.destroy');

    Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
    Route::get('/marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
    Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
    Route::get('/marcas/{marca}/edit', [MarcaController::class, 'edit'])->name('marcas.edit');
    Route::put('/marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
    Route::delete('/marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');

    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
    Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
    Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
    Route::get('/proveedores/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
    Route::put('/proveedores/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
    Route::delete('/proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

    Route::get('/entradas', [EntradaController::class, 'index'])->name('entradas.index');
    Route::get('/entradas/create', [EntradaController::class, 'create'])->name('entradas.create');
    Route::post('/entradas', [EntradaController::class, 'store'])->name('entradas.store');
    Route::get('/entradas/{entrada}/edit', [EntradaController::class, 'edit'])->name('entradas.edit');
    Route::put('/entradas/{entrada}', [EntradaController::class, 'update'])->name('entradas.update');
    Route::delete('/entradas/{entrada}', [EntradaController::class, 'destroy'])->name('entradas.destroy');

    Route::get('/salidas', [SalidaController::class, 'index'])->name('salidas.index');
    Route::get('/salidas/create', [SalidaController::class, 'create'])->name('salidas.create');
    Route::post('/salidas', [SalidaController::class, 'store'])->name('salidas.store');
    Route::get('/salidas/{salida}/edit', [SalidaController::class, 'edit'])->name('salidas.edit');
    Route::put('/salidas/{salida}', [SalidaController::class, 'update'])->name('salidas.update');
    Route::delete('/salidas/{salida}', [SalidaController::class, 'destroy'])->name('salidas.destroy');


    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');



    Route::get('/muebles', [MuebleController::class, 'index'])->name('muebles.index');
    Route::get('/muebles/create', [MuebleController::class, 'create'])->name('muebles.create');
    Route::post('/muebles', [MuebleController::class, 'store'])->name('muebles.store');
    Route::get('/muebles/{mueble}/edit', [MuebleController::class, 'edit'])->name('muebles.edit');
    Route::put('/muebles/{mueble}', [MuebleController::class, 'update'])->name('muebles.update');
    Route::delete('/muebles/{mueble}', [MuebleController::class, 'destroy'])->name('muebles.destroy');

        Route::get('bodegas', [BodegaController::class, 'index'])->name('bodegas.index');
        Route::get('marcas', [MarcaController::class, 'index'])->name('marcas.index');
        Route::get('proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
        Route::get('entradas', [EntradaController::class, 'index'])->name('entradas.index');
        Route::get('salidas', [SalidaController::class, 'index'])->name('salidas.index');

        // route for reportClients
Route::get('/reports/productosReporte', [ReportController::class, 'reporteProductos']);


});