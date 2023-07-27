@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Entradas</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearEntrada">Crear Entrada</button>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Bodega</th>
                    <th>Proveedor</th>
                    <th>Precio de Adquisición</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->id }}</td>
                        <td>{{ $entrada->producto->nombre }}</td>
                        <td>{{ $entrada->bodega->nombre }}</td>
                        <td>{{ $entrada->proveedor->nombre }}</td>
                        <td>{{ $entrada->precio_adquisicion }}</td>
                        <td>{{ $entrada->cantidad }}</td>
                        <td>{{ $entrada->fecha }}</td>
                        <td>
                            <form style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarEntrada{{ $entrada->id }}">Editar</button>
                            </form>
                            <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal para editar entrada -->
                    <div class="modal fade" id="modalEditarEntrada{{ $entrada->id }}" tabindex="-1" aria-labelledby="modalEditarEntrada{{ $entrada->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarEntrada{{ $entrada->id }}Label">Editar Entrada</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('entradas.update', $entrada->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <!-- Campos del formulario de edición -->
                                        <div class="form-group">
                                            <label for="producto">Producto</label>
                                            <select name="producto" id="producto" class="form-control">
                                                @foreach ($productos as $producto)
                                                    <option value="{{ $producto->id }}" @if ($producto->id === $entrada->producto_id) selected @endif>{{ $producto->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="bodega">Bodega</label>
                                            <select name="bodega" id="bodega" class="form-control">
                                                @foreach ($bodegas as $bodega)
                                                    <option value="{{ $bodega->id }}" @if ($bodega->id === $entrada->bodega_id) selected @endif>{{ $bodega->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="proveedor">Proveedor</label>
                                            <select name="proveedor" id="proveedor" class="form-control">
                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{ $proveedor->id }}" @if ($proveedor->id === $entrada->proveedor_id) selected @endif>{{ $proveedor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="precio_adquisicion">Precio de Adquisición</label>
                                            <input type="text" name="precio_adquisicion" id="precio_adquisicion" class="form-control" value="{{ $entrada->precio_adquisicion }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{ $entrada->cantidad }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $entrada->fecha }}">
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

        <!-- Modal para crear entrada -->
        <div class="modal fade" id="modalCrearEntrada" tabindex="-1" aria-labelledby="modalCrearEntradaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrearEntradaLabel">Crear Entrada</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('entradas.store') }}" method="POST">
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
                                <label for="bodega">Bodega</label>
                                <select name="bodega" id="bodega" class="form-control">
                                    @foreach ($bodegas as $bodega)
                                        <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="proveedor">Proveedor</label>
                                <select name="proveedor" id="proveedor" class="form-control">
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="precio_adquisicion">Precio de Adquisición</label>
                                <input type="text" name="precio_adquisicion" id="precio_adquisicion" class="form-control">
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
