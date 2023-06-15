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
    <div class="container">
        <h1>Entradas</h1>

        <a href="{{ route('entradas.create') }}" class="btn btn-primary">Crear Entrada</a>
    
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mueble</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $entrada)
                    <tr>
                        <td>{{ $entrada->id }}</td>
                        <td>{{ $entrada->nombreMueble }}</td>
                        <td>{{ $entrada->nombreProveedor }}</td>
                        <td>{{ $entrada->cantidadMuebles }}</td>
                        <td>{{ $entrada->fecha }}</td>
                        <td>
                            <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>