<!-- resources/views/mueble/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de Muebles</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoría</th>
                                    <th>Marca</th>
                                    <th>Tipo de Mueble</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($muebles as $mueble)
                                    <tr>
                                        <td>{{ $mueble->idMueble }}</td>
                                        <td>{{ $mueble->categoria->nombreCategoria }}</td>
                                        <td>{{ $mueble->marca->nombreMarca }}</td>
                                        <td>{{ $mueble->tipoMueble->nombreTipoMueble }}</td>
                                        <td>{{ $mueble->nombreMueble }}</td>
                                        <td>{{ $mueble->precio }}</td>
                                        <td>
                                            <a href="{{ route('muebles.edit', $mueble) }}" class="btn btn-primary">Editar</a>
                                            <form action="{{ route('muebles.destroy', $mueble) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
