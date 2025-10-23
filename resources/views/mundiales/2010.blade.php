@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema Sudáfrica 2010 — Verde / Dorado / Negro (anfitrión) --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-sudafrica-10" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta Sudáfrica 2010 */
            .mundial-sudafrica-10{
                --color-principal:#007A4D;   /* Verde bandera de Sudáfrica */
                --color-secundario:#FFB81C;  /* Dorado/amarillo cálido africano */
                --color-acento:#000000;      /* Negro (contraste) */
                --color-terciario:#FFFFFF;   /* Blanco */
                --color-texto:#111111;       /* Texto principal en negro */
            }

            /* Botones / headers principales en VERDE */
            .mundial-sudafrica-10 .bg-dark,
            .mundial-sudafrica-10 .card-header.bg-dark,
            .mundial-sudafrica-10 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en DORADO */
            .mundial-sudafrica-10 .bg-success,
            .mundial-sudafrica-10 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-acento)!important;
            }

            /* 🔥 Encabezados de tabla: siempre visibles */
            .mundial-sudafrica-10 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general */
            .mundial-sudafrica-10 p,
            .mundial-sudafrica-10 li,
            .mundial-sudafrica-10 td,
            .mundial-sudafrica-10 small,
            .mundial-sudafrica-10 .text-muted,
            .mundial-sudafrica-10 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-sudafrica-10 h1,
            .mundial-sudafrica-10 .text-primary,
            .mundial-sudafrica-10 .font-title{ color:var(--color-principal)!important; }
            .mundial-sudafrica-10 .text-secondary,
            .mundial-sudafrica-10 .text-success{ color:var(--color-secundario)!important; }
            .mundial-sudafrica-10 .text-accent{ color:var(--color-acento)!important; }

            /* Utilidades visuales */
            .mundial-sudafrica-10 .bg-light-gray{ background:#f6f7f9; }
            .mundial-sudafrica-10 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-sudafrica-10 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#fff5df; border:1px solid #ffe1a6; font-size:.85rem;
            }

            /* Divisor fino */
            .mundial-sudafrica-10 .divider-classic{
                height: 4px;
                width: 120px;
                margin: 0 auto;
                background: linear-gradient(90deg, var(--color-principal), var(--color-secundario));
                border-radius: 999px;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
                <div class="mt-5 d-flex justify-content-between">
    <a href="{{ route('enciclopedia.show', ['mundial' => 18]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
        <span class="fs-6">← Anterior: Alemania 2006</span>
    </a>
    <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
        <span class="fs-6">Índice de Mundiales</span>
    </a>
    <a href="{{ route('enciclopedia.show', ['mundial' => 20]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
        <span class="fs-6">Siguiente: Brasil 2014 →</span>
    </a>
</div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '2010' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Sudáfrica' }} 🇿🇦</p>
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
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ESPAÑA' }}</td>
                            <td>11 junio – 11 julio</td>
                            <td>32</td>
                            <td>64</td>
                            <td>145</td>
                            <td>Diego Forlán (URU)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center small text-muted mb-0">
                    Bota de Oro: Thomas Müller (5) • Guante de Oro: Iker Casillas • Balón oficial: Adidas Jabulani
                </p>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede (10):</p>
                    <p class="mb-2 small">
                        <span class="chip">Johannesburgo (Soccer City / Ellis Park)</span>
                        <span class="chip">Ciudad del Cabo (Green Point)</span>
                        <span class="chip">Durban (Moses Mabhida)</span>
                        <span class="chip">Pretoria (Loftus Versfeld)</span>
                        <span class="chip">Port Elizabeth (Nelson Mandela Bay)</span>
                        <span class="chip">Bloemfontein (Free State)</span>
                        <span class="chip">Nelspruit (Mbombela)</span>
                        <span class="chip">Polokwane (Peter Mokaba)</span>
                        <span class="chip">Rustenburg (Royal Bafokeng)</span>
                    </p>
                    <p class="mb-0 small">La final se jugó en <strong>Soccer City</strong> (Johannesburgo).</p>
                </div>
            </div>
        </div>

        {{-- 🐆 MASCOTA (Zakumi) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇿🇦 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Zakumi</h4>
                <p class="text-dark">
                    Un leopardo de pelo verde (por el césped) y camiseta dorada; su nombre mezcla “ZA” (Sudáfrica) y “kumi” (diez).
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/zakumi_2010.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/zakumi_2010.jpg') }}"
                         alt="Zakumi — Sudáfrica 2010"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
                <p class="text-secondary small mt-3 fst-italic">
                    Primer Mundial organizado en África; ambiente marcado por las vuvuzelas y una identidad sonora única.
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
                        <strong>Tiki-taka al trono:</strong> España ganó sus cuatro cruces por <em>1–0</em>, imponiendo posesión y control.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Paul el pulpo:</strong> el famoso cefalópodo “adivinó” resultados de Alemania con gran acierto mediático.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas Jabulani</em>, muy liviano y con costuras termoselladas; generó debate por sus trayectorias.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Revelaciones:</strong> Uruguay de Forlán llegó a semifinales; Alemania joven brilló con Müller, Özil y Khedira.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/2010_SoccerCity_Final.jpg') }}"
                         alt="Soccer City, Johannesburgo (Final 2010)"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">Soccer City (FNB Stadium), donde España conquistó su primera estrella.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-accent fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Jabulani
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Paneles esféricos termosellados, superficie “Grip’n’Groove” y baja absorción de agua.</p>
                <img src="{{ asset('img/adidas_jabulani_2010.png') }}"
                     alt="Adidas Jabulani 2010"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (ESPAÑA) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — España
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
                        {{-- Grupo H --}}
                        <tr>
                            <td>Grupo H</td>
                            <td>España vs. Suiza</td>
                            <td>0–1</td>
                            <td>—</td>
                        </tr>
                        <tr>
                            <td>Grupo H</td>
                            <td>España vs. Honduras</td>
                            <td><strong>2–0</strong></td>
                            <td>David Villa (2)</td>
                        </tr>
                        <tr>
                            <td>Grupo H</td>
                            <td>Chile vs. España</td>
                            <td><strong>1–2</strong></td>
                            <td>Villa, Iniesta</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>España vs. Portugal</td>
                            <td><strong>1–0</strong></td>
                            <td>David Villa</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>España vs. Paraguay</td>
                            <td><strong>1–0</strong></td>
                            <td>David Villa</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>España vs. Alemania</td>
                            <td><strong>1–0</strong></td>
                            <td>Carles Puyol</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-accent">FINAL</td>
                            <td><strong>🇪🇸 España</strong> vs. Países Bajos 🇳🇱</td>
                            <td class="fw-bold text-success"><strong>1–0</strong> (t.e.)</td>
                            <td>Andrés Iniesta 116’</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Balón de Oro del torneo: Diego Forlán • Bota de Oro: Thomas Müller (5) • Guante: Iker Casillas.
                </p>
            </div>
        </div>

        {{-- 🏆 Homenaje: Alineación del Campeón --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-accent fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de España en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_espana_10 = [
                            'Portero' => ['Iker Casillas (C)'],
                            'Defensa' => ['Sergio Ramos', 'Gerard Piqué', 'Carles Puyol', 'Joan Capdevila'],
                            'Mediocampo' => ['Sergio Busquets', 'Xabi Alonso', 'Xavi Hernández', 'Andrés Iniesta'],
                            'Ataque' => ['Pedro Rodríguez', 'David Villa']
                        ];
                    @endphp

                    @foreach($alineacion_espana_10 as $zona => $jugadores)
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
                            Cambios destacados: Jesús Navas, Cesc Fàbregas, Fernando Torres.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- VOLVER --}}
        <div class="text-center">
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                ← Volver al listado
            </a>
        </div>
                <div class="mt-5 d-flex justify-content-between">
    <a href="{{ route('enciclopedia.show', ['mundial' => 18]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
        <span class="fs-6">← Anterior: Alemania 2006</span>
    </a>
    <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
        <span class="fs-6">Índice de Mundiales</span>
    </a>
    <a href="{{ route('enciclopedia.show', ['mundial' => 20]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
        <span class="fs-6">Siguiente: Brasil 2014 →</span>
    </a>
</div>

    </div>

@endsection

