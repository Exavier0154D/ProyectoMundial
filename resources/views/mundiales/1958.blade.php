@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Azul/Amarillo --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-suecia-58" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
            /* Variables CSS de Suecia: Azul (principal), Amarillo (secundario) */
            .mundial-suecia-58 {
                --color-principal: #006AA7; /* Azul Sueco */
                --color-secundario: #FECC00; /* Amarillo Sueco */
                --color-terciario: #FFFFFF; /* Blanco */
            }

            /* 1. FONDOS Y BORDES (AZUL SUECO) */
            .mundial-suecia-58 .bg-dark,
            .mundial-suecia-58 .table-dark thead,
            .mundial-suecia-58 .card-header.bg-dark,
            .mundial-suecia-58 .btn-dark {
                background-color: var(--color-principal) !important; 
                border-color: var(--color-principal) !important;
                color: var(--color-terciario) !important; /* Texto en Blanco */
            }

            /* 2. FONDOS DE ACENTO (AMARILLO SUECO) */
            .mundial-suecia-58 .bg-success,
            .mundial-suecia-58 .card-header.bg-success {
                background-color: var(--color-secundario) !important;
                color: #000000 !important; /* Texto negro para contraste con amarillo */
            }
            
            /* CRÍTICO: TEXTO DEL CUERPO DE LA TABLA (td) y textos de alineación */
            .mundial-suecia-58 p, 
            .mundial-suecia-58 li,
            .mundial-suecia-58 table td,
            .mundial-suecia-58 .card-body p,
            .mundial-suecia-58 .fw-bold {
                color: #3d3d3d !important; /* Color oscuro para el cuerpo del texto */
            }

            /* 3. COLORES DINÁMICOS DE TEXTO */
            .mundial-suecia-58 .text-primary {
                color: var(--color-principal) !important; /* Azul Sueco */
            }
            .mundial-suecia-58 .text-secondary,
            .mundial-suecia-58 .text-success {
                color: var(--color-secundario) !important; /* Amarillo Sueco */
            }
            .mundial-suecia-58 .badge.bg-secondary {
                background-color: var(--color-principal) !important; 
                color: var(--color-terciario) !important; 
            }
            /* Tablas de Datos Clave: Fondo blanco, texto azul */
            .mundial-suecia-58 table thead th {
                background-color: var(--color-terciario) !important; 
                border-color: var(--color-principal) !important;
                color: var(--color-principal) !important; /* Texto del encabezado de tabla en AZUL */
            }
        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 5]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Suiza 1954</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 7]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Chile 1962 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1958' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'Suecia' }} 🇸🇪</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- Sección de Datos Clave (Tabla Formal) --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered table-sm text-center font-elegant">
                    {{-- Encabezado de tabla: Fondo BLANCO, texto AZUL por CSS --}}
                    <thead> 
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS CLAVE</th>
                            <th>👥 EQUIPOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Campeón: Amarillo Sueco (text-success ya lo maneja) --}}
                            <td class="fw-bold text-success fs-5">{{ $mundial->campeon->nombre ?? 'BRASIL' }}</td>
                            <td>8 al 29 de junio</td> 
                            <td>16</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SECCIÓN CIUDADES SEDE --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-1 text-primary">Ciudades Sede:</p>
                    <p class="mb-0 small text-primary">
                        Estocolmo, Gotemburgo, Malmö, Norrköping, Örebro, Sandviken, Uddevalla, Västerås, Halmstad, Helsingborg, Borås, Eskilstuna (12 ciudades).
                    </p>
                </div>
            </div>
        </div>

        {{-- SECCIÓN IMAGEN Y HECHOS NOTABLES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            {{-- Encabezado: Azul Sueco, texto BLANCO --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: El Nacimiento de un Rey
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <p>Este torneo marcó el inicio de la era de Pelé, un joven de 17 años que se convirtió en una leyenda mundial.</p>
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">**La Irrupción de Pelé:** El joven Edson Arantes do Nascimento anotó 6 goles, incluyendo un *hat-trick* contra Francia en semifinales y un doblete en la final.</li>
                    <li class="list-group-item bg-light-gray border-0">**Primer Título Brasileño:** Brasil ganó su primer Mundial y el primero fuera de América.</li>
                    <li class="list-group-item bg-light-gray border-0">**Just Fontaine:** El delantero francés anotó 13 goles, un récord que sigue vigente hasta hoy para una sola edición.</li>
                </ul>
                
                <div class="text-center mt-4 border border-dark p-2" style="background-color: #eee;">
                    <img src="{{ asset('img/1958/1958_Pelé.jpg') }}" alt="Pelé y Garrincha celebrando" class="img-fluid" style="max-height: 350px;">
                    <p class="text-muted mt-2 small font-elegant">Pelé y Garrincha, piezas clave de la 'Canarinha'.</p>
                </div>
            </div>
        </div>

        {{-- Resultados Finales --}}
        <div class="card border-0 shadow mb-5">
            {{-- Encabezado: Azul Sueco, texto BLANCO --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                Capítulo II: Finales y Resultados Clave
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    {{-- Encabezado de tabla: Azul Sueco, texto BLANCO --}}
                    <thead class="table-dark">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Goleador(es)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Goleador</td>
                            <td colspan="2">Just Fontaine (Francia)</td>
                            <td>13 goles</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-danger fs-6">FINAL</td>
                            <td>**🇧🇷 Brasil** vs. Suecia 🇸🇪</td>
                            {{-- Resultado: Amarillo Sueco --}}
                            <td class="fw-bold text-success fs-5">**5** - 2</td>
                            <td>Pelé (2), Vavá (2), Zagallo</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 fw-bold font-elegant">Brasil ganó su primer título, derrotando al anfitrión.</p>
            </div>
        </div>
        
        
        {{-- 🌍 NUEVA SECCIÓN: SELECCIONES CLASIFICADAS (Para mundiales desde 1958) 🌍 --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            {{-- Encabezado: Amarillo Sueco, texto NEGRO --}}
            <div class="card-header bg-success fw-bold fs-5 text-center font-elegant">
                🏆 Capítulo III: Equipos Clasificados (16) 🏆
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $equipos_1958 = [
                            'AFRICA/ASIA' => ['Egipto (retirado)'], // Reemplazado por Israel, que jugó vs Gales (Gales clasificó)
                            'AMÉRICA' => ['Argentina', 'Brasil', 'México', 'Paraguay'],
                            'EUROPA' => ['Alemania Federal', 'Austria', 'Checoslovaquia', 'Escocia', 'Francia', 'Hungría', 'Irlanda del Norte', 'Inglaterra', 'Suecia (Anfitrión)', 'Unión Soviética', 'Yugoslavia', 'Gales'],
                        ];
                    @endphp

                    {{-- Lista de Equipos --}}
                    <div class="col-12 mt-3">
                        <ul class="list-unstyled d-flex flex-wrap justify-content-center gap-3">
                            <li class="badge bg-dark fw-normal">Alemania Federal</li>
                            <li class="badge bg-dark fw-normal">Argentina</li>
                            <li class="badge bg-dark fw-normal">Austria</li>
                            <li class="badge bg-dark fw-normal">Brasil</li>
                            <li class="badge bg-dark fw-normal">Checoslovaquia</li>
                            <li class="badge bg-dark fw-normal">Escocia</li>
                            <li class="badge bg-dark fw-normal">Francia</li>
                            <li class="badge bg-dark fw-normal">Gales</li>
                            <li class="badge bg-dark fw-normal">Hungría</li>
                            <li class="badge bg-dark fw-normal">Inglaterra</li>
                            <li class="badge bg-dark fw-normal">Irlanda del Norte</li>
                            <li class="badge bg-dark fw-normal">México</li>
                            <li class="badge bg-dark fw-normal">Paraguay</li>
                            <li class="badge bg-dark fw-normal">Suecia (Anfitrión)</li>
                            <li class="badge bg-dark fw-normal">Unión Soviética</li>
                            <li class="badge bg-dark fw-normal">Yugoslavia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- 🏆 SECCIÓN DE HOMENAJE: ALINEACIÓN DEL CAMPEÓN (BRASIL) EN LA FINAL 🏆 --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            {{-- Encabezado de Homenaje: Azul Sueco, texto BLANCO --}}
            <div class="card-header bg-dark text-white fw-bold fs-5 text-center font-elegant">
                🌟 Homenaje al Campeón: Alineación de Brasil en la Final 🌟
            </div>
            <div class="card-body p-4">
                <div class="row text-center font-elegant">
                    @php
                        $alineacion_brasil_58 = [
                            'Portero' => 'Gilmar',
                            'Defensa' => ['Djalma Santos', 'Bellini (C)', 'Orlando', 'Nilton Santos'],
                            'Mediocampo' => ['Zito', 'Didi'],
                            'Delantera' => ['Garrincha', 'Vavá', 'Pelé', 'Zagallo'],
                            'Entrenador' => 'Vicente Feola',
                        ];
                    @endphp

                    <div class="col-12 mb-3 border-bottom border-primary pb-2">
                        <p class="fw-bold text-primary mb-1">Entrenador:</p>
                        <p class="fs-5 text-dark">{{ $alineacion_brasil_58['Entrenador'] }}</p>
                    </div>

                    {{-- La defensa de 4 --}}
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DEFENSA:</p>
                        @foreach ($alineacion_brasil_58['Defensa'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>

                    {{-- El medio campo de 2 (base del 4-2-4) --}}
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">MEDIOCAMPO:</p>
                        @foreach ($alineacion_brasil_58['Mediocampo'] as $jugador)
                            <p class="mb-0 small">{{ $jugador }}</p>
                        @endforeach
                    </div>
                    
                    {{-- El ataque de 4 (crucial en el 4-2-4) --}}
                    <div class="col-12 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-1">DELANTERA:</p>
                        @foreach ($alineacion_brasil_58['Delantera'] as $jugador)
                            <p class="mb-0 small d-inline-block mx-2">{{ $jugador }}</p>
                        @endforeach
                    </div>

                    <div class="col-12 mt-3">
                        <p class="fw-bold text-primary border-bottom mb-1">PORTERO:</p>
                        <p class="mb-0 small">{{ $alineacion_brasil_58['Portero'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            
            <a href="{{ route('enciclopedia.show', ['mundial' => 5]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Suiza 1954</span>
            </a>

            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>

            <a href="{{ route('enciclopedia.show', ['mundial' => 7]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: Chile 1962 →</span>
            </a>
        </div>
        
    </div>
@endsection