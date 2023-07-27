<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{

    public function reporteProductos(){
            //Get data
    $data = Producto::join('categorias', 'productos.Categoria_id', '=', 'categorias.id')
    ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
    ->join('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
    -> get(['productos.*', 'categorias.*', 'marcas.*', 'proveedores.*']);


    $pdf = Pdf::loadView('/reports/productosReporte', compact('data'));

    //return report
    return $pdf ->stream('ReporteProductos.pdf');

    }

}
