@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
        <h1 class="mb-3 text-center fw-bold text-primary">
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '2022' }} - {{ $mundial->pais_sede ?? 'Catar' }} 🇶🇦
        </h1>
        
        <div class="text-center mb-5">
            <img src="{{ asset($mundial->logo_url ?? 'img/2022/logo.jpg') }}" alt="Logo Mundial 2022" class="img-fluid rounded shadow" style="max-height: 200px;">
            <p class="text-muted mt-2">Logo oficial de la Copa Mundial de la FIFA 2022</p>
        </div>

        <hr>
        
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'ARGENTINA' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '20 de noviembre' }} al {{ $mundial->fecha_fin ?? '18 de diciembre' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '32' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Catar?
            </div>
            <div class="card-body">
                <p>El Mundial de 2022 fue el primero en Oriente Medio y el primero en invierno del hemisferio norte. Catar fue elegido por:</p>
                <ul>
                    <li>La inversión masiva en estadios modernos, como el Lusail Stadium.</li>
                    <li>El interés de la FIFA en expandir el fútbol a nuevas regiones.</li>
                    <li>La compacta infraestructura, con todos los estadios a menos de una hora de Doha.</li>
                </ul>
                <p class="fst-italic text-danger">El torneo generó controversias por las condiciones laborales y el cambio de fechas al invierno.</p>
                
                <div class="text-center mt-4">
                    <img src="{{ asset('img/2022/lusail_stadium.jpg') }}" alt="Lusail Stadium" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">El Lusail Stadium, escenario de la final del Mundial 2022.</p>
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
                        <p class="fw-bold">El Mundial comenzó el 20 de noviembre de 2022 con el partido inaugural:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇶🇦 Catar 0-2 **🇪🇨 Ecuador** (Al Bayt Stadium)</li>
                        </ul>
                        <p class="mt-3">El primer gol del torneo lo marcó **Enner Valencia** (Ecuador) a los 16 minutos.</p>
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
                                    'Alemania', 'Arabia Saudí', 'Argentina', 'Australia', 'Bélgica', 'Brasil', 'Camerún', 'Canadá',
                                    'Corea del Sur', 'Costa Rica', 'Croacia', 'Dinamarca', 'Ecuador', 'España', 'Estados Unidos', 'Francia',
                                    'Ghana', 'Holanda', 'Inglaterra', 'Irán', 'Japón', 'Marruecos', 'México', 'Polonia', 'Portugal',
                                    'Qatar', 'Senegal', 'Serbia', 'Suiza', 'Túnez', 'Uruguay', 'Gales'
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
                            <li class="list-group-item">🇫🇷 **Kylian Mbappé** (Francia) - **8 Goles**</li>
                            <li class="list-group-item">🇦🇷 Lionel Messi (Argentina) - 7 Goles</li>
                            <li class="list-group-item">🇫🇷 Olivier Giroud (Francia) - 4 Goles</li>
                            <li class="list-group-item">🇦🇷 Julián Álvarez (Argentina) - 4 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇦🇷 **Lionel Messi** (Argentina) - 3 Asistencias</li>
                            <li class="list-group-item">🇫🇷 Antoine Griezmann (Francia) - 3 Asistencias</li>
                            <li class="list-group-item">🇭🇷 Ivan Perišić (Croacia) - 3 Asistencias</li>
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
                            <td>🇦🇷 **Argentina** vs. 🇭🇷 Croacia</td>
                            <td>**3** - 0</td>
                            <td>Lusail Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>🇫🇷 **Francia** vs. 🇲🇦 Marruecos</td>
                            <td>**2** - 0</td>
                            <td>Al Bayt Stadium</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>🇦🇷 **Argentina** vs. 🇫🇷 Francia</td>
                            <td>**3** - 3 (4-2 en penales)</td>
                            <td>Lusail Stadium</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">Argentina ganó 3-3 (4-2 en penales) a Francia en la final, logrando su tercer título mundial.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Campeón: Alineación de Argentina en la Final vs. Francia 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        $alineacion = [
                            'Portero' => 'Emiliano Martínez',
                            'Defensa' => ['Nahuel Molina', 'Cristian Romero', 'Nicolás Otamendi', 'Marcos Acuña'],
                            'Mediocampo' => ['Rodrigo De Paul', 'Enzo Fernández', 'Alexis Mac Allister'],
                            'Delanteros' => ['Ángel Di María', 'Lionel Messi (C)', 'Julián Álvarez'],
                            'Entrenador' => 'Lionel Scaloni',
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