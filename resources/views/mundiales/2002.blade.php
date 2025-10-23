@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
        <h1 class="mb-3 text-center fw-bold text-primary">
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '2002' }} - {{ $mundial->pais_sede ?? 'Corea del Sur y Japón' }} 🇰🇷🇯🇵
        </h1>
        
        <div class="text-center mb-5">
            <img src="{{ asset($mundial->logo_url ?? 'img/2002/logo.jpg') }}" alt="Logo Mundial 2002" class="img-fluid rounded shadow" style="max-height: 200px;">
            <p class="text-muted mt-2">Logo oficial de la Copa Mundial de la FIFA 2002</p>
        </div>

        <hr>
        
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'BRASIL' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '31 de mayo' }} al {{ $mundial->fecha_fin ?? '30 de junio' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '32' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Corea del Sur y Japón?
            </div>
            <div class="card-body">
                <p>El Mundial de 2002 fue el **primero coorganizado por dos países** y el primero en Asia. La sede fue otorgada por:</p>
                <ul>
                    <li>La **creciente influencia del fútbol asiático**, con ambos países mostrando fuerte desarrollo en infraestructura.</li>
                    <li>La capacidad de ambos países para construir estadios modernos, como el Seoul World Cup Stadium.</li>
                    <li>La decisión de la FIFA de expandir el torneo a nuevas regiones para globalizar el fútbol.</li>
                </ul>
                <p class="fst-italic text-danger">El torneo fue notable por sorpresas como la eliminación temprana de Francia y el éxito de equipos como Corea del Sur y Turquía.</p>
                
                <div class="text-center mt-4">
                    <img src="{{ asset('img/2002/seoul_world_cup_stadium.jpg') }}" alt="Seoul World Cup Stadium" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">El Seoul World Cup Stadium, uno de los principales escenarios del torneo.</p>
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
                        <p class="fw-bold">El Mundial comenzó el 31 de mayo de 2002 con el partido inaugural:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇫🇷 Francia 0-1 **🇸🇳 Senegal** (Seoul World Cup Stadium)</li>
                        </ul>
                        <p class="mt-3">El primer gol del torneo lo marcó **Papa Bouba Diop** (Senegal) a los 30 minutos.</p>
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
                                    'Alemania', 'Argentina', 'Bélgica', 'Brasil', 'Camerún', 'China', 'Corea del Sur', 'Costa Rica',
                                    'Croacia', 'Dinamarca', 'Ecuador', 'Eslovenia', 'España', 'Estados Unidos', 'Francia', 'Inglaterra',
                                    'Irlanda', 'Italia', 'Japón', 'México', 'Nigeria', 'Paraguay', 'Polonia', 'Portugal', 'Rusia',
                                    'Arabia Saudí', 'Senegal', 'Sudáfrica', 'Suecia', 'Túnez', 'Turquía', 'Uruguay'
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
                            <li class="list-group-item">🇧🇷 **Ronaldo** (Brasil) - **8 Goles**</li>
                            <li class="list-group-item">🇧🇷 Rivaldo (Brasil) - 5 Goles</li>
                            <li class="list-group-item">🇩🇪 Miroslav Klose (Alemania) - 5 Goles</li>
                            <li class="list-group-item">🇸🇳 Papa Bouba Diop (Senegal) - 3 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇧🇷 **Rivaldo** (Brasil) - 4 Asistencias</li>
                            <li class="list-group-item">🇧🇷 Ronaldinho (Brasil) - 3 Asistencias</li>
                            <li class="list-group-item">🇩🇪 Michael Ballack (Alemania) - 3 Asistencias</li>
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
                            <td>🇧🇷 **Brasil** vs. 🇹🇷 Turquía</td>
                            <td>**1** - 0</td>
                            <td>Saitama Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>🇩🇪 **Alemania** vs. 🇰🇷 Corea del Sur</td>
                            <td>**1** - 0</td>
                            <td>Seoul World Cup Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>🇧🇷 **Brasil** vs. 🇩🇪 Alemania</td>
                            <td>**2** - 0</td>
                            <td>International Stadium Yokohama</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">Brasil ganó 2-0 a Alemania en la final, logrando su quinto título mundial.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Campeón: Alineación de Brasil en la Final vs. Alemania 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        $alineacion = [
                            'Portero' => 'Marcos',
                            'Defensa' => ['Lúcio', 'Edmílson', 'Roque Júnior'],
                            'Mediocampo' => ['Cafu (C)', 'Gilberto Silva', 'Kléberson', 'Roberto Carlos'],
                            'Delanteros' => ['Rivaldo', 'Ronaldo', 'Ronaldinho'],
                            'Entrenador' => 'Luiz Felipe Scolari',
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