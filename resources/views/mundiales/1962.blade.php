@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Rojo Oscuro / Azul Fuerte --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-chile-62" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de Chile: Rojo (principal), Azul (secundario) */
            .mundial-chile-62 {
                --color-principal: #D51B2A; /* Rojo Fuerte Chileno */
                --color-secundario: #0032A0; /* Azul Fuerte Chileno */
                --color-terciario: #FFFFFF; /* Blanco */
            }

            /* 1. FONDOS Y BORDES (AZUL FUERTE) */
            .mundial-chile-62 .bg-dark,
            .mundial-chile-62 .table-dark thead,
            .mundial-chile-62 .card-header.bg-dark,
            .mundial-chile-62 .btn-dark {
                background-color: var(--color-secundario) !important; 
                border-color: var(--color-secundario) !important;
                color: var(--color-terciario) !important; /* Texto de botones y headers en Blanco */
            }

            /* 2. FONDOS DE ACENTO (ROJO FUERTE) */
            .mundial-chile-62 .bg-success,
            .mundial-chile-62 .card-header.bg-success {
                background-color: var(--color-principal) !important;
                color: var(--color-terciario) !important; /* Texto blanco en fondos de acento */
            }
            
            /* CRÍTICO: TEXTO DE ENCABEZADO DE TABLA (<th>) */
            .mundial-chile-62 table thead th {
                color: var(--color-terciario) !important; /* Texto del encabezado de tabla en BLANCO */
            }
            
            /* 3. COLORES Y TEXTOS */
            .mundial-chile-62 .text-primary, 
            .mundial-chile-62 h1,
            .mundial-chile-62 .font-title {
                color: var(--color-principal) !important; /* Títulos en Rojo Fuerte */
            }
            .mundial-chile-62 .text-secondary,
            .mundial-chile-62 .text-success {
                color: var(--color-secundario) !important; /* Acentos en Azul Fuerte */
            }
            
            /* 4. Resetear Texto a NEGRO/GRIS OSCURO (Legibilidad) */
            .mundial-chile-62 p, 
            .mundial-chile-62 li,
            .mundial-chile-62 table td,
            .mundial-chile-62 .card-body p,
            .mundial-chile-62 .fw-bold {
                color: #3d3d3d !important; 
            }
            .mundial-chile-62 .text-danger {
                color: var(--color-principal) !important; /* Advertencia en Rojo Fuerte */
            }
            .mundial-chile-62 .badge.bg-secondary {
                background-color: var(--color-secundario) !important; 
                color: var(--color-terciario) !important; 
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 6]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Suecia 1958</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 8]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Inglaterra 1966 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1962' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Chile' }} 🇨🇱</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    {{-- Encabezado de tabla: Azul Fuerte, texto BLANCO por CSS --}}
                    <thead class="bg-dark"> 
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Campeón: Rojo Fuerte --}}
                            <td class="fw-bold text-danger fs-5">{{ $mundial->campeon->nombre ?? 'BRASIL' }}</td>
                            <td>30 de mayo al 17 de junio</td> 
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
                    <p class="mb-0 small text-primary">
                        Arica, Rancagua, Santiago, Viña del Mar (4 ciudades).
                    </p>
                </div>
            </div>
        </div>

        {{-- 🚩 SELECCIONES CLASIFICADAS (NUEVA SECCIÓN) --}}
        <div class="card border-0 shadow mb-5">
            {{-- Encabezado: Azul Fuerte, texto BLANCO --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🌍 Selecciones Participantes (16)
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">Anfitrión/Campeón:</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇨🇱 Chile</li>
                            <li>🇧🇷 Brasil (Campeón defensor)</li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">Europa (UEFA):</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇩🇪 Alemania Federal</li>
                            <li>🇧🇬 Bulgaria</li>
                            <li>🇨🇿 Checoslovaquia</li>
                            <li>🇪🇸 España</li>
                            <li>🇭🇺 Hungría</li>
                            <li>🏴󠁧󠁢󠁥󠁮󠁧󠁿 Inglaterra</li>
                            <li>🇮🇹 Italia</li>
                            <li>🇨🇭 Suiza</li>
                            <li>🇷🇺 URSS</li>
                            <li>🇷🇸 Yugoslavia</li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary mb-1">América (CONMEBOL/CONCACAF):</p>
                        <ul class="list-unstyled mb-0 small">
                            <li>🇦🇷 Argentina</li>
                            <li>🇨🇴 Colombia</li>
                            <li>🇺🇾 Uruguay</li>
                            <li>🇲🇽 México</li>
                        </ul>
                    </div>
                </div>
                <p class="text-center mt-3 small fst-italic text-muted">
                    *Nota: El Mundial de 1962 no tuvo mascota oficial reconocida, aunque algunos refieren a "Koro y Pícaro".
                </p>
            </div>
        </div>
        
        {{-- SECCIÓN IMAGEN Y HECHOS NOTABLES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            {{-- Encabezado: Azul Fuerte, texto BLANCO --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: El Mundial de la Furia
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>El Mundial se celebró a pesar de un devastador terremoto en 1960. El torneo fue conocido por su juego brusco y defensivo, destacando la famosa **"Batalla de Santiago"** (Chile vs. Italia).</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">**La Lesión de Pelé:** La estrella brasileña Pelé se lesionó en el segundo partido, dejando a **Garrincha** como la figura central del campeón.</li>
                    <li class="list-group-item bg-light-gray border-0">**"La Batalla de Santiago":** El partido entre Chile e Italia, plagado de faltas y peleas, fue uno de los más violentos en la historia de los Mundiales.</li>
                    <li class="list-group-item bg-light-gray border-0">**El Tercer Puesto:** Chile logró un histórico tercer lugar, el mejor resultado de su historia en una Copa del Mundo.</li>
                </ul>
                
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1962/1962_Garrincha.jpg') }}" alt="Garrincha en Chile 1962" class="img-fluid" style="max-height: 350px;">
                    <p class="text-muted mt-2 small font-elegant">Garrincha, la estrella de Brasil tras la lesión de Pelé.</p>
                </div>
            </div>
        </div>

        {{-- Resultados Finales --}}
        <div class="card border-0 shadow mb-5">
            {{-- Encabezado: Azul Fuerte, texto BLANCO --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo II: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    {{-- Encabezado de tabla: Azul Fuerte, texto BLANCO por CSS --}}
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
                            <td colspan="2">Seis jugadores con 4 goles (incluyendo Garrincha y Leonel Sánchez)</td>
                            <td>4 goles</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>**🇧🇷 Brasil** vs. Checoslovaquia 🇨🇿</td>
                            {{-- Resultado: Azul Fuerte --}}
                            <td class="fw-bold text-secondary fs-5">**3** - 1</td>
                            <td>Amarildo, Zito, Vavá (BRA)</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">3er Puesto</td>
                            <td>**🇨🇱 Chile** vs. Yugoslavia 🇷🇸</td>
                            {{-- Resultado: Azul Fuerte --}}
                            <td class="fw-bold text-secondary fs-5">**1** - 0</td>
                            <td>Eladio Rojas</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Brasil repitió el título, demostrando su fuerza a pesar de la ausencia de Pelé.</p>
            </div>
        </div>
        
        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 6]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Suecia 1958</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 8]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Inglaterra 1966 →</span>
            </a>
        </div>
        
    </div>
@endsection