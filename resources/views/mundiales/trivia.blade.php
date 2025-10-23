@extends('layouts.app')

@section('content')
<div class="container py-5 my-4 bg-white shadow-lg text-serif" style="border: 2px solid #a0a0a0; padding: 3rem;">
    <header class="text-center mb-5">
        <h1 class="font-title display-4 fw-bold text-dark">
            Zona de Juegos: Trivia Mundialista 🧠
        </h1>
        <p class="lead text-secondary font-elegant">
            ¡Bienvenido, {{ Auth::user()->name }}! Pon a prueba tus conocimientos sobre la historia de la Copa Mundial.
        </p>
    </header>

    <div class="divider-classic mb-5"></div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card h-100 shadow-lg border-success text-center card-elegant p-4">
                <div class="card-body">
                    <div id="trivia-container" class="mt-4">
                        <button id="start-game-btn" class="btn btn-success btn-lg btn-classic">
                            Comenzar ahora
                        </button>
                        <p id="loading-message" style="display: none;" class="mt-3 text-muted">Cargando preguntas...</p>
                    </div>
                </div>
            </div>
        </div>

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
const preguntas = [
    {
        texto: "¿Qué selección ha ganado más Copas del Mundo?",
        opciones: ["Brasil", "Alemania", "Italia", "Argentina"],
        correcta: "Brasil"
    },
    {
        texto: "¿En qué año se disputó el primer Mundial de la historia?",
        opciones: ["1926", "1930", "1934", "1928"],
        correcta: "1930"
    },
    {
        texto: "¿Quién es el máximo goleador histórico de los Mundiales?",
        opciones: ["Messi", "Ronaldo Nazário", "Klose", "Pelé"],
        correcta: "Klose"
    },
    {
        texto: "¿Cuál fue la sede del Mundial 1994?",
        opciones: ["Estados Unidos", "Francia", "Italia", "Alemania"],
        correcta: "Estados Unidos"
    },
    {
        texto: "¿Qué país fue el primer campeón europeo?",
        opciones: ["Italia", "Francia", "Inglaterra", "Alemania"],
        correcta: "Italia"
    },
    {
        texto: "¿Quién anotó el famoso gol conocido como 'La mano de Dios'?",
        opciones: ["Maradona", "Pelé", "Valderrama", "Kempes"],
        correcta: "Maradona"
    },
    {
        texto: "¿Qué selección fue campeona del Mundial 2014?",
        opciones: ["Argentina", "Alemania", "España", "Países Bajos"],
        correcta: "Alemania"
    },
    {
        texto: "¿Quién es el jugador con más partidos jugados en Mundiales (26)?",
        opciones: ["Lothar Matthäus", "Messi", "Cristiano Ronaldo", "Xavi"],
        correcta: "Messi"
    },
    {
        texto: "¿Qué selección fue famosa por la goleada 7-1 ante Brasil en semifinales de 2014?",
        opciones: ["Alemania", "Francia", "España", "Países Bajos"],
        correcta: "Alemania"
    },
    {
        texto: "¿Qué selección ganó su primer Mundial en Catar 2022?",
        opciones: ["Argentina", "Croacia", "Francia", "Inglaterra"],
        correcta: "Argentina"
    }
];


let indice = 0;
let puntaje = 0;

document.getElementById('start-game-btn').addEventListener('click', function() {
    this.style.display = 'none';
    const loading = document.getElementById('loading-message');
    loading.style.display = 'block';

    setTimeout(() => {
        loading.style.display = 'none';
        mostrarPregunta();
    }, 1000);
});

function mostrarPregunta() {
    const trivia = document.getElementById('trivia-container');
    const pregunta = preguntas[indice];
    trivia.innerHTML = `
        <h4 class="font-elegant fw-bold mb-4">Pregunta ${indice + 1} de ${preguntas.length}</h4>
        <p class="lead mb-4 font-elegant">${pregunta.texto}</p>
        <div class="d-grid gap-3">
            ${pregunta.opciones.map(op => `<button class="btn btn-outline-primary opcion">${op}</button>`).join('')}
        </div>
    `;

    document.querySelectorAll('.opcion').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const correcta = pregunta.correcta;
            document.querySelectorAll('.opcion').forEach(op => {
                op.disabled = true;
                if (op.innerText === correcta) {
                    op.classList.replace('btn-outline-primary', 'btn-success');
                } else if (op === e.target) {
                    op.classList.replace('btn-outline-primary', 'btn-danger');
                }
            });

            if (e.target.innerText === correcta) puntaje++;

            // Pasar a la siguiente pregunta después de 1.2 segundos
            setTimeout(() => {
                indice++;
                if (indice < preguntas.length) {
                    mostrarPregunta();
                } else {
                    mostrarResultado();
                }
            }, 1200);
        });
    });
}

function mostrarResultado() {
    const trivia = document.getElementById('trivia-container');
    trivia.innerHTML = `
        <h3 class="fw-bold mb-4">🎉 ¡Juego terminado!</h3>
        <p class="lead mb-3">Tu puntaje final: <strong>${puntaje} / ${preguntas.length}</strong></p>
        <button class="btn btn-success mt-3" id="reiniciar-btn">Jugar de nuevo</button>
    `;
    document.getElementById('reiniciar-btn').addEventListener('click', () => {
        indice = 0;
        puntaje = 0;
        mostrarPregunta();
    });
}
</script>
@endpush
