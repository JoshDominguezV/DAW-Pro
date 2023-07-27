@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Productos</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearProducto">Crear Producto</button>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Marca</th>
                    <th>Precio de Adquisición</th>
                    <th>Proveedor</th>
                    <th>Existencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>{{ $producto->marca->nombre }}</td>
                        <td>{{ $producto->precio_adquisicion }}</td>
                        <td>{{ $producto->proveedor->nombre }}</td>
                        <td>{{ $producto->existencia }}</td>
                        <td>
                            <form style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarProducto{{ $producto->id }}">Editar</button>
                            </form>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal para editar producto -->
                    <div class="modal fade" id="modalEditarProducto{{ $producto->id }}" tabindex="-1" aria-labelledby="modalEditarProducto{{ $producto->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarProducto{{ $producto->id }}Label">Editar Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        <div class="form-group">
                                            <label for="nombre">Nombre del producto</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="categoria_id">Categoría</label>
                                            <select name="categoria_id" id="categoria_id" class="form-control">
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="marca_id">Marca</label>
                                            <select name="marca_id" id="marca_id" class="form-control">
                                                @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}" {{ $producto->marca_id == $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="precio_adquisicion">Precio de Adquisición</label>
                                            <input type="text" name="precio_adquisicion" id="precio_adquisicion" class="form-control" value="{{ $producto->precio_adquisicion }}">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="proveedor_id">Proveedor</label>
                                            <select name="proveedor_id" id="proveedor_id" class="form-control">
                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{ $proveedor->id }}" {{ $producto->proveedor_id == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="existencia">Existencia</label>
                                            <input type="text" name="existencia" id="existencia" class="form-control" value="{{ $producto->existencia }}">
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Modal para crear producto -->
        <div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-labelledby="modalCrearProductoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrearProductoLabel">Crear Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('productos.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre del producto</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                        
                            <div class="form-group">
                                <label for="categoria_id">Categoría</label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label for="marca_id">Marca</label>
                                <select name="marca_id" id="marca_id" class="form-control">
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label for="precio_adquisicion">Precio de Adquisición</label>
                                <input type="text" name="precio_adquisicion" id="precio_adquisicion" class="form-control">
                            </div>
                        
                            <div class="form-group">
                                <label for="proveedor_id">Proveedor</label>
                                <select name="proveedor_id" id="proveedor_id" class="form-control">
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label for="existencia">Existencia</label>
                                <input type="text" name="existencia" id="existencia" class="form-control">
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
