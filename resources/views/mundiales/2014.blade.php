@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
        <h1 class="mb-5 text-center fw-bold text-primary">
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '2014' }} - {{ $mundial->pais_sede ?? 'Brasil' }} 🇧🇷
        </h1>

        <hr>
        
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'ALEMANIA' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '12 de junio' }} al {{ $mundial->fecha_fin ?? '13 de julio' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '32' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Brasil?
            </div>
            <div class="card-body">
                <p>El Mundial de 2014 marcó el regreso del torneo a Brasil tras 1950. La sede fue elegida por:</p>
                <ul>
                    <li>La **pasión futbolística** de Brasil, considerado el país del fútbol.</li>
                    <li>La modernización de estadios icónicos como el Maracanã.</li>
                    <li>La oportunidad de revitalizar la economía y el turismo en el país.</li>
                </ul>
                <p class="fst-italic text-danger">El torneo fue recordado por la histórica derrota de Brasil 1-7 ante Alemania en semifinales.</p>
                
                <div class="text-center mt-4">
                    <img src="{{ asset('img/2014/maracana.jpg') }}" alt="Maracanã" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">El Maracanã, escenario de la final del Mundial 2014.</p>
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
                        <p class="fw-bold">El Mundial comenzó el 12 de junio de 2014 con el partido inaugural:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇧🇷 **Brasil** 3-1 🇭🇷 Croacia (Arena Corinthians)</li>
                        </ul>
                        <p class="mt-3">El primer gol del torneo lo marcó **Neymar** (Brasil) a los 29 minutos.</p>
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
                                    'Alemania', 'Argentina', 'Australia', 'Bélgica', 'Bosnia y Herzegovina', 'Brasil', 'Camerún', 'Chile',
                                    'Colombia', 'Corea del Sur', 'Costa Rica', 'Croacia', 'Ecuador', 'España', 'Estados Unidos', 'Francia',
                                    'Ghana', 'Grecia', 'Holanda', 'Honduras', 'Inglaterra', 'Irán', 'Italia', 'Japón', 'México', 'Nigeria',
                                    'Portugal', 'Rusia', 'Suiza', 'Uruguay', 'Argelia', 'Costa de Marfil'
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
                            <li class="list-group-item">🇨🇴 **James Rodríguez** (Colombia) - **6 Goles**</li>
                            <li class="list-group-item">🇩🇪 Thomas Müller (Alemania) - 5 Goles</li>
                            <li class="list-group-item">🇧🇷 Neymar (Brasil) - 4 Goles</li>
                            <li class="list-group-item">🇦🇷 Lionel Messi (Argentina) - 4 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇨🇴 **Juan Cuadrado** (Colombia) - 4 Asistencias</li>
                            <li class="list-group-item">🇩🇪 Toni Kroos (Alemania) - 4 Asistencias</li>
                            <li class="list-group-item">🇳🇱 Daley Blind (Holanda) - 3 Asistencias</li>
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
                            <td>🇧🇷 Brasil vs. **🇩🇪 Alemania**</td>
                            <td>1 - **7**</td>
                            <td>Estadio Mineirão</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>🇳🇱 Holanda vs. **🇦🇷 Argentina**</td>
                            <td>0 - 0 (2-4 en penales)</td>
                            <td>Arena Corinthians</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>🇩🇪 **Alemania** vs. 🇦🇷 Argentina</td>
                            <td>**1** - 0 (prórroga)</td>
                            <td>Maracanã</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">Alemania ganó 1-0 a Argentina en la final, logrando su cuarto título mundial.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Campeón: Alineación de Alemania en la Final vs. Argentina 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        $alineacion = [
                            'Portero' => 'Manuel Neuer',
                            'Defensa' => ['Philipp Lahm (C)', 'Mats Hummels', 'Jérôme Boateng', 'Benedikt Höwedes'],
                            'Mediocampo' => ['Bastian Schweinsteiger', 'Toni Kroos', 'Mesut Özil', 'Thomas Müller'],
                            'Delanteros' => ['Miroslav Klose', 'Mario Götze'],
                            'Entrenador' => 'Joachim Löw',
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