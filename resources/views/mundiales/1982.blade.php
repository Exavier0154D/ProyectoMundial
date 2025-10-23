@extends('layouts.app')

@section('content')
    
    {{-- CRÍTICO: Clase de estilo temática: Rojo/Amarillo/Azul (Italia campeón) --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif mundial-espana-82" style="padding: 3rem;">
        
        {{-- ESTILOS INYECTADOS EN VISTA (MÁXIMA PRIORIDAD PARA TEMAS) --}}
        <style>
/* Variables de España 82 */
.mundial-espana-82{
    --color-principal:#E60026;     /* Rojo bandera de España */
    --color-secundario:#FFD900;    /* Amarillo/Oro */
    --color-terciario:#FFFFFF;     /* Blanco */
    --color-acento-italia:#0056A4; /* Azzurro del campeón */
    --color-texto:#000000;         /* Negro para máxima legibilidad */
    --color-rojo-oscuro:#A00000;
}

/* Botones / headers principales en ROJO */
.mundial-espana-82 .bg-dark,
.mundial-espana-82 .card-header.bg-dark,
.mundial-espana-82 .btn-dark{
    background-color:var(--color-principal)!important;
    border-color:var(--color-principal)!important;
    color:var(--color-terciario)!important;
}

/* Headers secundarios en AMARILLO */
.mundial-espana-82 .bg-success,
.mundial-espana-82 .card-header.bg-success{
    background-color:var(--color-secundario)!important;
    color:#1e1e1e!important;
}

/* 🔥 FIX PARA QUE SE VEAN LOS ENCABEZADOS DE TABLA (LEGIBLES SIEMPRE) */
.mundial-espana-82 table thead th{
    background-color:var(--color-principal) !important; /* Rojo sólido */
    color:var(--color-terciario) !important;            /* Blanco pleno */
    opacity:1 !important;
    font-weight:700 !important;
    text-shadow:0 1px 1px rgba(0,0,0,.25);              /* Contraste pro */
    border-color:var(--color-principal) !important;
}

/* Texto general en negro */
.mundial-espana-82 p,
.mundial-espana-82 li,
.mundial-espana-82 td,
.mundial-espana-82 small,
.mundial-espana-82 .text-muted,
.mundial-espana-82 .fw-bold{
    color:var(--color-texto)!important;
}

/* Títulos/acentos */
.mundial-espana-82 h1,
.mundial-espana-82 .text-primary,
.mundial-espana-82 .font-title{
    color:var(--color-principal)!important;
}
.mundial-espana-82 .text-secondary,
.mundial-espana-82 .text-success{
    color:var(--color-secundario)!important;
}
.mundial-espana-82 .text-champion{
    color:var(--color-acento-italia)!important;
}

.mundial-espana-82 .text-danger{
    color:var(--color-rojo-oscuro)!important;
}

/* Utilidades visuales */
.mundial-espana-82 .bg-light-gray{
    background:#f6f7f9;
}
.mundial-espana-82 .themed-img{
    border:3px solid var(--color-principal);
    border-radius:.75rem;
}
.mundial-espana-82 .chip{
    display:inline-block; padding:.25rem .55rem; border-radius:999px;
    background:#fff7d1; border:1px solid #ffe680; font-size:.85rem;
}

        </style>
        
        {{-- NAVEGACIÓN SUPERIOR --}}
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 11]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Argentina 1978</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 13]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: México 1986 →</span>
            </a>
        </div>
        
        {{-- TÍTULO PRINCIPAL --}}
        <header class="text-center mb-5">
            <p class="display-6 mb-1 font-elegant text-primary">Enciclopedia Histórica</p>
            <h1 class="display-4 fw-bold text-primary font-title">
                Copa Mundial de la FIFA {{ $mundial->anio ?? '1982' }}
            </h1>
            <p class="fs-4 text-secondary font-elegant">{{ $mundial->pais_sede ?? 'España' }} 🇪🇸</p>
        </header>

        <div class="divider-classic mb-5"></div>
        
        {{-- DATOS CLAVE --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <table class="table table-bordered table-sm text-center font-elegant">
                    <thead>
                        <tr>
                            <th>🏆 CAMPEÓN</th>
                            <th>🗓️ FECHAS</th>
                            <th>👥 EQUIPOS</th>
                            <th>⚽ PARTIDOS</th>
                            <th>🥅 GOLES</th>
                            <th>👤 MEJOR JUGADOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold fs-5 text-champion">{{ $mundial->campeon->nombre ?? 'ITALIA' }}</td>
                            <td>13 junio – 11 julio</td>
                            <td>24</td>
                            <td>52</td>
                            <td>146</td>
                            <td>Paolo Rossi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SEDES Y ESTADIOS --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <div class="mt-4 p-3 border rounded shadow-sm bg-light-gray">
                    <p class="fw-bold mb-2 text-primary">Ciudades y Estadios Sede (principales):</p>
                    <p class="mb-2 small">
                        <span class="chip">Madrid (Santiago Bernabéu, Vicente Calderón)</span>
                        <span class="chip">Barcelona (Camp Nou, Sarrià)</span>
                        <span class="chip">Sevilla (Benito Villamarín, Sánchez-Pizjuán)</span>
                        <span class="chip">Valencia (Mestalla)</span>
                        <span class="chip">Bilbao (San Mamés)</span>
                        <span class="chip">Málaga (La Rosaleda)</span>
                        <span class="chip">Zaragoza (La Romareda)</span>
                        <span class="chip">Gijón (El Molinón)</span>
                    </p>
                    <p class="mb-0 small">La final se disputó en el <strong>Santiago Bernabéu</strong> (Madrid).</p>
                </div>
            </div>
        </div>

        {{-- 🍊 MASCOTA --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🇪🇸 Mascota Oficial
            </div>
            <div class="card-body border-dark border-bottom border-3 text-center">
                <h4 class="text-primary fw-bold">Naranjito</h4>
                <p class="text-dark">
                    Una naranja con uniforme de la selección: la primera mascota “alimento” del torneo, icónica en la cultura popular.
                </p>
                <div class="text-center mt-3">
                    {{-- Coloca tu imagen en public/img/mascotas/naranjito_1982.png --}}
                    <img src="{{ asset('img/naranjito_1982.png') }}"
                         alt="Naranjito - España 1982"
                         class="img-fluid themed-img shadow-sm"
                         style="max-height: 280px;">
                </div>
                <p class="text-primary small mt-3 fst-italic">
                    España 82 amplió el formato de 16 a 24 equipos e introdujo una segunda fase de grupos.
                </p>
            </div>
        </div>

        {{-- HECHOS Y NOVEDADES --}}
        <div class="card border-0 mb-5 text-dark bg-light-gray">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                📜 Capítulo I: Hechos Notables y Novedades
            </div>
            <div class="card-body p-4 border-dark-subtle border-top-0 border-3">
                <ul class="list-group list-group-flush mb-4 font-elegant">
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Partido legendario:</strong> Brasil 2–3 Italia en Sarrià — Paolo Rossi marcó un <em>hat-trick</em> inolvidable.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>“El bochorno de Gijón”:</strong> Alemania Federal 1–0 Austria; resultado que clasificó a ambos y cambió futuras normas de horarios simultáneos.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Formato:</strong> Primera fase con 6 grupos de 4; segunda fase con 4 grupos de 3; los ganadores a semifinales.
                    </li>
                    <li class="list-group-item bg-light-gray border-0">
                        <strong>Balón oficial:</strong> <em>Adidas Tango España</em>, evolución del clásico Tango de 1978.
                    </li>
                </ul>

                <div class="text-center mt-4 border border-dark p-2" style="background-color:#eee;">
                    {{-- Imagen del Bernabéu (final) --}}
                    <img src="{{ asset('img/1982_Bernabeu.jpg') }}"
                         alt="Santiago Bernabéu, final 1982"
                         class="img-fluid" style="max-height:350px;">
                    <p class="mt-2 small font-elegant">Santiago Bernabéu (Madrid), sede de la final Italia–Alemania Federal.</p>
                </div>
            </div>
        </div>

        {{-- BALÓN OFICIAL --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-success fw-bold fs-5 font-elegant">
                ⚽ Balón Oficial: Adidas Tango España
            </div>
            <div class="card-body p-4 text-center">
                <p class="mb-3">
                    Mantiene el patrón icónico de triadas negras, mejorando materiales para resistencia y absorción.
                </p>
                <img src="{{ asset('img/adidas_tango_espana_1982.png') }}"
                     alt="Adidas Tango España 1982"
                     class="img-fluid themed-img shadow-sm"
                     style="max-height:220px;">
            </div>
        </div>

        {{-- RUTA DEL CAMPEÓN (ITALIA) --}}
        <div class="card border-0 shadow mb-5">
            <div class="card-header bg-dark text-white fw-bold fs-5 font-elegant">
                🏆 Capítulo II: Ruta del Campeón — Italia
            </div>
            <div class="card-body border-dark border-bottom border-3">
                <table class="table table-hover text-center font-elegant">
                    <thead class="table-dark">
                        <tr>
                            <th>Fase</th>
                            <th>Partido</th>
                            <th>Resultado</th>
                            <th>Goleadores</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Fase de grupos (Grupo 1) --}}
                        <tr>
                            <td>Grupo 1</td>
                            <td>Italia vs. Polonia</td>
                            <td>0–0</td>
                            <td>—</td>
                        </tr>
                        <tr>
                            <td>Grupo 1</td>
                            <td>Italia vs. Perú</td>
                            <td>1–1</td>
                            <td>Bruno Conti</td>
                        </tr>
                        <tr>
                            <td>Grupo 1</td>
                            <td>Italia vs. Camerún</td>
                            <td>1–1</td>
                            <td>Francesco Graziani</td>
                        </tr>
                        {{-- Segunda fase (Grupo C) --}}
                        <tr>
                            <td>2.ª Fase</td>
                            <td>Italia vs. Argentina</td>
                            <td><strong>2–1</strong></td>
                            <td>Tardelli, Cabrini</td>
                        </tr>
                        <tr>
                            <td>2.ª Fase</td>
                            <td>Italia vs. Brasil</td>
                            <td><strong>3–2</strong></td>
                            <td>Paolo Rossi (3)</td>
                        </tr>
                        {{-- Semifinal --}}
                        <tr>
                            <td>Semifinal</td>
                            <td>Italia vs. Polonia</td>
                            <td><strong>2–0</strong></td>
                            <td>Paolo Rossi (2)</td>
                        </tr>
                        {{-- Final --}}
                        <tr>
                            <td class="fw-bold text-danger">FINAL</td>
                            <td><strong class="text-champion">🇮🇹 Italia</strong> vs. Alemania Federal 🇩🇪</td>
                            <td class="fw-bold text-champion"><strong>3–1</strong></td>
                            <td>Rossi, Tardelli, Altobelli</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mt-3 small fst-italic">
                    Paolo Rossi: Bota de Oro (6) y Balón de Oro del torneo.
                </p>
            </div>
        </div>

        {{-- PREMIOS Y FIGURAS --}}
        <div class="card border-3 shadow border-dark-subtle mb-5">
            <div class="card-header bg-success fw-bold fs-5 text-center font-elegant">
                🥇 Premios y Figuras
            </div>
            <div class="card-body p-4">
                <div class="row font-elegant">
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-2">Premios Individuales</p>
                        <ul class="mb-0 small">
                            <li><strong>Balón de Oro:</strong> Paolo Rossi (ITA)</li>
                            <li><strong>Bota de Oro:</strong> Paolo Rossi (6)</li>
                            <li><strong>Guante (destacado):</strong> Dino Zoff</li>
                            <li><strong>Jugador Joven:</strong> Manuel Amoros (FRA)</li>
                        </ul>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="fw-bold text-primary border-bottom mb-2">Otras Figuras</p>
                        <ul class="mb-0 small">
                            <li>Zico, Falcão, Sócrates (BRA)</li>
                            <li>Michel Platini (FRA), Karl-Heinz Rummenigge (FRG)</li>
                            <li>Gaetano Scirea, Marco Tardelli, Bruno Conti (ITA)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN INFERIOR --}}
        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ route('enciclopedia.show', ['mundial' => 11]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">← Anterior: Argentina 1978</span>
            </a>
            <a href="{{ route('mundiales.index') }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Índice de Mundiales</span>
            </a>
            <a href="{{ route('enciclopedia.show', ['mundial' => 13]) }}" class="btn btn-dark btn-lg font-elegant shadow-sm">
                <span class="fs-6">Siguiente: México 1986 →</span>
            </a>
        </div>
        
    </div>
@endsection

