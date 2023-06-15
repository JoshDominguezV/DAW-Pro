<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <title>Inventario</title>
</head>
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
</html>
