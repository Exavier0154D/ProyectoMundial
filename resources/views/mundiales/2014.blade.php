@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema Brasil 2014 — Verde / Amarillo / Azul --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-brasil-14" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta Brasil 2014 */
            .mundial-brasil-14{
                --color-principal:#009C3B;   /* Verde bandera Brasil */
                --color-secundario:#FFDF00;  /* Amarillo oro */
                --color-acento:#002776;      /* Azul bandera */
                --color-terciario:#FFFFFF;   /* Blanco */
                --color-texto:#121212;       /* Texto principal */
            }

            /* Botones / headers principales en VERDE */
            .mundial-brasil-14 .bg-dark,
            .mundial-brasil-14 .card-header.bg-dark,
            .mundial-brasil-14 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en AMARILLO */
            .mundial-brasil-14 .bg-success,
            .mundial-brasil-14 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-acento)!important;
            }

            /* Encabezados de tabla: buen contraste */
            .mundial-brasil-14 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general */
            .mundial-brasil-14 p,
            .mundial-brasil-14 li,
            .mundial-brasil-14 td,
            .mundial-brasil-14 small,
            .mundial-brasil-14 .text-muted,
            .mundial-brasil-14 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-brasil-14 h1,
            .mundial-brasil-14 .text-primary,
            .mundial-brasil-14 .font-title{ color:var(--color-principal)!important; }
            .mundial-brasil-14 .text-secondary,
            .mundial-brasil-14 .text-success{ color:var(--color-secundario)!important; }
            .mundial-brasil-14 .text-accent{ color:var(--color-acento)!important; }

            /* Utilidades visuales */
            .mundial-brasil-14 .bg-light-gray{ background:#f6f7f9; }
            .mundial-brasil-14 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-brasil-14 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#fffbe6; border:1px solid #ffef99; font-size:.85rem;
            }

            /* Divisor fino degradado */
            .mundial-brasil-14 .divider-classic{
                height: 4px; width: 140px; margin: 0 auto 2rem;
                background: linear-gradient(90deg, var(--color-principal), var(--color-secundario), var(--color-acento));
                border-radius: 999px;
            }
        </style>

        {{-- NAVEGACIÓN SUPERIOR (orden de mundiales) --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 19]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Sudáfrica 2010</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 21]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Rusia 2018 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-4">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '2014' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Brasil' }} 🇧🇷</p>
        </header>

        <div class="divider-classic"></div>
        
        {{-- DATOS CLAVE --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <table class="table table-bordered table-sm text-center font-elegant">
                    <thead>
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🥈 SUBCAMPEÓN</th>
                            <th>🗓️ FECHAS</th>
                            <th>👥 EQUIPOS</th>
                            <th>⚽ PARTIDOS</th>
                            <th>🥅 GOLES</th>
                            <th>🎖️ MEJOR JUGADOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ALEMANIA' }}</td>
                            <td class="fw-bold">{{ $mundial->subcampeon->nombre ?? 'ARGENTINA' }}</td>
                            <td>12 junio – 13 julio</td>
                            <td>32</td>
                            <td>64</td>
                            <td>171</td>
                            <td>Lionel Messi (Balón de Oro)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center small text-muted mb-0">
                    Bota de Oro: James Rodríguez (6) • Guante de Oro: Manuel Neuer • Balón oficial: Adidas Brazuca
                </p>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS (12) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede (12):</p>
                    <p class="mb-2 small">
                        <span class="chip">Río de Janeiro (Maracaná)</span>
                        <span class="chip">São Paulo (Arena Corinthians)</span>
                        <span class="chip">Brasilia (Mané Garrincha)</span>
                        <span class="chip">Belo Horizonte (Mineirão)</span>
                        <span class="chip">Belo Horizonte (Mineirão)</span>
                        <span class="chip">Belo Horizonte (Mineirão)</span>
                        <span class="chip">Belo Horizonte (Mineirão)</span>
                        <span class="chip">Belo Horizonte (Mineirão)</span>
                        <span class="chip">Belo Horizonte (Mineirão)</span>
                    </p>
                    <p class="mb-2 small">
                        <span class="chip">Fortaleza (Castelão)</span>
                        <span class="chip">Recife (Arena Pernambuco)</span>
                        <span class="chip">Salvador (Fonte Nova)</span>
                        <span class="chip">Porto Alegre (Beira-Rio)</span>
                        <span class="chip">Curitiba (Arena da Baixada)</span>
                        <span class="chip">Cuiabá (Arena Pantanal)</span>
                        <span class="chip">Manaus (Arena da Amazônia)</span>
                        <span class="chip">Natal (Arena das Dunas)</span>
                    </p>
                    <p class="mb-0 small">La final se disputó en el <strong>Estadio Maracaná</strong> (Río de Janeiro).</p>
                </div>
            </div>
        </div>

        {{-- 🐾 MASCOTA (Fuleco) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇧🇷 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Fuleco</h4>
                <p class="text-dark">
                    Un armadillo de tres bandas (tatu-bola) en verde/amarillo/azul; su nombre mezcla “Futebol” + “Ecologia”.
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/fuleco_2014.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/fuleco_2014.jpg') }}"
                         alt="Fuleco — Brasil 2014"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL (Brazuca) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-accent fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Brazuca
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Paneles simétricos en 6 piezas, texturizado profundo y alta estabilidad aerodinámica.</p>
                <img src="{{ asset('img/adidas_brazuca_2014.jpeg') }}"
                     alt="Adidas Brazuca 2014"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- PARTIDO EMBLEMÁTICO (7–1) --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                💥 Capítulo I: El 7–1 de Belo Horizonte
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p class="mb-3">
                    En semifinales, <strong>Alemania</strong> derrotó a <strong>Brasil</strong> por <em>7–1</em> en el Mineirão.
                    Goleadores: Müller, Klose, Kroos (2), Khedira, Schürrle (2). Para Brasil: Óscar.
                </p>
                <div class="text-center mt-3 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/2014_Mineirao_7-1.jpg') }}"
                         alt="Belo Horizonte — Mineirão (7–1)"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">Mineirão, Belo Horizonte: una de las páginas más impactantes en la historia de los Mundiales.</p>
                </div>
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (ALEMANIA) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — Alemania
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
                        {{-- Grupo G --}}
                        <tr>
                            <td>Grupo G</td>
                            <td>Alemania vs. Portugal</td>
                            <td><strong>4–0</strong></td>
                            <td>Thomas Müller (3), Mats Hummels</td>
                        </tr>
                        <tr>
                            <td>Grupo G</td>
                            <td>Alemania vs. Ghana</td>
                            <td>2–2</td>
                            <td>Götze, Klose</td>
                        </tr>
                        <tr>
                            <td>Grupo G</td>
                            <td>EE. UU. vs. Alemania</td>
                            <td><strong>0–1</strong></td>
                            <td>Thomas Müller</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Alemania vs. Argelia</td>
                            <td><strong>2–1</strong> (t.e.)</td>
                            <td>Schürrle, Özil</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Alemania vs. Francia</td>
                            <td><strong>1–0</strong></td>
                            <td>Mats Hummels</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Brasil vs. Alemania</td>
                            <td><strong>1–7</strong></td>
                            <td>Müller, Klose, Kroos (2), Khedira, Schürrle (2)</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-accent">FINAL</td>
                            <td><strong>🇩🇪 Alemania</strong> vs. Argentina 🇦🇷</td>
                            <td class="fw-bold text-success"><strong>1–0</strong> (t.e.)</td>
                            <td>Mario Götze 113’</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Balón de Oro del torneo: Lionel Messi • Bota de Oro: James Rodríguez (6) • Guante: Manuel Neuer.
                </p>
            </div>
        </div>

        {{-- 🌟 Alineación de Alemania en la Final --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-accent fw-bold fs-5 text-center font-elegant">
                🌟 Alineación del Campeón: Alemania (Final en Maracaná) 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alemania_final_14 = [
                            'Portero' => ['Manuel Neuer'],
                            'Defensa' => ['Philipp Lahm (C)', 'Jérôme Boateng', 'Mats Hummels', 'Benedikt Höwedes'],
                            'Mediocampo' => ['Bastian Schweinsteiger', 'Christoph Kramer*', 'Toni Kroos', 'Mesut Özil'],
                            'Ataque' => ['Thomas Müller', 'Miroslav Klose']
                        ];
                    @endphp

                    @foreach($alemania_final_14 as $zona => $jugadores)
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
                            *Kramer salió lesionado (31’) y entró <strong>André Schürrle</strong>; <strong>Mario Götze</strong> ingresó y marcó el gol decisivo.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- GALERÍA / IMAGEN FINAL --}}
        <div class="card border-0 mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏟️ La Final en el Maracaná
            </div>
            <div class="card-body p-4 text-center">
                <img src="{{ asset('img/2014_Maracana_Final.jpg') }}"
                     alt="Maracaná — Final 2014"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:350px;">
                <p class="mt-2 small font-elegant">
                    Alemania conquistó su cuarta estrella en el Maracaná (Río de Janeiro).
                </p>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR (orden de mundiales) --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 19]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Sudáfrica 2010</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 21]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Rusia 2018 →</span>
            </a>
        </div>

    </div>

@endsection