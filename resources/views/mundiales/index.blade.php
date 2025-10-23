@extends('layouts.app')

@section('title', 'Índice de Mundiales')

@section('content')
<div class="container-fluid px-0" style="background: #faf7f2;">

    {{-- ===== Hero Panini / Colección Especial ===== --}}
    <div class="py-5 text-center" style="
        background: linear-gradient(135deg, #d4af37 0%, #f8e8b0 100%);
        color: #1a1a1a;
        border-bottom: 4px solid #b8962e;">
        <h1 class="font-title display-5 fw-bold mb-1" style="letter-spacing: 1px;">
            Colección Mundialista de Época 🏆
        </h1>
        <p class="font-elegant fs-5" style="opacity: 0.93;">
            Todos los campeonatos del mundo desde 1930 — edición especial de archivo dorado.
        </p>
    </div>

    <div class="container py-5">

        {{-- Botón volver --}}
        <div class="mb-4">
            <a href="{{ route('hub.index') }}" class="btn btn-outline-dark btn-lg font-elegant shadow-sm btn-classic">
                ← Volver al Menú Principal
            </a>
        </div>

        {{-- Grid de Mundiales --}}
        <div class="row g-4">
            @foreach ($mundiales as $mundial)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card shadow-sm border-0 position-relative" style="
                        background: #ffffff;
                        border-radius: 14px;
                        transition: all 0.3s ease;">

                        {{-- AURA Superior Premium --}}
                        <div style="
                            height: 6px;
                            background: linear-gradient(90deg, #d4af37, #f6d777, #d4af37);
                            opacity: 0.6;
                            border-radius: 14px 14px 0 0;">
                        </div>

                        {{-- Logo --}}
                        <div class="p-3 text-center" style="border-bottom: 1px solid #eee;">
                            <img src="{{ asset($mundial->logo_url ?? 'img/logos/default.png') }}"
                                 alt="Logo {{ $mundial->anio }}"
                                 class="img-fluid"
                                 style="height: 130px; object-fit: contain;">
                        </div>

                        {{-- Contenido --}}
                        <div class="card-body text-center">
                            <h2 class="fw-bolder mb-1 font-title" style="font-size: 1.9rem; color: #222;">
                                {{ $mundial->anio }}
                            </h2>
                            <p class="text-muted font-elegant mb-2" style="font-size: 0.95rem;">
                                {{ $mundial->pais_sede }}
                            </p>

                            <hr class="my-2" style="opacity: 0.15;">

                            <p class="text-dark fw-bold mb-3" style="font-size: 1rem;">
                                <span style="color:#b8962e;">Campeón:</span>
                                <span class="text-uppercase">{{ $mundial->campeon->nombre ?? 'N/A' }}</span>
                            </p>

                            <a href="{{ route('enciclopedia.show', $mundial) }}"
                               class="btn btn-dark fw-bold w-100"
                               style="border-radius: 999px; background:#d4af37; border: none;">
                                Ver Detalles
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
