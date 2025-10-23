@extends('layouts.app')

@section('content')
    
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-inglaterra-66" style="padding: 3rem;">
        
        <style>
            /* Paleta de Inglaterra */
            .mundial-inglaterra-66 {
                --color-principal: #DD0000;
                --color-secundario: #003366;
                --color-terciario: #FFFFFF;
            }

            /* Encabezados de tabla */
            .mundial-inglaterra-66 table thead th {
                color: var(--color-terciario) !important;
                background-color: var(--color-principal) !important;
            }

            /* Cuerpo de texto general: negro */
            .mundial-inglaterra-66 p, 
            .mundial-inglaterra-66 li,
            .mundial-inglaterra-66 td,
            .mundial-inglaterra-66 .fw-bold,
            .mundial-inglaterra-66 small,
            .mundial-inglaterra-66 .text-muted {
                color: #000 !important;
            }

            /* Títulos y encabezados */
            .mundial-inglaterra-66 h1, 
            .mundial-inglaterra-66 h4,
            .mundial-inglaterra-66 .text-primary {
                color: var(--color-principal) !important;
            }
            .mundial-inglaterra-66 .text-secondary {
                color: var(--color-secundario) !important;
            }

            /* Botones y headers */
            .mundial-inglaterra-66 .btn-dark, 
            .mundial-inglaterra-66 .card-header.bg-dark {
                background-color: var(--color-principal) !important;
                color: var(--color-terciario) !important;
                border-color: var(--color-principal) !important;
            }

            .mundial-inglaterra-66 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: var(--color-terciario) !important;
            }

            .mundial-inglaterra-66 .text-success {
                color: var(--color-secundario) !important;
            }
        </style>
        
        {{-- Navegación superior --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 7]) }}" class="btn btn-dark btn-lg shadow-sm">
                ← Anterior: Chile 1962
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg shadow-sm">
                Índice de Mundiales
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 9]) }}" class="btn btn-dark btn-lg shadow-sm">
                Siguiente: México 1970 →
            </a>
        </div>

        {{-- Título principal --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1966' }}
            </h1>
            <p class="fs-4 text-secondary">{{ $mundial->pais_sede ?? 'Inglaterra' }} 🏴</p>
        </header>

        {{-- Tabla de datos clave --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'INGLATERRA' }}</td>
                            <td>11 al 30 de julio</td>
                            <td>16</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Mascota oficial --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5">
                🦁 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">World Cup Willie</h4>
                <p class="text-dark">El primer Mundial en tener una mascota oficial. Willie es un león (símbolo tradicional británico) vistiendo una camiseta con la bandera del Reino Unido ("Union Jack").</p>

                {{-- Imagen real de la mascota --}}
                <div class="text-center mt-3">
                    <img src="{{ asset('img/1966/Willie.jpg') }}" 
                         alt="World Cup Willie" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-height: 280px;">
                </div>

                <p class="text-primary small mt-3 fst-italic">
                    ¡Sentó las bases para el merchandising moderno de la FIFA!
                </p>
            </div>
        </div>

        {{-- SECCIÓN IMAGEN Y HECHOS NOTABLES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            {{-- Encabezado: Rojo --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: El Robo del Trofeo y el Gol Fantasma
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>Inglaterra ganó su único título mundial en casa, un torneo marcado por la polémica del "gol fantasma" en la final y el robo del trofeo Jules Rimet previo al inicio.</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">**La Anécdota:** El trofeo Jules Rimet fue robado y encontrado una semana después por el perro **Pickles** en un jardín suburbano.</li>
                    <li class="list-group-item bg-light-gray border-0">**La Figura:** El portugués **Eusébio** fue el máximo goleador, llevando a su equipo al tercer lugar.</li>
                    <li class="list-group-item bg-light-gray border-0">**La Sorpresa:** **Corea del Norte** eliminó a Italia en fase de grupos y llegó a cuartos de final, donde perdió 5-3 ante Portugal tras ir ganando 3-0.</li>
                </ul>
                
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    {{-- Usar un placeholder representativo del estadio --}}
                    <img src="{{ asset('img/1966/1966_Wembley.jpg') }}" alt="Estadio de Wembley 1966" class="img-fluid" style="max-height: 350px;">
                    <p class="text-muted mt-2 small font-elegant">El antiguo Estadio de Wembley, sede de la final.</p>
                </div>
            </div>
        </div>
        
        {{-- 🌍 SECCIÓN DE SELECCIONES CLASIFICADAS (NUEVA SECCIÓN) 🌍 --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            {{-- Encabezado de Clasificados: Azul Oscuro --}}
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌍 Selecciones Clasificadas (16 Equipos)
            </div>
            <div class="card-body p-4">
                <div class="row font-elegant">
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">Europa (UEFA):</p>
                        <p class="mb-0 small">🏴󠁧󠁢󠁥󠁮󠁧󠁿 Inglaterra (Anfitrión)</p>
                        <p class="mb-0 small">🇩🇪 Alemania Federal</p>
                        <p class="mb-0 small">🇮🇹 Italia</p>
                        <p class="mb-0 small">🇫🇷 Francia</p>
                        <p class="mb-0 small">🇪🇸 España</p>
                        <p class="mb-0 small">🇵🇹 Portugal</p>
                        <p class="mb-0 small">🇷🇺 Unión Soviética</p>
                        <p class="mb-0 small">🇭🇺 Hungría</p>
                        <p class="mb-0 small">🇨🇭 Suiza</p>
                        <p class="mb-0 small">🇧🇬 Bulgaria</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">América del Sur (CONMEBOL):</p>
                        <p class="mb-0 small">🇧🇷 Brasil (Campeón Defensor)</p>
                        <p class="mb-0 small">🇺🇾 Uruguay</p>
                        <p class="mb-0 small">🇦🇷 Argentina</p>
                        <p class="mb-0 small">🇨🇱 Chile</p>
                        <p class="fw-bold text-primary border-bottom mt-3 mb-1">América del Norte (CONCACAF):</p>
                        <p class="mb-0 small">🇲🇽 México</p>
                        <p class="fw-bold text-primary border-bottom mt-3 mb-1">Asia/África (AFC/CAF):</p>
                        <p class="mb-0 small">🇰🇵 Corea del Norte</p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Resultados Finales --}}
        <div class="card border-0 shadow mb-5">
            {{-- Encabezado: Rojo --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo III: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    {{-- Encabezado de tabla: Rojo --}}
                    <thead class="table-dark">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Goleador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Goleador</td>
                            <td colspan="2">El "Pantera Negra"</td>
                            <td>**Eusébio** (🇵🇹, 9 Goles)</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>**🏴󠁧󠁢󠁥󠁮󠁧󠁿 Inglaterra** vs. Alemania Federal 🇩🇪</td>
                            {{-- Resultado: Azul Oscuro --}}
                            <td class="fw-bold text-success fs-5">**4** - 2 (T.E.)</td>
                            <td>Geoff Hurst (Hat-trick)</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">El único título mundial de Inglaterra, con una final muy disputada y un gol muy polémico.</p>
            </div>
        </div>
        
        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (INGLATERRA) EN LA FINAL 🏆 --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            {{-- Encabezado de Homenaje: Azul Oscuro --}}
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Inglaterra en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_inglaterra_66 = [
                            'Portero' => 'Gordon Banks',
                            'Defensa' => ['George Cohen', 'Jack Charlton', 'Bobby Moore (C)', 'Ray Wilson'],
                            'Mediocampo' => ['Nobby Stiles', 'Alan Ball'],
                            'Delantera' => ['Bobby Charlton', 'Martin Peters', 'Geoff Hurst', 'Roger Hunt'],
                            'Entrenador' => 'Alf Ramsey',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_inglaterra_66['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_inglaterra_66['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_inglaterra_66['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_inglaterra_66['Delantera'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_inglaterra_66['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 7]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Chile 1962</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 9]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: México 1970 →</span>
            </a>
        </div>
        
    </div>
@endsection