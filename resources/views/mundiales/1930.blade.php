@extends('layouts.app')

@section('content')
    
    {{-- Contenedor principal centrado, agregamos sombra grande para efecto libro --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif" style="border: 2px solid #a0a0a0; padding: 3rem;">
        
        {{-- BOTÓN DE REGRESO SUPERIOR --}}
        <div class="mb-4 text-center">
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm" style="border-radius: 0;">
                <span class="fs-6">← Regresar al Índice de Mundiales</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-muted">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-dark font-title" style="border-bottom: 3px double #333;">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1930' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Uruguay' }} 🇺🇾</p>
        </header>

        {{-- Separador de época --}}
        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'URUGUAY' }}</td>
                            <td class="text-muted">{{ $mundial->fecha_inicio ?? '13' }} al {{ $mundial->fecha_fin ?? '30' }} de julio</td>
                            <td class="text-muted">{{ $mundial->equipos_count ?? '13' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Sección 1: Decisión de la Sede --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant" style="border-radius: 0;">
                📜 Capítulo I: La Sede - ¿Por qué {{ $mundial->pais_sede ?? 'Uruguay' }}?
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>El Mundial de 1930 fue único por ser el **primero de la historia** y el único en el que **no hubo proceso de clasificación**. La sede fue otorgada a **Uruguay** por tres razones principales:</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">El país celebraba el **centenario de su primera constitución** (1830).</li>
                    <li class="list-group-item bg-light-gray border-0">Uruguay era la **actual campeona olímpica de fútbol** (ganó el oro en 1924 y 1928).</li>
                    <li class="list-group-item bg-light-gray border-0">El gobierno uruguayo se comprometió a **cubrir los gastos de viaje** de los equipos participantes.</li>
                </ul>
                <p class="fst-italic text-danger small">Debido a la dificultad del viaje transatlántico (4 semanas por barco), muchas naciones europeas declinaron, resultando en solo 13 equipos participantes.</p>
                
                {{-- Imagen de la sede --}}
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1930/estadio_centenario.jpg') }}" alt="Estadio Centenario" class="img-fluid" style="max-height: 350px;">
                    <p class="text-muted mt-2 small font-elegant">El Estadio Centenario, construido para el Mundial y la celebración del centenario.</p>
                </div>
            </div>
        </div>

        {{-- Sección 2: El Partido Inaugural y Clasificados --}}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-header bg-secondary text-white fw-bold fs-5 font-elegant" style="border-radius: 0;">
                        Kick-off: Partido Inaugural
                    </div>
                    <div class="card-body border-secondary border-bottom border-3">
                        <p class="fw-bold">El Mundial tuvo dos partidos inaugurales simultáneos el 13 de julio de 1930:</p>
                        <ul class="list-group list-group-flush font-elegant">
                            <li class="list-group-item border-0">🇫🇷 **Francia** 4-1 México 🇲🇽</li>
                            <li class="list-group-item border-0">🇺🇸 **Estados Unidos** 3-0 Bélgica 🇧🇪</li>
                        </ul>
                        <p class="mt-3 small fst-italic">El primer gol de la historia lo marcó el francés **Lucien Laurent**.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant" style="border-radius: 0;">
                        👥 Naciones Participantes (13)
                    </div>
                    <div class="card-body border-dark border-bottom border-3">
                        <div class="row">
                            @php
                                $clasificados = ['Argentina', 'Bélgica', 'Bolivia', 'Brasil', 'Chile', 'Francia', 'México', 'Paraguay', 'Perú', 'Rumania', 'Estados Unidos', 'Uruguay', 'Yugoslavia'];
                            @endphp
                            @foreach ($clasificados as $equipo)
                                <div class="col-6 mb-2">
                                    <span class="badge rounded-pill text-bg-light border border-dark font-elegant">{{ $equipo }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Sección 4: Resultados de los Partidos Finales --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant" style="border-radius: 0;">
                Capítulo II: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    <thead class="table-dark">
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
                        {{-- ... (otras filas) ... --}}
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>**🇺🇾 Uruguay** vs. 🇦🇷 Argentina</td>
                            <td class="fw-bold text-success fs-5">**4** - 2</td>
                            <td>Centenario</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Uruguay ganó 4-2 a Argentina, volviéndose la primera campeona del mundo.</p>
            </div>
        </div>

        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (URUGUAY) EN LA FINAL 🏆 --}}
        <div class="card border-3 shadow border-dark-subtle">
            <div class="card-header bg-success text-white fw-bold fs-5 text-center font-elegant" style="border-radius: 0;">
                🌟 Homenaje al Primer Campeón: Alineación de Uruguay en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        // Alineación de la Final
                        $alineacion = [
                            'Portero' => 'Enrique Ballestero',
                            'Defensa' => ['José Nasazzi (C)', 'Ernesto Mascheroni'],
                            'Mediocampo' => ['José Andrade', 'Lorenzo Fernández', 'Álvaro Gestido'],
                            'Delantera' => ['Pablo Dorado', 'Héctor Scarone', 'Héctor Castro', 'Pedro Cea', 'Santos Iriarte'],
                            'Entrenador' => 'Alberto Suppici',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion['Entrenador'] }}</p>
                    </div>

                    {{-- Estilos para las posiciones --}}
                    @foreach ($alineacion as $posicion => $jugadores)
                        @if (is_array($jugadores))
                            <div class="col-md-4 mb-3">
                                <p class="fw-bold text-dark border-bottom mb-1">{{ strtoupper($posicion) }}:</p>
                                @foreach ($jugadores as $jugador)
                                    <p class="mb-0 small">{{ $jugador }}</p>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    <div class="col-md-4 mb-3">
                        <p class="fw-bold text-dark border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- BOTÓN DE REGRESO INFERIOR --}}
        <div class="mt-5 text-center">
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm" style="border-radius: 0;">
                <span class="fs-6">← Regresar al Índice de Mundiales</span>
            </a>
        </div>
        
    </div>
@endsection