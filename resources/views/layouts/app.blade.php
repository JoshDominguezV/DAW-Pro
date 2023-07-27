<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Milla - Aplicación Web de Inventario Básico</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="text-center" style="background-color:#212529;">
    <nav class="navbar navbar-expand-md  shadow-sm fixed-top">
        <div class="container-fluid">

            <ul class="navbar-nav me-auto">
                <a class="navbar-brand" href="/home">
                    Milla - Aplicación Web de Inventario
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                
                <ul class="navbar-nav me-auto">
                    <!-- Opción de Categorías -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a>
                    </li>
                   
                    <!-- Opción de Bodegas -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bodegas.index') }}">Bodegas</a>
                    </li>
                
                    <!-- Opción de Marcas -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('marcas.index') }}">Marcas</a>
                    </li>
                     <!-- Opción de Productos -->
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                
                    <!-- Opción de Proveedores -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a>
                    </li>
                    <!-- Opción de Salidas de Productos -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('salidas.index') }}">Salidas</a>
                    </li>
                </ul>
                
                
                    {{--
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('warehouses.index') }}">Bodegas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brands.index') }}">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('suppliers.index') }}">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('entries.index') }}">Entradas de Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exits.index') }}">Salidas de Productos</a>
                    </li>
                
                --}}
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
