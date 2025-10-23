@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática para aplicar los colores --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-italia-34" style="border: 2px solid #a0a0a0; padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de Italia (Verde: principal, Rojo: secundario) */
            .mundial-italia-34 {
                --color-principal: #009246; /* Verde Bandera */
                --color-secundario: #cf2b32; /* Rojo Bandera */
            }

            /* 1. FONDOS Y BORDES (Verde) */
            .mundial-italia-34 .bg-dark,
            .mundial-italia-34 .table-dark thead,
            .mundial-italia-34 .card-header.bg-dark,
            .mundial-italia-34 .btn-dark,
            .mundial-italia-34 .btn-primary,
            .mundial-italia-34 .btn-outline-primary {
                background-color: var(--color-principal) !important; 
                border-color: var(--color-principal) !important;
                color: white !important;
            }

            /* 2. FONDOS DE ACENTO (Rojo) */
            .mundial-italia-34 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: white !important;
            }

            /* 3. BOTONES OUTLINE: Borde Verde, Fondo Blanco */
            .mundial-italia-34 .btn-outline-primary {
                background-color: white !important;
                color: var(--color-principal) !important; 
            }
            .mundial-italia-34 .btn-outline-primary:hover {
                background-color: var(--color-principal) !important;
                color: white !important;
            }

            /* 4. TEXTOS: Verde (Principal) y Rojo (Acento) */
            .mundial-italia-34 .text-primary, 
            .mundial-italia-34 h1,
            .mundial-italia-34 .font-title {
                color: var(--color-principal) !important; /* Títulos en Verde */
            }
            .mundial-italia-34 .text-secondary,
            .mundial-italia-34 .text-success {
                color: var(--color-secundario) !important; /* Acentos en Rojo */
            }
            
            /* 5. Resetear Texto para legibilidad */
            .mundial-italia-34 p, 
            .mundial-italia-34 li,
            .mundial-italia-34 table td,
            .mundial-italia-34 .card-body p,
            .mundial-italia-34 .fw-bold {
                color: #3d3d3d !important; /* Color oscuro para el cuerpo del texto */
            }
            .mundial-italia-34 .text-danger {
                color: var(--color-secundario) !important; /* Texto de advertencia en Rojo */
            }

        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            
            {{-- BOTÓN ANTERIOR: URUGUAY 1930 (ID 1) --}}
            <a href="{{ route('enciclopedia.show', ['mundial' => 1]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Uruguay 1930</span>
            </a>

            {{-- BOTÓN ÍNDICE: Se usa el nombre correcto 'enciclopedia.index' --}}
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            {{-- BOTÓN SIGUIENTE: FRANCIA 1938 (ID 3) --}}
            <a href="{{ route('enciclopedia.show', ['mundial' => 3]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Francia 1938 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-muted">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-dark font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1934' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Italia' }} 🇮🇹</p>
        </header>

        {{-- Separador de época --}}
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
                            {{-- Campeón: Rojo --}}
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ITALIA' }}</td>
                            <td class="text-muted">{{ $mundial->fecha_inicio ?? '27' }} de mayo al {{ $mundial->fecha_fin ?? '10' }} de junio</td>
                            <td class="text-muted">{{ $mundial->equipos_count ?? '16' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Sección 1: Decisión de la Sede y Clasificación (Hechos Relevantes) --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            {{-- Encabezado de Tarjeta: Verde --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: Hechos Notables y la Nueva Era
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>El Mundial de 1934 marcó varias novedades significativas, siendo la más importante la implementación de una **fase clasificatoria**.</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">Fue el **primer Mundial con eliminatorias**, donde 32 naciones compitieron por 16 cupos.</li>
                    <li class="list-group-item bg-light-gray border-0">Fue el **único Mundial en el que el campeón defensor (Uruguay)** no participó, en protesta por el boicot europeo en 1930.</li>
                    <li class="list-group-item bg-light-gray border-0">**Italia** tuvo que jugar su propio clasificatorio a pesar de ser la anfitriona, derrotando a Grecia.</li>
                </ul>
                <p class="fst-italic text-danger small">El formato del torneo fue de **eliminación directa** desde la primera ronda (octavos de final), no hubo fase de grupos.</p>
                
                {{-- Imagen del logo --}}
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1934/Stadio_Littoriale.jpg') }}" alt="Logo Italia 1934" class="img-fluid" style="max-height: 250px;">
                    <p class="text-muted mt-2 small font-elegant">Estadio donde se disputo la final del  Mundial Italia 1934.</p>
                </div>
            </div>
        </div>

        {{-- Sección 2: Goleador y Equipos Clave --}}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Verde --}}
                    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                        Goleador y Curiosidades
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <p class="fw-bold">El máximo goleador del torneo fue:</p>
                        {{-- Goleador: Rojo --}}
                        <h3 class="text-success text-center">**Oldřich Nejedlý** 🇨🇿</h3>
                        <p class="text-center">({{ $mundial->goles_goleador ?? '5' }} goles, Checoslovaquia)</p>

                        <p class="mt-4 fw-bold">Curiosidad:</p>
                        <p class="small">El primer partido de la historia en el Mundial que fue a **tiempo extra** se jugó en este torneo (Italia vs. España).</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Verde --}}
                    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                        👥 Naciones Participantes (16)
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <div class="row">
                            @php
                                $clasificados = ['Alemania', 'Argentina', 'Austria', 'Bélgica', 'Brasil', 'Checoslovaquia', 'Egipto', 'España', 'EE. UU.', 'Francia', 'Hungría', 'Italia', 'Países Bajos', 'Rumania', 'Suecia', 'Suiza'];
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
            {{-- Encabezado: Verde --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo II: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    {{-- Encabezado de tabla: Verde --}}
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
                            <td>Stadio Giorgio Ascarelli</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>**🇮🇹 Italia** vs. Checoslovaquia 🇨🇿</td>
                            {{-- Resultado: Rojo --}}
                            <td class="fw-bold text-success fs-5">**2** - 1 (T.E.)</td>
                            <td>Stadio Nazionale PNF</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Italia ganó en la prórroga y se convirtió en el primer país europeo en ganar el Mundial.</p>
            </div>
        </div>

        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (ITALIA) EN LA FINAL 🏆 --}}
        <div class="card border-3 shadow border-dark-subtle">
            {{-- Encabezado de Homenaje: Rojo --}}
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Italia en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_italia = [
                            'Portero' => 'Giampiero Combi (C)',
                            'Defensa' => ['Eraldo Monzeglio', 'Luigi Allemandi'],
                            'Mediocampo' => ['Luis Monti', 'Attilio Ferraris', 'Luigi Bertolini'],
                            'Delantera' => ['Enrique Guaita', 'Giuseppe Meazza', 'Angelo Schiavio', 'Giovanni Ferrari', 'Raimundo Orsi'],
                            'Entrenador' => 'Vittorio Pozzo',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_italia['Entrenador'] }}</p>
                    </div>

                    {{-- Estilos para las posiciones --}}
                    @foreach ($alineacion_italia as $posicion => $jugadores)
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
                        <p class="mb-0 small">{{ $alineacion_italia['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 1]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Uruguay 1930</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 3]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Francia 1938 →</span>
            </a>
        </div>
        
    </div>
@endsection