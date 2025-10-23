@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema Alemania 2006 — Negro / Rojo / Amarillo (anfitrión) --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-alemania-06" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta Alemania 2006 */
            .mundial-alemania-06{
                --color-principal:#000000;   /* Negro */
                --color-secundario:#DD0000;  /* Rojo */
                --color-acentogold:#FFCC00;  /* Amarillo */
                --color-terciario:#FFFFFF;   /* Blanco */
                --color-texto:#000000;       /* Negro para legibilidad */
            }

            /* Botones / headers principales en NEGRO */
            .mundial-alemania-06 .bg-dark,
            .mundial-alemania-06 .card-header.bg-dark,
            .mundial-alemania-06 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en ROJO */
            .mundial-alemania-06 .bg-success,
            .mundial-alemania-06 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-terciario)!important;
            }

            /* 🔥 Encabezados de tabla: visibles siempre */
            .mundial-alemania-06 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
                opacity:1!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general */
            .mundial-alemania-06 p,
            .mundial-alemania-06 li,
            .mundial-alemania-06 td,
            .mundial-alemania-06 small,
            .mundial-alemania-06 .text-muted,
            .mundial-alemania-06 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-alemania-06 h1,
            .mundial-alemania-06 .text-primary,
            .mundial-alemania-06 .font-title{ color:var(--color-principal)!important; }
            .mundial-alemania-06 .text-secondary,
            .mundial-alemania-06 .text-success{ color:var(--color-secundario)!important; }
            .mundial-alemania-06 .text-gold{ color:var(--color-acentogold)!important; }

            /* Utilidades visuales */
            .mundial-alemania-06 .bg-light-gray{ background:#f6f7f9; }
            .mundial-alemania-06 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-alemania-06 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#fff7d1; border:1px solid #ffe680; font-size:.85rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 17]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Corea–Japón 2002</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 19]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Sudáfrica 2010 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '2006' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Alemania' }} 🇩🇪</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- DATOS CLAVE (ampliado) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <table class="table table-bordered table-sm text-center font-elegant">
                    <thead>
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS</th>
                            <th>👥 EQUIPOS</th>
                            <th>⚽ PARTIDOS</th>
                            <th>🥅 GOLES</th>
                            <th>👤 MEJOR JUGADOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ITALIA' }}</td>
                            <td>9 junio – 9 julio</td>
                            <td>32</td>
                            <td>64</td>
                            <td>147</td>
                            <td>Zinedine Zidane</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center small text-muted mb-0">
                    Bota de Oro: Miroslav Klose (5) • Guante de Oro: Gianluigi Buffon • Balón oficial: Adidas +Teamgeist
                </p>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede (12):</p>
                    <p class="mb-2 small">
                        <span class="chip">Berlín (Olympiastadion)</span>
                        <span class="chip">Múnich (Allianz Arena)</span>
                        <span class="chip">Dortmund (Westfalenstadion)</span>
                        <span class="chip">Hamburgo (Volksparkstadion)</span>
                        <span class="chip">Gelsenkirchen (Arena AufSchalke)</span>
                        <span class="chip">Colonia (RheinEnergie)</span>
                        <span class="chip">Fráncfort</span>
                        <span class="chip">Leipzig</span>
                        <span class="chip">Stuttgart</span>
                        <span class="chip">Hannover</span>
                        <span class="chip">Kaiserslautern</span>
                        <span class="chip">Núremberg</span>
                    </p>
                    <p class="mb-0 small">La final se disputó en el <strong>Olympiastadion</strong> (Berlín).</p>
                </div>
            </div>
        </div>

        {{-- 🦁 MASCOTAS (Goleo VI & Pille) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇩🇪 Mascotas Oficiales
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Goleo VI & Pille</h4>
                <p class="text-dark">
                    Un león amable (Goleo) acompañado de un balón parlante (Pille), iconos del “Mundial de la Sonrisa”.
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/goleo_pille_2006.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/goleo_pille_2006.png') }}"
                         alt="Goleo VI & Pille — Alemania 2006"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
                <p class="text-gold small mt-3 fst-italic">
                    Torneo recordado por organización impecable y grandes atmósferas en estadio.
                </p>
            </div>
        </div>

        {{-- HECHOS Y NOVEDADES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: Hechos Notables y Novedades
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>La final del cabezazo:</strong> Italia venció a Francia por penales (1–1; 5–3), marcada por la expulsión de Zidane en la prórroga.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Regreso azzurro:</strong> cuarta estrella para Italia; Cannavaro completó un torneo defensivo legendario.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Anfitriona vibrante:</strong> Alemania de Klinsmann quedó 3.ª con un fútbol intenso y joven.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas +Teamgeist</em>, paneles termosellados para toque uniforme y menor absorción de agua.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/2006_Berlin_Olympiastadion.jpg') }}"
                         alt="Olympiastadion, Berlín (Final 2006)"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">El Olympiastadion, escenario de la consagración italiana.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas +Teamgeist
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Arquitectura esférica de 14 paneles; control estable y estética minimalista blanca y dorada.</p>
                <img src="{{ asset('img/adidas_teamgeist_2006.jpg') }}"
                     alt="Adidas +Teamgeist 2006"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (ITALIA) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — Italia
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    <thead class="table-dark">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Goleadores</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Grupo E --}}
                        <tr>
                            <td>Grupo E</td>
                            <td>Italia vs. Ghana</td>
                            <td><strong>2–0</strong></td>
                            <td>Pirlo, Iaquinta</td>
                        </tr>
                        <tr>
                            <td>Grupo E</td>
                            <td>Italia vs. Estados Unidos</td>
                            <td>1–1</td>
                            <td>Gilardino (ITA); autogol Zaccardo (USA)</td>
                        </tr>
                        <tr>
                            <td>Grupo E</td>
                            <td>Italia vs. República Checa</td>
                            <td><strong>2–0</strong></td>
                            <td>Materazzi, Inzaghi</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Italia vs. Australia</td>
                            <td><strong>1–0</strong></td>
                            <td>Totti (p, 90+)</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Italia vs. Ucrania</td>
                            <td><strong>3–0</strong></td>
                            <td>Zambrotta, Toni (2)</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Italia vs. Alemania</td>
                            <td><strong>2–0</strong> (t.e.)</td>
                            <td>Grosso 119’, Del Piero 121’</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-gold">FINAL</td>
                            <td><strong>🇮🇹 Italia</strong> vs. Francia 🇫🇷</td>
                            <td class="fw-bold text-success"><strong>1–1</strong> (5–3 pen)</td>
                            <td>Zidane (p), Materazzi • Penales: ITA perfecto</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Balón de Oro del torneo: Zinedine Zidane • Bota de Oro: Miroslav Klose (5) • Guante: Gianluigi Buffon.
                </p>
            </div>
        </div>

        {{-- 🏆 Homenaje: Alineación del Campeón --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Italia en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_italia_06 = [
                            'Portero' => 'Gianluigi Buffon',
                            'Defensa' => ['Gianluca Zambrotta', 'Fabio Cannavaro (C)', 'Marco Materazzi', 'Fabio Grosso'],
                            'Mediocampo' => ['Mauro Camoranesi', 'Gennaro Gattuso', 'Andrea Pirlo', 'Simone Perrotta'],
                            'Delantera' => ['Francesco Totti', 'Luca Toni'],
                            'Entrenador' => 'Marcello Lippi',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_italia_06['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_italia_06['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_italia_06['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_italia_06['Delantera'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_italia_06['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 17]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Corea–Japón 2002</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 19]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Sudáfrica 2010 →</span>
            </a>
        </div>
        
        
    </div>
@endsection
