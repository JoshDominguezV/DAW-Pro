<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Mueble;
use App\Models\Proveedor;
use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Show the form for creating a new entry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $muebles = Mueble::all();
        $proveedores = Proveedor::all();
        $bodegas = Bodega::all();

        return view('entrada.create', compact('muebles', 'proveedores', 'bodegas'));
    }

    /**
     * Store a newly created entry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mueble_id' => 'required',
            'proveedor_id' => 'required',
            'bodega_id' => 'required',
            'precio_adquisicion' => 'required|numeric',
            'cantidad' => 'required|integer',
            'fecha' => 'required|date',
        ]);

        $entrada = new Entrada();
        $entrada->mueble_id = $request->mueble_id;
        $entrada->proveedor_id = $request->proveedor_id;
        $entrada->bodega_id = $request->bodega_id;
        $entrada->precio_adquisicion = $request->precio_adquisicion;
        $entrada->cantidad = $request->cantidad;
        $entrada->fecha = $request->fecha;
        $entrada->save();

        // Actualizar las existencias del inventario en la bodega
        $bodega = Bodega::findOrFail($request->bodega_id);
        $bodega->existencias += $request->cantidad;
        $bodega->save();

        return redirect()->route('entrada.index')->with('success', 'Entrada de producto registrada exitosamente.');
    }
}
