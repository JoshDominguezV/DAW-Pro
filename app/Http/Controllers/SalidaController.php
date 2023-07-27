<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\Bodega;
use App\Models\Producto;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::all();
        return view('salidas.index', compact('salidas'));
    }

    public function create()
    {
        // Obtener los productos y bodegas necesarios para el formulario de creación
        $productos = Producto::all();
        $bodegas = Bodega::all();

        return view('salidas.create', compact('productos', 'bodegas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'bodega_id' => 'required',
            'cantidad' => 'required|integer',
            'fecha' => 'required|date',
        ]);

        Salida::create($request->all());

        // Actualizar el inventario restando la cantidad de salida al producto en la bodega
        $producto = Producto::findOrFail($request->input('producto_id'));
        $bodega = Bodega::findOrFail($request->input('bodega_id'));
        $producto->bodegas()->updateExistingPivot($bodega->id, ['cantidad' => $bodega->pivot->cantidad - $request->input('cantidad')]);

        return redirect()->route('salidas.index')->with('success', 'La salida se ha creado correctamente.');
    }

    public function edit(Salida $salida)
    {
        // Obtener los productos y bodegas necesarios para el formulario de edición
        $productos = Producto::all();
        $bodegas = Bodega::all();
        return view('salidas.edit', compact('salida', 'productos', 'bodegas'));
    }

    public function update(Request $request, Salida $salida)
    {
        $request->validate([
            'producto_id' => 'required',
            'bodega_id' => 'required',
            'cantidad' => 'required|integer',
            'fecha' => 'required|date',
        ]);

        $salida->update($request->all());

        // Actualizar el inventario restando la cantidad de salida al producto en la bodega
        $producto = Producto::findOrFail($request->input('producto_id'));
        $bodega = Bodega::findOrFail($request->input('bodega_id'));
        $producto->bodegas()->updateExistingPivot($bodega->id, ['cantidad' => $bodega->pivot->cantidad - $request->input('cantidad')]);

        return redirect()->route('salidas.index')->with('success', 'La salida se ha actualizado correctamente.');
    }

    public function destroy(Salida $salida)
    {
        // Restaurar la cantidad de salida al producto en la bodega antes de eliminar la salida
        $producto = $salida->producto;
        $bodega = $salida->bodega;
        $producto->bodegas()->updateExistingPivot($bodega->id, ['cantidad' => $bodega->pivot->cantidad + $salida->cantidad]);

        $salida->delete();

        return redirect()->route('salidas.index')->with('success', 'La salida se ha eliminado correctamente.');
    }
}
