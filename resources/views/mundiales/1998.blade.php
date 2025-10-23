@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Tema Francia 98 — Bleu / Blanc / Rouge --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-francia-98" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Paleta Francia 98 */
            .mundial-francia-98{
                --color-principal:#002654;   /* Bleu (azul bandera) */
                --color-secundario:#EF4135;  /* Rouge (rojo bandera) */
                --color-terciario:#FFFFFF;   /* Blanc (blanco) */
                --color-texto:#000000;       /* Negro para legibilidad */
            }

            /* Botones / headers principales en BLEU */
            .mundial-francia-98 .bg-dark,
            .mundial-francia-98 .card-header.bg-dark,
            .mundial-francia-98 .btn-dark{
                background-color:var(--color-principal)!important;
                border-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
            }

            /* Headers secundarios en ROUGE */
            .mundial-francia-98 .bg-success,
            .mundial-francia-98 .card-header.bg-success{
                background-color:var(--color-secundario)!important;
                color:var(--color-terciario)!important;
            }

            /* 🔥 FIX encabezados de tabla: siempre visibles */
            .mundial-francia-98 table thead th{
                background-color:var(--color-principal)!important;
                color:var(--color-terciario)!important;
                opacity:1!important;
                font-weight:700!important;
                border-color:var(--color-principal)!important;
                text-shadow:0 1px 0 rgba(0,0,0,.15);
            }

            /* Texto general en negro */
            .mundial-francia-98 p,
            .mundial-francia-98 li,
            .mundial-francia-98 td,
            .mundial-francia-98 small,
            .mundial-francia-98 .text-muted,
            .mundial-francia-98 .fw-bold{
                color:var(--color-texto)!important;
            }

            /* Títulos/acentos */
            .mundial-francia-98 h1,
            .mundial-francia-98 .text-primary,
            .mundial-francia-98 .font-title{ color:var(--color-principal)!important; }
            .mundial-francia-98 .text-secondary,
            .mundial-francia-98 .text-success{ color:var(--color-secundario)!important; }

            /* Utilidades visuales */
            .mundial-francia-98 .bg-light-gray{ background:#f6f7f9; }
            .mundial-francia-98 .themed-img{ border:3px solid var(--color-principal); border-radius:.75rem; }
            .mundial-francia-98 .chip{
                display:inline-block; padding:.25rem .55rem; border-radius:999px;
                background:#e7eef9; border:1px solid #cfdaf0; font-size:.85rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 16]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Estados Unidos 1994</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 18]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Corea/Japón 2002 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1998' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Francia' }} 🇫🇷</p>
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
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'FRANCIA' }}</td>
                            <td>10 junio – 12 julio</td>
                            <td>32</td>
                            <td>64</td>
                            <td>171</td>
                            <td>Ronaldo (BRA)</td>
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
                        <span class="chip">Saint-Denis (Stade de France)</span>
                        <span class="chip">París (Parc des Princes)</span>
                        <span class="chip">Marsella (Vélodrome)</span>
                        <span class="chip">Lyon (Gerland)</span>
                        <span class="chip">Toulouse</span>
                        <span class="chip">Bordeaux (Lescure)</span>
                        <span class="chip">Nantes (La Beaujoire)</span>
                        <span class="chip">Lens (Bollaert)</span>
                        <span class="chip">Montpellier (La Mosson)</span>
                        <span class="chip">Saint-Étienne (Geoffroy-Guichard)</span>
                        <span class="chip">Strasbourg</span>
                    </p>
                    <p class="mb-0 small">La final se jugó en el <strong>Stade de France</strong> (Saint-Denis, París).</p>
                </div>
            </div>
        </div>

        {{-- 🐓 MASCOTA (Footix) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇫🇷 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Footix</h4>
                <p class="text-dark">
                    Un gallo azul con cresta roja y camiseta amarilla: símbolo nacional francés llevado al terreno futbolero.
                </p>
                {{-- Coloca tu imagen en public/img/mascotas/footix_1998.png --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/footix_1998.png') }}"
                         alt="Footix - Francia 1998"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 260px;">
                </div>
                <p class="text-secondary small mt-3 fst-italic">
                    Francia 98 estrenó el formato de <strong>32 selecciones</strong> y elevó el listón organizativo y televisivo.
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
                        <strong>Expansión:</strong> primera Copa con <em>32 equipos</em>, 8 grupos de 4; clasificación de 2 por grupo a octavos.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Estrellas:</strong> Zinedine Zidane se consagra en la final; Davor Šuker gana la Bota de Oro (6).
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Revelación:</strong> Croacia termina <em>tercera</em> en su primer Mundial como nación independiente.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas Tricolore</em>, primer balón multicolor de la historia del torneo.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    <img src="{{ asset('img/1998_StadeDeFrance.png') }}"
                         alt="Stade de France, Saint-Denis (Final 1998)"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">El Stade de France, inaugurado para el torneo, fue sede de la final.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Tricolore
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">Inspirado en el gallo galo y la bandera francesa; más ligero y con mejor respuesta en superficies húmedas.</p>
                <img src="{{ asset('img/adidas_tricolore_1998.jpg') }}"
                     alt="Adidas Tricolore 1998"
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
                        {{-- Grupo C --}}
                        <tr>
                            <td>Grupo C</td>
                            <td>Francia vs. Sudáfrica</td>
                            <td><strong>3–0</strong></td>
                            <td>Dugarry, (autogol), Diomède</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Francia vs. Arabia Saudita</td>
                            <td><strong>4–0</strong></td>
                            <td>Henry (2), Trésoré? → Henry, Trezeguet, Lizarazu</td>
                        </tr>
                        <tr>
                            <td>Grupo C</td>
                            <td>Dinamarca vs. Francia</td>
                            <td><strong>1–2</strong></td>
                            <td>Djorkaeff (p), Petit</td>
                        </tr>
                        {{-- Eliminación directa --}}
                        <tr>
                            <td>Octavos</td>
                            <td>Francia vs. Paraguay</td>
                            <td><strong>1–0</strong> (Gol de oro)</td>
                            <td>Laurent Blanc</td>
                        </tr>
                        <tr>
                            <td>Cuartos</td>
                            <td>Francia vs. Italia</td>
                            <td>0–0 (4–3 pen)</td>
                            <td>—</td>
                        </tr>
                        <tr>
                            <td>Semifinal</td>
                            <td>Francia vs. Croacia</td>
                            <td><strong>2–1</strong></td>
                            <td>Lilian Thuram (2)</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td><strong>🇫🇷 Francia</strong> vs. Brasil 🇧🇷</td>
                            <td class="fw-bold text-success"><strong>3–0</strong></td>
                            <td>Zidane (2), Petit</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Bota de Oro: Davor Šuker (6) • Guante: Fabien Barthez • Balón de Oro del torneo: Ronaldo.
                </p>
            </div>
        </div>

        {{-- 🏆 Homenaje: Alineación del Campeón --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Francia en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_francia_98 = [
                            'Portero' => 'Fabien Barthez',
                            'Defensa' => ['Lilian Thuram', 'Marcel Desailly', 'Frank Leboeuf', 'Bixente Lizarazu'],
                            'Mediocampo' => ['Didier Deschamps (C)', 'Emmanuel Petit', 'Christian Karembeu', 'Zinedine Zidane'],
                            'Delantera' => ['Stéphane Guivarc’h', 'Youri Djorkaeff'],
                            'Entrenador' => 'Aimé Jacquet',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_francia_98['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_francia_98['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_francia_98['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_francia_98['Delantera'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_francia_98['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 16]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Estados Unidos 1994</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 18]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Corea/Japón 2002 →</span>
            </a>
        </div>
        
    </div>
@endsection
