@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema Corea–Japón 2002 — Rojo/Blanco con acento tecnológico (dual anfitriones) --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-corea-japon-02" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta Corea–Japón 2002 */
            .mundial-corea-japon-02{
                --color-principal:#C60C30;   /* Rojo Corea */
                --color-secundario:#005BAC;  /* Azul tecnológico (toque japonés/asiático moderno) */
                --color-terciario:#FFFFFF;   /* Blanco */
                --color-texto:#000000;       /* Negro para legibilidad */
                --color-acento:#BC002D;      /* Rojo Japón (acento) */
            }

            /* Botones / headers principales en ROJO */
            .mundial-corea-japon-02 .bg-dark,
            .mundial-corea-japon-02 .card-header.bg-dark,
            .mundial-corea-japon-02 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en AZUL */
            .mundial-corea-japon-02 .bg-success,
            .mundial-corea-japon-02 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-terciario)!important;
            }

            /* 🔥 FIX encabezados de tabla: siempre visibles */
            .mundial-corea-japon-02 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
                opacity:1!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general */
            .mundial-corea-japon-02 p,
            .mundial-corea-japon-02 li,
            .mundial-corea-japon-02 td,
            .mundial-corea-japon-02 small,
            .mundial-corea-japon-02 .text-muted,
            .mundial-corea-japon-02 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-corea-japon-02 h1,
            .mundial-corea-japon-02 .text-primary,
            .mundial-corea-japon-02 .font-title{ color:var(--color-principal)!important; }
            .mundial-corea-japon-02 .text-secondary,
            .mundial-corea-japon-02 .text-success{ color:var(--color-secundario)!important; }
            .mundial-corea-japon-02 .text-accent{ color:var(--color-acento)!important; }

            /* Utilidades visuales */
            .mundial-corea-japon-02 .bg-light-gray{ background:#f6f7f9; }
            .mundial-corea-japon-02 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-corea-japon-02 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#ffe9ed; border:1px solid #ffc8d1; font-size:.85rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 18]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Francia 1998</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 20]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Alemania 2006 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '2002' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Corea–Japón' }} 🇰🇷🇯🇵</p>
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
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'BRASIL' }}</td>
                            <td>31 mayo – 30 junio</td>
                            <td>32</td>
                            <td>64</td>
                            <td>161</td>
                            <td>Oliver Kahn (ALE)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS (principales) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede (selección):</p>
                    <p class="mb-2 small">
                        {{-- Corea del Sur --}}
                        <span class="chip">Seúl (World Cup)</span>
                        <span class="chip">Busán</span>
                        <span class="chip">Daegu</span>
                        <span class="chip">Daejeon</span>
                        <span class="chip">Suwon</span>
                        <span class="chip">Incheon</span>
                        <span class="chip">Gwangju</span>
                        <span class="chip">Jeonju</span>
                        <span class="chip">Ulsan</span>
                        {{-- Japón --}}
                        <span class="chip">Yokohama (Intl. Stadium)</span>
                        <span class="chip">Saitama</span>
                        <span class="chip">Shizuoka (Ecopa)</span>
                        <span class="chip">Osaka (Nagai)</span>
                        <span class="chip">Kobe</span>
                        <span class="chip">Niigata</span>
                        <span class="chip">Miyagi (Sendai)</span>
                        <span class="chip">Oita (Big Eye)</span>
                        <span class="chip">Sapporo (Dome)</span>
                        <span class="chip">Ibaraki (Kashima)</span>
                    </p>
                    <p class="mb-0 small">La final se disputó en el <strong>International Stadium Yokohama</strong> (Japón).</p>
                </div>
            </div>
        </div>

        {{-- 🤖 MASCOTAS (Ato, Kaz y Nik — The Spheriks) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇰🇷🇯🇵 Mascotas Oficiales
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Ato, Kaz y Nik (The Spheriks)</h4>
                <p class="text-dark">
                    Tres personajes futuristas de un mundo digital, con estética “neón” y narrativa propia: entrenan y juegan <em>Atmoball</em>.
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/spheriks_2002.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/spheriks_2002.jpg') }}"
                         alt="Ato, Kaz y Nik - Corea–Japón 2002"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
                <p class="text-secondary small mt-3 fst-italic">
                    Primer Mundial organizado por dos países y primero en Asia.
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
                        <strong>Revelaciones:</strong> Corea del Sur llega a semifinales; Turquía termina <em>3.º</em>.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>La dupla R–R:</strong> Ronaldo y Rivaldo lideran a Brasil; Ronaldo acaba como Bota de Oro (8).
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>VAR no existía aún:</strong> varias polémicas arbitrales marcaron la ruta de Corea.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas Fevernova</em> — diseño de tri-láminas y nueva espuma refinada para trayectorias más vivas.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/2002_Yokohama_Final.jpg') }}"
                         alt="International Stadium Yokohama — Final 2002"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">El International Stadium Yokohama, donde Brasil levantó su 5.º título.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Fevernova
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Más ligero en sensaciones, con núcleo refinado y corte termosellado de alta precisión.</p>
                <img src="{{ asset('img/adidas_fevernova_2002.png') }}"
                     alt="Adidas Fevernova 2002"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (BRASIL) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — Brasil
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
                        {{-- Grupo C --}}
                        <tr>
                            <td>Grupo C</td>
                            <td>Brasil vs. Turquía</td>
                            <td><strong>2–1</strong></td>
                            <td>Ronaldo, Rivaldo (p)</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Brasil vs. China PR</td>
                            <td><strong>4–0</strong></td>
                            <td>Roberto Carlos, Rivaldo, Ronaldinho (p), Ronaldo</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Brasil vs. Costa Rica</td>
                            <td><strong>5–2</strong></td>
                            <td>Ronaldo (2), Rivaldo, Edmílson, Júnior</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Brasil vs. Bélgica</td>
                            <td><strong>2–0</strong></td>
                            <td>Rivaldo, Ronaldo</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Brasil vs. Inglaterra</td>
                            <td><strong>2–1</strong></td>
                            <td>Rivaldo, Ronaldinho</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Brasil vs. Turquía</td>
                            <td><strong>1–0</strong></td>
                            <td>Ronaldo</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td><strong>🇧🇷 Brasil</strong> vs. Alemania 🇩🇪</td>
                            <td class="fw-bold text-success"><strong>2–0</strong></td>
                            <td>Ronaldo (2)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Balón de Oro del torneo: Oliver Kahn • Bota de Oro: Ronaldo (8) • Guante: Oliver Kahn.
                </p>
            </div>
        </div>

        {{-- 🏆 Homenaje: Alineación del Campeón --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Brasil en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_brasil_02 = [
                            'Portero' => 'Marcos',
                            'Defensa' => ['Cafú (C)', 'Roque Júnior', 'Lúcio', 'Roberto Carlos'],
                            'Mediocampo' => ['Gilberto Silva', 'Kléberson', 'Rivaldo', 'Ronaldinho'],
                            'Delantera' => ['Ronaldo'],
                            'Entrenador' => 'Luiz Felipe Scolari',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_brasil_02['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_brasil_02['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_brasil_02['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ([$alineacion_brasil_02['Delantera'][0]] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_brasil_02['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 18]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Francia 1998</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 20]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Alemania 2006 →</span>
            </a>
        </div>
        
    </div>
@endsection
