@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <body>
        <div class="container-fluid">
            <h1 class="text-center">Inventario</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Bodega</th>
                            <th>Cantidad de Muebles</th>
                            <th>Nombre Categoría</th>
                            <th>Nombre Marca</th>
                            <th>Nombre Tipo Mueble</th>
                            <th>Precio</th>
                            <th>Nombre de Proveedor</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Nombre de Mueble</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bodega as $index => $item)
                            <tr>
                                <td>{{ $item->idBodega }}</td>
                                <td>{{ $item->cantidadMuebles }}</td>
                                <td>{{ $categoria[$index]->nombreCategoria }}</td>
                                <td>{{ $marca[$index]->nombreMarca }}</td>
                                <td>{{ $mueble[$index]->nombreMueble }}</td>
                                <td>{{ $mueble[$index]->precio }}</td>                                         
                                <td>{{ $proveedor[$index]->nombreProveedor }}</td>
                                <td>{{ $proveedor[$index]->direccion }}</td>
                                <td>{{ $proveedor[$index]->telefono }}</td>
                                <td>{{ $tipomueble[$index]->nombreMueble }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </body>
@endsection
