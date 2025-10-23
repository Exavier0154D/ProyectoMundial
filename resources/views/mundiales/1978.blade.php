@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema Argentina 78 — Celeste/Amarillo, texto negro --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-argentina-78" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta de Argentina 78 */
            .mundial-argentina-78{
                --color-principal:#6CACE4;   /* Celeste */
                --color-secundario:#FFC72C;  /* Amarillo/Oro */
                --color-terciario:#FFFFFF;   /* Blanco */
                --color-texto:#000000;       /* Negro para legibilidad */
                --color-rojo:#A00000;        /* Rojo para alertas */
            }

            /* Botones / headers en CELESTE */
            .mundial-argentina-78 .bg-dark,
            .mundial-argentina-78 .card-header.bg-dark,
            .mundial-argentina-78 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en AMARILLO */
            .mundial-argentina-78 .bg-success,
            .mundial-argentina-78 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:#1e1e1e!important;
            }

            /* Encabezados de tabla (usamos .table-dark en algunas) */
            .mundial-argentina-78 .table-dark,
            .mundial-argentina-78 .table-dark thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }
            /* Cuando el <thead> no lleva .table-dark, aseguramos contraste */
            .mundial-argentina-78 table thead{
                background-color:var(--color-principal)!important;
            }
            .mundial-argentina-78 table thead th{
                color:var(--color-terciario)!important;
                font-weight:700;
            }

            /* Texto general en negro */
            .mundial-argentina-78 p,
            .mundial-argentina-78 li,
            .mundial-argentina-78 td,
            .mundial-argentina-78 small,
            .mundial-argentina-78 .text-muted,
            .mundial-argentina-78 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-argentina-78 h1,
            .mundial-argentina-78 .text-primary,
            .mundial-argentina-78 .font-title{ color:var(--color-principal)!important; }
            .mundial-argentina-78 .text-secondary,
            .mundial-argentina-78 .text-success{ color:var(--color-secundario)!important; }

            .mundial-argentina-78 .text-danger{ color:var(--color-rojo)!important; }

            /* Utilidades visuales */
            .mundial-argentina-78 .bg-light-gray{ background:#f6f7f9; }
            .mundial-argentina-78 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-argentina-78 .chip{
                display:inline-block; padding:.25rem .5rem; border-radius:999px;
                background:#eef6ff; border:1px solid #d9eaff; font-size:.85rem;
            }
        </style>

        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 10]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Alemania Federal 1974</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 12]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: España 1982 →</span>
            </a>
        </div>

        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1978' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Argentina' }} 🇦🇷</p>
        </header>

        <div class="divider-classic mb-5"></div>

        {{-- DATOS CLAVE --}}
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
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ARGENTINA' }}</td>
                            <td>1–25 de junio</td>
                            <td>16</td>
                            <td>38</td>
                            <td>102</td>
                            <td>Mario Kempes</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede:</p>
                    <p class="mb-2 small">
                        <span class="chip">Buenos Aires (Monumental, José Amalfitani)</span>
                        <span class="chip">Córdoba (Chateau Carreras)</span>
                        <span class="chip">Mendoza (Malvinas Argentinas)</span>
                        <span class="chip">Rosario (Gigante de Arroyito)</span>
                        <span class="chip">Mar del Plata (José María Minella)</span>
                    </p>
                    <p class="mb-0 small">La final se jugó en el <strong>Estadio Monumental</strong> de Buenos Aires.</p>
                </div>
            </div>
        </div>

        {{-- 🧢 MASCOTA --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇦🇷 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Gauchito Mundialito</h4>
                <p class="text-dark">
                    Un niño con camiseta albiceleste, sombrero, pañuelo y látigo: una versión infantil del gaucho, símbolo popular argentino.
                </p>
                <div class="text-center mt-3">
                    {{-- Coloca tu imagen en public/img/mascotas/gauchito_1978.png --}}
                    <img src="{{ asset('img/gauchito_1978.png') }}"
                         alt="Gauchito Mundialito - Argentina 1978"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 280px;">
                </div>
                <p class="text-danger small mt-3 fst-italic">
                    El torneo estuvo atravesado por el contexto de la dictadura militar, lo que generó protestas y debates internacionales.
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
                        <strong>Balón oficial:</strong> <em>Adidas Tango</em>, diseño icónico de 32 paneles con triadas que marcó la estética de los siguientes mundiales.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Formato:</strong> Dos fases de grupos y luego final; no hubo semifinales tradicionales.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Figura:</strong> <em>Mario Kempes</em> (Bota de Oro y Balón de Oro del torneo) decisivo con 2 goles en la final.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Debuts:</strong> Irán y Túnez. Este último logró la primera victoria de una selección africana en un Mundial (3–1 a México).
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    {{-- Coloca una foto del Monumental --}}
                    <img src="{{ asset('img/1978_Monumental.jpg') }}"
                         alt="Estadio Monumental, final de 1978"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">El Monumental de Núñez, sede del partido final.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Tango
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">
                    Su diseño revolucionario se convirtió en un estándar visual del fútbol por más de una década.
                </p>
                <img src="{{ asset('img/adidas_tango_1978.jpg') }}"
                     alt="Adidas Tango 1978"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (ARGENTINA) --}}
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
                        <tr>
                            <td>Grupo 1</td>
                            <td>Argentina vs. Hungría</td>
                            <td><strong>2–1</strong></td>
                            <td>Luque, Bertoni</td>
                        </tr>
                        <tr>
                            <td>Grupo 1</td>
                            <td>Argentina vs. Francia</td>
                            <td><strong>2–1</strong></td>
                            <td>Passarella (p), Luque</td>
                        </tr>
                        <tr>
                            <td>Grupo 1</td>
                            <td>Argentina vs. Italia</td>
                            <td>0–1</td>
                            <td>—</td>
                        </tr>
                        <tr>
                            <td>Segunda Fase</td>
                            <td>Argentina vs. Polonia</td>
                            <td><strong>2–0</strong></td>
                            <td>Kempes (2)</td>
                        </tr>
                        <tr>
                            <td>Segunda Fase</td>
                            <td>Argentina vs. Brasil</td>
                            <td>0–0</td>
                            <td>—</td>
                        </tr>
                        <tr>
                            <td>Segunda Fase</td>
                            <td>Argentina vs. Perú</td>
                            <td><strong>6–0</strong></td>
                            <td>Kempes (2), Tarantini, Luque (2), Houseman</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td><strong>🇦🇷 Argentina</strong> vs. Países Bajos 🇳🇱</td>
                            <td class="fw-bold text-success"><strong>3–1</strong> (T.E.)</td>
                            <td>Kempes (2), Bertoni</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Kempes terminó como máximo artillero (6) y Balón de Oro del torneo.
                </p>
            </div>
        </div>

        {{-- PREMIOS Y FIGURAS --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success fw-bold fs-5 text-center font-elegant">
                🥇 Premios y Figuras
            </div>
            <div class="card-body p-4">
                <div class="row font-elegant">
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-2">Premios Individuales</p>
                        <ul class="mb-0 small">
                            <li><strong>Balón de Oro:</strong> Mario Kempes (ARG)</li>
                            <li><strong>Bota de Oro:</strong> Mario Kempes (6)</li>
                            <li><strong>Guante:</strong> Ubaldo Fillol (mención destacada)</li>
                            <li><strong>Jugador Joven:</strong> Antonio Cabrini (ITA)</li>
                        </ul>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-2">Otras Figuras</p>
                        <ul class="mb-0 small">
                            <li>Rob Rensenbrink (NED) — poste al 90’ en la final</li>
                            <li>Dirceu (BRA), Teófilo Cubillas (PER)</li>
                            <li>Daniel Passarella, Leopoldo Luque (ARG)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 10]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Alemania Federal 1974</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 12]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: España 1982 →</span>
            </a>
        </div>

    </div>
@endsection
