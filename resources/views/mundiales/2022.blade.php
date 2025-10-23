@extends('layouts.app')

@section('content')

    {{-- CRÍTICO: Tema Qatar 2022 — Granate / Dorado / Arena --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-qatar-2022" style="padding: 3rem;">

        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            .mundial-qatar-2022{
                --color-principal:#7F1734;   /* Granate Qatar */
                --color-secundario:#C8A600;  /* Dorado elegante */
                --color-arena:#F4E9D8;       /* Arena desértica */
                --color-texto:#111111;
                --color-blanco:#FFFFFF;
                --color-gris:#f6f7f9;
            }

            /* Botones / headers principales en GRANATE */
            .mundial-qatar-2022 .bg-dark,
            .mundial-qatar-2022 .card-header.bg-dark,
            .mundial-qatar-2022 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-blanco)!important;
            }

            /* Headers secundarios en DORADO */
            .mundial-qatar-2022 .bg-success,
            .mundial-qatar-2022 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-principal)!important;
                font-weight:700!important;
            }

            /* Tablas */
            .mundial-qatar-2022 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-blanco)!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general */
            .mundial-qatar-2022 p,
            .mundial-qatar-2022 li,
            .mundial-qatar-2022 td,
            .mundial-qatar-2022 small,
            .mundial-qatar-2022 .text-muted,
            .mundial-qatar-2022 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos / acentos */
            .mundial-qatar-2022 h1,
            .mundial-qatar-2022 .text-primary,
            .mundial-qatar-2022 .font-title{ color:var(--color-principal)!important; }
            .mundial-qatar-2022 .text-gold{ color:var(--color-secundario)!important; }
            .mundial-qatar-2022 .bg-arena{ background:var(--color-arena)!important; }

            /* Utilidades */
            .mundial-qatar-2022 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; } /* (no se muestran imágenes ahora) */
            .mundial-qatar-2022 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#fff7e0; border:1px solid #f0e2a1; font-size:.85rem; margin:.15rem .2rem;
            }
            .mundial-qatar-2022 .divider-classic{
                height: 4px; width: 160px; margin: 0 auto;
                background: linear-gradient(90deg, var(--color-principal), var(--color-secundario), var(--color-arena));
                border-radius: 999px;
            }
        </style>

        {{-- NAVEGACIÓN SUPERIOR (← Rusia 2018 | Índice) --}}
        <div class="mt-5 d-flex justify-content-between">
            {{-- IZQUIERDA → Volver a Rusia 2018 --}}
            <a href="{{ route('enciclopedia.show', ['mundial' => 21]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Volver a Rusia 2018</span>
            </a>

            {{-- DERECHA → Ir al Índice --}}
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Ir al Índice de Mundiales →</span>
            </a>
        </div>

        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Final de la Copa Mundial de la FIFA {{ $mundial->anio ?? '2022' }}
            </h1>
            <p class="fs-4 text-gold font-elegant">{{ $mundial->pais_sede ?? 'Qatar' }} 🇶🇦 — Estadio Lusail</p>
        </header>

        <div class="divider-classic mb-5"></div>

        {{-- DATOS CLAVE DEL TORNEO --}}
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
                            <th>🥅 GOLES (récord)</th>
                            <th>👤 MEJOR JUGADOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-gold fs-5">{{ $mundial->campeon->nombre ?? 'ARGENTINA' }}</td>
                            <td>{{ $mundial->subcampeon->nombre ?? 'FRANCIA' }}</td>
                            <td>20 noviembre – 18 diciembre</td>
                            <td>32</td>
                            <td>64</td>
                            <td>172</td>
                            <td>Lionel Messi (ARG)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center small text-muted mb-0">
                    Bota de Oro: Kylian Mbappé (8) • Guante de Oro: Emiliano Martínez • Mejor Jugador Joven: Enzo Fernández • Balón oficial: Adidas Al Rihla
                </p>
            </div>
        </div>

        {{-- 🏟️ LA FINAL EN LUSAIL (con imagen) --}}
<div class="card border-0 shadow mb-5">
    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
        🏟️ La Final — Argentina vs Francia (3–3, 4–2 pen.)
    </div>
    <div class="card-body p-4">
        <div class="row g-4 align-items-center">
            
            {{-- IMAGEN DEL ESTADIO --}}
            <div class="col-md-5 text-center">
                <img src="{{ asset('img/2022_Lusail_Final.jpg') }}"
                     alt="Estadio Lusail — Final 2022"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height: 240px; object-fit:cover; border-radius:.5rem;">
            </div>

            {{-- TEXTO DE LA FINAL --}}
            <div class="col-md-7">
                <ul class="list-group list-group-flush font-elegant">
                    <li class="list-group-item bg-arena border-0">
                        <strong>90’:</strong> ARG 2–2 FRA — <em>Messi (p), Di María / Mbappé (p), Mbappé</em>
                    </li>
                    <li class="list-group-item bg-arena border-0">
                        <strong>120’:</strong> ARG 3–3 FRA — <em>Messi / Mbappé</em>
                    </li>
                    <li class="list-group-item bg-arena border-0">
                        <strong>PEN:</strong> Argentina 4–2 — <em>Emiliano Martínez decisivo</em>
                    </li>
                </ul>
                <p class="mt-3 small text-muted">
                    Partido épico con hat-trick de Mbappé y doblete de Messi. Argentina logra su tercera estrella.
                </p>
            </div>
        </div>
    </div>
