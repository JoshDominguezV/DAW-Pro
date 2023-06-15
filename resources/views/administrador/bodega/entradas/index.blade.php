<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <title>Document</title>
</head>
<body>
        <h1>Entradas</h1>

    <a href="{{ route('entrada.create') }}" class="btn btn-primary">Crear Entrada</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cant. Muebles</th>
                <th>Rol</th>
                <th>Usuario</th>
                <th>Nombre Mueble</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Fecha Pago</th>
                <th>Nombre Proveedor</th>
                <th>Direccion</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            @if (count($bodega) > 0 && count($rol) === count($usuario) && count($bodega) === count($categoria) && count($bodega) === count($marca) && count($bodega) === count($mueble) && count($bodega) === count($pago) && count($bodega) === count($proveedor) && count($mueble) === count($tipomueble))
                @foreach ($bodega as $index => $item)
                    <tr>
                        <td>{{ $item->idBodega }}</td>
                        <td>{{ $item->cantidadMuebles }}</td>
                        <td>{{ $rol[$index]->rol }}</td>
                        <td>{{ $usuario[$index]->username }}</td>
                        <td>{{ $mueble[$index]->nombreMueble }}</td>
                        <td>{{ $categoria[$index]->nombreCategoria }}</td>
                        <td>{{ $marca[$index]->nombreMarca }}</td>
                        <td>{{ $mueble[$index]->precio }}</td>
                        <td>{{ $pago[$index]->fechaPago }}</td>                            
                        <td>{{ $proveedor[$index]->nombreProveedor }}</td>
                        <td>{{ $proveedor[$index]->direccion }}</td>
                        <td>{{ $proveedor[$index]->telefono }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="12">No se encontraron datos</td>
                </tr>
            @endif
        </tbody>
    </table>
    
</body>
</html>