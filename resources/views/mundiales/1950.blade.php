@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Verde/Dorado --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-brasil-50" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de Brasil: Verde (principal), Dorado (secundario) */
            .mundial-brasil-50 {
                --color-principal: #009739; /* Verde Bandera */
                --color-secundario: #ffcc00; /* Amarillo/Dorado Brillante */
            }

            /* 1. FONDOS PRINCIPALES (VERDE) */
            .mundial-brasil-50 .bg-dark,
            .mundial-brasil-50 .table-dark thead,
            .mundial-brasil-50 .card-header.bg-dark,
            .mundial-brasil-50 .btn-dark,
            .mundial-brasil-50 .btn-primary,
            .mundial-brasil-50 .btn-outline-primary {
                background-color: var(--color-principal) !important; 
                border-color: var(--color-principal) !important;
                color: white !important;
            }

            /* 2. FONDOS DE ACENTO (DORADO/AMARILLO) */
            .mundial-brasil-50 .bg-success,
            .mundial-brasil-50 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: black !important; /* Texto negro para contraste sobre Dorado */
            }

            /* 3. TEXTOS: Verde (Principal) y Dorado (Acento) */
            .mundial-brasil-50 .text-primary, 
            .mundial-brasil-50 h1,
            .mundial-brasil-50 .font-title {
                color: var(--color-principal) !important; /* Títulos en Verde */
            }
            .mundial-brasil-50 .text-secondary,
            .mundial-brasil-50 .text-success {
                color: var(--color-secundario) !important; /* Acentos en Dorado */
            }
            
            /* CRÍTICO: FORZAR EL TEXTO DE ENCABEZADO DE TABLA A DORADO/AMARILLO */
            .mundial-brasil-50 table thead th {
                color: var(--color-secundario) !important; /* Texto del encabezado de tabla en Dorado */
            }

            /* 4. Resetear Texto para legibilidad */
            .mundial-brasil-50 p, 
            .mundial-brasil-50 li,
            .mundial-brasil-50 table td,
            .mundial-brasil-50 .card-body p,
            .mundial-brasil-50 .fw-bold {
                color: #3d3d3d !important; /* Color oscuro para el cuerpo del texto */
            }
            .mundial-brasil-50 .text-danger {
                color: var(--color-secundario) !important; /* Advertencia en Dorado */
            }
            .mundial-brasil-50 .badge.bg-secondary {
                background-color: var(--color-principal) !important; /* Badge: Fondo Verde */
                color: white !important;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 3]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Francia 1938</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 5]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Suiza 1954 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1950' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Brasil' }} 🇧🇷</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    {{-- Encabezado de tabla: Verde --}}
                    <thead class="bg-dark text-white"> 
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Campeón: Dorado --}}
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'URUGUAY' }}</td>
                            <td class="text-muted">{{ $mundial->fecha_inicio ?? '24' }} de junio al {{ $mundial->fecha_fin ?? '16' }} de julio</td>
                            <td class="text-muted">{{ $mundial->equipos_count ?? '13' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Sección 1: Hechos Notables y Formato --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            {{-- Encabezado: Verde --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: El Formato Único y las Ausencias
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>Este Mundial fue el primero después de la Segunda Guerra Mundial. Tuvo varias particularidades históricas:</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">Fue el **único Mundial de la historia sin una final oficial**. El campeón se decidió mediante un **cuadrangular final** (liguilla) entre Brasil, Uruguay, España y Suecia.</li>
                    <li class="list-group-item bg-light-gray border-0">Solo participaron **13 equipos** debido a retiros de países como Argentina, Francia, Portugal y las prohibiciones a Alemania y Japón.</li>
                    <li class="list-group-item bg-light-gray border-0">Marcó el **debut de Inglaterra** y el regreso triunfal de **Uruguay**, ausente desde 1930.</li>
                </ul>
                <p class="fst-italic text-danger small">El campeón fue el equipo que finalizó primero en la tabla de la liguilla final.</p>
                
                {{-- Imagen del Estadio --}}
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1950/maracana.jpg') }}" alt="Estadio de Maracaná 1950" class="img-fluid" style="max-height: 350px;">
                    <p class="text-muted mt-2 small font-elegant">El recién construido Estadio de Maracaná, que rompió récords de asistencia.</p>
                </div>
            </div>
        </div>

        {{-- Sección 2: Goleador y Equipos Clave --}}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Verde --}}
                    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                        Goleador y La Figura
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <p class="fw-bold">El máximo goleador del torneo fue:</p>
                        {{-- Goleador: Dorado --}}
                        <h3 class="text-success text-center">**Ademir de Menezes** 🇧🇷</h3>
                        <p class="text-center">({{ $mundial->goles_goleador ?? '8' }} goles, Brasil)</p>

                        <p class="mt-4 fw-bold">Figura clave:</p>
                        <p class="small text-center">El capitán uruguayo **Obdulio Varela**, apodado "El Negro Jefe", por su liderazgo en el Maracanazo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Verde --}}
                    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                        👥 Naciones Participantes (13)
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <div class="row">
                            @php
                                $clasificados = ['Brasil', 'Yugoslavia', 'Suiza', 'México', 'España', 'Inglaterra', 'Chile', 'EE. UU.', 'Suecia', 'Italia', 'Paraguay', 'Uruguay', 'Bolivia'];
                            @endphp
                            @foreach ($clasificados as $equipo)
                                <div class="col-4 mb-2">
                                    {{-- Badge: Fondo Verde, Texto Blanco --}}
                                    <span class="badge rounded-pill bg-secondary text-white">{{ $equipo }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Sección 4: Resultados de los Partidos Finales --}}
        <div class="card border-0 shadow mb-5">
            {{-- Encabezado: Verde --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo II: La Liguilla Final y el Maracanazo
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <p class="fw-bold text-center">La Ronda Final se jugó como un sistema de liga. Brasil solo necesitaba un empate contra Uruguay en el último partido para ser campeón.</p>
                
                <h4 class="text-center mt-4 text-primary">El Partido Final (Maracanazo)</h4>
                <table class="table table-hover text-center font-elegant">
                    {{-- Encabezado de tabla: Verde --}}
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">16 de Julio</td>
                            <td>🇧🇷 Brasil vs. **🇺🇾 Uruguay**</td>
                            <td class="fw-bold text-danger fs-5">1 - **2**</td>
                            <td>Maracaná (174.000 esp.)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Goles: Friaça (BRA); Juan A. Schiaffino, Alcides Ghiggia (URU). Uruguay se coronó Bicampeón.</p>
            </div>
        </div>

        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (URUGUAY) EN EL MARACANAZO 🏆 --}}
        <div class="card border-3 shadow border-dark-subtle">
            {{-- Encabezado de Homenaje: Dorado --}}
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje a la Hazaña: Alineación de Uruguay en el Maracanazo 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_uruguay_50 = [
                            'Portero' => 'Roque Máspoli',
                            'Defensa' => ['Matías González', 'Eusebio Tejera'],
                            'Mediocampo' => ['Schúbert Gambetta', 'Obdulio Varela (C)', 'Víctor R. Andrade'],
                            'Delantera' => ['Alcides Ghiggia', 'Julio Pérez', 'Óscar Míguez', 'Juan A. Schiaffino', 'Rubén Morán'],
                            'Entrenador' => 'Juan López Fontana',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_uruguay_50['Entrenador'] }}</p>
                    </div>

                    @foreach ($alineacion_uruguay_50 as $posicion => $jugadores)
                        @if (is_array($jugadores))
                            <div class="col-md-4 mb-3">
                                <p class="fw-bold text-dark border-bottom mb-1">{{ strtoupper($posicion) }}:</p>
                                @foreach ($jugadores as $jugador)
                                    <p class="mb-0 small">{{ $jugador }}</p>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-dark border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_uruguay_50['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 3]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Francia 1938</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 5]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Suiza 1954 →</span>
            </a>
        </div>
        
    </div>
@endsection