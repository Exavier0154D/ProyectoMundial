@extends('layouts.app')

@section('content')
    
    {{-- Contenedor principal: estilo elegante y fuente serif --}}
    <div class="container py-5 my-4 bg-white shadow-lg text-serif" style="border: 2px solid #a0a0a0; padding: 3rem;">
        
        <header class="text-center mb-5">
            <h1 class="font-title display-4 fw-bold text-dark">
                Zona de Juegos: Trivia Mundialista 🧠
            </h1>
            <p class="lead text-secondary font-elegant">
                ¡Bienvenido, {{ Auth::user()->name }}! Pon a prueba tus conocimientos sobre la historia de la Copa Mundial.
            </p>
        </header>

        {{-- Separador de época --}}
        <div class="divider-classic mb-5"></div>
        
        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div class="card h-100 shadow-lg border-success text-center card-elegant p-4">
                    <div class="card-body">
                        
                        <h3 class="font-elegant text-success mb-4">Reglas del Juego</h3>
                        
                        <p class="text-justify font-elegant">
                            Responde 10 preguntas aleatorias sobre los Mundiales. El objetivo es conseguir la mayor puntuación posible. ¡Mucha suerte!
                        </p>
                        
                        <hr class="my-4">

                        {{-- Contenedor donde se inyectará el juego via JavaScript --}}
                        <div id="trivia-container" class="mt-4">
                            
                            {{-- Botón para iniciar el juego --}}
                            <button id="start-game-btn" class="btn btn-success btn-lg mt-3 btn-classic">
                                Iniciar Partida de Trivia
                            </button>
                            
                            {{-- Mensaje de Carga (oculto) --}}
                            <p id="loading-message" style="display: none;" class="mt-3 text-muted">Cargando preguntas...</p>

                        </div>

                    </div>
                </div>
            </div>

            {{-- Botón de regreso al Hub --}}
            <div class="col-12 text-center mt-5">
                <a href="{{ route('hub.index') }}" class="btn btn-outline-dark btn-md font-elegant shadow-sm btn-classic">
                    ← Volver al Menú Principal
                </a>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('start-game-btn').addEventListener('click', function() {

        this.style.display = 'none';
        
  
        document.getElementById('loading-message').style.display = 'block';

        setTimeout(() => {
            document.getElementById('loading-message').innerText = 'Juego iniciado. Pregunta #1 cargada.';

        }, 1500); 
    });
</script>
@endpush