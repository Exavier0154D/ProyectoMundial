@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema México 86 — Verde Oscuro / Rojo Vibrante (legible y coherente con 1970) --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-mexico-86" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta México (86 y 70) */
            .mundial-mexico-86{
                --color-principal:#006847; /* Verde Oscuro */
                --color-secundario:#CE1126; /* Rojo Vibrante */
                --color-terciario:#FFFFFF; /* Blanco */
                --color-texto:#000000;      /* Negro para máxima legibilidad */
            }

            /* Botones / headers principales en VERDE */
            .mundial-mexico-86 .bg-dark,
            .mundial-mexico-86 .card-header.bg-dark,
            .mundial-mexico-86 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en ROJO */
            .mundial-mexico-86 .bg-success,
            .mundial-mexico-86 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-terciario)!important;
            }

            /* 🔥 FIX encabezados de tabla: SIEMPRE visibles */
            .mundial-mexico-86 table thead th{
                background-color:var(--color-principal)!important; /* verde sólido */
                color:var(--color-terciario)!important;            /* blanco */
                opacity:1!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general en negro */
            .mundial-mexico-86 p,
            .mundial-mexico-86 li,
            .mundial-mexico-86 td,
            .mundial-mexico-86 small,
            .mundial-mexico-86 .text-muted,
            .mundial-mexico-86 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-mexico-86 h1,
            .mundial-mexico-86 .text-primary,
            .mundial-mexico-86 .font-title{ color:var(--color-principal)!important; }
            .mundial-mexico-86 .text-secondary,
            .mundial-mexico-86 .text-success{ color:var(--color-secundario)!important; }

            /* Utilidades */
            .mundial-mexico-86 .bg-light-gray{ background:#f6f7f9; }
            .mundial-mexico-86 .themed-img{
                border:3px solid var(--color-principal); border-radius:.75rem;
            }
            .mundial-mexico-86 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#eef9f1; border:1px solid #cfead5; font-size:.85rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 12]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: España 1982</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 14]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Italia 1990 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1986' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'México' }} 🇲🇽</p>
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
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'ARGENTINA' }}</td>
                            <td>31 mayo – 29 junio</td>
                            <td>24</td>
                            <td>52</td>
                            <td>132</td>
                            <td>Diego Maradona</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SEDES --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede (principales):</p>
                    <p class="mb-2 small">
                        <span class="chip">Ciudad de México (Azteca, Olímpico)</span>
                        <span class="chip">Guadalajara (Jalisco, Tres de Marzo)</span>
                        <span class="chip">Monterrey (Tecnológico, Universitario)</span>
                        <span class="chip">Puebla</span>
                        <span class="chip">León</span>
                        <span class="chip">Toluca</span>
                        <span class="chip">Querétaro</span>
                        <span class="chip">Nezahualcóyotl</span>
                        <span class="chip">Irapuato</span>
                    </p>
                    <p class="mb-0 small">La final se jugó en el <strong>Estadio Azteca</strong> (CDMX).</p>
                </div>
            </div>
        </div>

        {{-- 🌶️ MASCOTA --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇲🇽 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Pique</h4>
                <p class="text-dark">Un chile jalapeño con sombrero de charro y bigote: identidad, picante y folklore mexicano.</p>

                {{-- Coloca tu imagen en public/img/mascotas/pique_1986.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/pique_1986.png') }}"
                         alt="Pique - México 1986"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 280px;">
                </div>

                <p class="text-primary small mt-3 fst-italic">Segundo Mundial en México; reemplazó a Colombia como sede.</p>
            </div>
        </div>

        {{-- HECHOS Y NOVEDADES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: La Mano de Dios y el Gol del Siglo
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Mitología de Maradona:</strong> en 5 minutos ante Inglaterra marcó “La Mano de Dios” y el “Gol del Siglo”.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Contexto:</strong> Torneo posterior al terremoto de 1985; calendario y logística ajustados.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Formato:</strong> 24 equipos, 16 a octavos incluyendo mejores terceros; eliminación directa hasta la final.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas Azteca</em>, primer balón sintético 100% con diseño inspirado en la cultura mexica.
                    </li>
                </ul>
                
                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/1986_Maradona_Azteca.jpg') }}"
                         alt="Maradona levantando la Copa en el Azteca"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">Diego Maradona alzando la Copa del Mundo en el Estadio Azteca.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Azteca
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Pionero por sus materiales compuestos; mejor desempeño en altura y climas secos.</p>
                <img src="{{ asset('img/adidas_azteca_1986.png') }}"
                     alt="Adidas Azteca 1986"
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
                        {{-- Grupo A --}}
                        <tr>
                            <td>Grupo A</td>
                            <td>Argentina vs. Corea del Sur</td>
                            <td><strong>3–1</strong></td>
                            <td>Valdano (2), Ruggieri</td>
                        </tr>
                        <tr>
                            <td>Grupo A</td>
                            <td>Argentina vs. Italia</td>
                            <td>1–1</td>
                            <td>Maradona</td>
                        </tr>
                        <tr>
                            <td>Grupo A</td>
                            <td>Argentina vs. Bulgaria</td>
                            <td><strong>2–0</strong></td>
                            <td>Valdano, Burruchaga</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Argentina vs. Uruguay</td>
                            <td><strong>1–0</strong></td>
                            <td>Pedro Pasculli</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Argentina vs. Inglaterra</td>
                            <td><strong>2–1</strong></td>
                            <td>Maradona (2)</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Argentina vs. Bélgica</td>
                            <td><strong>2–0</strong></td>
                            <td>Maradona (2)</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td><strong>🇦🇷 Argentina</strong> vs. Alemania Federal 🇩🇪</td>
                            <td class="fw-bold text-success"><strong>3–2</strong></td>
                            <td>Brown, Valdano, Burruchaga</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">Bota de Oro: Gary Lineker (6) • Balón de Oro: Diego Maradona.</p>
            </div>
        </div>
        
        {{-- 🏆 Homenaje: Alineación del Campeón --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Argentina en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_argentina_86 = [
                            'Portero' => 'Nery Pumpido',
                            'Defensa' => ['José Luis Brown', 'Oscar Ruggeri', 'José Luis Cuciuffo'],
                            'Mediocampo' => ['Ricardo Giusti', 'Sergio Batista', 'Héctor Enrique', 'Julio Olarticoechea'],
                            'Delantera' => ['Jorge Burruchaga', 'Diego Maradona (C)', 'Jorge Valdano'],
                            'Entrenador' => 'Carlos Salvador Bilardo',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_argentina_86['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_argentina_86['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_argentina_86['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_argentina_86['Delantera'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_argentina_86['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 12]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: España 1982</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 14]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Italia 1990 →</span>
            </a>
        </div>
        
    </div>
@endsection
