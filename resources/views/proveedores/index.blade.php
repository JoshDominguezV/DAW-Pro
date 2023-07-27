@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Proveedores</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearProveedor">Crear Proveedor</button>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>
                            <form style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarProveedor{{ $proveedor->id }}">Editar</button>
                            </form>
                            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal para editar proveedor -->
                    <div class="modal fade" id="modalEditarProveedor{{ $proveedor->id }}" tabindex="-1" aria-labelledby="modalEditarProveedor{{ $proveedor->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarProveedor{{ $proveedor->id }}Label">Editar Proveedor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        <div class="form-group">
                                            <label for="nombre">Nombre del proveedor</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $proveedor->nombre }}">
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

        <!-- Modal para crear proveedor -->
        <div class="modal fade" id="modalCrearProveedor" tabindex="-1" aria-labelledby="modalCrearProveedorLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrearProveedorLabel">Crear Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('proveedores.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre del proveedor</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
