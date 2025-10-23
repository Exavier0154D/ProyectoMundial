@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema USA 94 — Navy / Red / White --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-usa-94" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta USA 94 */
            .mundial-usa-94{
                --color-principal:#0A3161;   /* Navy (bandera USA) */
                --color-secundario:#B31942;  /* Rojo bandera */
                --color-terciario:#FFFFFF;   /* Blanco */
                --color-texto:#000000;       /* Negro */
            }

            /* Botones / headers principales en NAVY */
            .mundial-usa-94 .bg-dark,
            .mundial-usa-94 .card-header.bg-dark,
            .mundial-usa-94 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en ROJO */
            .mundial-usa-94 .bg-success,
            .mundial-usa-94 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-terciario)!important;
            }

            /* 🔥 FIX encabezados de tabla: siempre visibles */
            .mundial-usa-94 table thead th{
                background-color:var(--color-principal)!important; /* navy */
                color:var(--color-terciario)!important;            /* blanco */
                opacity:1!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general en negro */
            .mundial-usa-94 p,
            .mundial-usa-94 li,
            .mundial-usa-94 td,
            .mundial-usa-94 small,
            .mundial-usa-94 .text-muted,
            .mundial-usa-94 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-usa-94 h1,
            .mundial-usa-94 .text-primary,
            .mundial-usa-94 .font-title{ color:var(--color-principal)!important; }
            .mundial-usa-94 .text-secondary,
            .mundial-usa-94 .text-success{ color:var(--color-secundario)!important; }

            /* Utilidades visuales */
            .mundial-usa-94 .bg-light-gray{ background:#f6f7f9; }
            .mundial-usa-94 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-usa-94 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#e9f0ff; border:1px solid #cfdffc; font-size:.85rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 14]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Italia 1990</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 16]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Francia 1998 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1994' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Estados Unidos' }} 🇺🇸</p>
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
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'BRASIL' }}</td>
                            <td>17 junio – 17 julio</td>
                            <td>24</td>
                            <td>52</td>
                            <td>141</td>
                            <td>Romário</td>
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
                        <span class="chip">Pasadena (Rose Bowl)</span>
                        <span class="chip">Los Ángeles / Stanford</span>
                        <span class="chip">Chicago (Soldier Field)</span>
                        <span class="chip">Dallas (Cotton Bowl)</span>
                        <span class="chip">Detroit (Silverdome, indoor)</span>
                        <span class="chip">Foxborough (Foxboro Stadium)</span>
                        <span class="chip">East Rutherford (Giants Stadium)</span>
                        <span class="chip">Orlando (Citrus Bowl)</span>
                        <span class="chip">Washington D.C. (RFK)</span>
                        <span class="chip">San Francisco Bay Area (Stanford)</span>
                    </p>
                    <p class="mb-0 small">La final se disputó en el <strong>Rose Bowl</strong> (Pasadena, California).</p>
                </div>
            </div>
        </div>

        {{-- 🐶 MASCOTA (Striker) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇺🇸 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Striker, the World Cup Pup</h4>
                <p class="text-dark">
                    Un perrito diseñado por los estudios de Warner Bros., con camiseta y shorts del equipo anfitrión.
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/striker_1994.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/striker_1994.jpg') }}"
                         alt="Striker - USA 1994"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
                <p class="text-secondary small mt-3 fst-italic">
                    USA 94 batió récords de asistencia y popularizó el fútbol en el mercado estadounidense.
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
                        <strong>Final inédita:</strong> primera definición del título por penales (Brasil 0–0 Italia; 3–2 en tanda).
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Sorpresas:</strong> Bulgaria semifinalista con un Hristo Stoichkov estelar; Suecia terminó 3.º.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas Questra</em>, con nueva espuma de poliuretano para mayor control y velocidad.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Expansión comercial:</strong> sedes gigantes, asistencia récord y TV global consolidada.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/1994_RoseBowl.jpg') }}"
                         alt="Rose Bowl, Pasadena (Final 1994)"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">El Rose Bowl, escenario de la final entre Brasil e Italia.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Questra
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Más blando y veloz, inspirado en la exploración espacial estadounidense.</p>
                <img src="{{ asset('img/adidas_questra_1994.jpg') }}"
                     alt="Adidas Questra 1994"
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
                        {{-- Grupo B --}}
                        <tr>
                            <td>Grupo B</td>
                            <td>Brasil vs. Rusia</td>
                            <td><strong>2–0</strong></td>
                            <td>Romário, Raí (p)</td>
                        </tr>
                        <tr>
                            <td>Grupo B</td>
                            <td>Brasil vs. Camerún</td>
                            <td><strong>3–0</strong></td>
                            <td>Romário, Márcio Santos, Bebeto</td>
                        </tr>
                        <tr>
                            <td>Grupo B</td>
                            <td>Brasil vs. Suecia</td>
                            <td>1–1</td>
                            <td>Romário</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Brasil vs. Estados Unidos</td>
                            <td><strong>1–0</strong></td>
                            <td>Bebeto</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Brasil vs. Países Bajos</td>
                            <td><strong>3–2</strong></td>
                            <td>Romário, Bebeto, Branco</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Brasil vs. Suecia</td>
                            <td><strong>1–0</strong></td>
                            <td>Romário</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td><strong>🇧🇷 Brasil</strong> vs. Italia 🇮🇹</td>
                            <td class="fw-bold text-success"><strong>0–0</strong> (3–2 pen)</td>
                            <td>—</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Balón de Oro: Romário • Bota de Oro: Hristo Stoichkov & Oleg Salenko (6) • Guante: Michel Preud’homme.
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
                        $alineacion_brasil_94 = [
                            'Portero' => 'Cláudio Taffarel',
                            'Defensa' => ['Jorginho', 'Aldair', 'Márcio Santos', 'Branco'],
                            'Mediocampo' => ['Dunga (C)', 'Mauro Silva', 'Mazinho'],
                            'Delantera' => ['Bebeto', 'Romário', 'Zinho'],
                            'Entrenador' => 'Carlos Alberto Parreira',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_brasil_94['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_brasil_94['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_brasil_94['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_brasil_94['Delantera'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_brasil_94['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 14]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Italia 1990</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 16]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Francia 1998 →</span>
            </a>
        </div>
        
    </div>
@endsection

