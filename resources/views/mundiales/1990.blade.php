@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema Italia 90 — Azzurro / Tricolore (verde-blanco-rosso) --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-italia-90" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta Italia 90 */
            .mundial-italia-90{
                --color-principal:#0073CF;   /* Azzurro */
                --color-secundario:#CE2B37;  /* Rosso */
                --color-acentoverde:#009246; /* Verde tricolore */
                --color-terciario:#FFFFFF;   /* Blanco */
                --color-texto:#000000;       /* Negro */
            }

            /* Botones / headers principales en AZZURRO */
            .mundial-italia-90 .bg-dark,
            .mundial-italia-90 .card-header.bg-dark,
            .mundial-italia-90 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en ROSSO */
            .mundial-italia-90 .bg-success,
            .mundial-italia-90 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-terciario)!important;
            }

            /* 🔥 FIX encabezados de tabla: siempre visibles */
            .mundial-italia-90 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
                opacity:1!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general en negro */
            .mundial-italia-90 p,
            .mundial-italia-90 li,
            .mundial-italia-90 td,
            .mundial-italia-90 small,
            .mundial-italia-90 .text-muted,
            .mundial-italia-90 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-italia-90 h1,
            .mundial-italia-90 .text-primary,
            .mundial-italia-90 .font-title{ color:var(--color-principal)!important; }
            .mundial-italia-90 .text-secondary,
            .mundial-italia-90 .text-success{ color:var(--color-secundario)!important; }
            .mundial-italia-90 .text-accent-green{ color:var(--color-acentoverde)!important; }

            /* Utilidades visuales */
            .mundial-italia-90 .bg-light-gray{ background:#f6f7f9; }
            .mundial-italia-90 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-italia-90 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#e7f3ff; border:1px solid #cfe6ff; font-size:.85rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 13]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: México 1986</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 15]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Estados Unidos 1994 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1990' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Italia' }} 🇮🇹</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- DATOS CLAVE (ampliado) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
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
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ALEMANIA FEDERAL' }}</td>
                            <td>8 junio – 8 julio</td>
                            <td>24</td>
                            <td>52</td>
                            <td>115</td>
                            <td>Salvatore Schillaci</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede (principales):</p>
                    <p class="mb-2 small">
                        <span class="chip">Roma (Olimpico)</span>
                        <span class="chip">Milán (San Siro)</span>
                        <span class="chip">Nápoles (San Paolo)</span>
                        <span class="chip">Turín (Delle Alpi)</span>
                        <span class="chip">Bari (San Nicola)</span>
                        <span class="chip">Génova (Luigi Ferraris)</span>
                        <span class="chip">Florencia (Artemio Franchi)</span>
                        <span class="chip">Bolonia</span>
                        <span class="chip">Verona</span>
                        <span class="chip">Cagliari</span>
                        <span class="chip">Palermo</span>
                        <span class="chip">Udine</span>
                    </p>
                    <p class="mb-0 small">La final se disputó en el <strong>Stadio Olimpico</strong> (Roma).</p>
                </div>
            </div>
        </div>

        {{-- 🧱 MASCOTA (Ciao) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇮🇹 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Ciao</h4>
                <p class="text-dark">
                    Un personaje formado por cubos con los colores del tricolore y una cabeza-balón. Minimalista y muy “ochentero”.
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/ciao_1990.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/ciao_1990.png') }}"
                         alt="Ciao - Italia 1990"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
                <p class="text-accent-green small mt-3 fst-italic">
                    Italia 90 dejó un fútbol táctico y poco goleador; sus demoras y pérdidas de tiempo inspiraron la regla del pase atrás al portero (1992).
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
                        <strong>Revelación africana:</strong> Camerún y Roger Milla llegaron a cuartos, primera vez para África.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Italia anfitriona:</strong> Tercero con <em>Toto</em> Schillaci como máximo goleador (6).
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Partidos célebres:</strong> Inglaterra–Alemania (semifinal) decidido por penales; Nápoles vivió un Maradona vs. Italia inolvidable.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas Etrusco Unico</em>, con motivos de arte etrusco y nueva capa interna de poliuretano.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/1990_Olimpico_Roma.jpg') }}"
                         alt="Stadio Olimpico, Roma (Final de 1990)"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">El Stadio Olimpico de Roma, escenario de la final.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Etrusco Unico
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Primer balón con capa interna de espuma de poliuretano: más impermeable y consistente.</p>
                <img src="{{ asset('img/adidas_etrusco_1990.png') }}"
                     alt="Adidas Etrusco Unico 1990"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (ALEMANIA FEDERAL) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — Alemania Federal
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
                        {{-- Grupo D --}}
                        <tr>
                            <td>Grupo D</td>
                            <td>Alemania Federal vs. Yugoslavia</td>
                            <td><strong>4–1</strong></td>
                            <td>Klinsmann, Brehme, Matthäus (2)</td>
                        </tr>
                        <tr>
                            <td>Grupo D</td>
                            <td>Alemania Federal vs. E.A.U.</td>
                            <td><strong>5–1</strong></td>
                            <td>Klinsmann, Völler (2), Riedle, Möller</td>
                        </tr>
                        <tr>
                            <td>Grupo D</td>
                            <td>Colombia vs. Alemania Federal</td>
                            <td>1–1</td>
                            <td>Pierre Littbarski</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Alemania Federal vs. Países Bajos</td>
                            <td><strong>2–1</strong></td>
                            <td>Klinsmann, Brehme</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Alemania Federal vs. Checoslovaquia</td>
                            <td><strong>1–0</strong></td>
                            <td>Brehme (p)</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Alemania Federal vs. Inglaterra</td>
                            <td>1–1 (4–3 pen)</td>
                            <td>Brehme</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td><strong>🇩🇪 Alemania Federal</strong> vs. Argentina 🇦🇷</td>
                            <td class="fw-bold text-success"><strong>1–0</strong></td>
                            <td>Andreas Brehme (p)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">Bota de Oro y Balón de Oro: Salvatore Schillaci (ITA, 6 goles).</p>
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
                        $alineacion_alemania_90 = [
                            'Portero' => 'Bodo Illgner',
                            'Defensa' => ['Thomas Berthold', 'Jürgen Kohler', 'Guido Buchwald', 'Andreas Brehme'],
                            'Mediocampo' => ['Lothar Matthäus (C)', 'Thomas Häßler', 'Pierre Littbarski', 'Olaf Thon'],
                            'Delantera' => ['Jürgen Klinsmann', 'Rudi Völler'],
                            'Entrenador' => 'Franz Beckenbauer',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_alemania_90['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_alemania_90['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_alemania_90['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_alemania_90['Delantera'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_alemania_90['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 13]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: México 1986</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 15]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Estados Unidos 1994 →</span>
            </a>
        </div>
        
    </div>
@endsection

