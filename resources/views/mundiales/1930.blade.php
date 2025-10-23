@extends('layouts.app')

@section('content')
    
    {{-- ESTILO TEMÁTICO: Mundial Uruguay 1930 --}}
    <div class="container py-4 mundial-uruguay-30">
        
        <style>
            .mundial-uruguay-30 {
                --color-principal: #007bc0; /* Azul Celeste */
                --color-secundario: #fcd116; /* Dorado */
            }

            .mundial-uruguay-30 .bg-dark,
            .mundial-uruguay-30 .table-dark thead,
            .mundial-uruguay-30 .card-header.bg-dark,
            .mundial-uruguay-30 .btn-dark,
            .mundial-uruguay-30 .btn-primary,
            .mundial-uruguay-30 .btn-outline-primary {
                background-color: var(--color-principal) !important;
                border-color: var(--color-principal) !important;
                color: white !important;
            }

            .mundial-uruguay-30 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: black !important;
            }

            .mundial-uruguay-30 .btn-outline-primary {
                background-color: white !important;
                color: var(--color-principal) !important;
            }

            .mundial-uruguay-30 .text-primary,
            .mundial-uruguay-30 h1,
            .mundial-uruguay-30 .font-title {
                color: var(--color-principal) !important;
            }

            .mundial-uruguay-30 .text-success {
                color: var(--color-secundario) !important;
            }

            .mundial-uruguay-30 p,
            .mundial-uruguay-30 li,
            .mundial-uruguay-30 td {
                color: #3d3d3d !important;
            }
        </style>

        {{-- NAVEGACIÓN --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-primary btn-lg shadow-sm">
                ← Índice de Mundiales
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 2]) }}" class="btn btn-primary btn-lg shadow-sm">
                Siguiente: Italia 1934 →
            </a>
        </div>

        {{-- TÍTULO PRINCIPAL --}}
        <h1 class="text-center fw-bold text-primary font-title fs-1">
            Copa Mundial de la FIFA {{ $mundial->anio ?? '1930' }}
        </h1>
        <p class="fs-4 text-center text-success">{{ $mundial->pais_sede ?? 'Uruguay' }} 🇺🇾</p>
        
        <hr class="my-4">

        {{-- DATOS DESTACADOS --}}
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase text-primary">{{ $mundial->campeon->nombre ?? 'URUGUAY' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-primary">🗓️ Fechas:</p>
                <h3 class="text-success">{{ $mundial->fecha_inicio ?? '13 de julio' }} al {{ $mundial->fecha_fin ?? '30 de julio' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-primary">👥 Equipos:</p>
                <h3 class="text-success">{{ $mundial->equipos_count ?? '13' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        {{-- CAPÍTULO I: SEDE --}}
        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 Capítulo I: La Sede - ¿Por qué Uruguay?
            </div>
            <div class="card-body">
                <p class="fw-bold text-primary">
                    El Mundial de 1930 fue el primero en la historia del fútbol y estableció las bases del torneo moderno.
                </p>
                <ul>
                    <li>Celebración del <b>centenario de la Constitución uruguaya (1830)</b>.</li>
                    <li>Uruguay, bicampeón olímpico (1924 y 1928), era considerado el mejor equipo del mundo.</li>
                    <li>El país ofreció <b>financiar los viajes</b> de todas las selecciones participantes.</li>
                </ul>
                <p class="fst-italic text-danger">
                    Solo cuatro selecciones europeas participaron debido al largo viaje transatlántico en barco.
                </p>

                <div class="text-center mt-4">
                    <img src="{{ asset('img/1930/estadio_centenario.jpg') }}" alt="Estadio Centenario" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-primary mt-2">El Estadio Centenario fue construido en tiempo récord: 9 meses.</p>
                </div>
            </div>
        </div>

        {{-- PARTIDOS INAUGURALES Y EQUIPOS --}}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card shadow h-100">
                    <div class="card-header bg-info text-white fw-bold fs-5">
                        ⚽ Kick-off: Partido Inaugural
                    </div>
                    <div class="card-body">
                        <p class="fw-bold text-primary">Dos partidos inaugurales se jugaron el mismo día (13 de julio de 1930):</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-0 text-primary">🇫🇷 Francia 4-1 México 🇲🇽</li>
                            <li class="list-group-item border-0 text-primary">🇺🇸 Estados Unidos 3-0 Bélgica 🇧🇪</li>
                        </ul>
                        <p class="mt-3 text-primary">⚽ Primer gol del Mundial: <b>Lucien Laurent (Francia)</b>.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow h-100">
                    <div class="card-header bg-success text-white fw-bold fs-5">
                        🌍 Equipos Participantes (13)
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @php
                                $clasificados = ['Argentina', 'Bélgica', 'Bolivia', 'Brasil', 'Chile', 'Francia', 'México', 'Paraguay', 'Perú', 'Rumania', 'Estados Unidos', 'Uruguay', 'Yugoslavia'];
                            @endphp
                            @foreach ($clasificados as $equipo)
                                <div class="col-6 mb-2">
                                    <span class="badge bg-secondary text-white">{{ $equipo }}</span>
                                </div>
                            @endforeach
                        </div>
                        <p class="mt-3 text-primary small fst-italic">Nota: Ningún país africano o asiático participó en esta edición.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- CAPÍTULO II: RESULTADOS --}}
        <div class="card shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5">
                📖 Capítulo II: Finales y Resultados Clave
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-white">Fase</th>
                            <th class="text-white">Partido</th>
                            <th class="text-white">Resultado</th>
                            <th class="text-white">Sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-primary">
                            <td class="fw-bold">Semifinal</td>
                            <td>🇺🇸 Estados Unidos vs 🇦🇷 Argentina</td>
                            <td>1 - 6</td>
                            <td>Centenario</td>
                        </tr>
                        <tr class="text-primary">
                            <td class="fw-bold">Semifinal</td>
                            <td>🇺🇾 Uruguay vs 🇷🇴 Rumania</td>
                            <td>4 - 2</td>
                            <td>Centenario</td>
                        </tr>
                        <tr class="text-primary">
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>🇺🇾 Uruguay vs 🇦🇷 Argentina</td>
                            <td class="fw-bold text-success fs-5">4 - 2</td>
                            <td>Centenario</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold text-primary">
                    Uruguay levantó la primera Copa del Mundo ante 93,000 espectadores, con Pedro Cea, Santos Iriarte y Héctor Castro como goleadores.
                </p>
            </div>
        </div>

        {{-- CAPÍTULO III: FIGURAS DESTACADAS --}}
        <div class="card shadow mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5">
                ⭐ Capítulo III: Jugadores y Momentos Memorables
            </div>
            <div class="card-body">
                <ul>
                    <li><b>Guillermo Stábile</b> (Argentina): Goleador del torneo con 8 tantos.</li>
                    <li><b>José Nasazzi</b> (Uruguay): Capitán legendario y símbolo de liderazgo.</li>
                    <li><b>José Andrade</b> (Uruguay): Considerado el primer gran futbolista afrodescendiente del siglo XX.</li>
                </ul>
                <p class="mt-3 text-primary">
                    La final fue un evento histórico que consolidó a Uruguay como la cuna del fútbol moderno y marcó el nacimiento de una tradición que perdura hasta hoy.
                </p>
            </div>
        </div>

        {{-- CAPÍTULO IV: ALINEACIÓN --}}
        <div class="card shadow border-success mb-5">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Primer Campeón: Alineación de Uruguay 🌟
            </div>
            <div class="card-body text-center text-primary">
                @php
                    $alineacion = [
                        'Entrenador' => 'Alberto Suppici',
                        'Portero' => 'Enrique Ballestero',
                        'Defensas' => ['José Nasazzi (C)', 'Ernesto Mascheroni'],
                        'Mediocampo' => ['José Andrade', 'Lorenzo Fernández', 'Álvaro Gestido'],
                        'Delantera' => ['Pablo Dorado', 'Héctor Scarone', 'Héctor Castro', 'Pedro Cea', 'Santos Iriarte']
                    ];
                @endphp

                <p><b>Entrenador:</b> {{ $alineacion['Entrenador'] }}</p>

                <div class="row">
                    <div class="col-md-4">
                        <p class="fw-bold">DEFENSAS</p>
                        @foreach ($alineacion['Defensas'] as $jugador)
                            <p>{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">MEDIOCAMPO</p>
                        @foreach ($alineacion['Mediocampo'] as $jugador)
                            <p>{{ $jugador }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">DELANTERA</p>
                        @foreach ($alineacion['Delantera'] as $jugador)
                            <p>{{ $jugador }}</p>
                        @endforeach
                    </div>
                </div>

                <p class="mt-3 fw-bold">PORTERO:</p>
                <p>{{ $alineacion['Portero'] }}</p>
            </div>
        </div>

        {{-- PIE NAVEGACIÓN --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-primary btn-lg shadow-sm">
                ← Índice de Mundiales
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 2]) }}" class="btn btn-primary btn-lg shadow-sm">
                Siguiente: Italia 1934 →
            </a>
        </div>
    </div>
@endsection
