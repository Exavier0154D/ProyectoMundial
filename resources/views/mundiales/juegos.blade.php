@extends('layouts.app')

@section('content')
    {{-- Contenedor principal --}}
    <div class="container-fluid py-4 text-serif bg-white shadow-lg">

        {{-- BOTÓN DE REGRESO AL HUB --}}
        <div class="mb-4 ps-5">
            <a href="{{ route('hub.index') }}" class="btn btn-outline-dark btn-lg font-elegant shadow-sm btn-classic">
                ← Regresar al Menú Principal (Hub)
            </a>
        </div>

        <h1 class="mb-5 text-center fw-bold text-dark font-title fs-2">
            🧠 Zona de Minijuegos Mundialistas 🕹️
        </h1>

        {{-- Tarjetas de juegos --}}
        <div class="row px-5 justify-content-center">

            @foreach ($juegos as $juego)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-dark-subtle text-center hover-effect card-elegant">

                        {{-- Ícono / Imagen del juego --}}
                        <div class="p-4 border-bottom border-secondary-subtle text-center">
                            @if (!empty($juego['icono_url']))
                                <img src="{{ asset($juego['icono_url']) }}"
                                     alt="Ícono {{ $juego['nombre'] }}"
                                     class="card-img-top mx-auto"
                                     style="height:120px; width:auto; object-fit:contain;">
                            @elseif (!empty($juego['icono']))
                                <i class="{{ $juego['icono'] }} fa-4x text-{{ $juego['color'] ?? 'dark' }}"></i>
                            @else
                                <div class="text-muted small">Sin ícono</div>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column pt-0">
                            <h2 class="card-title fw-bolder text-dark mt-3">{{ $juego['nombre'] }}</h2>
                            <p class="card-text text-muted flex-grow-1 d-flex align-items-center justify-content-center">
                                {{ $juego['descripcion'] }}
                            </p>

                            @php $ruta = $juego['ruta'] ?? '#'; @endphp
                            <a href="{{ $ruta === '#' ? '#' : route($ruta) }}"
                               class="btn btn-success btn-md mt-auto shadow-sm btn-classic"
                               @if ($ruta === '#') disabled @endif>
                                {{ $ruta === '#' ? 'Próximamente' : '¡Jugar Ahora!' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
