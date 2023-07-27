@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Salida de Productos</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearSalida">Crear Salida</button>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salidas as $salida)
                    <tr>
                        <td>{{ $salida->id }}</td>
                        <td>{{ $salida->producto->nombre }}</td>
                        <td>{{ $salida->cantidad }}</td>
                        <td>{{ $salida->fecha }}</td>
                        <td>
                            <form style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarSalida{{ $salida->id }}">Editar</button>
                            </form>
                            <form action="{{ route('salidas.destroy', $salida->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal para editar salida -->
                    <div class="modal fade" id="modalEditarSalida{{ $salida->id }}" tabindex="-1" aria-labelledby="modalEditarSalida{{ $salida->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarSalida{{ $salida->id }}Label">Editar Salida</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('salidas.update', $salida->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <!-- Campos del formulario de edición -->
                                        <div class="form-group">
                                            <label for="producto">Producto</label>
                                            <select name="producto" id="producto" class="form-control">
                                                @foreach ($productos as $producto)
                                                    <option value="{{ $producto->id }}" @if ($producto->id === $salida->producto_id) selected @endif>{{ $producto->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{ $salida->cantidad }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $salida->fecha }}">
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

        <!-- Modal para crear salida -->
        <div class="modal fade" id="modalCrearSalida" tabindex="-1" aria-labelledby="modalCrearSalidaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrearSalidaLabel">Crear Salida</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('salidas.store') }}" method="POST">
                            @csrf

                            <!-- Campos del formulario de creación -->
                            <div class="form-group">
                                <label for="producto">Producto</label>
                                <select name="producto" id="producto" class="form-control">
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
