@extends('layouts.app')

@section('content')
    
    {{-- Contenedor principal centrado (ajusta a 'container-fluid' si prefieres ancho completo) --}}
    <div class="container py-4">
        
        {{-- BOTÓN DE REGRESO SUPERIOR --}}
        <div class="mb-4">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
        <h1 class="mb-5 text-center fw-bold text-primary">
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '1998' }} - {{ $mundial->pais_sede ?? 'Francia' }} 🇫🇷
        </h1>

        <hr>
        
        {{-- Sección de Datos Clave --}}
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'FRANCIA' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '10 de junio' }} al {{ $mundial->fecha_fin ?? '12 de julio' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '32' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        {{-- Sección 1: Decisión de la Sede --}}
        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Francia?
            </div>
            <div class="card-body">
                <p>El Mundial de 1998 fue el **segundo organizado por Francia** (el primero fue en 1938) y marcó la primera vez que el torneo incluyó **32 equipos**. La sede fue otorgada a Francia por varias razones:</p>
                <ul>
                    <li>Francia tenía una **sólida infraestructura futbolística** y experiencia organizativa, respaldada por la UEFA y eventos previos como la Eurocopa 1984.</li>
                    <li>La construcción del **Stade de France**, un estadio moderno, fue un factor clave para albergar la final y otros partidos importantes.</li>
                    <li>El país buscaba consolidar su posición como potencia futbolística tras décadas sin un título mundial, apoyado por una generación dorada de jugadores.</li>
                </ul>
                <p class="fst-italic text-danger">El torneo fue un éxito logístico, con alta asistencia y una organización impecable, aunque hubo controversias por el alto costo de las entradas y la distribución de boletos.</p>
                
                {{-- Imagen de la sede --}}
                <div class="text-center mt-4">
                    <img src="{{ asset('img/1998/stade_de_france.jpg') }}" alt="Stade de France" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">El Stade de France, construido para el Mundial de 1998.</p>
                </div>
            </div>
        </div>

        {{-- Sección 2: El Partido Inaugural y Clasificados --}}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card shadow h-100">
                    <div class="card-header bg-info text-white fw-bold fs-5">
                        Kick-off: Partido Inaugural
                    </div>
                    <div class="card-body">
                        <p class="fw-bold">El Mundial comenzó el 10 de junio de 1998 con el partido inaugural:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇧🇷 **Brasil** 2-1 Escocia 🏴󠁧󠁢󠁳󠁣󠁴󠁿 (Stade de France)</li>
                        </ul>
                        <p class="mt-3">El primer gol del torneo lo marcó **César Sampaio** (Brasil) a los 5 minutos.</p>
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
                            {{-- Lista de equipos clasificados --}}
                            @php
                                $clasificados = [
                                    'Alemania', 'Argentina', 'Austria', 'Bélgica', 'Brasil', 'Bulgaria', 'Camerún', 'Chile',
                                    'Colombia', 'Corea del Sur', 'Croacia', 'Dinamarca', 'Escocia', 'España', 'Estados Unidos',
                                    'Francia', 'Holanda', 'Inglaterra', 'Irán', 'Italia', 'Jamaica', 'Japón', 'Marruecos',
                                    'México', 'Nigeria', 'Noruega', 'Paraguay', 'Rumania', 'Sudáfrica', 'Túnez', 'Yugoslavia', 'Arabia Saudí'
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
        
        {{-- Sección 3: Goleadores y Asistidores --}}
        <div class="card shadow mb-5">
            <div class="card-header bg-warning text-dark fw-bold fs-5">
                ⚽ Goleadores y Asistidores Destacados
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Goleadores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇭🇷 **Davor Šuker** (Croacia) - **6 Goles**</li>
                            <li class="list-group-item">🇦🇷 Gabriel Batistuta (Argentina) - 5 Goles</li>
                            <li class="list-group-item">🇮🇹 Christian Vieri (Italia) - 5 Goles</li>
                            <li class="list-group-item">🇲🇽 Luis Hernández (México) - 4 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇫🇷 **Zinédine Zidane** (Francia) - 3 Asistencias</li>
                            <li class="list-group-item">🇧🇷 Rivaldo (Brasil) - 3 Asistencias</li>
                            <li class="list-group-item">🇳🇱 Dennis Bergkamp (Holanda) - 3 Asistencias</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sección 4: Resultados de los Partidos Finales --}}
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
                            <td>🇧🇷 Brasil vs. **🇳🇱 Holanda**</td>
                            <td>1 - 1 (4-2 en penales)</td>
                            <td>Stade Vélodrome</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>**🇫🇷 Francia** vs. 🇭🇷 Croacia</td>
                            <td>**2** - 1</td>
                            <td>Stade de France</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>**🇫🇷 Francia** vs. 🇧🇷 Brasil</td>
                            <td>**3** - 0</td>
                            <td>Stade de France</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">Francia ganó 3-0 a Brasil en la final, logrando su primer título mundial.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (FRANCIA) EN LA FINAL 🏆 --}}
        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Campeón: Alineación de Francia en la Final vs. Brasil 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        // Alineación de la Final (4-3-2-1)
                        $alineacion = [
                            'Portero' => 'Fabien Barthez',
                            'Defensa' => ['Lilian Thuram', 'Marcel Desailly', 'Frank Leboeuf', 'Bixente Lizarazu'],
                            'Mediocampo' => ['Didier Deschamps (C)', 'Emmanuel Petit', 'Christian Karembeu'],
                            'Delanteros Creativos' => ['Zinédine Zidane', 'Youri Djorkaeff'],
                            'Delantero' => ['Stéphane Guivarc’h'],
                            'Entrenador' => 'Aimé Jacquet',
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
                        <p class="fw-bold text-primary">Delanteros Creativos y Delantero:</p>
                        <p class="fs-5 text-dark">{{ implode(' • ', array_merge($alineacion['Delanteros Creativos'], $alineacion['Delantero'])) }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- BOTÓN DE REGRESO INFERIOR --}}
        <div class="mt-5 text-center">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                ← Regresar al Índice de Mundiales
            </a>
        </div>
        
    </div>
@endsection