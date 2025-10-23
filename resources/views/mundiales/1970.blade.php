@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Verde Oscuro / Rojo Vibrante --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-mexico-70" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de México: Verde Oscuro (principal), Rojo (secundario) */
            .mundial-mexico-70 {
                --color-principal: #006847; /* Verde Oscuro (Base) */
                --color-secundario: #CE1126; /* Rojo Vibrante Mexicano */
                --color-terciario: #FFFFFF;  /* Blanco */
            }

            /* 1) Botones y headers de tarjeta en VERDE (antes bg-dark de Bootstrap) */
            .mundial-mexico-70 .bg-dark,
            .mundial-mexico-70 .card-header.bg-dark,
            .mundial-mexico-70 .btn-dark {
                background-color: var(--color-principal) !important;
                border-color: var(--color-principal) !important;
                color: var(--color-terciario) !important;
            }

            /* 2) Headers de tarjeta en ROJO (bg-success repurposed) */
            .mundial-mexico-70 .bg-success,
            .mundial-mexico-70 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: var(--color-terciario) !important;
            }

            /* 3) CABECERA de la tabla de "Datos Clave": fondo blanco, texto verde */
            .mundial-mexico-70 table thead {
                background-color: var(--color-terciario) !important; /* Blanco */
                border-color: var(--color-principal) !important;    /* Borde verde */
            }
            .mundial-mexico-70 table thead th {
                color: var(--color-principal) !important;           /* Verde Oscuro */
                background-color: transparent !important;
                font-weight: 700;
            }

            /* 4) Texto general: NEGRO absoluto para máxima legibilidad */
            .mundial-mexico-70 p,
            .mundial-mexico-70 li,
            .mundial-mexico-70 table td,
            .mundial-mexico-70 .card-body p,
            .mundial-mexico-70 .fw-bold,
            .mundial-mexico-70 small,
            .mundial-mexico-70 .text-muted {
                color: #000 !important;
            }

            /* 5) Colores de títulos y acentos */
            .mundial-mexico-70 h1,
            .mundial-mexico-70 .text-primary,
            .mundial-mexico-70 .font-title {
                color: var(--color-principal) !important; /* Verde Oscuro */
            }
            .mundial-mexico-70 .text-secondary,
            .mundial-mexico-70 .text-success,
            .mundial-mexico-70 .fw-bold.text-success {
                color: var(--color-secundario) !important; /* Rojo Vibrante */
            }

            /* 6) Tablas con .table-dark (usadas en “Resultados Finales”): forzar verde + texto blanco */
            .mundial-mexico-70 .table-dark,
            .mundial-mexico-70 .table-dark thead th {
                background-color: var(--color-principal) !important;
                color: var(--color-terciario) !important;
            }

            /* Opcional: borde temático para imágenes destacadas */
            .mundial-mexico-70 .themed-img {
                border: 3px solid var(--color-principal);
                border-radius: 0.75rem;
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 8]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Inglaterra 1966</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 10]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Alemania Federal 1974 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1970' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'México' }} 🇲🇽</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    <thead>
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Campeón: Rojo Vibrante --}}
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'BRASIL' }}</td>
                            <td>31 de mayo al 21 de junio</td> 
                            <td>16</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SECCIÓN CIUDADES SEDE --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-1 text-primary">Ciudades Sede:</p>
                    <p class="mb-0 small">
                        Ciudad de México, Guadalajara, León, Puebla, Toluca (5 ciudades).
                    </p>
                </div>
            </div>
        </div>
        
        {{-- 🚩 SELECCIONES CLASIFICADAS --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🌍 Selecciones Participantes (16)
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">Anfitrión/Campeón Defensor:</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇲🇽 México</li>
                            <li>🏴 Inglaterra</li>
                        </ul>
                        <p class="fw-bold text-primary mt-3 mb-1">África/Asia:</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇲🇦 Marruecos (Debut)</li>
                            <li>🇮🇱 Israel (Debut)</li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">Europa (UEFA):</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇩🇪 Alemania Federal</li>
                            <li>🇧🇪 Bélgica</li>
                            <li>🇧🇬 Bulgaria</li>
                            <li>🇨🇿 Checoslovaquia</li>
                            <li>🇮🇹 Italia</li>
                            <li>🇷🇴 Rumania</li>
                            <li>🇸🇪 Suecia</li>
                            <li>🇷🇺 URSS</li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">América (CONMEBOL/CONCACAF):</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇧🇷 Brasil</li>
                            <li>🇵🇪 Perú</li>
                            <li>🇺🇾 Uruguay</li>
                            <li>🇸🇻 El Salvador</li>
                        </ul>
                    </div>
                </div>
                <p class="text-center mt-3 small fst-italic">
                    Fue el primer Mundial sin el campeón defensor como clasificado automático.
                </p>
            </div>
        </div>

        {{-- 🧒🏻 SECCIÓN MASCOTA (Juanito) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇲🇽 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Juanito</h4>
                <p class="text-dark">Un niño con el uniforme mexicano y un sombrero tradicional. Fue la primera mascota de un Mundial celebrado en México y la segunda oficial en la historia.</p>

                {{-- Imagen real de Juanito (cambia la ruta si usas otro nombre de archivo) --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/juanito_1970.jpg') }}"
                         alt="Juanito - México 1970"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 280px;">
                </div>

                <p class="text-primary small mt-3 fst-italic">¡Representando la alegría y la juventud de la afición mexicana!</p>
            </div>
        </div>

        {{-- SECCIÓN IMAGEN Y HECHOS NOTABLES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: El Mundial a Color
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>Este torneo es recordado como una celebración del fútbol ofensivo y el primer Mundial transmitido a color a todo el planeta.</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0"><strong>La Canarinha Inmortal:</strong> La selección brasileña de 1970, liderada por Pelé, Jairzinho y Rivelino, es considerada por muchos la mejor de la historia.</li>
                    <li class="list-group-item bg-light-gray border-0"><strong>Tarjeta Amarilla/Roja:</strong> Se introdujeron por primera vez en la historia de los Mundiales las tarjetas para sancionar a los jugadores.</li>
                    <li class="list-group-item bg-light-gray border-0"><strong>Trofeo Jules Rimet:</strong> Brasil se convirtió en tricampeón (1958, 1962, 1970) y se adjudicó la copa permanentemente.</li>
                </ul>
                
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1970_Azteca.png') }}" alt="Estadio Azteca" class="img-fluid" style="max-height: 350px;">
                    <p class="mt-2 small font-elegant">Estadio Azteca, sede de la inauguración y la final.</p>
                </div>
            </div>
        </div>

        {{-- Resultados Finales --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo II: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    <thead class="table-dark">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Goleador(es)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Goleador</td>
                            <td colspan="2">Gerd Müller (Alemania Federal)</td>
                            <td>10 goles</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td><strong>🇧🇷 Brasil</strong> vs. Italia 🇮🇹</td>
                            {{-- Resultado: Rojo Vibrante --}}
                            <td class="fw-bold text-success fs-5"><strong>4</strong> - 1</td>
                            <td>Pelé, Gérson, Jairzinho, Carlos Alberto</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Brasil obtuvo su tercer título en una de las finales más espectaculares.</p>
            </div>
        </div>
        
        {{-- 🏆 Homenaje: Alineación del Campeón (Brasil) --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Tricampeón: Alineación de Brasil en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_brasil_70 = [
                            'Portero' => 'Félix',
                            'Defensa' => ['Carlos Alberto (C)', 'Brito', 'Piazza', 'Everaldo'],
                            'Mediocampo' => ['Clodoaldo', 'Gérson', 'Rivelino'],
                            'Delantera' => ['Jairzinho', 'Tostão', 'Pelé'],
                            'Entrenador' => 'Mário Zagallo',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_brasil_70['Entrenador'] }}</p>
                    </div>

                    @foreach ($alineacion_brasil_70 as $posicion => $jugadores)
                        @if (is_array($jugadores))
                            <div class="col-md-4 mb-3">
                                <p class="fw-bold text-primary border-bottom mb-1">{{ strtoupper($posicion) }}:</p>
                                @foreach ($jugadores as $jugador)
                                    <p class="mb-0 small">{{ $jugador }}</p>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_brasil_70['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 8]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Inglaterra 1966</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 10]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Alemania Federal 1974 →</span>
            </a>
        </div>
        
    </div>
@endsection
