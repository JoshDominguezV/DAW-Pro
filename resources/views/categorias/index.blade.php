@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categorías</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearCategoria">Crear Categoría</button>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <form style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria{{ $categoria->id }}">Editar</button>
                            </form>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                     <!-- Modal para editar categoría -->
                     <div class="modal fade" id="modalEditarCategoria{{ $categoria->id }}" tabindex="-1" aria-labelledby="modalEditarCategoria{{ $categoria->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarCategoria{{ $categoria->id }}Label">Editar Categoría</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        <div class="form-group">
                                            <label for="nombre">Nombre de la categoría</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}">
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

        <!-- Modal para crear categoría -->
        <div class="modal fade" id="modalCrearCategoria" tabindex="-1" aria-labelledby="modalCrearCategoriaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrearCategoriaLabel">Crear Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre de la categoría</label>
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
