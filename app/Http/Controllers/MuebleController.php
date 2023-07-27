<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muebles = Mueble::all();
        return view('muebles.index', compact('muebles'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mueble.create');
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
            'nombreMueble' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric'],
            // Agrega aquí las reglas de validación adicionales que necesites
        ]);
    
        // Crear una nueva instancia de mueble
        $mueble = new Mueble();
        $mueble->nombreMueble = $request->input('nombreMueble');
        $mueble->precio = $request->input('precio');
        // Establece aquí los demás atributos del mueble
    
        // Guardar el mueble en la base de datos
        $mueble->save();
    
        return redirect()->route('muebles.index')
            ->with('success', 'Mueble creado exitosamente.');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mueble  $mueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Mueble $mueble)
    {
        return view('mueble.edit', compact('mueble'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mueble  $mueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mueble $mueble)
    {
        $validator = Validator::make($request->all(), [
            'nombreMueble' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric'],
            // Agrega aquí las reglas de validación adicionales que necesites
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $mueble->nombreMueble = $request->input('nombreMueble');
        $mueble->precio = $request->input('precio');
        // Actualiza aquí los demás atributos del mueble
    
        $mueble->save();
    
        return redirect()->route('muebles.index')->with('success', 'Mueble actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mueble  $mueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mueble $mueble)
    {
        $mueble->delete();
    
        return redirect()->route('muebles.index')->with('success', 'Mueble eliminado correctamente.');
    }
}
