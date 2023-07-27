@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bodegas</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearBodega">Crear Bodega</button>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bodegas as $bodega)
                    <tr>
                        <td>{{ $bodega->id }}</td>
                        <td>{{ $bodega->nombre }}</td>
                        <td>
                            <form style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarBodega{{ $bodega->id }}">Editar</button>
                            </form>
                            <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                     <!-- Modal para editar bodega -->
                     <div class="modal fade" id="modalEditarBodega{{ $bodega->id }}" tabindex="-1" aria-labelledby="modalEditarBodega{{ $bodega->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarBodega{{ $bodega->id }}Label">Editar Bodega</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('bodegas.update', $bodega->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        <div class="form-group">
                                            <label for="nombre">Nombre de la bodega</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $bodega->nombre }}">
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

        <!-- Modal para crear bodega -->
        <div class="modal fade" id="modalCrearBodega" tabindex="-1" aria-labelledby="modalCrearBodegaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrearBodegaLabel">Crear Bodega</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('bodegas.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre de la bodega</label>
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
