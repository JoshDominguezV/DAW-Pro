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
        <h1>Editar Entrada</h1>

        <form action="{{ route('entradas.update', $entrada->idBodega) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="idMueble" class="form-label">Mueble</label>
                <select name="idMueble" id="idMueble" class="form-select">
                    @foreach ($muebles as $mueble)
                        <option value="{{ $mueble->idMueble }}" {{ $mueble->idMueble == $entrada->idMueble ? 'selected' : '' }}>{{ $mueble->nombreMueble }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidadIngresada" class="form-label">Cantidad</label>
                <input type="number" name="cantidadIngresada" id="cantidadIngresada" class="form-control" value="{{ $entrada->cantidadMuebles }}">
            </div>

            <div class="mb-3">
                <label for="fechaEntrada" class="form-label">Fecha</label>
                <input type="date" name="fechaEntrada" id="fechaEntrada" class="form-control" value="{{ $entrada->fecha }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>