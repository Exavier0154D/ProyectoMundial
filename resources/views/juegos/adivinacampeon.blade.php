@extends('layouts.app')

@section('title', 'Adivina el Campeón')

@section('content')
<div class="container shadow-lg text-serif"
     style="max-width:1200px; padding:0; margin-top:2.5rem; margin-bottom:2.5rem; border-radius:18px; overflow:hidden; border:1px solid #e9eef5; background:linear-gradient(180deg,#f9fbff 0%,#f3f6fb 100%);">

    {{-- ====== Estilos locales del juego ====== --}}
    <style>
        .game-wrap{
            --prime:#6a0dad;     /* morado protagonista */
            --accent:#ffb703;    /* dorado */
            --ink:#0f172a;
            --muted:#6b7280;
            --soft:#eef2f7;
            --card:#ffffff;
        }
        .hero{
            background:
                radial-gradient(900px 280px at 20% -10%, rgba(106,13,173,.14), transparent 60%),
                radial-gradient(900px 260px at 80% 0%, rgba(255,183,3,.18), transparent 55%),
                linear-gradient(180deg,#ffffff 0%, #f7f9ff 100%);
            border-bottom:1px solid #e9eef5;
        }
        .hero .title{ letter-spacing:.5px; color:var(--ink); }
        .chip{ background:#fff; border:1px solid #e9eef5; padding:.35rem .7rem; border-radius:999px; font-weight:600; font-size:.85rem; color:#3b4151;}
        .chip-theme{ border-color:rgba(106,13,173,.25); color:var(--prime); }
        .divider{
            width:180px; height:4px; margin:10px auto 0;
            background:linear-gradient(90deg,var(--prime),var(--accent));
            border-radius:999px; opacity:.85;
        }

        .card-pro{
            background:var(--card);
            border:1px solid #e9eef5; border-radius:16px;
            box-shadow:0 12px 28px rgba(15,23,42,.06);
        }
        .card-pro .head{
            background:linear-gradient(90deg, rgba(106,13,173,.10), rgba(255,183,3,.10));
            border-bottom:1px solid #e9eef5;
        }

        .btn-classic{ border-radius:999px; font-weight:600; padding:.7rem 1.1rem; }
        .btn-ghost{ border-radius:999px; font-weight:600; padding:.45rem .9rem; }

        .list-pistas li{ line-height:1.45; }
        .badge-live{
            display:inline-flex; align-items:center; gap:.45rem;
            background:#fff; border:1px solid #e9eef5; border-radius:999px;
            padding:.35rem .7rem; font-size:.85rem; color:#3b4151; font-weight:600;
        }
        .dot{
            width:9px; height:9px; border-radius:999px; background:var(--prime);
            box-shadow:0 0 0 3px rgba(106,13,173,.14);
        }
        .attempts{
            display:flex; gap:.35rem; flex-wrap:wrap;
        }
        .pill{
            padding:.2rem .55rem; border-radius:999px; font-size:.8rem;
            background:#f2f6fb; border:1px solid #e4ecf7; color:#3e4c66;
        }
        .pill.on{ background:#e9dbff; border-color:#cbb6ff; color:#4b2e83; }
        .pill.off{ background:#ffe9d1; border-color:#ffd6a8; color:#8a5a00; }
    </style>

    <div class="game-wrap">

        {{-- ====== Hero ====== --}}
        <section class="hero px-4 px-md-5 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-ghost shadow-sm">
                    ← Volver al Índice de Juegos
                </a>

                <span class="chip chip-theme d-none d-md-inline">Adivina el Campeón 🏆</span>

                <button id="toggle-sound" class="btn btn-outline-secondary btn-ghost">
                    🔊 Sonido: ON
                </button>
            </div>

            <div class="text-center mt-3">
                <h1 class="title font-title display-6 fw-bold mb-2">Adivina el Campeón Mundial</h1>
                <p class="lead text-secondary font-elegant mb-1">
                    Lee las pistas y acierta al campeón del año indicado.
                </p>
                <div class="divider"></div>
            </div>
        </section>

        {{-- ====== Tarjeta del juego ====== --}}
        <section class="px-4 px-md-5 py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-pro overflow-hidden">
                        {{-- Header --}}
                        <div class="head p-3 p-md-4">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                <span class="badge-live">
                                    <span class="dot"></span>
                                    Mundial objetivo: <strong>{{ $mundialObjetivo['anio'] }}</strong>
                                </span>

                                <div class="attempts" id="attempts-bar">
                                    {{-- chips dinámicos de intentos --}}
                                </div>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-4 p-md-5 bg-white">
                            {{-- Pistas --}}
                            <div class="mb-4 p-3 p-md-4 border rounded shadow-sm" style="background:#fff;">
                                <h4 class="text-dark fw-bold mb-3">Pistas clave</h4>
                                <ul id="pistas-list" class="list-unstyled list-pistas mb-0 text-muted">
                                    <li class="mb-1">
                                        <i class="fas fa-lightbulb text-warning me-2"></i>
                                        {{ $mundialObjetivo['pistaInicial'] }}
                                    </li>
                                </ul>
                            </div>

                            {{-- Form --}}
                            <form id="adivina-campeon-form" class="mt-2">
                                @csrf
                                <input type="hidden" name="intento" id="intento-counter" value="1">

                                <div class="input-group mb-3">
                                    <input
                                        type="text"
                                        class="form-control form-control-lg text-center font-elegant"
                                        name="campeon"
                                        placeholder="Escribe el país campeón (ej. Brasil)"
                                        autocomplete="off"
                                        required
                                    >
                                    <button id="submit-btn" class="btn btn-primary btn-lg btn-classic" type="submit">
                                        Adivinar
                                    </button>
                                </div>
                            </form>

                            {{-- Mensajes --}}
                            <div id="resultado-mensaje" class="mt-3 p-3 rounded fw-bold" style="display:none;"></div>
                        </div>
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
/** ============================
 *  AudioManager autocontenido
 *  ============================ */
const AudioManager = (() => {
    const defaultSuccess = "{{ asset('sounds/success.mp3') }}";
    const defaultError   = "{{ asset('sounds/error.mp3') }}";
    const sounds = { success: new Audio(defaultSuccess), error: new Audio(defaultError) };

    const LS_KEY = 'sound_on';
    let soundOn = (localStorage.getItem(LS_KEY) !== 'false');
    Object.values(sounds).forEach(a => a.volume = soundOn ? 0.9 : 0.0);

    let unlocked = false;
    function unlock(){
        if(unlocked) return;
        Object.values(sounds).forEach(a=>{
            const p=a.play(); if(p&&p.then){ p.then(()=>{a.pause();a.currentTime=0;}).catch(()=>{}); }
        });
        unlocked=true;
        document.removeEventListener('pointerdown',unlock);
        document.removeEventListener('keydown',unlock);
    }
    document.addEventListener('pointerdown', unlock, {once:true});
    document.addEventListener('keydown', unlock, {once:true});

    const btn=document.getElementById('toggle-sound');
    function refresh(){ if(btn) btn.textContent = soundOn ? '🔊 Sonido: ON' : '🔇 Sonido: OFF'; }
    refresh();
    btn?.addEventListener('click', ()=>{
        soundOn=!soundOn; localStorage.setItem(LS_KEY, soundOn);
        Object.values(sounds).forEach(a=>a.volume = soundOn ? 0.9 : 0.0);
        refresh();
    });

    return {
        playSuccess:()=>{ try{ sounds.success.currentTime=0; sounds.success.play(); }catch(e){} },
        playError:  ()=>{ try{ sounds.error.currentTime=0;   sounds.error.play();   }catch(e){} }
    };
})();
</script>

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
    const attemptsBar = document.getElementById('attempts-bar');

    // ====== UI: chips de intentos ======
    function renderAttempts() {
        const intento = parseInt(intentoCounter.value); // el siguiente intento que hará el usuario
        attemptsBar.innerHTML = '';
        for (let i=1; i<=totalPistas; i++) {
            const span = document.createElement('span');
            span.className = 'pill ' + (i < intento ? 'off' : 'on');
            span.textContent = i < intento ? `Falló #${i}` : `Intento #${i}`;
            attemptsBar.appendChild(span);
        }
    }
    renderAttempts();

    const handleGameEnd = (success, correctName) => {
        const message = success
            ? `¡Adivinaste! El campeón del ${anio} fue ${correctName}. ¿Quieres jugar de nuevo (Aceptar) o volver al índice (Cancelar)?`
            : `Se agotaron los intentos. El campeón era ${correctName}. ¿Quieres jugar de nuevo (Aceptar) o volver al índice (Cancelar)?`;
        if (confirm(message)) window.location.href = currentPageUrl;
        else window.location.href = juegosIndexUrl;
    };

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        mensaje.style.display = 'block';
        mensaje.className = 'mt-3 p-3 rounded fw-bold bg-secondary-subtle text-dark';
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
        .then(async res => {
            let data; try { data = await res.json(); } catch { throw new Error('Respuesta no válida'); }
            submitBtn.disabled = false; input.value = '';

            if (data.esCorrecto) {
                AudioManager.playSuccess();
                mensaje.className = 'mt-3 p-3 rounded fw-bold bg-success-subtle text-success';
                mensaje.innerHTML = `🎉 ¡Felicidades! Respuesta correcta: <strong>${data.respuestaCorrecta}</strong> 🎉`;
                form.style.display = 'none';
                handleGameEnd(true, data.respuestaCorrecta);

            } else if (data.ultimoIntento) {
                AudioManager.playError();
                mensaje.className = 'mt-3 p-3 rounded fw-bold bg-danger-subtle text-danger';
                mensaje.innerHTML = `❌ Fallaste. El campeón era <strong>${data.respuestaCorrecta}</strong>.`;
                form.style.display = 'none';
                handleGameEnd(false, data.respuestaCorrecta);

            } else {
                AudioManager.playError();
                mensaje.className = 'mt-3 p-3 rounded fw-bold bg-danger-subtle text-danger';
                mensaje.innerHTML = `❌ Incorrecto. Nueva pista disponible.`;

                if (data.proximaPista) {
                    const li = document.createElement('li');
                    li.className = 'mb-1';
                    li.innerHTML = `<i class="fas fa-lightbulb text-warning me-2"></i> ${data.proximaPista}`;
                    pistasList.appendChild(li);
                }

                // avanzar intento y refrescar chips
                intentoCounter.value = parseInt(intentoCounter.value) + 1;
                renderAttempts();

                // feedback de último intento
                if (parseInt(intentoCounter.value) === totalPistas) {
                    submitBtn.textContent = '¡Último Intento!';
                    submitBtn.classList.replace('btn-primary', 'btn-danger');
                }
            }
        })
        .catch(err => {
            console.error(err);
            AudioManager.playError();
            mensaje.className = 'mt-3 p-3 rounded fw-bold bg-danger-subtle text-danger';
            mensaje.innerHTML = `⚠️ Error de comunicación. Intenta de nuevo.`;
            submitBtn.disabled = false;
        });
    });
});
</script>
@endpush
