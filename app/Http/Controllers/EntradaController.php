<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::all();
        return view('entradas.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entradas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => ['required', 'integer'],
            'bodega_id' => ['required', 'integer'],
            'proveedor_id' => ['required', 'integer'],
            'precio_adquisicion' => ['required', 'numeric'],
            'cantidad' => ['required', 'integer'],
            'fecha' => ['required', 'date'],
        ]);

        $entrada = new Entrada();
        $entrada->producto_id = $request->input('producto_id');
        $entrada->bodega_id = $request->input('bodega_id');
        $entrada->proveedor_id = $request->input('proveedor_id');
        $entrada->precio_adquisicion = $request->input('precio_adquisicion');
        $entrada->cantidad = $request->input('cantidad');
        $entrada->fecha = $request->input('fecha');
        $entrada->save();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        return view('entradas.edit', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        $request->validate([
            'producto_id' => ['required', 'integer'],
            'bodega_id' => ['required', 'integer'],
            'proveedor_id' => ['required', 'integer'],
            'precio_adquisicion' => ['required', 'numeric'],
            'cantidad' => ['required', 'integer'],
            'fecha' => ['required', 'date'],
        ]);

        $entrada->producto_id = $request->input('producto_id');
        $entrada->bodega_id = $request->input('bodega_id');
        $entrada->proveedor_id = $request->input('proveedor_id');
        $entrada->precio_adquisicion = $request->input('precio_adquisicion');
        $entrada->cantidad = $request->input('cantidad');
        $entrada->fecha = $request->input('fecha');
        $entrada->save();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Entrada $entrada)
    {
        $entrada->delete();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada eliminada correctamente.');
    }
}

