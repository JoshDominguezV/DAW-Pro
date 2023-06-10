<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Mueble;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Show the form for creating a new exit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $muebles = Mueble::all();
        $bodegas = Bodega::all();

        return view('salida.create', compact('muebles', 'bodegas'));
    }

    /**
     * Store a newly created exit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mueble_id' => 'required',
            'bodega_id' => 'required',
            'cantidad' => 'required|integer',
            'fecha' => 'required|date',
        ]);

        // Verificar si hay suficientes existencias del mueble en la bodega
        $bodega = Bodega::findOrFail($request->bodega_id);
        $mueble = Mueble::findOrFail($request->mueble_id);
        $existenciasDisponibles = $bodega->existenciasMueble($mueble);
        if ($existenciasDisponibles < $request->cantidad) {
            return redirect()->back()->with('error', 'No hay suficientes existencias del mueble en la bodega.');
        }

        $salida = new Salida();
        $salida->mueble_id = $request->mueble_id;
        $salida->bodega_id = $request->bodega_id;
        $salida->cantidad = $request->cantidad;
        $salida->fecha = $request->fecha;
        $salida->save();

        // Actualizar las existencias del inventario en la bodega
        $bodega->existenciasMueble()->detach($mueble, ['cantidad' => $request->cantidad]);

        return redirect()->route('salida.index')->with('success', 'Salida de producto registrada exitosamente.');
    }
}
