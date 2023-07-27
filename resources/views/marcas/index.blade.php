@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Marcas</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearMarca">Crear Marca</button>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <td>{{ $marca->nombre }}</td>
                        <td>
                            <form style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarMarca{{ $marca->id }}">Editar</button>
                            </form>
                            <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal para editar marca -->
                    <div class="modal fade" id="modalEditarMarca{{ $marca->id }}" tabindex="-1" aria-labelledby="modalEditarMarca{{ $marca->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarMarca{{ $marca->id }}Label">Editar Marca</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('marcas.update', $marca->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="nombre">Nombre de la marca</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $marca->nombre }}">
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

        <!-- Modal para crear marca -->
        <div class="modal fade" id="modalCrearMarca" tabindex="-1" aria-labelledby="modalCrearMarcaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrearMarcaLabel">Crear Marca</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('marcas.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre de la marca</label>
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
