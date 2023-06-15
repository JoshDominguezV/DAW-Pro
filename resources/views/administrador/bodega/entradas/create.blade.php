<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <title>Ingresar datos</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Ingresar datos</h1>
    
        <form action="{{ route('entrada.store') }}" method="POST">
            @csrf

                        <!-- Campos para la tabla 'usuario' -->
                        <div class="form-group">
                            <label for="rol">Rol:</label>
                            <select class="form-control" id="rol" name="idRol">
                                @foreach($rol as $roles)
                                    <option value="{{ $roles->idRol }}">{{ $roles->rol }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <select class="form-control" id="usuario" name="idUsuario">
                                @foreach($usuario as $usuarios)
                                    <option value="{{ $usuarios->idUsuario }}">{{ $usuarios->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                
            <!-- Campos para la tabla 'bodega' -->
            <div class="form-group">
                <label for="idMueble">ID Mueble</label>
                <input type="text" name="idMueble" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidadMuebles">Cantidad de Muebles</label>
                <input type="text" name="cantidadMuebles" class="form-control" required>
            </div>
    
            <!-- Campos para la tabla 'proveedor' -->
            <div class="form-group">
                <label for="direccion">Dirección Proveedor</label>
                <input type="text" name="direccion" class="form-control">
            </div>
            <div class="form-group">
                <label for="nombreProveedor">Nombre Proveedor</label>
                <input type="text" name="nombreProveedor" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono Proveedor</label>
                <input type="text" name="telefono" class="form-control">
            </div>
    
            <!-- Campos para la tabla 'tipomueble' -->
            <div class="form-group">
                <label for="nombreMueble">Nombre Tipo Mueble</label>
                <input type="text" name="nombreMueble" class="form-control">
            </div>
    
            <!-- Campos para la tabla 'marca' -->
            <div class="form-group">
                <label for="idProveedor">ID Proveedor</label>
                <input type="text" name="idProveedor" class="form-control">
            </div>
            <div class="form-group">
                <label for="nombreMarca">Nombre Marca</label>
                <input type="text" name="nombreMarca" class="form-control">
            </div>
    
            <!-- Campos para la tabla 'categoria' -->
            <div class="form-group">
                <label for="idUsuario">ID Usuario</label>
                <input type="text" name="idUsuario" class="form-control">
            </div>
            <div class="form-group">
                <label for="nombreCategoria">Nombre Categoría</label>
                <input type="text" name="nombreCategoria" class="form-control">
            </div>
    
            <!-- Campos para la tabla 'mueble' -->
            <div class="form-group">
                <label for="idCategoria">ID Categoría</label>
                <input type="text" name="idCategoria" class="form-control">
            </div>
            <div class="form-group">
                <label for="idMarca">ID Marca</label>
                <input type="text" name="idMarca" class="form-control">
            </div>
            <div class="form-group">
                <label for="idTipoMueble">ID Tipo Mueble</label>
                <input type="text" name="idTipoMueble" class="form-control">
            </div>
            <div class="form-group">
                <label for="nombreMueble">Nombre Mueble</label>
                <input type="text" name="nombreMueble" class="form-control">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" class="form-control">
            </div>
    
            <!-- Campos para la tabla 'pago' -->
            <div class="form-group">
                <label for="idBodega">ID Bodega</label>
                <input type="text" name="idBodega" class="form-control">
            </div>
            <div class="form-group">
                <label for="tipoPago">Tipo Pago</label>
                <input type="text" name="tipoPago" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha_pago">Fecha de Pago:</label>
                <input type="date" class="form-control" id="fecha_pago" name="fechaPago" value="{{ old('fechaPago') }}">
            </div>
    
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    
</body>
</html>
