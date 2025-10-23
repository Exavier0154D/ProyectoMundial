@extends('layouts.app')

@section('content')
    
    {{-- Contenedor principal: estilo elegante y fuente serif --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif" style="border: 2px solid #a0a0a0; padding: 3rem;">
        
        <header class="text-center mb-5">
            <h1 class="font-title display-4 fw-bold text-dark">
                Enciclopedia Interactiva de la Copa Mundial 🏆
            </h1>
            <p class="lead text-secondary font-elegant">
                Elige tu aventura: explora la historia de los mundiales o pon a prueba tus conocimientos.
            </p>
        </header>

        {{-- Separador de época --}}
        <div class="divider-classic mb-5"></div>
        
        {{-- Contenedor de Opciones (Centrado) --}}
        <div class="row justify-content-center mt-5">
            
            {{-- Opción 1: Enciclopedia (Estilo Libro) --}}
            <div class="col-md-5 mb-4">
                <div class="card h-100 shadow-lg border-dark-subtle text-center card-elegant p-4">
                    <div class="card-body d-flex flex-column justify-content-center">
                        {{-- RUTA DE IMAGEN --}}
                        <img src="{{ asset('img/hub/Enciclopedia.png') }}" alt="Sección Enciclopedia" class="img-fluid mb-3" style="max-height: 200px; object-fit: contain;">
                        <h2 class="font-title text-dark fs-3">Sección Enciclopedia</h2>
                        <p class="font-elegant text-muted flex-grow-1">
                            Accede al índice histórico y sumérgete en los detalles de cada torneo desde 1930.
                        </p>
                        {{-- RUTA CORREGIDA: mundiales.index --}}
                        <a href="{{ route('mundiales.index') }}" class="btn btn-outline-dark btn-lg mt-3 btn-classic">
                            Abrir el Índice
                        </a>
                    </div>
                </div>
            </div>

            {{-- Opción 2: Minijuegos (Estilo Desafío) --}}
            <div class="col-md-5 mb-4">
                <div class="card h-100 shadow-lg border-dark-subtle text-center card-elegant p-4">
                    <div class="card-body d-flex flex-column justify-content-center">
                        {{-- RUTA DE IMAGEN --}}
                        <img src="{{ asset('img/hub/Minijuegos.png') }}" alt="Zona de Minijuegos" class="img-fluid mb-3" style="max-height: 200px; object-fit: contain;">
                        <h2 class="font-title text-dark fs-3">Zona de Minijuegos</h2>
                        <p class="font-elegant text-muted flex-grow-1">
                            Demuestra que eres un experto en historia mundialista.
                        </p>
                        
                        {{-- Lógica para Jugar o Registrarse/Loguearse --}}
                        @guest
                            {{-- Si NO está logueado: Muestra el botón de Registro/Login --}}
                            <a href="{{ route('register') }}" class="btn btn-dark btn-lg mt-3 btn-classic">
                                Crear Cuenta / Jugar
                            </a>
                            <p class="mt-2 small text-muted">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-decoration-underline">Inicia Sesión</a></p>
                        @else
                            {{-- CORRECCIÓN APLICADA: El usuario logueado va directamente a mundiales.indexjuegos --}}
                            <a href="{{ route('juegos.index') }}" class="btn btn-success btn-lg mt-3 btn-classic">
                                Comenzar a Jugar
                            </a>
                            <p class="mt-2 small text-muted">¡Hola, {{ Auth::user()->name }}!</p>
                        @endguest
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection