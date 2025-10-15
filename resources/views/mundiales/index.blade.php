@extends('layouts.app')

@section('content')
    <h1 class="mb-5 text-center fw-bold text-primary">⚽ Índice de la Copa Mundial de la FIFA (1930 - 2022) 🏆</h1>
    
    <div class="row">
        {{-- Itera sobre la lista de 22 Mundiales obtenida del controlador --}}
        @foreach ($mundiales as $mundial)
            
            {{-- Clases de Bootstrap para el grid (4, 3, o 2 columnas por fila) --}}
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                
                <div class="card h-100 shadow-lg border-secondary text-center hover-effect">
                    
                    {{-- Logo del Mundial. Asume que las imágenes están en public/img/logos/ --}}
                    <div class="p-3">
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
                        <a href="{{ route('mundiales.show', $mundial) }}" class="btn btn-outline-primary btn-sm mt-auto shadow-sm">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
@endsection