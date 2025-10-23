@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Azul Oscuro/Rojo --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-francia-38" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de Francia: Azul Oscuro (principal), Rojo (secundario) */
            .mundial-francia-38 {
                --color-principal: #002654; /* Azul Oscuro (Base) */
                --color-secundario: #ed2939; /* Rojo (Acento) */
            }

            /* 1. FONDOS PRINCIPALES (AZUL OSCURO) */
            .mundial-francia-38 .bg-primary,
            .mundial-francia-38 .table-primary thead,
            .mundial-francia-38 .btn-dark,
            .mundial-francia-38 .card-header.bg-dark,
            .mundial-francia-38 .card-header.bg-primary { 
                background-color: var(--color-principal) !important; 
                border-color: var(--color-principal) !important;
                color: white !important;
            }

            /* 2. FONDOS DE ACENTO (ROJO) */
            .mundial-francia-38 .bg-success,
            .mundial-francia-38 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: white !important;
            }

            /* 3. TEXTOS Y ACENTOS */
            .mundial-francia-38 .text-primary, 
            .mundial-francia-38 h1,
            .mundial-francia-38 .font-title {
                color: var(--color-principal) !important; /* Títulos H1 y principales en Azul Oscuro */
            }
            .mundial-francia-38 .text-secondary,
            .mundial-francia-38 .text-success {
                color: var(--color-secundario) !important; /* Acentos en Rojo */
            }
            
            /* CRÍTICO: FORZAR EL TEXTO DE ENCABEZADO DE TABLA A ROJO/COLOR SECUNDARIO */
            .mundial-francia-38 table thead th {
                color: var(--color-secundario) !important; /* Texto del encabezado de tabla en ROJO */
            }
            
            /* 4. Resetear Texto para legibilidad */
            .mundial-francia-38 p, 
            .mundial-francia-38 li,
            .mundial-francia-38 table td,
            .mundial-francia-38 .card-body p,
            .mundial-francia-38 .fw-bold {
                color: #3d3d3d !important; /* Color oscuro para el cuerpo del texto */
            }
            .mundial-francia-38 .text-danger {
                color: var(--color-secundario) !important; /* Advertencia en Rojo */
            }
            .mundial-francia-38 .card-header * { 
                color: white !important; /* Asegura que todos los textos de encabezado sean blancos */
            }
            .mundial-francia-38 .badge.bg-secondary {
                background-color: var(--color-principal) !important; /* Badge: Fondo Azul Oscuro */
                color: white !important;
            }

        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 2]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Italia 1934</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 4]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Brasil 1950 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1938' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Francia' }} 🇫🇷</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    {{-- Encabezado de tabla: Azul Oscuro --}}
                    <thead class="bg-primary text-white"> 
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
                            <td class="text-muted">{{ $mundial->fecha_inicio ?? '4' }} al {{ $mundial->fecha_fin ?? '19' }} de junio</td>
                            <td class="text-muted">{{ $mundial->equipos_count ?? '15' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Sección 1: Hechos Notables --}}
        <div class="card border-0 mb-5 bg-light-gray">
            {{-- Encabezado de Tarjeta: Azul Oscuro --}}
            <div class="card-header bg-primary text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: Antes de la Guerra y el Bicampeonato
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>El Mundial de 1938, celebrado en un ambiente político tenso en Europa, consolidó el dominio italiano antes de la Segunda Guerra Mundial.</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">Fue el **primer torneo donde el campeón defensor (Italia) y el anfitrión (Francia) se clasificaron automáticamente**.</li>
                    <li class="list-group-item bg-light-gray border-0">**Austria** se clasificó, pero se retiró debido al *Anschluss* (anexión por parte de Alemania) antes de iniciar el torneo.</li>
                    <li class="list-group-item bg-light-gray border-0">Naciones americanas clave como **Uruguay y Argentina boicotearon** el evento por la decisión de celebrarse en Europa por segunda vez consecutiva.</li>
                </ul>
                <p class="fst-italic text-danger small">El formato continuó siendo de eliminación directa desde la primera ronda.</p>
                
                {{-- Imagen de la Sede --}}
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1938/mascota_1938.jpg') }}" alt="Mascota 1938" class="img-fluid" style="max-height: 250px;">
                    <p class="text-muted mt-2 small font-elegant">El estadio donde se disputó la final de la Copa Mundial de Fútbol de 1938 fue el Stade Olympique Yves-du-Manoir ubicado en Colombes, cerca de París, Francia.</p>
                </div>
            </div>
        </div>

        {{-- Sección 2: Goleador y Equipos Clave --}}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Azul Oscuro --}}
                    <div class="card-header bg-primary text-white fw-bold fs-5 font-elegant">
                        Goleador y La Leyenda de Leônidas
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <p class="fw-bold">El máximo goleador del torneo fue:</p>
                        {{-- Goleador: Rojo --}}
                        <h3 class="text-success text-center">**Leônidas da Silva** 🇧🇷</h3>
                        <p class="text-center">({{ $mundial->goles_goleador ?? '7' }} goles, Brasil)</p>

                        <p class="mt-4 fw-bold">Curiosidad:</p>
                        <p class="small">Leônidas anotó un gol jugando **descalzo** por un momento, lo que le valió el apodo de "Diamante Negro".</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    {{-- Encabezado: Azul Oscuro --}}
                    <div class="card-header bg-primary text-white fw-bold fs-5 font-elegant">
                        👥 Naciones Participantes (15)
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <div class="row">
                            @php
                                $clasificados = ['Alemania', 'Bélgica', 'Brasil', 'Cuba', 'Checoslovaquia', 'Francia', 'Hungría', 'Indias Orientales Neerlandesas', 'Italia', 'Noruega', 'Países Bajos', 'Polonia', 'Rumania', 'Suecia', 'Suiza'];
                            @endphp
                            @foreach ($clasificados as $equipo)
                                <div class="col-4 mb-2">
                                    {{-- Badge: Fondo Azul Oscuro, Texto Blanco --}}
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
            {{-- Encabezado: Azul Oscuro --}}
            <div class="card-header bg-primary text-white fw-bold fs-5 font-elegant">
                Capítulo II: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    {{-- Encabezado de tabla: Azul Oscuro --}}
                    <thead class="table-primary">
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
                            <td>Stade du Parc Lescure</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>**🇮🇹 Italia** vs. Hungría 🇭🇺</td>
                            {{-- Resultado: Rojo --}}
                            <td class="fw-bold text-success fs-5">**4** - 2</td>
                            <td>Stade Olympique de Colombes</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Italia se convirtió en la primera nación en ganar dos títulos mundiales consecutivos.</p>
            </div>
        </div>

        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (ITALIA) EN LA FINAL 🏆 --}}
        <div class="card border-3 shadow border-dark-subtle">
            {{-- Encabezado de Homenaje: Rojo --}}
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Bicampeón: Alineación de Italia en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_italia_38 = [
                            'Portero' => 'Aldo Olivieri',
                            'Defensa' => ['Alfredo Foni', 'Pietro Rava'],
                            'Mediocampo' => ['Pietro Serantoni', 'Michele Andreolo', 'Ugo Locatelli'],
                            'Delantera' => ['Amedeo Biavati', 'Giuseppe Meazza (C)', 'Silvio Piola', 'Giovanni Ferrari', 'Gino Colaussi'],
                            'Entrenador' => 'Vittorio Pozzo',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_italia_38['Entrenador'] }}</p>
                    </div>

                    @foreach ($alineacion_italia_38 as $posicion => $jugadores)
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
                        <p class="mb-0 small">{{ $alineacion_italia_38['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 2]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Italia 1934</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 4]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Brasil 1950 →</span>
            </a>
        </div>
        
    </div>
@endsection