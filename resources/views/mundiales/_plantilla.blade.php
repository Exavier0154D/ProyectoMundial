@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="mb-4">
    <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
      ← Regresar al Índice de Mundiales
    </a>
  </div>

  <h1 class="mb-5 text-center fw-bold text-primary">
    ⚽ Copa Mundial de la FIFA {{ $mundial->anio ?? '—' }} - {{ $mundial->pais_sede ?? '—' }}
  </h1>
@php
    // 1) Equipos clasificados a partir de los partidos del mundial (sin tocar controlador)
    $idsLocal = $mundial->partidos->pluck('equipo_local_id');
    $idsVisita = $mundial->partidos->pluck('equipo_visitante_id');
    $equiposIds = $idsLocal->merge($idsVisita)->unique()->values();

    $equiposClasificados = \App\Models\Equipo::whereIn('id', $equiposIds)
        ->orderBy('nombre')
        ->get();

    // 2) Contenido editorial por año
    $extra = \App\Support\MundialesContent::porAnio((int) $mundial->anio);
@endphp

  <hr>

  <div class="row mb-5 text-center">
    <div class="col-md-4">
      <p class="fw-bold fs-5 text-success">🏆 Campeón:</p>
      <h3 class="text-uppercase">{{ optional($mundial->campeon)->nombre ?? '—' }}</h3>
    </div>
    <div class="col-md-4">
      <p class="fw-bold fs-5 text-secondary">⚽ Goles totales:</p>
      <h3 class="text-muted">{{ $mundial->goles_totales ?? '—' }}</h3>
    </div>
    <div class="col-md-4">
      <p class="fw-bold fs-5 text-secondary">👥 Partidos cargados:</p>
      <h3 class="text-muted">{{ $mundial->partidos->count() }}</h3>
    </div>
  </div>

  <hr class="mb-5">

  @if(!empty($mundial->logo_url))
  <div class="card shadow mb-5">
    <div class="card-header bg-primary text-white fw-bold fs-5">
      🎨 Poster oficial
    </div>
    <div class="card-body text-center">
      <img src="{{ $mundial->logo_url }}" alt="Poster {{ $mundial->anio }}" class="img-fluid rounded shadow" style="max-height: 360px;">
    </div>
  </div>
  @endif

  <div class="card shadow mb-5">
    <div class="card-header bg-dark text-white fw-bold fs-5">
      Finales y Resultados Clave
    </div>
    <div class="card-body">
      @php
        $orden = ['Fase de grupos','Octavos','Cuartos','Semifinal','Tercer puesto','Final'];
        $partidos = $mundial->partidos->sortBy(function($p) use ($orden){
          $i = array_search($p->fase, $orden);
          return $i === false ? 999 : $i;
        })->values();
      @endphp

      @if($partidos->isEmpty())
        <div class="alert alert-info mb-0">No hay partidos cargados para este mundial.</div>
      @else
        <table class="table table-striped table-hover text-center">
          <thead class="table-primary">
            <tr>
              <th>Fase</th>
              <th>Partido</th>
              <th>Resultado</th>
            </tr>
          </thead>
          <tbody>
            @foreach($partidos as $p)
              <tr>
                <td class="fw-semibold">{{ $p->fase ?? '—' }}</td>
                <td>
                  {{ optional($p->equipoLocal)->nombre ?? '—' }}
                  vs.
                  {{ optional($p->equipoVisitante)->nombre ?? '—' }}
                </td>
                <td class="fw-bold">{{ $p->goles_local }} - {{ $p->goles_visitante }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>

{{-- Sede / motivo (editorial) --}}
@if(!empty($extra['sede_titulo']))
  <div class="card shadow mb-5">
    <div class="card-header bg-primary text-white fw-bold fs-5">
      {{ $extra['sede_titulo'] }}
    </div>
    <div class="card-body">
      <p>{{ $extra['sede_texto'] }}</p>
    </div>
  </div>
@endif

{{-- Equipos clasificados (desde BD) --}}
<div class="card shadow mb-5">
  <div class="card-header bg-success text-white fw-bold fs-5">
    👥 Equipos Clasificados ({{ $equiposClasificados->count() }})
  </div>
  <div class="card-body">
    @if($equiposClasificados->isEmpty())
      <div class="text-muted">No hay equipos cargados en la BD para este año.</div>
    @else
      <div class="row">
        @foreach ($equiposClasificados as $eq)
          <div class="col-6 col-md-4 col-lg-3 mb-2">
            <span class="badge bg-secondary">{{ $eq->nombre }}</span>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</div>

{{-- Goleadores (editorial) --}}
@if(!empty($extra['goleadores']))
  <div class="card shadow mb-5">
    <div class="card-header bg-warning text-dark fw-bold fs-5">⚽ Goleadores destacados</div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        @foreach($extra['goleadores'] as $g)
          <li class="list-group-item">
            {{ $g['jugador'] }} ({{ $g['pais'] }}) — <strong>{{ $g['goles'] }} goles</strong>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

{{-- Asistidores (editorial / no oficial) --}}
@if(!empty($extra['asistidores']))
  <div class="card shadow mb-5">
    <div class="card-header bg-info text-white fw-bold fs-5">🎯 Asistidores (no oficial)</div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        @foreach($extra['asistidores'] as $a)
          <li class="list-group-item">
            {{ $a['jugador'] }} ({{ $a['pais'] }}) — {{ $a['asis'] }}
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

{{-- Alineación del campeón (editorial) --}}
@if(!empty($extra['alineacion_campeon']))
  @php $al = $extra['alineacion_campeon']; @endphp
  <div class="card shadow border-success mb-5">
    <div class="card-header bg-success text-white fw-bold fs-5 text-center">
      🌟 Alineación del Campeón
    </div>
    <div class="card-body text-center">
      <p><strong>Entrenador:</strong> {{ $al['entrenador'] }}</p>
      <p><strong>Portero:</strong> {{ $al['portero'] }}</p>
      <p><strong>Defensa:</strong> {{ implode(' • ', $al['defensa']) }}</p>
      <p><strong>Mediocampo:</strong> {{ implode(' • ', $al['medio']) }}</p>
      <p><strong>Delantera:</strong> {{ implode(' • ', $al['delantera']) }}</p>
    </div>
  </div>
@endif

  
  <div class="mt-5 text-center">
    <a href="{{ route('mundiales.index') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
      ← Regresar al Índice de Mundiales
    </a>
  </div>
</div>
@endsection
