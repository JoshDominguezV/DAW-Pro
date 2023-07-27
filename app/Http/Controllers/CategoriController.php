<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', compact('categorias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Almacenar una nueva categoría en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreCategoria' => ['required', 'string', 'max:255'],
            // Agrega aquí las reglas de validación adicionales que necesites
        ]);

        // Crear una nueva instancia de la categoría
        $categoria = new Categoria();
        $categoria->nombreCategoria = $request->input('nombreCategoria');
        // Establece aquí los demás atributos de la categoría

        // Guardar la categoría en la base de datos
        $categoria->save();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
{
    $validator = Validator::make($request->all(), [
        'nombreCategoria' => ['required', 'string', 'max:255'],
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $categoria->nombreCategoria = $request->input('nombreCategoria');
    $categoria->save();

    return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
