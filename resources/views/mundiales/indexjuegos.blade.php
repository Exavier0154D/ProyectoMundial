@extends('layouts.app')

@section('content')
    
    <div class="container-fluid py-4 text-serif bg-white shadow-lg"> 

        {{-- BOTÓN DE REGRESO AL HUB --}}
        <div class="mb-4 ps-5">
            <a href="{{ route('hub.index') }}" class="btn btn-outline-dark btn-lg font-elegant shadow-sm btn-classic">
                ← Regresar al Menú Principal (Hub)
            </a>
        </div>
        
        <header class="text-center mb-5">
            <h1 class="font-title display-4 fw-bold text-dark">
                🕹️ Zona de Minijuegos Mundialistas 
            </h1>
            <p class="lead text-secondary font-elegant">
                ¡Hola, {{ Auth::user()->name }}! Elige tu desafío futbolístico.
            </p>
        </header>

        <div class="row px-5 justify-content-center">
            
            {{-- Itera sobre la lista de juegos del controlador --}}
            @foreach ($juegos as $juego)
                
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-lg border-dark-subtle text-center card-elegant hover-effect">
                        
                        {{-- Ícono del Juego --}}
                        <div class="p-4 border-bottom border-secondary-subtle">
                            <i class="{{ $juego['icono'] }} fa-4x text-{{ $juego['color'] }}"></i>
                        </div>
                        
                        <div class="card-body d-flex flex-column pt-3">
                            
                            {{-- Nombre del Juego --}}
                            <h2 class="card-title fw-bolder text-dark font-title fs-4 mb-2">{{ $juego['nombre'] }}</h2>
                            
                            {{-- Descripción --}}
                            <p class="card-text text-muted font-elegant flex-grow-1 small">{{ $juego['descripcion'] }}</p>

                            {{-- Botón de Lanzamiento --}}
                            <a href="{{ $juego['ruta'] == '#' ? '#' : route($juego['ruta']) }}" 
                               class="btn btn-{{ $juego['color'] }} btn-sm mt-auto shadow-sm btn-classic"
                               @if ($juego['ruta'] == '#') disabled @endif>
                                @if ($juego['ruta'] == '#')
                                    Próximamente
                                @else
                                    ¡Jugar Ahora!
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection