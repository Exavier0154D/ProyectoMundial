@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
        <h1 class="mb-3 text-center fw-bold text-primary">
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '2006' }} - {{ $mundial->pais_sede ?? 'Alemania' }} 🇩🇪
        </h1>
        
        <div class="text-center mb-5">
            <img src="{{ asset($mundial->logo_url ?? 'img/2006/logo.jpg') }}" alt="Logo Mundial 2006" class="img-fluid rounded shadow" style="max-height: 200px;">
            <p class="text-muted mt-2">Logo oficial de la Copa Mundial de la FIFA 2006</p>
        </div>

        <hr>
        
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'ITALIA' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '9 de junio' }} al {{ $mundial->fecha_fin ?? '9 de julio' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '32' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Alemania?
            </div>
            <div class="card-body">
                <p>El Mundial de 2006 fue un regreso a Europa tras el torneo asiático de 2002. Alemania fue elegida por:</p>
                <ul>
                    <li>Su **sólida infraestructura** con estadios modernos como el Allianz Arena.</li>
                    <li>La experiencia organizativa de Alemania en eventos como la Eurocopa 1988.</li>
                    <li>El entusiasmo del país por el fútbol, con alta asistencia esperada.</li>
                </ul>
                <p class="fst-italic text-danger">El torneo destacó por su ambiente festivo y el uso del VAR precursor en algunos partidos.</p>
                
                <div class="text-center mt-4">
                    <img src="{{ asset('img/2006/allianz_arena.jpg') }}" alt="Allianz Arena" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">El Allianz Arena, uno de los estadios icónicos del torneo.</p>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card shadow h-100">
                    <div class="card-header bg-info text-white fw-bold fs-5">
                        Kick-off: Partido Inaugural
                    </div>
                    <div class="card-body">
                        <p class="fw-bold">El Mundial comenzó el 9 de junio de 2006 con el partido inaugural:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇩🇪 **Alemania** 4-2 🇨🇷 Costa Rica (Allianz Arena)</li>
                        </ul>
                        <p class="mt-3">El primer gol del torneo lo marcó **Philipp Lahm** (Alemania) a los 6 minutos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow h-100">
                    <div class="card-header bg-success text-white fw-bold fs-5">
                        👥 Equipos Clasificados (32)
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @php
                                $clasificados = [
                                    'Alemania', 'Angola', 'Argentina', 'Australia', 'Brasil', 'Corea del Sur', 'Costa Rica', 'Croacia',
                                    'República Checa', 'Ecuador', 'España', 'Francia', 'Ghana', 'Holanda', 'Inglaterra', 'Irán',
                                    'Italia', 'Japón', 'México', 'Paraguay', 'Polonia', 'Portugal', 'Arabia Saudí', 'Serbia y Montenegro',
                                    'Suecia', 'Suiza', 'Togo', 'Trinidad y Tobago', 'Túnez', 'Ucrania', 'Estados Unidos', 'Costa de Marfil'
                                ];
                            @endphp
                            @foreach ($clasificados as $equipo)
                                <div class="col-6 mb-2">
                                    <span class="badge bg-secondary">{{ $equipo }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow mb-5">
            <div class="card-header bg-warning text-dark fw-bold fs-5">
                ⚽ Goleadores y Asistidores Destacados
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Goleadores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇩🇪 **Miroslav Klose** (Alemania) - **5 Goles**</li>
                            <li class="list-group-item">🇦🇷 Hernán Crespo (Argentina) - 3 Goles</li>
                            <li class="list-group-item">🇫🇷 Zinédine Zidane (Francia) - 3 Goles</li>
                            <li class="list-group-item">🇮🇹 Luca Toni (Italia) - 2 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇦🇷 **Juan Román Riquelme** (Argentina) - 4 Asistencias</li>
                            <li class="list-group-item">🇮🇹 Andrea Pirlo (Italia) - 3 Asistencias</li>
                            <li class="list-group-item">🇩🇪 Lukas Podolski (Alemania) - 3 Asistencias</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5">
                Finales y Resultados Clave
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>🇮🇹 **Italia** vs. 🇩🇪 Alemania</td>
                            <td>**2** - 0 (prórroga)</td>
                            <td>Signal Iduna Park</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>🇵🇹 Portugal vs. **🇫🇷 Francia**</td>
                            <td>0 - **1**</td>
                            <td>Allianz Arena</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>🇮🇹 **Italia** vs. 🇫🇷 Francia</td>
                            <td>**1** - 1 (5-3 en penales)</td>
                            <td>Olympiastadion</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">Italia ganó 1-1 (5-3 en penales) a Francia en la final, logrando su cuarto título mundial.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Campeón: Alineación de Italia en la Final vs. Francia 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        $alineacion = [
                            'Portero' => 'Gianluigi Buffon',
                            'Defensa' => ['Fabio Cannavaro (C)', 'Marco Materazzi', 'Gianluca Zambrotta', 'Fabio Grosso'],
                            'Mediocampo' => ['Gennaro Gattuso', 'Andrea Pirlo', 'Mauro Camoranesi', 'Simone Perrotta'],
                            'Delanteros' => ['Francesco Totti', 'Luca Toni'],
                            'Entrenador' => 'Marcello Lippi',
                        ];
                    @endphp

                    <div class="col-12 mb-3">
                        <p class="fw-bold text-primary">Entrenador:</p>
                        <p class="fs-5">{{ $alineacion['Entrenador'] }}</p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary">Portero:</p>
                        <p>{{ $alineacion['Portero'] }}</p>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary">Defensas:</p>
                        @foreach ($alineacion['Defensa'] as $jugador)
                            <p class="mb-0">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-primary">Mediocampistas:</p>
                        @foreach ($alineacion['Mediocampo'] as $jugador)
                            <p class="mb-0">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    
                    <div class="col-12">
                        <p class="fw-bold text-primary">Delanteros:</p>
                        <p class="fs-5 text-dark">{{ implode(' • ', $alineacion['Delanteros']) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 text-center">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
    </div>
@endsection