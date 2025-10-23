@extends('layouts.app')

@section('content')

    {{-- CRÍTICO: Tema Rusia 2018 — Rojo / Azul / Dorado --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-rusia-2018" style="padding: 3rem;">

        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta Rusia 2018 */
            .mundial-rusia-2018{
                --color-principal:#C4002F;   /* Rojo FIFA/Rusia */
                --color-secundario:#0A2E6C;  /* Azul oscuro bandera */
                --color-dorado:#C8A600;      /* Dorado elegante */
                --color-texto:#111111;       /* Texto principal */
                --color-blanco:#FFFFFF;
                --color-gris:#f6f7f9;
            }

            /* Botones / headers principales en ROJO */
            .mundial-rusia-2018 .bg-dark,
            .mundial-rusia-2018 .card-header.bg-dark,
            .mundial-rusia-2018 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-blanco)!important;
            }

            /* Headers secundarios en AZUL */
            .mundial-rusia-2018 .bg-success,
            .mundial-rusia-2018 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-blanco)!important;
            }

            /* Encabezados de tabla */
            .mundial-rusia-2018 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-blanco)!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general */
            .mundial-rusia-2018 p,
            .mundial-rusia-2018 li,
            .mundial-rusia-2018 td,
            .mundial-rusia-2018 small,
            .mundial-rusia-2018 .text-muted,
            .mundial-rusia-2018 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-rusia-2018 h1,
            .mundial-rusia-2018 .text-primary,
            .mundial-rusia-2018 .font-title{ color:var(--color-principal)!important; }
            .mundial-rusia-2018 .text-secondary{ color:var(--color-secundario)!important; }
            .mundial-rusia-2018 .text-gold{ color:var(--color-dorado)!important; }

            /* Utilidades */
            .mundial-rusia-2018 .bg-light-gray{ background:var(--color-gris); }
            .mundial-rusia-2018 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-rusia-2018 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#fff8e1; border:1px solid #f0e2a1; font-size:.85rem;
            }
            .mundial-rusia-2018 .divider-classic{
                height: 4px; width: 140px; margin: 0 auto;
                background: linear-gradient(90deg, var(--color-principal), var(--color-dorado), var(--color-secundario));
                border-radius: 999px;
            }
        </style>

        {{-- NAVEGACIÓN SUPERIOR (20.º ← 21.º → 22.º) --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 20]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Brasil 2014</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 22]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Qatar 2022 →</span>
            </a>
        </div>

        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '2018' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Rusia' }} 🇷🇺</p>
        </header>

        <div class="divider-classic mb-5"></div>

        {{-- DATOS CLAVE --}}
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
                            <td class="fw-bold text-gold fs-5">{{ $mundial->campeon->nombre ?? 'FRANCIA' }}</td>
                            <td>14 junio – 15 julio</td>
                            <td>32</td>
                            <td>64</td>
                            <td>169</td>
                            <td>Luka Modrić (CRO)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center small text-muted mb-0">
                    Bota de Oro: Harry Kane (6) • Guante de Oro: Thibaut Courtois • Balón oficial: Adidas Telstar 18 • Debut del VAR en un Mundial
                </p>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Destacados:</p>
                    <p class="mb-2 small">
                        <span class="chip">Moscú (Luzhniki / Spartak)</span>
                        <span class="chip">San Petersburgo (Krestovski)</span>
                        <span class="chip">Sochi (Fisht)</span>
                        <span class="chip">Kazán (Kazan Arena)</span>
                        <span class="chip">Nizhni Nóvgorod</span>
                        <span class="chip">Samara</span>
                        <span class="chip">Rostov del Don</span>
                        <span class="chip">Saransk</span>
                        <span class="chip">Kaliningrado</span>
                        <span class="chip">Volgogrado</span>
                        <span class="chip">Ekaterimburgo</span>
                    </p>
                    <p class="mb-0 small">La final se jugó en el <strong>Estadio Luzhniki</strong> (Moscú).</p>
                </div>
            </div>
        </div>

        {{-- 🐺 MASCOTA (Zabivaka) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇷🇺 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Zabivaka</h4>
                <p class="text-dark">
                    Lobo antropomorfo con gafas deportivas; su nombre significa “el que anota”. Imagen fresca y dinámica.
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/zabivaka_2018.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/zabivaka_2018.png') }}"
                         alt="Zabivaka — Rusia 2018"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
                <p class="text-secondary small mt-3 fst-italic">
                    Primer Mundial con uso del VAR para decisiones clave.
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
                        <strong>VAR inaugural:</strong> primeras revisiones de video en una Copa del Mundo para penales, goles y rojas.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Partidazo en octavos:</strong> Francia 4–3 Argentina con show de Mbappé.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>El anfitrión sorprende:</strong> Rusia elimina a España por penales en octavos.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Revelación Croacia:</strong> final histórica para los balcánicos con Modrić al mando.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/2018_Luzhniki_Final.jpg') }}"
                         alt="Luzhniki, Moscú (Final 2018)"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">Estadio Luzhniki, Moscú: Francia conquistó su segunda estrella.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Telstar 18
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Homenaje al Telstar clásico, diseño pixelado monocromo con NFC integrado en la versión comercial.</p>
                <img src="{{ asset('img/telstar_2018.png') }}"
                     alt="Adidas Telstar 18"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (FRANCIA) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — Francia
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
                        {{-- Grupo C (síntesis) --}}
                        <tr>
                            <td>Grupo C</td>
                            <td>Francia vs. Australia</td>
                            <td><strong>2–1</strong></td>
                            <td>Griezmann (p), Behich (pp)</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Francia vs. Perú</td>
                            <td><strong>1–0</strong></td>
                            <td>Mbappé</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Dinamarca vs. Francia</td>
                            <td>0–0</td>
                            <td>—</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Francia vs. Argentina</td>
                            <td><strong>4–3</strong></td>
                            <td>Griezmann, Pavard, Mbappé (2)</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Uruguay vs. Francia</td>
                            <td><strong>0–2</strong></td>
                            <td>Varane, Griezmann</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Francia vs. Bélgica</td>
                            <td><strong>1–0</strong></td>
                            <td>Umtiti</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-gold">FINAL</td>
                            <td><strong>🇫🇷 Francia</strong> vs. Croacia 🇭🇷</td>
                            <td class="fw-bold text-gold"><strong>4–2</strong></td>
                            <td>Mandžukić (pp), Griezmann (p), Pogba, Mbappé</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Balón de Oro del torneo: Luka Modrić • Bota de Oro: Harry Kane (6) • Guante: Thibaut Courtois.
                </p>
            </div>
        </div>

        {{-- 🌟 Homenaje: Alineación del Campeón (Francia) --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success fw-bold fs-5 text-center font-elegant">
                🌟 Alineación de Francia en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_francia_18 = [
                            'Portero' => ['Hugo Lloris (C)'],
                            'Defensa' => ['Benjamin Pavard', 'Raphaël Varane', 'Samuel Umtiti', 'Lucas Hernández'],
                            'Mediocampo' => ['N’Golo Kanté', 'Paul Pogba', 'Blaise Matuidi'],
                            'Ataque' => ['Kylian Mbappé', 'Antoine Griezmann', 'Olivier Giroud']
                        ];
                    @endphp

                    @foreach($alineacion_francia_18 as $zona => $jugadores)
                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <div class="p-3 h-100 border rounded bg-white shadow-sm">
                                <h6 class="mb-2 text-primary">{{ $zona }}</h6>
                                <ul class="list-unstyled mb-0">
                                    @foreach($jugadores as $j)
                                        <li class="py-1">• {{ $j }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 mt-3">
                        <p class="small text-muted">
                            Cambios frecuentes del torneo: Corentin Tolisso, Steven Nzonzi, Nabil Fekir.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- VOLVER / NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 20]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Brasil 2014</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 22]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Qatar 2022 →</span>
            </a>
        </div>

    </div>

@endsection
