@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Negro/Rojo --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-alemania-74" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de Alemania: Negro (principal), Rojo (secundario/acento) */
            .mundial-alemania-74 {
                --color-principal: #000000; /* Negro/Gris Oscuro (Base) */
                --color-secundario: #DD0000; /* Rojo Fuerte */
                --color-terciario: #FFFFFF; /* Blanco */
            }

            /* 1. FONDOS Y BORDES (NEGRO) */
            .mundial-alemania-74 .bg-dark,
            .mundial-alemania-74 .table-dark thead,
            .mundial-alemania-74 .card-header.bg-dark,
            .mundial-alemania-74 .btn-dark {
                background-color: var(--color-principal) !important; 
                border-color: var(--color-principal) !important;
                color: var(--color-terciario) !important; /* Texto en Blanco */
            }

            /* 2. FONDOS DE ACENTO (ROJO) */
            .mundial-alemania-74 .bg-success,
            .mundial-alemania-74 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: var(--color-terciario) !important; /* Texto blanco en fondos de acento */
            }
            
            /* ENCABEZADO DE TABLA (<th>) */
            .mundial-alemania-74 table thead th {
                color: var(--color-terciario) !important; /* BLANCO */
                background-color: var(--color-principal) !important; /* Asegura contraste */
            }
            
            /* TITULARES Y ACENTOS */
            .mundial-alemania-74 .text-primary, 
            .mundial-alemania-74 h1,
            .mundial-alemania-74 .font-title {
                color: var(--color-principal) !important; /* Negro */
            }
            .mundial-alemania-74 .text-secondary,
            .mundial-alemania-74 .text-success {
                color: var(--color-secundario) !important; /* Rojo Fuerte */
            }
            
            /* TEXTO GENERAL EN NEGRO (legibilidad) */
            .mundial-alemania-74 p, 
            .mundial-alemania-74 li,
            .mundial-alemania-74 table td,
            .mundial-alemania-74 .card-body p,
            .mundial-alemania-74 .fw-bold,
            .mundial-alemania-74 small,
            .mundial-alemania-74 .text-muted {
                color: #000 !important; 
            }

            .mundial-alemania-74 .text-danger { color: var(--color-secundario) !important; }
            .mundial-alemania-74 .badge.bg-secondary {
                background-color: var(--color-principal) !important; 
                color: var(--color-terciario) !important; 
            }

            /* Borde temático opcional para imágenes */
            .mundial-alemania-74 .themed-img {
                border: 3px solid var(--color-principal);
                border-radius: .75rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 9]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: México 1970</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 11]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Argentina 1978 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1974' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Alemania Federal' }} 🇩🇪</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Campeón: Rojo Fuerte --}}
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ALEMANIA FEDERAL' }}</td>
                            <td>13 de junio al 7 de julio</td>
                            <td>16</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SECCIÓN CIUDADES SEDE --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-1 text-primary">Ciudades Sede:</p>
                    <p class="mb-0 small text-primary">
                        Múnich, Berlín Occidental, Hamburgo, Dortmund, Düsseldorf, Gelsenkirchen, Fráncfort, Hannover, Stuttgart (9 ciudades).
                    </p>
                </div>
            </div>
        </div>

        {{-- 👦🏻👦🏼 SECCIÓN MASCOTA (Tip y Tap) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇩🇪 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Tip y Tap</h4>
                <p class="text-dark">Dos niños, uno alto (Tap) y uno bajo (Tip), que vestían camisetas con “WM” y “74”, símbolo de amistad y unión.</p>

                {{-- Imagen real (las rutas están en /public/img) --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/tip_tap_1974.png') }}"
                         alt="Tip y Tap - Alemania 1974"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 280px;">
                </div>

                <p class="text-primary small mt-3 fst-italic">¡Un mensaje de diplomacia y unidad en plena Guerra Fría!</p>
            </div>
        </div>

        {{-- 🌍 SELECCIONES PARTICIPANTES --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌍 Selecciones Participantes (16)
            </div>
            <div class="card-body p-4">
                <div class="row font-elegant">
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">Anfitrión/Campeón Defensor:</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇩🇪 Alemania Federal</li>
                            <li>🇧🇷 Brasil (Campeón defensor)</li>
                        </ul>
                        <p class="fw-bold text-primary mt-3 mb-1">América (CONMEBOL/CONCACAF):</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇦🇷 Argentina</li>
                            <li>🇨🇱 Chile</li>
                            <li>🇭🇹 Haití (Debut)</li>
                            <li>🇺🇾 Uruguay</li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">Europa (UEFA):</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇩🇪 Alemania Democrática (Debut)</li>
                            <li>🇧🇬 Bulgaria</li>
                            <li>🏴 Escocia</li>
                            <li>🇮🇹 Italia</li>
                            <li>🇳🇱 Países Bajos</li>
                            <li>🇵🇱 Polonia</li>
                            <li>🇸🇪 Suecia</li>
                            <li>🇷🇸 Yugoslavia</li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">Asia/África/Oceanía (AFC/OFC/CAF):</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇦🇺 Australia (Debut)</li>
                            <li>🇿🇦 Zaire (Debut, primer equipo subsahariano)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- IMAGEN Y HECHOS NOTABLES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo III: La “Naranja Mecánica” y el Espionaje
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>Este Mundial fue famoso por la aparición del <strong>Fútbol Total</strong> de Holanda, liderada por Johan Cruyff, conocida como la “Naranja Mecánica”.</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0"><strong>Alemania vs. Alemania:</strong> Único partido entre las dos Alemanias, ganó la Democrática 1-0.</li>
                    <li class="list-group-item bg-light-gray border-0"><strong>Nuevos Jugadores:</strong> Se introdujo la numeración fija en camisetas.</li>
                    <li class="list-group-item bg-light-gray border-0"><strong>Fútbol Total:</strong> Holanda deslumbró con juego innovador y ofensivo, aunque cayó en la final.</li>
                </ul>
                
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1974_Olympiastadion.jpg') }}" 
                         alt="Olympiastadion, Múnich" 
                         class="img-fluid" style="max-height: 350px;">
                    <p class="mt-2 small font-elegant">El Olympiastadion de Múnich, sede de la final.</p>
                </div>
            </div>
        </div>

        {{-- Resultados Finales --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo IV: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    <thead class="table-dark">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Goleador(es)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Goleador</td>
                            <td colspan="2">Grzegorz Lato (Polonia)</td>
                            <td>7 goles</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td><strong>🇩🇪 Alemania Federal</strong> vs. Países Bajos 🇳🇱</td>
                            {{-- Resultado: Rojo Fuerte --}}
                            <td class="fw-bold text-success fs-5"><strong>2</strong> - 1</td>
                            <td>Paul Breitner (pen), Gerd Müller</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Alemania Federal ganó su segundo título mundial, remontando un gol tempranero.</p>
            </div>
        </div>
        
        {{-- 🏆 Homenaje: Alineación del Campeón --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Alemania Federal en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_alemania_74 = [
                            'Portero' => 'Sepp Maier',
                            'Defensa' => ['Berti Vogts', 'Franz Beckenbauer (C)', 'Hans-Georg Schwarzenbeck', 'Paul Breitner'],
                            'Mediocampo' => ['Rainer Bonhof', 'Wolfgang Overath', 'Uli Hoeneß'],
                            'Delantera' => ['Jürgen Grabowski', 'Gerd Müller', 'Bernd Hölzenbein'],
                            'Entrenador' => 'Helmut Schön',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_alemania_74['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_alemania_74['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_alemania_74['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_alemania_74['Delantera'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_alemania_74['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 9]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: México 1970</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 11]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Argentina 1978 →</span>
            </a>
        </div>
        
    </div>
@endsection
