<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Bodega;
use App\Models\Marca;
use App\Models\Proveedor;
use App\Models\Mueble;
use App\Models\Pago;
use App\Models\TipoMueble;
use App\Models\Rol;
use App\Models\Usuario;


use Illuminate\Http\Request;

class AdmEntradas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()  //FUNCIONA
    {
        $rol = Rol::all();
        $usuario = Usuario::all();
        $bodega = Bodega::all();
        $categoria = Categoria::all();
        $marca = Marca::all();
        $mueble = Mueble::all();
        $pago = Pago::all();
        $proveedor = Proveedor::all();
        $tipomueble = TipoMueble::all();

        return view('administrador.bodega.entradas.index', compact('rol','usuario','bodega', 'categoria', 'marca', 'mueble', 'pago', 'proveedor','tipomueble' ));
    }*/

    public function index()
{
    $rol = Rol::get();
    $usuario = Usuario::get();
    $bodega = Bodega::get();
    $categoria = Categoria::get();
    $marca = Marca::get();
    $mueble = Mueble::get();
    $pago = Pago::get();
    $proveedor = Proveedor::get();
    $tipomueble = TipoMueble::get();

    return view('administrador.bodega.entradas.index', compact('rol', 'usuario', 'bodega', 'categoria', 'marca', 'mueble', 'pago', 'proveedor', 'tipomueble'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rol = Rol::all();
        $usuario = Usuario::all();
        $bodega = Bodega::all();
        $categoria = Categoria::all();
        $marca = Marca::all();
        $mueble = Mueble::all();
        $pago = Pago::all();
        $proveedor = Proveedor::all();
        $tipomueble = TipoMueble::all();
        
        return view('administrador.bodega.entradas.create', compact('rol', 'proveedor', 'usuario', 'tipomueble', 'marca', 'categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)  //NO GUARDA
    {
        $roles = Rol::all();
        $proveedores = Proveedor::all();
        $usuarios = Usuario::all();
        $muebles = Mueble::all();
        $tiposMueble = TipoMueble::all();
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $usuarios = Usuario::all();
        $pago = Pago::all();
        // Valida los campos requeridos
        $request->validate([
            'nombreCategoria' => 'required',
            'nombreBodega' => 'required',
            'nombreMarca' => 'required',
            'nombreProveedor' => 'required',
            'nombreMueble' => 'required',
            'precio' => 'required|numeric',
            'usuario' => 'required',
            'rol' => 'required',
        ]);
    
        // Crea los registros en las tablas correspondientes
        $categoria = Categoria::create([
            'nombreCategoria' => $request->nombreCategoria
        ]);
    
        $bodega = Bodega::create([
            'nombreBodega' => $request->nombreBodega
        ]);
    
        $marca = Marca::create([
            'nombreMarca' => $request->nombreMarca
        ]);
    
        $proveedor = Proveedor::create([
            'nombreProveedor' => $request->nombreProveedor
        ]);
    
        $mueble = Mueble::create([
            'nombreMueble' => $request->nombreMueble,
            'precio' => $request->precio,
            'idCategoria' => $categoria->idCategoria,
            'idBodega' => $bodega->idBodega,
            'idMarca' => $marca->idMarca,
            'idProveedor' => $proveedor->idProveedor,
        ]);
    
        // Asigna el usuario y el rol al mueble
        $mueble->usuario()->associate($request->usuario);
        $mueble->rol()->associate($request->rol);
        $mueble->save();
    
        // Redirecciona a la página deseada o muestra un mensaje de éxito
        return redirect()->route('entrada.create')->with('success', 'Mueble creado exitosamente');
    } */
    public function store(Request $request)
    {
        $request->validate([
            'fechaPago' => 'required|date_format:Y-m-d',
            // Resto de las reglas de validación...
        ]);
    
        // Crear una nueva entrada en la tabla 'bodega'
        $bodega = new Bodega;
        $bodega->idMueble = $request->idMueble;
        $bodega->cantidadMuebles = $request->cantidadMuebles;
        $bodega->save();
    
        // Obtener el ID de la bodega recién creada
        $idBodega = $bodega->idBodega;
    
        // Crear un nuevo proveedor solo si se proporciona la información
        if ($request->direccion || $request->nombreProveedor || $request->telefono) {
            $proveedor = new Proveedor;
            $proveedor->direccion = $request->direccion;
            $proveedor->nombreProveedor = $request->nombreProveedor;
            $proveedor->telefono = $request->telefono;
            $proveedor->save();
        }
    
        // Obtener el ID del proveedor recién creado (si existe)
        $idProveedor = isset($proveedor) ? $proveedor->idProveedor : null;
    
        // Crear un nuevo usuario solo si se proporciona la información
        if ($request->idRol || $request->username || $request->password) {
            if ($request->username) {
                $usuario = new Usuario;
                $usuario->idRol = $request->idRol;
                $usuario->username = $request->username;
                $usuario->password = $request->password;
                $usuario->save();
    
                $idUsuario = $usuario->idUsuario;
            } else {
                return redirect()->back()->withErrors(['username' => 'El campo de usuario es obligatorio.'])->withInput();
            }
        } else {
            $idUsuario = null;
        }
    
        // Crear un nuevo tipo de mueble solo si se proporciona el nombre del mueble
        if ($request->nombreMueble) {
            $tipoMueble = new TipoMueble;
            $tipoMueble->nombreMueble = $request->nombreMueble;
            $tipoMueble->save();
        }
    
        // Obtener el ID del tipo de mueble recién creado (si existe)
        $idTipoMueble = isset($tipoMueble) ? $tipoMueble->idTipoMueble : null;
    
        // Crear una nueva marca solo si se proporciona la información
        if ($request->idProveedor || $request->nombreMarca) {
            $marca = new Marca;
            $marca->idProveedor = $request->idProveedor;
            $marca->nombreMarca = $request->nombreMarca;
            $marca->save();
        }
    
        // Obtener el ID de la marca recién creada (si existe)
        $idMarca = isset($marca) ? $marca->idMarca : null;
    
        // Crear una nueva categoría solo si se proporciona la información
        if ($request->idUsuario || $request->nombreCategoria) {
            $categoria = new Categoria;
            $categoria->idUsuario = $request->idUsuario;
            $categoria->nombreCategoria = $request->nombreCategoria;
            $categoria->save();
        }
    
        // Obtener el ID de la categoría recién creada (si existe)
        $idCategoria = isset($categoria) ? $categoria->idCategoria : null;
    
        // Crear un nuevo mueble solo si se proporciona la información
        if ($request->idCategoria || $request->idMarca || $request->idTipoMueble || $request->nombreMueble || $request->precio) {
            $mueble = new Mueble;
            $mueble->idCategoria = $request->idCategoria;
            $mueble->idMarca = $request->idMarca;
            $mueble->idTipoMueble = $request->idTipoMueble;
            $mueble->nombreMueble = $request->nombreMueble;
            $mueble->precio = $request->precio;
            $mueble->save();
        }
    
        // Obtener el ID del mueble recién creado (si existe)
        $idMueble = isset($mueble) ? $mueble->idMueble : null;
    
        // Crear un nuevo pago solo si se proporciona la información
        if ($idBodega || $request->tipoPago || $request->fechaPago) {
            $pago = new Pago;
            $pago->idBodega = $idBodega;
            $pago->tipoPago = $request->tipoPago;
            $pago->fechaPago = $request->fechaPago;
            $pago->save();
        }
    
        return redirect()->route('entrada.index')->with('success', 'La entrada se ha registrado exitosamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
