<!-- Vista edit -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('categorias.update', ['categoria' => $categoria->idCategoria]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre de la categoría</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
