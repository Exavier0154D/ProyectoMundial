<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Proyecto Mundial') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light-gray"> 
    <div id="app">
        
        {{-- NAVBAR CORREGIDO: Se eliminan navbar-light y bg-light --}}
<nav class="navbar navbar-expand-md border-bottom shadow-sm font-elegant">
    <div class="container-fluid">
        
        {{-- Contenedor para Centrar el Título Principal --}}
        <div class="w-100 text-center">
            {{-- CORRECCIÓN DEL TEXTO: "Inicio de la Enciclopedia" -> "Enciclopedia" --}}
            <a class="navbar-brand text-dark font-title fs-3 fw-bold" href="{{ route('hub.index') }}" style="letter-spacing: 2px;">
                Enciclopedia
            </a>
        </div>
        
        <button class="navbar-toggler position-absolute top-0 start-0 m-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    {{-- Opcional: dropdown de usuario autenticado --}}
                @endguest
            </ul>
        </div>
    </div>
</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- ✅ MUY IMPORTANTE: permite cargar scripts como el de tu trivia --}}
    @stack('scripts')

</body>
</html>
