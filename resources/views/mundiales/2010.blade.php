@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
        <h1 class="mb-5 text-center fw-bold text-primary">
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '2010' }} - {{ $mundial->pais_sede ?? 'Sudáfrica' }} 🇿🇦
        </h1>

        <hr>
        
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'ESPAÑA' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '11 de junio' }} al {{ $mundial->fecha_fin ?? '11 de julio' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '32' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Sudáfrica?
            </div>
            <div class="card-body">
                <p>El Mundial de 2010 fue el **primero en África**, marcando un hito en la historia de la FIFA. Sudáfrica fue elegida por:</p>
                <ul>
                    <li>La voluntad de la FIFA de llevar el torneo a un continente sin precedentes mundialistas.</li>
                    <li>La infraestructura mejorada, con estadios como Soccer City en Johannesburgo.</li>
                    <li>El simbolismo de la unidad post-apartheid, promoviendo el fútbol en África.</li>
                </ul>
                <p class="fst-italic text-danger">El torneo fue memorable por las vuvuzelas y la sorpresa de España como campeona.</p>
                
                <div class="text-center mt-4">
                    <img src="{{ asset('img/2010/soccer_city.jpg') }}" alt="Soccer City" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">Soccer City, escenario de la final del Mundial 2010.</p>
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
                        <p class="fw-bold">El Mundial comenzó el 11 de junio de 2010 con el partido inaugural:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇿🇦 **Sudáfrica** 1-1 🇲🇽 México (Soccer City)</li>
                        </ul>
                        <p class="mt-3">El primer gol del torneo lo marcó **Siphiwe Tshabalala** (Sudáfrica) a los 55 minutos.</p>
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
                                    'Alemania', 'Argentina', 'Australia', 'Brasil', 'Camerún', 'Chile', 'Corea del Norte', 'Corea del Sur',
                                    'Costa de Marfil', 'Dinamarca', 'Eslovaquia', 'Eslovenia', 'España', 'Estados Unidos', 'Francia', 'Ghana',
                                    'Grecia', 'Holanda', 'Honduras', 'Inglaterra', 'Italia', 'Japón', 'México', 'Nigeria', 'Nueva Zelanda',
                                    'Paraguay', 'Portugal', 'Serbia', 'Sudáfrica', 'Suiza', 'Uruguay', 'Argelia'
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
                            <li class="list-group-item">🇩🇪 **Thomas Müller** (Alemania) - **5 Goles**</li>
                            <li class="list-group-item">🇪🇸 David Villa (España) - 5 Goles</li>
                            <li class="list-group-item">🇳🇱 Wesley Sneijder (Holanda) - 5 Goles</li>
                            <li class="list-group-item">🇺🇾 Diego Forlán (Uruguay) - 5 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇩🇪 **Thomas Müller** (Alemania) - 3 Asistencias</li>
                            <li class="list-group-item">🇧🇷 Kaká (Brasil) - 3 Asistencias</li>
                            <li class="list-group-item">🇳🇱 Dirk Kuyt (Holanda) - 3 Asistencias</li>
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
                            <td>🇺🇾 Uruguay vs. **🇳🇱 Holanda**</td>
                            <td>2 - **3**</td>
                            <td>Cape Town Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>🇩🇪 Alemania vs. **🇪🇸 España**</td>
                            <td>0 - **1**</td>
                            <td>Moses Mabhida Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>🇳🇱 Holanda vs. **🇪🇸 España**</td>
                            <td>0 - **1** (prórroga)</td>
                            <td>Soccer City</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">España ganó 1-0 a Holanda en la final, logrando su primer título mundial.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Campeón: Alineación de España en la Final vs. Holanda 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        $alineacion = [
                            'Portero' => 'Iker Casillas',
                            'Defensa' => ['Sergio Ramos', 'Gerard Piqué', 'Carles Puyol', 'Joan Capdevila'],
                            'Mediocampo' => ['Sergio Busquets', 'Xabi Alonso', 'Xavi Hernández', 'Andrés Iniesta'],
                            'Delanteros' => ['Pedro Rodríguez', 'David Villa'],
                            'Entrenador' => 'Vicente del Bosque',
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