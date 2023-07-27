<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $proveedores = Proveedor::all();

        return view('productos.index', compact('productos', 'categorias', 'marcas', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'marca_id' => 'required',
            'precio_adquisicion' => 'required',
            'proveedor_id' => 'required',
            'existencia' => 'required',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'marca_id' => 'required',
            'precio_adquisicion' => 'required',
            'proveedor_id' => 'required',
            'existencia' => 'required',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
