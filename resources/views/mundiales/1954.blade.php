@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Rojo/Gris --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-suiza-54" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de Suiza: Rojo (principal), Gris Oscuro (secundario) */
            .mundial-suiza-54 {
                --color-principal: #d52b1e; /* Rojo Suizo */
                --color-secundario: #555555; /* Gris Oscuro/Neutro */
            }

            /* 1. FONDOS Y BORDES (ROJO) */
            .mundial-suiza-54 .bg-dark,
            .mundial-suiza-54 .table-dark thead,
            .mundial-suiza-54 .card-header.bg-dark,
            .mundial-suiza-54 .btn-dark {
                background-color: var(--color-principal) !important; 
                border-color: var(--color-principal) !important;
                color: white !important;
            }

            /* 2. FONDOS DE ACENTO (GRIS OSCURO) */
            .mundial-suiza-54 .bg-success,
            .mundial-suiza-54 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: white !important;
            }

            /* 3. TEXTOS: Rojo (Principal) y Gris Oscuro (Acento) */
            .mundial-suiza-54 .text-primary, 
            .mundial-suiza-54 h1,
            .mundial-suiza-54 .font-title {
                color: var(--color-principal) !important; /* Títulos en Rojo */
            }
            .mundial-suiza-54 .text-secondary,
            .mundial-suiza-54 .text-success {
                color: var(--color-secundario) !important; /* Acentos en Gris Oscuro */
            }
            
            /* CRÍTICO: FORZAR EL TEXTO DE ENCABEZADO DE TABLA A GRIS/COLOR SECUNDARIO */
            .mundial-suiza-54 table thead th {
                color: var(--color-secundario) !important; /* Texto del encabezado de tabla en Gris Oscuro */
            }

            /* 4. Resetear Texto y Bordes para legibilidad */
            .mundial-suiza-54 p, 
            .mundial-suiza-54 li,
            .mundial-suiza-54 table td,
            .mundial-suiza-54 .card-body p,
            .mundial-suiza-54 .fw-bold {
                color: #3d3d3d !important; /* Color oscuro para el cuerpo del texto */
            }
            .mundial-suiza-54 .text-danger {
                color: var(--color-secundario) !important; /* Advertencia en Gris Oscuro */
            }
            .mundial-suiza-54 .badge.bg-secondary {
                background-color: var(--color-principal) !important; /* Badge: Fondo Rojo */
                color: white !important;
            }
            /* Asegurar que los bordes de la alineación y tabla sean Gris Oscuro */
            .mundial-suiza-54 .border-dark-subtle,
            .mundial-suiza-54 .border-bottom {
                 border-color: var(--color-secundario) !important; 
            }
            .mundial-suiza-54 .card-header.bg-success {
                 border-color: var(--color-secundario) !important;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 4]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Brasil 1950</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 6]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Suecia 1958 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1954' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Suiza' }} 🇨🇭</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    {{-- Encabezado de tabla: Rojo --}}
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Campeón: Gris Oscuro --}}
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ALEMANIA FEDERAL' }}</td>
                            <td class="text-muted">{{ $mundial->fecha_inicio ?? '16' }} de junio al {{ $mundial->fecha_fin ?? '4' }} de julio</td>
                            <td class="text-muted">{{ $mundial->equipos_count ?? '16' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Sección 1: Hechos Notables y Formato --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            {{-- Encabezado: Rojo --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: Goles y el Regreso de Alemania
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>Este torneo, celebrado en el 50.º aniversario de la FIFA, fue un espectáculo ofensivo y marcó la consolidación de dos tendencias históricas:</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">El **promedio de goles más alto en la historia** de los Mundiales, con **5.38 goles por partido**.</li>
                    <li class="list-group-item bg-light-gray border-0">El regreso de **Alemania** a la competición después de la Segunda Guerra Mundial, ganando su primer título.</li>
                    <li class="list-group-item bg-light-gray border-0">Fue el **primer Mundial transmitido por televisión** a varios países europeos.</li>
                </ul>
                <p class="fst-italic text-danger small">El formato de grupos fue confuso: no todos los equipos jugaron contra todos dentro de su grupo.</p>
                
                {{-- Imagen del Logo --}}
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1954/logo_1954.jpg') }}" alt="Logo Suiza 1954" class="img-fluid" style="max-height: 250px;">
                    <p class="text-muted mt-2 small font-elegant">El estadio donde se disputó la final de la Copa Mundial de Fútbol de 1954 fue Wankdorfstadion ubicado Berna, Suiza</p>
                </div>
            </div>
        </div>

        {{-- Sección 2: Goleador y Equipos Clave --}}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Rojo --}}
                    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                        Goleador y la Máquina Húngara
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <p class="fw-bold">El máximo goleador del torneo fue:</p>
                        {{-- Goleador: Gris Oscuro --}}
                        <h3 class="text-success text-center">**Sándor Kocsis** 🇭🇺</h3>
                        <p class="text-center">({{ $mundial->goles_goleador ?? '11' }} goles, Hungría)</p>

                        <p class="mt-4 fw-bold">Récord Húngaro:</p>
                        <p class="small">Hungría llegó invicta al torneo con una racha de 30 partidos y era considerada el "Equipo de Oro" del fútbol mundial, pero cayó en la final.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Rojo --}}
                    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                        👥 Naciones Participantes (16)
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <div class="row">
                            @php
                                $clasificados = ['Alemania Federal', 'Austria', 'Bélgica', 'Brasil', 'Checoslovaquia', 'Corea del Sur', 'Escocia', 'Francia', 'Hungría', 'Inglaterra', 'Italia', 'México', 'Suiza', 'Turquía', 'Uruguay', 'Yugoslavia'];
                            @endphp
                            @foreach ($clasificados as $equipo)
                                <div class="col-4 mb-2">
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
            {{-- Encabezado: Rojo --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo II: Finales y El Milagro de Berna
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    {{-- Encabezado de tabla: Rojo --}}
                    <thead class="table-dark">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Tercer Puesto</td>
                            <td>**🇩🇪 Alemania** vs. Austria 🇦🇹</td>
                            <td>**3** - 2</td>
                            <td>Hardturm, Zúrich</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>**🇩🇪 Alemania Federal** vs. Hungría 🇭🇺</td>
                            {{-- Resultado: Gris Oscuro --}}
                            <td class="fw-bold text-success fs-5">**3** - 2</td>
                            <td>Wankdorf, Berna</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Alemania Federal remontó un 0-2 en la final para conseguir su primer título, en lo que se conoce como "El Milagro de Berna".</p>
            </div>
        </div>

        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (ALEMANIA FEDERAL) EN LA FINAL 🏆 --}}
        <div class="card border-3 shadow border-dark-subtle">
            {{-- Encabezado de Homenaje: Gris Oscuro --}}
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Alemania Federal en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_alemania_54 = [
                            'Portero' => 'Toni Turek',
                            'Defensa' => ['Josef Posipal', 'Werner Liebrich'],
                            'Mediocampo' => ['Fritz Laband', 'Jupp Posipal', 'Karl Mai'],
                            'Delantera' => ['Helmut Rahn', 'Max Morlock', 'Fritz Walter (C)', 'Hans Schäfer', 'O. Walter'],
                            'Entrenador' => 'Sepp Herberger',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_alemania_54['Entrenador'] }}</p>
                    </div>

                    @foreach ($alineacion_alemania_54 as $posicion => $jugadores)
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
                        <p class="mb-0 small">{{ $alineacion_alemania_54['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 4]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Brasil 1950</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 6]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Suecia 1958 →</span>
            </a>
        </div>
        
    </div>
@endsection