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
            ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '1930' }} - {{ $mundial->pais_sede ?? 'Uruguay' }} 🇺🇾
        </h1>

        <hr>
        
        {{-- Sección de Datos Clave --}}
        <div class="row mb-5 text-center">
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
                <h3 class="text-uppercase">{{ $mundial->campeon->nombre ?? 'URUGUAY' }}</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">🗓️ Fechas:</p>
                <h3 class="text-muted">{{ $mundial->fecha_inicio ?? '13' }} al {{ $mundial->fecha_fin ?? '30' }} de julio</h3>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-5 text-secondary">👥 Equipos:</p>
                <h3 class="text-muted">{{ $mundial->equipos_count ?? '13' }}</h3>
            </div>
        </div>

        <hr class="mb-5">

        {{-- Sección 1: Decisión de la Sede --}}
        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                📜 La Sede: ¿Por qué Uruguay?
            </div>
            <div class="card-body">
                <p>El Mundial de 1930 fue único por ser el **primero de la historia** y el único en el que **no hubo proceso de clasificación**. La sede fue otorgada a **Uruguay** por tres razones principales:</p>
                <ul>
                    <li>El país celebraba el **centenario de su primera constitución** (1830), lo que la FIFA consideró un motivo de gran celebración.</li>
                    <li>Uruguay era la **actual campeona olímpica de fútbol** (ganó el oro en 1924 y 1928), un gran logro en esa época.</li>
                    <li>El gobierno uruguayo se comprometió a **cubrir los gastos de viaje y alojamiento** de los equipos participantes, lo que era crucial para atraer a las naciones europeas.</li>
                </ul>
                <p class="fst-italic text-danger">Sin embargo, debido a las dificultades del viaje transatlántico (4 semanas por barco), muchas naciones europeas declinaron, resultando en solo 4 equipos europeos y 9 americanos (13 en total).</p>
                
                {{-- Imagen de la sede --}}
                <div class="text-center mt-4">
                    <img src="{{ asset('img/1930/estadio_centenario.jpg') }}" alt="Estadio Centenario" class="img-fluid rounded shadow" style="max-height: 350px;">
                    <p class="text-muted mt-2">El Estadio Centenario, construido para el Mundial y la celebración del centenario.</p>
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
                        <p class="fw-bold">El Mundial tuvo dos partidos inaugurales simultáneos el 13 de julio de 1930:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇫🇷 **Francia** 4-1 México 🇲🇽 (Estadio Pocitos)</li>
                            <li class="list-group-item">🇺🇸 **Estados Unidos** 3-0 Bélgica 🇧🇪 (Parque Central)</li>
                        </ul>
                        <p class="mt-3">El primer gol de la historia de los Mundiales lo marcó el francés **Lucien Laurent** contra México a los 19 minutos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow h-100">
                    <div class="card-header bg-success text-white fw-bold fs-5">
                        👥 Equipos Clasificados (13)
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- Lista hardcodeada de equipos clasificados --}}
                            @php
                                $clasificados = ['Argentina', 'Bélgica', 'Bolivia', 'Brasil', 'Chile', 'Francia', 'México', 'Paraguay', 'Perú', 'Rumania', 'Estados Unidos', 'Uruguay', 'Yugoslavia'];
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
                            <li class="list-group-item">🇦🇷 **Guillermo Stábile** (Argentina) - **8 Goles**</li>
                            <li class="list-group-item">🇺🇾 Pedro Cea (Uruguay) - 5 Goles</li>
                            <li class="list-group-item">🇺🇸 Bert Patenaude (Estados Unidos) - 4 Goles</li>
                            <li class="list-group-item">🇦🇷 Carlos Peucelle (Argentina) - 3 Goles</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-danger">Máximos Asistidores (No oficial):</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🇦🇷 Francisco Varallo (Argentina) - 3 Asistencias (estimado)</li>
                            <li class="list-group-item">🇺🇾 Pedro Cea (Uruguay) - 3 Asistencias (estimado)</li>
                            <li class="list-group-item text-muted fst-italic">Nota: Las asistencias no se registraron oficialmente en 1930.</li>
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
                            <td>🇺🇸 Estados Unidos vs. **🇦🇷 Argentina**</td>
                            <td>1 - **6**</td>
                            <td>Centenario</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Semifinal</td>
                            <td>**🇺🇾 Uruguay** vs. 🇾🇪 Yugoslavia</td>
                            <td>**6** - 1</td>
                            <td>Centenario</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td>**🇺🇾 Uruguay** vs. 🇦🇷 Argentina</td>
                            <td>**4** - 2</td>
                            <td>Centenario</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold">Uruguay ganó 4-2 a Argentina en la final, volviéndose la primera campeona del mundo.</p>
            </div>
        </div>
        
        <hr class="mt-5">

        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (URUGUAY) EN LA FINAL 🏆 --}}
        <div class="card shadow border-success">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center">
                🌟 Homenaje al Primer Campeón: Alineación de Uruguay en la Final vs. Argentina 🌟
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @php
                        // Alineación de la Final (4-3-3 o similar de la época)
                        $alineacion = [
                            'Portero' => 'Enrique Ballestero',
                            'Defensa' => ['José Nasazzi (C)', 'Ernesto Mascheroni'],
                            'Mediocampo' => ['José Andrade', 'Lorenzo Fernández', 'Álvaro Gestido'],
                            'Delantera' => ['Pablo Dorado', 'Héctor Scarone', 'Héctor Castro', 'Pedro Cea', 'Santos Iriarte'],
                            'Entrenador' => 'Alberto Suppici',
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
                        <p class="fs-5 text-dark">{{ implode(' • ', $alineacion['Delantera']) }}</p>
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