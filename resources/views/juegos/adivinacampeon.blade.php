@extends('layouts.app')

@section('content')
    <div class="container py-5 my-4 bg-white shadow-lg text-serif" style="border: 2px solid #a0a0a0; padding: 3rem;">
        
        <div class="mb-4 d-flex justify-content-between align-items-center">
            {{-- Botón de regreso al índice de juegos --}}
            <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-md font-elegant shadow-sm btn-classic">
                ← Volver al Índice de Juegos
            </a>
            <h1 class="font-title display-5 fw-bold text-dark text-center flex-grow-1">
                Adivina el Campeón Mundial 🏆
            </h1>
            {{-- Espacio para mantener el centrado del título --}}
            <div style="width: 150px;"></div> 
        </div>

        <hr class="my-4">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-primary p-4 card-elegant">
                    <div class="card-body text-center">
                        <h3 class="text-primary mb-4 fw-bolder">Mundial Objetivo: **{{ $mundialObjetivo['anio'] }}**</h3>
                        
                        <p class="lead mb-4 text-muted">¡Tienes **{{ $mundialObjetivo['totalPistas'] }}** oportunidades clave para adivinar!</p>

                        {{-- Contenedor de Pistas (Muestra solo la pista inicial, luego JS añade más) --}}
                        <div class="text-start mb-4 p-3 bg-light border border-primary-subtle rounded shadow-sm">
                            <h4 class="text-dark fw-bold mb-3">Pistas Clave:</h4>
                            <ul id="pistas-list" class="list-unstyled mb-0 text-muted">
                                {{-- SOLUCIÓN AL ERROR: Usamos 'pistaInicial' directamente --}}
                                <li class="mb-1"><i class="fas fa-lightbulb text-warning me-2"></i> {{ $mundialObjetivo['pistaInicial'] }}</li>
                            </ul>
                        </div>

                        {{-- Formulario para la Respuesta --}}
                        <form id="adivina-campeon-form" class="mt-4">
                            @csrf
                            {{-- Campo oculto para llevar el conteo de intentos --}}
                            <input type="hidden" name="intento" id="intento-counter" value="1"> 
                            
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg text-center font-elegant" name="campeon" placeholder="Escribe el país campeón (ej. Brasil)" required>
                                <button id="submit-btn" class="btn btn-primary btn-lg btn-classic" type="submit">Adivinar</button>
                            </div>
                        </form>

                        {{-- Contenedor de Mensaje de Resultado --}}
                        <div id="resultado-mensaje" class="mt-4 p-3 rounded fw-bold" style="display: none;"></div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Definición de URLs
    const submitUrl = '{{ route('juegos.adivinacampeon.submit') }}';
    const juegosIndexUrl = '{{ route('juegos.index') }}';
    const currentPageUrl = window.location.href; // Para reiniciar el juego

    // Definición de elementos
    const form = document.getElementById('adivina-campeon-form');
    const input = form.querySelector('input[name="campeon"]');
    const mensaje = document.getElementById('resultado-mensaje');
    const pistasList = document.getElementById('pistas-list');
    const intentoCounter = document.getElementById('intento-counter');
    const totalPistas = {{ $mundialObjetivo['totalPistas'] }}; 
    const submitBtn = document.getElementById('submit-btn');

    // Función que maneja la alerta de finalización del juego
    const handleGameEnd = (success, correctName) => {
        const message = success 
            ? `¡Adivinaste! El campeón de ${{{ $mundialObjetivo['anio'] }}} fue ${correctName}. ¿Quieres jugar de nuevo (Aceptar) o volver al índice de juegos (Cancelar)?`
            : `Se agotaron los intentos. El campeón era ${correctName}. ¿Quieres jugar de nuevo (Aceptar) o volver al índice de juegos (Cancelar)?`;
            
        const playAgain = confirm(message);
        
        if (playAgain) {
            window.location.href = currentPageUrl; // Reiniciar (carga un Mundial nuevo al azar)
        } else {
            window.location.href = juegosIndexUrl; // Volver al Hub de Juegos
        }
    };

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Línea CRÍTICA: Previene la recarga del formulario
        
        // Mensaje de carga
        mensaje.style.display = 'block';
        mensaje.className = 'mt-4 p-3 rounded fw-bold bg-secondary-subtle text-dark';
        mensaje.innerHTML = 'Verificando respuesta...';
        submitBtn.disabled = true;

        fetch(submitUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
            },
            body: JSON.stringify({ 
                campeon: input.value,
                intento: parseInt(intentoCounter.value)
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Server returned an error: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            submitBtn.disabled = false;
            input.value = ''; 
            
            if (data.esCorrecto) {
                // Éxito: Acierta
                mensaje.className = 'mt-4 p-3 rounded fw-bold bg-success-subtle text-success';
                mensaje.innerHTML = `🎉 ¡Felicidades! ¡Respuesta correcta: **${data.respuestaCorrecta}**! 🎉`;
                form.style.display = 'none'; 
                
                // LÓGICA DE FINALIZACIÓN POR ÉXITO
                handleGameEnd(true, data.respuestaCorrecta);

            } else if (data.ultimoIntento) {
                // Fallo Definitivo: Se acabaron las pistas
                mensaje.className = 'mt-4 p-3 rounded fw-bold bg-danger-subtle text-danger';
                mensaje.innerHTML = `❌ Fallaste. La respuesta correcta era: **${data.respuestaCorrecta}**.`;
                form.style.display = 'none';

                // LÓGICA DE FINALIZACIÓN POR DERROTA
                handleGameEnd(false, data.respuestaCorrecta);

            } else {
                // Fallo Progresivo: Muestra la siguiente pista
                mensaje.className = 'mt-4 p-3 rounded fw-bold bg-danger-subtle text-danger';
                mensaje.innerHTML = `❌ Incorrecto. ¡Aquí tienes una **pista nueva**!`;
                
                // 1. Añade la nueva pista
                if (data.proximaPista) {
                    const newPista = document.createElement('li');
                    newPista.className = 'mb-1';
                    newPista.innerHTML = `<i class="fas fa-lightbulb text-warning me-2"></i> ${data.proximaPista}`;
                    pistasList.appendChild(newPista);
                }

                // 2. Incrementa el contador
                intentoCounter.value = parseInt(intentoCounter.value) + 1;

                // 3. Actualiza el texto del botón si es el último intento
                if (parseInt(intentoCounter.value) === totalPistas) {
                     submitBtn.textContent = '¡Último Intento!';
                     submitBtn.classList.remove('btn-primary');
                     submitBtn.classList.add('btn-danger');
                }
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            console.error('AJAX Error:', error);
            mensaje.className = 'mt-4 p-3 rounded fw-bold bg-danger-subtle text-danger';
            mensaje.innerHTML = `⚠️ Error de comunicación. Intenta de nuevo. Consulta la consola (F12) para más detalles.`;
        });
    });
});
</script>
@endpush