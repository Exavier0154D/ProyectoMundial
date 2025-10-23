@extends('layouts.app')

@section('title', 'Trivia Mundialista')

@section('content')
<div class="container py-5 my-4 shadow-lg text-serif"
     style="border:2px solid #e4e4e4; padding:0; max-width:1300px; border-radius:18px; overflow:hidden; background:linear-gradient(180deg,#f9fafc 0%, #f3f5f8 100%);">

    {{-- Estilos del tema (locales a esta vista) --}}
    <style>
        .trivia-wrap {
            --prime:#0d6efd;        /* azul */
            --accent:#26b893;       /* verde menta */
            --ink:#0f172a;          /* texto oscuro */
            --muted:#6b7280;        /* gris texto secundario */
            --card:#ffffff;         /* tarjeta base */
            --soft:#eef2f7;         /* gris suave */
        }
        .trivia-hero {
            background: radial-gradient(1200px 400px at 50% -10%, rgba(13,110,253,.18), transparent 60%),
                        radial-gradient(700px 260px at 20% 0%, rgba(38,184,147,.18), transparent 55%),
                        linear-gradient(180deg,#ffffff 0%, #f8fbff 100%);
            border-bottom:1px solid #e9eef5;
        }
        .trivia-hero .title {
            letter-spacing:.5px;
            color: var(--ink);
        }
        .badge-soft {
            background: #fff;
            color: var(--prime);
            border: 1px solid rgba(13,110,253,.25);
            padding:.35rem .65rem;
            border-radius: 999px;
            font-weight:600;
            font-size:.85rem;
        }
        .card-trivia {
            background: var(--card);
            border:1px solid #e9eef5;
            border-radius:16px;
            box-shadow: 0 10px 30px rgba(15,23,42,.06);
        }
        .card-trivia .head {
            background: linear-gradient(90deg, rgba(13,110,253,.12), rgba(38,184,147,.12));
            border-bottom:1px solid #e9eef5;
        }
        .btn-classic {
            border-radius: 999px;
            padding:.7rem 1.2rem;
            font-weight:600;
            letter-spacing:.2px;
        }
        .btn-option {
            border-radius:12px;
            padding:.8rem 1rem;
            font-weight:600;
        }
        .btn-option:not(:disabled):hover{
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(13,110,253,.15);
        }
        .progress {
            height: 14px;
            background: #eef2f7;
            border-radius:999px;
        }
        .progress-bar {
            background: linear-gradient(90deg, var(--prime), var(--accent));
            box-shadow: 0 4px 14px rgba(13,110,253,.35);
        }
        .divider-classic {
            height: 4px; width: 180px; margin: 0 auto;
            background: linear-gradient(90deg, var(--prime), var(--accent));
            border-radius:999px; opacity:.8;
        }
        .pill {
            border-radius:999px; padding:.25rem .7rem; font-size:.85rem;
            background:#f2f6fb; border:1px solid #e4ecf7; color:#3e4c66;
        }
        .panel-result {
            background: #fff; border:1px solid #e9eef5; border-radius:16px;
            box-shadow: 0 12px 28px rgba(15,23,42,.08);
        }
    </style>

    <div class="trivia-wrap">

        {{-- Cabecera bonita --}}
        <section class="trivia-hero px-4 px-md-5 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-sm shadow-sm btn-classic">
                    ← Volver al Índice de Juegos
                </a>

                <span class="badge-soft d-none d-md-inline">Trivia Mundialista 🧠</span>

                <button id="toggle-sound" class="btn btn-outline-secondary btn-sm">
                    🔊 Sonido: ON
                </button>
            </div>

            <div class="text-center mt-3">
                <h1 class="title font-title display-6 fw-bold mb-2">
                    Zona de Juegos: Trivia Mundialista <span style="filter:hue-rotate(30deg)">🧠</span>
                </h1>
                <p class="lead text-secondary font-elegant mb-3">
                    ¡Bienvenido, {{ Auth::user()->name }}! Pon a prueba tus conocimientos sobre la Copa Mundial.
                </p>
                <div class="divider-classic"></div>
            </div>
        </section>

        {{-- Cuerpo del juego --}}
        <section class="px-4 px-md-5 py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-trivia overflow-hidden">

                        {{-- Encabezado tarjeta con progreso --}}
                        <div class="head p-3 p-md-4">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="pill">Progreso: <span id="progress-label">0%</span></span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="pill">Puntaje: <strong id="score-label">0</strong></span>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div id="progress-bar" class="progress-bar" style="width:0%"></div>
                            </div>
                        </div>

                        {{-- Contenido dinámico --}}
                        <div class="p-4 p-md-5 bg-white">
                            <div id="trivia-container" class="text-center">
                                <button id="start-game-btn" class="btn btn-success btn-lg btn-classic px-4">
                                    Comenzar ahora
                                </button>
                                <p id="loading-message" style="display:none;" class="mt-3 text-muted">Cargando preguntas...</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-md font-elegant shadow-sm btn-classic">
                            ← Volver al Índice de Juegos
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://kit.fontawesome.com/a2c5e6a3d2.js" crossorigin="anonymous"></script>

<script>
/** ========== AudioManager ========== */
const AudioManager = (() => {
    const ok = "{{ asset('sounds/success.mp3') }}";
    const bad = "{{ asset('sounds/error.mp3') }}";
    const sounds = { success: new Audio(ok), error: new Audio(bad) };

    const LS_KEY = 'sound_on';
    let soundOn = (localStorage.getItem(LS_KEY) !== 'false');
    Object.values(sounds).forEach(a => a.volume = soundOn ? 0.9 : 0.0);

    let unlocked = false;
    function unlock() {
        if (unlocked) return;
        Object.values(sounds).forEach(a => {
            const p = a.play();
            if (p && p.then) p.then(()=>{ a.pause(); a.currentTime = 0; }).catch(()=>{});
        });
        unlocked = true;
        document.removeEventListener('pointerdown', unlock);
        document.removeEventListener('keydown', unlock);
    }
    document.addEventListener('pointerdown', unlock, { once:true });
    document.addEventListener('keydown', unlock, { once:true });

    const btn = document.getElementById('toggle-sound');
    const refresh = () => btn && (btn.textContent = soundOn ? '🔊 Sonido: ON' : '🔇 Sonido: OFF');
    refresh();
    btn?.addEventListener('click', () => {
        soundOn = !soundOn; localStorage.setItem(LS_KEY, soundOn);
        Object.values(sounds).forEach(a => a.volume = soundOn ? 0.9 : 0.0);
        refresh();
    });

    return {
        playSuccess: () => { try { sounds.success.currentTime = 0; sounds.success.play(); } catch(e){} },
        playError:   () => { try { sounds.error.currentTime   = 0; sounds.error.play();   } catch(e){} },
    };
})();
</script>

<script>
/** ========== Lógica de Trivia ========== */
const preguntasBase = [
    { texto:"¿Qué selección ha ganado más Copas del Mundo?", opciones:["Brasil","Alemania","Italia","Argentina"], correcta:"Brasil"},
    { texto:"¿En qué año se disputó el primer Mundial de la historia?", opciones:["1926","1930","1934","1928"], correcta:"1930"},
    { texto:"¿Quién es el máximo goleador histórico de los Mundiales?", opciones:["Messi","Ronaldo Nazário","Klose","Pelé"], correcta:"Klose"},
    { texto:"¿Cuál fue la sede del Mundial 1994?", opciones:["Estados Unidos","Francia","Italia","Alemania"], correcta:"Estados Unidos"},
    { texto:"¿Qué país fue el primer campeón europeo?", opciones:["Italia","Francia","Inglaterra","Alemania"], correcta:"Italia"},
    { texto:"¿Quién anotó el gol conocido como 'La Mano de Dios'?", opciones:["Maradona","Pelé","Valderrama","Kempes"], correcta:"Maradona"},
    { texto:"¿Qué selección fue campeona del Mundial 2014?", opciones:["Argentina","Alemania","España","Países Bajos"], correcta:"Alemania"},
    { texto:"¿Qué jugador tiene más partidos en Mundiales (26)?", opciones:["Lothar Matthäus","Messi","Cristiano Ronaldo","Xavi"], correcta:"Messi"},
    { texto:"¿Quién protagonizó la goleada 7-1 ante Brasil en 2014 (semifinal)?", opciones:["Alemania","Francia","España","Países Bajos"], correcta:"Alemania"},
    { texto:"¿Qué selección ganó Qatar 2022?", opciones:["Argentina","Croacia","Francia","Inglaterra"], correcta:"Argentina"},
];

const shuffle = arr => arr.map(v => [Math.random(), v]).sort((a,b)=>a[0]-b[0]).map(x=>x[1]);

let preguntas = [], indice = 0, puntaje = 0;

const $ = s => document.querySelector(s);
const trivia = () => document.getElementById('trivia-container');
const progressBar = () => document.getElementById('progress-bar');
const progressLabel = () => document.getElementById('progress-label');
const scoreLabel = () => document.getElementById('score-label');

function actualizarProgreso() {
    const pct = Math.round((indice / preguntas.length) * 100);
    progressBar().style.width = pct + '%';
    progressBar().setAttribute('aria-valuenow', pct);
    progressLabel().textContent = pct + '%';
    scoreLabel().textContent = puntaje;
}

function iniciarJuego() {
    preguntas = shuffle(preguntasBase).map(q => ({ texto:q.texto, opciones:shuffle(q.opciones.slice()), correcta:q.correcta }));
    indice = 0; puntaje = 0;
    actualizarProgreso();
    mostrarPregunta();
}

function mostrarPregunta() {
    const p = preguntas[indice];
    trivia().innerHTML = `
        <h4 class="font-elegant fw-bold mb-3">Pregunta ${indice+1} de ${preguntas.length}</h4>
        <p class="lead mb-4 font-elegant">${p.texto}</p>
        <div class="d-grid gap-3">
            ${p.opciones.map(op => `<button class="btn btn-outline-primary btn-option opcion" data-op="${op}">${op}</button>`).join('')}
        </div>
    `;

    document.querySelectorAll('.opcion').forEach(btn => {
        btn.addEventListener('click', e => {
            const seleccion = e.currentTarget.getAttribute('data-op');
            const correcta = p.correcta;

            document.querySelectorAll('.opcion').forEach(op => {
                op.disabled = true;
                const t = op.getAttribute('data-op');
                if (t === correcta) {
                    op.classList.remove('btn-outline-primary','btn-danger');
                    op.classList.add('btn-success');
                } else if (t === seleccion) {
                    op.classList.remove('btn-outline-primary');
                    op.classList.add('btn-danger');
                }
            });

            if (seleccion === correcta) { puntaje++; AudioManager.playSuccess(); }
            else { AudioManager.playError(); }
            actualizarProgreso();

            setTimeout(() => {
                indice++;
                if (indice < preguntas.length) mostrarPregunta();
                else mostrarResultado();
            }, 1100);
        });
    });
}

function mostrarResultado() {
    progressBar().style.width = '100%';
    progressLabel().textContent = '100%';

    const total = preguntas.length;
    const msg = puntaje >= Math.ceil(total*0.8) ? '¡Crack mundialista! 🌟'
              : puntaje >= Math.ceil(total*0.5) ? '¡Buen trabajo! 💪'
              : '¡A seguir practicando! 📚';

    trivia().innerHTML = `
        <div class="panel-result p-4 p-md-5 text-center mx-auto" style="max-width:720px;">
            <h3 class="fw-bold mb-2">🎉 ¡Juego terminado!</h3>
            <p class="lead mb-1">Tu puntaje final: <strong>${puntaje} / ${total}</strong></p>
            <p class="mb-4">${msg}</p>
            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-success btn-classic" id="reiniciar-btn">Jugar de nuevo</button>
                <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-classic">Volver al Índice</a>
            </div>
        </div>
    `;

    $('#reiniciar-btn').addEventListener('click', () => {
        indice = 0; puntaje = 0;
        progressBar().style.width = '0%';
        progressLabel().textContent = '0%';
        scoreLabel().textContent = '0';
        mostrarPregunta();
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const startBtn = $('#start-game-btn');
    const loading = $('#loading-message');

    startBtn.addEventListener('click', () => {
        startBtn.style.display = 'none';
        loading.style.display = 'block';
        setTimeout(() => {
            loading.style.display = 'none';
            iniciarJuego();
        }, 700);
    });
});
</script>
@endpush
