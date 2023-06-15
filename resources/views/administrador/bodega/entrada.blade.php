<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    
    <title>Entradas</title>
</head>
<body>
    <h1>Realizar Entrada de Productos</h1>
    <form action="{{ route('entrada.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="mueble_id">Mueble:</label>
            <select name="mueble_id" class="form-control">
                @foreach($muebles as $mueble)
                    <option value="{{ $mueble->id }}">{{ $mueble->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="proveedor_id">Proveedor:</label>
            <select name="proveedor_id" class="form-control">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="bodega_id">Bodega:</label>
            <select name="bodega_id" class="form-control">
                @foreach($bodegas as $bodega)
                    <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="precio_adquisicion">Precio de Adquisición:</label>
            <input type="text" name="precio_adquisicion" class="form-control">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="text" name="cantidad" class="form-control">
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar Entrada</button>
    </form>
</body>
</html>