@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
        <h1 class="mb-5 text-center fw-bold text-primary">
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '2018' }} - {{ $mundial->pais_sede ?? 'Rusia' }} 🇷🇺
        </h1>

        <hr>
        
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'FRANCIA' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '14 de junio' }} al {{ $mundial->fecha_fin ?? '15 de julio' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '32' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Rusia?
            </div>
            <div class="card-body">
                <p>El Mundial de 2018 fue el primero en Europa del Este. Rusia fue elegida por:</p>
                <ul>
                    <li>Su capacidad para construir y renovar estadios, como el Luzhniki Stadium.</li>
                    <li>El interés de la FIFA en expandir el torneo a nuevas regiones geopolíticas.</li>
                    <li>La inversión masiva en infraestructura para conectar 11 ciudades anfitrionas.</li>
                </ul>
                <p class="fst-italic text-danger">El torneo destacó por el uso del VAR y sorpresas como la eliminación de Alemania en fase de grupos.</p>
                
                <div class="text-center mt-4">
                    <img src="{{ asset('img/2018/luzhniki_stadium.jpg') }}" alt="Luzhniki Stadium" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">El Luzhniki Stadium, escenario de la final del Mundial 2018.</p>
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
                        <p class="fw-bold">El Mundial comenzó el 14 de junio de 2018 con el partido inaugural:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇷🇺 **Rusia** 5-0 🇸🇦 Arabia Saudí (Luzhniki Stadium)</li>
                        </ul>
                        <p class="mt-3">El primer gol del torneo lo marcó **Yury Gazinsky** (Rusia) a los 12 minutos.</p>
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
                                    'Alemania', 'Arabia Saudí', 'Argentina', 'Australia', 'Bélgica', 'Brasil', 'Colombia', 'Corea del Sur',
                                    'Costa Rica', 'Croacia', 'Dinamarca', 'Egipto', 'España', 'Francia', 'Inglaterra', 'Irán',
                                    'Islandia', 'Japón', 'México', 'Marruecos', 'Nigeria', 'Panamá', 'Perú', 'Polonia',
                                    'Portugal', 'Rusia', 'Senegal', 'Serbia', 'Suecia', 'Suiza', 'Túnez', 'Uruguay'
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
                            <li class="list-group-item">🏴󠁧󠁢󠁥󠁮󠁧󠁿 **Harry Kane** (Inglaterra) - **6 Goles**</li>
                            <li class="list-group-item">🇧🇪 Romelu Lukaku (Bélgica) - 4 Goles</li>
                            <li class="list-group-item">🇫🇷 Antoine Griezmann (Francia) - 4 Goles</li>
                            <li class="list-group-item">🇷🇺 Denis Cheryshev (Rusia) - 4 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇧🇪 **Eden Hazard** (Bélgica) - 4 Asistencias</li>
                            <li class="list-group-item">🇫🇷 Antoine Griezmann (Francia) - 3 Asistencias</li>
                            <li class="list-group-item">🏴󠁧󠁢󠁥󠁮󠁧󠁿 Kieran Trippier (Inglaterra) - 3 Asistencias</li>
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
                            <td>🇫🇷 **Francia** vs. 🇧🇪 Bélgica</td>
                            <td>**1** - 0</td>
                            <td>Saint Petersburg Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>🏴󠁧󠁢󠁥󠁮󠁧󠁿 Inglaterra vs. **🇭🇷 Croacia**</td>
                            <td>1 - **2** (prórroga)</td>
                            <td>Luzhniki Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>🇫🇷 **Francia** vs. 🇭🇷 Croacia</td>
                            <td>**4** - 2</td>
                            <td>Luzhniki Stadium</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">Francia ganó 4-2 a Croacia en la final, logrando su segundo título mundial.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Campeón: Alineación de Francia en la Final vs. Croacia 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        $alineacion = [
                            'Portero' => 'Hugo Lloris',
                            'Defensa' => ['Benjamin Pavard', 'Raphaël Varane', 'Samuel Umtiti', 'Lucas Hernández'],
                            'Mediocampo' => ['N’Golo Kanté', 'Paul Pogba', 'Blaise Matuidi'],
                            'Delanteros' => ['Kylian Mbappé', 'Antoine Griezmann', 'Olivier Giroud'],
                            'Entrenador' => 'Didier Deschamps',
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