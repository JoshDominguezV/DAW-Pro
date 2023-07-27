@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Categoría</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nombreCategoria" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombreCategoria" type="text" class="form-control @error('nombreCategoria') is-invalid @enderror" name="nombreCategoria" value="{{ old('nombreCategoria') }}" required autocomplete="nombreCategoria" autofocus>

                                    @error('nombreCategoria')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Crear
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
