@extends('layouts.app')

@section('content')
    {{-- Contenedor principal --}}
    <div class="container-fluid py-4 text-serif bg-white shadow-lg"> 

        {{-- BOTÓN DE REGRESO AL HUB --}}
        <div class="mb-4 ps-5">
            {{-- Usamos la ruta nombrada 'hub.index' --}}
            <a href="{{ route('hub.index') }}" class="btn btn-outline-dark btn-lg font-elegant shadow-sm btn-classic">
                ← Regresar al Menú Principal (Hub)
            </a>
        </div>
        
        <h1 class="mb-5 text-center fw-bold text-dark font-title fs-2">
            ⚽ Índice de la Copa Mundial de la FIFA (1930 - 2022) 🏆
        </h1>
        
        <div class="row px-5">
            @foreach ($mundiales as $mundial)
                
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    
                    <div class="card h-100 shadow-sm border-dark-subtle text-center hover-effect card-elegant">
                        
                        {{-- Logo del Mundial --}}
                        <div class="p-3 border-bottom border-secondary-subtle">
                            <img src="{{ asset($mundial->logo_url ?? 'img/logos/default.png') }}" 
                                 alt="Logo {{ $mundial->anio }}" 
                                 class="card-img-top mx-auto" 
                                 style="height: 120px; width: auto; object-fit: contain;">
                        </div>
                        
                        <div class="card-body d-flex flex-column pt-0">
                            
                            {{-- Año como Título Principal --}}
                            <h2 class="card-title fw-bolder text-dark">{{ $mundial->anio }}</h2>
                            
                            {{-- País Sede --}}
                            <h5 class="card-subtitle mb-2 text-muted">{{ $mundial->pais_sede }}</h5>
                            
                            <hr class="my-2">

                            {{-- Campeón (Información Clave) --}}
                            <p class="card-text text-success fw-bold flex-grow-1 d-flex align-items-center justify-content-center">
                                <span class="me-2">Campeón:</span> 
                                <span class="text-uppercase">{{ $mundial->campeon->nombre ?? 'N/A' }}</span>
                            </p>

                            {{-- Botón de Navegación a la vista de detalle --}}
                            <a href="{{ route('enciclopedia.show', $mundial) }}" class="btn btn-outline-dark btn-sm mt-auto shadow-sm btn-classic">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection