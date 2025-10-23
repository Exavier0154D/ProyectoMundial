@extends('layouts.app')

@section('content')
<div class="container py-5 my-4 bg-white shadow-lg text-serif" style="border: 2px solid #a0a0a0; padding: 3rem;">
    
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-md font-elegant shadow-sm btn-classic">
            ← Volver al Índice de Juegos
        </a>
        <h1 class="font-title display-5 fw-bold text-dark text-center flex-grow-1">
            Adivina el Campeón Mundial 🏆
        </h1>
        <div style="width: 150px;"></div> 
    </div>

    <hr class="my-4">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-primary p-4 card-elegant">
                <div class="card-body text-center">
                    <h3 class="text-primary mb-4 fw-bolder">
                        Mundial Objetivo: <strong>{{ $mundialObjetivo['anio'] }}</strong>
                    </h3>
                    
                    <p class="lead mb-4 text-muted">
                        ¡Tienes <strong>{{ $mundialObjetivo['totalPistas'] }}</strong> oportunidades clave para adivinar!
                    </p>

                    <div class="text-start mb-4 p-3 bg-light border border-primary-subtle rounded shadow-sm">
                        <h4 class="text-dark fw-bold mb-3">Pistas Clave:</h4>
                        <ul id="pistas-list" class="list-unstyled mb-0 text-muted">
                            <li class="mb-1">
                                <i class="fas fa-lightbulb text-warning me-2"></i> {{ $mundialObjetivo['pistaInicial'] }}
                            </li>
                        </ul>
                    </div>

                    <form id="adivina-campeon-form" class="mt-4">
                        @csrf
                        <input type="hidden" name="intento" id="intento-counter" value="1"> 
                        
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg text-center font-elegant" 
                                   name="campeon" placeholder="Escribe el país campeón (ej. Brasil)" required>
                            <button id="submit-btn" class="btn btn-primary btn-lg btn-classic" type="submit">
                                Adivinar
                            </button>
                        </div>
                    </form>

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
    const submitUrl = @json(route('juegos.adivinacampeon.submit'));
    const juegosIndexUrl = @json(route('juegos.index'));
    const currentPageUrl = window.location.href;

    const form = document.getElementById('adivina-campeon-form');
    const input = form.querySelector('input[name="campeon"]');
    const mensaje = document.getElementById('resultado-mensaje');
    const pistasList = document.getElementById('pistas-list');
    const intentoCounter = document.getElementById('intento-counter');
    const totalPistas = @json($mundialObjetivo['totalPistas']); 
    const submitBtn = document.getElementById('submit-btn');
    const anio = @json($mundialObjetivo['anio']);

    const handleGameEnd = (success, correctName) => {
        const message = success 
            ? `¡Adivinaste! El campeón del ${anio} fue ${correctName}. ¿Quieres jugar de nuevo (Aceptar) o volver al índice (Cancelar)?`
            : `Se agotaron los intentos. El campeón era ${correctName}. ¿Quieres jugar de nuevo (Aceptar) o volver al índice (Cancelar)?`;
        
        if (confirm(message)) {
            window.location.href = currentPageUrl;
        } else {
            window.location.href = juegosIndexUrl;
        }
    };

    form.addEventListener('submit', function(e) {
        e.preventDefault();
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
                campeon: input.value.trim(),
                intento: parseInt(intentoCounter.value)
            })
        })
        .then(res => res.json())
        .then(data => {
            submitBtn.disabled = false;
            input.value = ''; 

            if (data.esCorrecto) {
                mensaje.className = 'mt-4 p-3 rounded fw-bold bg-success-subtle text-success';
                mensaje.innerHTML = `🎉 ¡Felicidades! Respuesta correcta: <strong>${data.respuestaCorrecta}</strong> 🎉`;
                form.style.display = 'none';
                handleGameEnd(true, data.respuestaCorrecta);

            } else if (data.ultimoIntento) {
                mensaje.className = 'mt-4 p-3 rounded fw-bold bg-danger-subtle text-danger';
                mensaje.innerHTML = `❌ Fallaste. El campeón era <strong>${data.respuestaCorrecta}</strong>.`;
                form.style.display = 'none';
                handleGameEnd(false, data.respuestaCorrecta);

            } else {
                mensaje.className = 'mt-4 p-3 rounded fw-bold bg-danger-subtle text-danger';
                mensaje.innerHTML = `❌ Incorrecto. Nueva pista disponible.`;
                
                if (data.proximaPista) {
                    const newPista = document.createElement('li');
                    newPista.className = 'mb-1';
                    newPista.innerHTML = `<i class="fas fa-lightbulb text-warning me-2"></i> ${data.proximaPista}`;
                    pistasList.appendChild(newPista);
                }

                intentoCounter.value = parseInt(intentoCounter.value) + 1;

                if (parseInt(intentoCounter.value) === totalPistas) {
                    submitBtn.textContent = '¡Último Intento!';
                    submitBtn.classList.replace('btn-primary', 'btn-danger');
                }
            }
        })
        .catch(err => {
            console.error(err);
            mensaje.className = 'mt-4 p-3 rounded fw-bold bg-danger-subtle text-danger';
            mensaje.innerHTML = `⚠️ Error de comunicación. Intenta de nuevo.`;
            submitBtn.disabled = false;
        });
    });
});
</script>
@endpush