</div>


       {{-- 🇶🇦 MASCOTA y BALÓN (con imágenes) --}}
<div class="row g-4 mb-5">
    {{-- MASCOTA --}}
    <div class="col-md-6">
        <div class="card border-0 shadow h-100">
            <div class="card-header bg-success fw-bold fs-5 font-elegant">🇶🇦 Mascota Oficial: La’eeb</div>
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-12 col-sm-5 text-center">
                        <img src="{{ asset('img/laeeb_2022.jpg') }}"
                             alt="La’eeb — Qatar 2022"
                             class="img-fluid themed-img shadow-sm"
                             style="max-height:220px; object-fit:contain;">
                    </div>
                    <div class="col-12 col-sm-7">
                        <p class="mb-0">
                            “Jugador habilidoso” en árabe; diseño etéreo inspirado en un kufiya. Imagen ligera y
                            carismática que acompañó la identidad visual del torneo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BALÓN OFICIAL --}}
    <div class="col-md-6">
        <div class="card border-0 shadow h-100">
            <div class="card-header bg-success fw-bold fs-5 font-elegant">⚽ Balón Oficial: Adidas Al Rihla</div>
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-12 col-sm-5 text-center">
                        <img src="{{ asset('img/al_rihla_2022.jpg') }}"
                             alt="Balón Adidas Al Rihla — Qatar 2022"
                             class="img-fluid themed-img shadow-sm"
                             style="max-height:220px; object-fit:contain;">
                    </div>
                    <div class="col-12 col-sm-7">
                        <p class="mb-0">
                            Balón con sensor IMU interno y aerodinámica optimizada; clave para el fuera de juego
                            semiautomatizado. Paneles termosellados y respuesta estable en velocidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        {{-- 📊 MÁXIMOS GOLEADORES y ASISTIDORES --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📊 Rendimiento Individual — Goles y Asistencias
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">Máximos Goleadores</h6>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Jugador</th>
                                    <th>Selección</th>
                                    <th>Goles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Kylian Mbappé</td><td>Francia</td><td><strong>8</strong></td></tr>
                                <tr><td>Lionel Messi</td><td>Argentina</td><td>7</td></tr>
                                <tr><td>Julián Álvarez</td><td>Argentina</td><td>4</td></tr>
                                <tr><td>Olivier Giroud</td><td>Francia</td><td>4</td></tr>
                                <tr><td>Gonçalo Ramos</td><td>Portugal</td><td>3</td></tr>
                                <tr><td>Enner Valencia</td><td>Ecuador</td><td>3</td></tr>
                                <tr><td>Cody Gakpo</td><td>Países Bajos</td><td>3</td></tr>
                                <tr><td>Marcus Rashford</td><td>Inglaterra</td><td>3</td></tr>
                                <tr><td>Bukayo Saka</td><td>Inglaterra</td><td>3</td></tr>
                                <tr><td>Álvaro Morata</td><td>España</td><td>3</td></tr>
                                <tr><td>Richarlison</td><td>Brasil</td><td>3</td></tr>
                            </tbody>
                        </table>
                        <p class="small text-muted mb-0">Bota de Oro: Mbappé (8) • Bota de Plata: Messi (7) • Bota de Bronce: Giroud y Álvarez (4).</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">Máximos Asistidores</h6>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Jugador</th>
                                    <th>Selección</th>
                                    <th>Asist.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Lionel Messi</td><td>Argentina</td><td><strong>3</strong></td></tr>
                                <tr><td>Antoine Griezmann</td><td>Francia</td><td>3</td></tr>
                                <tr><td>Harry Kane</td><td>Inglaterra</td><td>3</td></tr>
                                <tr><td>Bruno Fernandes</td><td>Portugal</td><td>3</td></tr>
                                <tr><td>Ivan Perišić</td><td>Croacia</td><td>3</td></tr>
                            </tbody>
                        </table>
                        <p class="small text-muted mb-0">Lista muestra a líderes con ≥3 asistencias (según registros ampliamente difundidos).</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 🌍 EQUIPOS PARTICIPANTES (32) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success fw-bold fs-5 font-elegant">
                🌍 Equipos Participantes (32)
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <span class="chip">Qatar</span>
                    <span class="chip">Ecuador</span>
                    <span class="chip">Senegal</span>
                    <span class="chip">Países Bajos</span>
                    <span class="chip">Inglaterra</span>
                    <span class="chip">Irán</span>
                    <span class="chip">Estados Unidos</span>
                    <span class="chip">Gales</span>
                    <span class="chip">Argentina</span>
                    <span class="chip">Arabia Saudita</span>
                    <span class="chip">México</span>
                    <span class="chip">Polonia</span>
                    <span class="chip">Francia</span>
                    <span class="chip">Australia</span>
                    <span class="chip">Dinamarca</span>
                    <span class="chip">Túnez</span>
                    <span class="chip">España</span>
                    <span class="chip">Costa Rica</span>
                    <span class="chip">Alemania</span>
                    <span class="chip">Japón</span>
                    <span class="chip">Bélgica</span>
                    <span class="chip">Canadá</span>
                    <span class="chip">Marruecos</span>
                    <span class="chip">Croacia</span>
                    <span class="chip">Brasil</span>
                    <span class="chip">Serbia</span>
                    <span class="chip">Suiza</span>
                    <span class="chip">Camerún</span>
                    <span class="chip">Portugal</span>
                    <span class="chip">Ghana</span>
                    <span class="chip">Uruguay</span>
                    <span class="chip">Corea del Sur</span>
                </div>
            </div>
        </div>

        {{-- 🏟️ SEDES Y ESTADIOS (solo info) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏟️ Sedes y Estadios
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-light border-0"><strong>Lusail:</strong> Estadio Lusail (Final)</li>
                            <li class="list-group-item bg-light border-0"><strong>Al Khor:</strong> Estadio Al Bayt</li>
                            <li class="list-group-item bg-light border-0"><strong>Al Wakrah:</strong> Estadio Al Janoub</li>
                            <li class="list-group-item bg-light border-0"><strong>Al Rayyan:</strong> Estadio Ahmad bin Ali</li>
                            <li class="list-group-item bg-light border-0"><strong>Al Rayyan:</strong> Estadio Education City</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-light border-0"><strong>Doha:</strong> Estadio Khalifa International</li>
                            <li class="list-group-item bg-light border-0"><strong>Doha:</strong> Estadio 974</li>
                            <li class="list-group-item bg-light border-0"><strong>Doha:</strong> Estadio Al Thumama</li>
                        </ul>
                    </div>
                </div>
                <p class="small text-muted mt-2 mb-0">8 estadios en 5 ciudades: Lusail, Al Khor, Al Wakrah, Al Rayyan y Doha.</p>
            </div>
        </div>

        {{-- 🏆 RUTA DEL CAMPEÓN (ARGENTINA) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — Argentina
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
                            <td>Argentina vs. Arabia Saudita</td>
                            <td>1–2</td>
                            <td>Messi (p)</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Argentina vs. México</td>
                            <td><strong>2–0</strong></td>
                            <td>Messi, Enzo Fernández</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Polonia vs. Argentina</td>
                            <td><strong>0–2</strong></td>
                            <td>Mac Allister, Julián Álvarez</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Argentina vs. Australia</td>
                            <td><strong>2–1</strong></td>
                            <td>Messi, Julián Álvarez</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Países Bajos vs. Argentina</td>
                            <td>2–2 (4–3 pen.)</td>
                            <td>Nahuel Molina, Messi (p)</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Argentina vs. Croacia</td>
                            <td><strong>3–0</strong></td>
                            <td>Messi (p), Julián Álvarez (2)</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-gold">FINAL</td>
                            <td><strong>🇦🇷 Argentina</strong> vs. Francia 🇫🇷</td>
                            <td class="fw-bold text-gold">3–3 (4–2 pen.)</td>
                            <td>Messi (2), Di María / Mbappé (3)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Balón de Oro: Lionel Messi • Bota de Oro: Kylian Mbappé (8) • Guante de Oro: Emiliano Martínez • Joven: Enzo Fernández.
                </p>
            </div>
        </div>

        {{-- 🌟 Homenaje al Campeón: Alineación de Argentina en la Final 2022 --}}
<div class="card border-3 shadow border-dark-subtle mb-5">
    <div class="card-header bg-success text-gold fw-bold fs-5 text-center font-elegant">
        🌟 Homenaje al Campeón: Alineación de Argentina en la Final 🌟
    </div>
    <div class="card-body p-4">
        <div class="row text-center font-elegant">
            @php
                $alineacion_argentina_22 = [
                    'Portero' => ['Emiliano “Dibu” Martínez'],
                    'Defensa' => ['Nahuel Molina', 'Cristian Romero', 'Nicolás Otamendi', 'Nicolás Tagliafico'],
                    'Mediocampo' => ['Rodrigo De Paul', 'Enzo Fernández', 'Alexis Mac Allister'],
                    'Ataque' => ['Lionel Messi (C)', 'Julián Álvarez', 'Ángel Di María']
                ];
            @endphp

            @foreach($alineacion_argentina_22 as $zona => $jugadores)
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
                    Cambios destacados: Leandro Paredes, Gonzalo Montiel (autor del penal decisivo), Lautaro Martínez.
                </p>
            </div>
        </div>
    </div>
</div>


        {{-- VOLVER / NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            {{-- IZQUIERDA → Volver a Rusia 2018 --}}
            <a href="{{ route('enciclopedia.show', ['mundial' => 21]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Volver a Rusia 2018</span>
            </a>

            {{-- DERECHA → Ir al Índice --}}
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Ir al Índice de Mundiales →</span>
            </a>
        </div>

    </div>

@endsection
