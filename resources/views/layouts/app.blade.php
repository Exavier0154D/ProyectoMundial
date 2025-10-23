<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF para AJAX/Fetch --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Proyecto Mundial'))</title>

    {{-- Fuentes --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Inyección opcional de CSS/JS por vista --}}
    @stack('head')
</head>
<body class="bg-light-gray">
    <div id="app">

        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm font-elegant">
            <div class="container-fluid">

                {{-- Botón hamburguesa (izquierda) --}}
                <button class="navbar-toggler me-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Marca centrada --}}
                <div class="flex-grow-1 text-center">
                    <a class="navbar-brand text-dark font-title fs-3 fw-bold"
                       href="{{ route('hub.index') }}" style="letter-spacing: 2px;">
                        Enciclopedia
                    </a>
                </div>

                {{-- Espaciador para balancear el botón de la izquierda --}}
                <div class="d-none d-md-block" style="width: 40px;"></div>

                {{-- Menú colapsable --}}
                <div class="collapse navbar-collapse mt-2 mt-md-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-md-center gap-2">

                        {{-- Links públicos útiles (opcional) --}}
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('mundiales.index') }}">Enciclopedia</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('juegos.index') }}">Juegos</a>
                            </li>
                        @endauth

                        {{-- Auth --}}
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
                            {{-- Aquí puedes añadir dropdown de usuario si lo necesitas --}}
                            {{-- <li class="nav-item dropdown"> ... </li> --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- Scripts por-página (ej. juegos) --}}
    @stack('scripts')
</body>
</html>
