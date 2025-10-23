@extends('layouts.app')

@section('title', 'Ordena la Historia')

@section('content')
<div class="container shadow-lg text-serif"
     style="max-width:1200px; padding:0; margin-top:2.5rem; margin-bottom:2.5rem; border-radius:18px; overflow:hidden; border:1px solid #e9eef5; background:linear-gradient(180deg,#f9fbff 0%,#f3f6fb 100%);">

    {{-- ====== Estilos locales ====== --}}
    <style>
        .oh-wrap{
            --gold:#d4af37;
            --gold-soft:#f1df9d;
            --ink:#0f172a;
            --muted:#6b7280;
            --card:#ffffff;
            --soft:#eef2f7;
            --accent:#0d6efd;
        }
        .hero{
            background:
                radial-gradient(1200px 380px at 20% -10%, rgba(212,175,55,.20), transparent 60%),
                radial-gradient(900px 260px at 85% 0%, rgba(241,223,157,.20), transparent 55%),
                linear-gradient(180deg,#ffffff 0%, #f7f9ff 100%);
            border-bottom:1px solid #e9eef5;
        }
        .hero .title{ letter-spacing:.5px; color:var(--ink); }
        .divider{
            width:200px; height:4px; margin:14px auto 0;
            background:linear-gradient(90deg, var(--gold), var(--gold-soft));
            border-radius:999px; opacity:.9;
        }
        .chip{
            display:inline-flex; align-items:center; gap:.5rem;
            background:#fff; border:1px solid #e9eef5; padding:.35rem .7rem;
            border-radius:999px; font-weight:600; font-size:.85rem; color:#3b4151;
        }
        .chip .dot{ width:9px; height:9px; border-radius:999px; background:var(--gold); box-shadow:0 0 0 3px rgba(212,175,55,.18); }

        .card-pro{
            background:var(--card);
            border-radius:16px;
            border:1px solid #e9eef5;
            box-shadow:0 16px 36px rgba(15,23,42,.06);
        }
        .card-pro .head{
            background: linear-gradient(90deg, rgba(212,175,55,.12), rgba(241,223,157,.12));
            border-bottom:1px solid #e9eef5;
        }
        .btn-classic{ border-radius:999px; font-weight:700; letter-spacing:.2px; }
        .btn-ghost{ border-radius:999px; font-weight:600; padding:.45rem .9rem; }

        /* Lista draggable */
        .drag-list{
            list-style:none; margin:0; padding:0;
            display:grid; grid-template-columns:1fr 1fr; gap:14px;
        }
        @media (max-width: 768px){ .drag-list{ grid-template-columns:1fr; } }

        .drag-item{
            user-select:none; cursor:grab;
            background:#fff; border:1px solid #e9eef5; border-radius:12px;
            padding:14px 16px;
            display:flex; align-items:center; justify-content:space-between; gap:10px;
            box-shadow:0 6px 18px rgba(15,23,42,.05);
            transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
        }
        .drag-item:active{ cursor:grabbing; }
        .drag-item:hover{ transform: translateY(-2px); box-shadow:0 10px 28px rgba(15,23,42,.08); }
        .drag-item.drag-over{ border-color: var(--gold); box-shadow:0 0 0 3px rgba(212,175,55,.18) inset; }

        .tag-name{ font-weight:600; color:#374151; }
        .flag{ font-size:1.25rem; }
        .handle{ color:#9aa3b2; font-size:1.2rem; }

        .status{ display:flex; flex-wrap:wrap; gap:.35rem; }
        .pill{
            padding:.2rem .55rem; border-radius:999px; font-size:.8rem;
            background:#f2f6fb; border:1px solid #e4ecf7; color:#3e4c66;
        }

        .hint{ font-size:.95rem; color:var(--muted); }
        .ok{ background:#e7f7ec; border-color:#b8ebc9; color:#136e3b; }
        .bad{ background:#fdecec; border-color:#f6c0c0; color:#7b2121; }
        .foil{
            background: linear-gradient(90deg,#fff, #fff8e1, #fff) border-box;
            border:2px solid transparent; border-radius:14px;
            box-shadow: 0 12px 30px rgba(212,175,55,.25);
        }
    </style>

    <div class="oh-wrap">
        {{-- ====== HERO ====== --}}
        <section class="hero px-4 px-md-5 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-ghost shadow-sm">
                    ← Volver a Juegos
                </a>
                <span class="chip"><span class="dot"></span> Ordena la Historia</span>
                <button id="toggle-sound" class="btn btn-outline-secondary btn-ghost">🔊 Sonido: ON</button>
            </div>

            <div class="text-center mt-3">
                <h1 class="title font-title display-6 fw-bold mb-2">Ordena la Historia — Campeón + Sede</h1>
                <p class="lead text-secondary font-elegant mb-1">
                    Ordena cronológicamente (más antiguo → más reciente) usando <strong>Campeón + Sede</strong>. El año está oculto 😉
                </p>
                <div class="divider"></div>
            </div>
        </section>

        {{-- ====== Juego ====== --}}
        <section class="px-4 px-md-5 py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-pro overflow-hidden">
                        <div class="head p-3 p-md-4">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                <div class="status">
                                    <span class="pill">Ronda: <strong id="round-label">1</strong></span>
                                    <span class="pill">Tarjetas: <strong id="cards-label">4</strong></span>
                                    <span class="pill">Puntaje: <strong id="score-label">0</strong></span>
                                </div>
                                <div class="hint">
                                    Pista: fíjate en la <strong>sede</strong> y el <strong>campeón</strong>. ¡El año está oculto a propósito!
                                </div>
                            </div>
                        </div>

                        <div class="p-4 p-md-5 bg-white">
                            <div id="game-region">

                                {{-- Contenedor de tarjetas --}}
                                <ul id="drag-list" class="drag-list mb-4"></ul>

                                {{-- Acciones --}}
                                <div class="d-flex flex-wrap gap-2">
                                    <button id="check-btn" class="btn btn-primary btn-classic">
                                        Comprobar orden
                                    </button>
                                    <button id="reshuffle-btn" class="btn btn-outline-secondary btn-classic">
                                        Reordenar aleatoriamente
                                    </button>
                                    <button id="solution-btn" class="btn btn-outline-dark btn-classic">
                                        Ver solución
                                    </button>
                                </div>

                                {{-- Mensaje --}}
                                <div id="result" class="mt-3 p-3 rounded fw-bold" style="display:none;"></div>

                            </div>

                            {{-- Final --}}
                            <div id="end-screen" class="text-center" style="display:none;">
                                <div class="p-4 p-md-5 foil">
                                    <h3 class="fw-bold mb-2">🏆 ¡Historia dominada!</h3>
                                    <p class="lead mb-3">Rondas superadas: <strong id="rounds-done"></strong></p>
                                    <p class="mb-4">Puntaje final: <strong id="score-final"></strong></p>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button id="restart-btn" class="btn btn-success btn-classic">Jugar de nuevo</button>
                                        <a href="{{ route('juegos.index') }}" class="btn btn-outline-dark btn-classic">Volver a Juegos</a>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- body --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
<script>
/** ============================
 *  AudioManager (sonidos)
 *  ============================ */
const AudioManager = (() => {
    const ok = "{{ asset('sounds/success.mp3') }}";
    const bad = "{{ asset('sounds/error.mp3') }}";
    const win = "{{ asset('sounds/win.mp3') }}"; // opcional

    const sounds = {
        success: new Audio(ok),
        error:   new Audio(bad),
        win:     new Audio(win || ok),
    };

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

    const btn = document.getElementById('toggle-sound');
    const refresh = () => btn && (btn.textContent = soundOn ? '🔊 Sonido: ON' : '🔇 Sonido: OFF');
    refresh();
    btn?.addEventListener('click', ()=>{
        soundOn=!soundOn; localStorage.setItem(LS_KEY, soundOn);
        Object.values(sounds).forEach(a => a.volume = soundOn ? 0.9 : 0.0);
        refresh();
    });

    return {
        success(){ try{ sounds.success.currentTime=0; sounds.success.play(); }catch(e){} },
        error(){ try{ sounds.error.currentTime=0;   sounds.error.play();   }catch(e){} },
        win(){ try{ sounds.win.currentTime=0;      sounds.win.play();     }catch(e){} },
        setVolume(v=0.9){ Object.values(sounds).forEach(a => a.volume = v); }
    };
})();
</script>

<script>
/** ============================
 *  Datos base (Campeón + Sede, año oculto para validación)
 *  ============================ */
const WORLD_CUPS = [
    {year:1930, champion:"Uruguay",   flag:"🇺🇾", host:"Uruguay"},
    {year:1934, champion:"Italia",    flag:"🇮🇹", host:"Italia"},
    {year:1938, champion:"Italia",    flag:"🇮🇹", host:"Francia"},
    {year:1950, champion:"Uruguay",   flag:"🇺🇾", host:"Brasil"},
    {year:1954, champion:"Alemania",  flag:"🇩🇪", host:"Suiza"},
    {year:1958, champion:"Brasil",    flag:"🇧🇷", host:"Suecia"},
    {year:1962, champion:"Brasil",    flag:"🇧🇷", host:"Chile"},
    {year:1966, champion:"Inglaterra",flag:"🇬🇧", host:"Inglaterra"},
    {year:1970, champion:"Brasil",    flag:"🇧🇷", host:"México"},
    {year:1974, champion:"Alemania",  flag:"🇩🇪", host:"Alemania Federal"},
    {year:1978, champion:"Argentina", flag:"🇦🇷", host:"Argentina"},
    {year:1982, champion:"Italia",    flag:"🇮🇹", host:"España"},
    {year:1986, champion:"Argentina", flag:"🇦🇷", host:"México"},
    {year:1990, champion:"Alemania",  flag:"🇩🇪", host:"Italia"},
    {year:1994, champion:"Brasil",    flag:"🇧🇷", host:"Estados Unidos"},
    {year:1998, champion:"Francia",   flag:"🇫🇷", host:"Francia"},
    {year:2002, champion:"Brasil",    flag:"🇧🇷", host:"Corea/Japón"},
    {year:2006, champion:"Italia",    flag:"🇮🇹", host:"Alemania"},
    {year:2010, champion:"España",    flag:"🇪🇸", host:"Sudáfrica"},
    {year:2014, champion:"Alemania",  flag:"🇩🇪", host:"Brasil"},
    {year:2018, champion:"Francia",   flag:"🇫🇷", host:"Rusia"},
    {year:2022, champion:"Argentina", flag:"🇦🇷", host:"Catar"},
];

const ROUNDS = [4, 6, 8]; // progresivo

// utilidades
const $ = s => document.querySelector(s);
const byId = id => document.getElementById(id);
const shuffle = arr => arr.map(v => [Math.random(),v]).sort((a,b)=>a[0]-b[0]).map(x=>x[1]);

let roundIndex = 0;
let score = 0;
let currentSet = [];
let solved = false;

const dragList = byId('drag-list');
const resultBox = byId('result');
const roundLabel = byId('round-label');
const cardsLabel = byId('cards-label');
const scoreLabel = byId('score-label');

/** ============================
 *  Drag & Drop HTML5
 *  ============================ */
let dragSrcEl = null;
function handleDragStart(e){
    dragSrcEl = this;
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.outerHTML);
    this.style.opacity = '0.5';
}
function handleDragOver(e){
    if(e.preventDefault) e.preventDefault();
    this.classList.add('drag-over');
    e.dataTransfer.dropEffect = 'move';
    return false;
}
function handleDragLeave(){ this.classList.remove('drag-over'); }
function handleDrop(e){
    if(e.stopPropagation) e.stopPropagation();
    this.classList.remove('drag-over');
    if(dragSrcEl !== this){
        this.insertAdjacentHTML('beforebegin', e.dataTransfer.getData('text/html'));
        dragSrcEl.parentNode.removeChild(dragSrcEl);
        addDnDHandlers(this.previousSibling);
        refreshIndexBadges();
    }
    return false;
}
function handleDragEnd(){ this.style.opacity = '1'; [...dragList.children].forEach(li => li.classList.remove('drag-over')); }

function addDnDHandlers(el){
    el.addEventListener('dragstart', handleDragStart, false);
    el.addEventListener('dragenter', handleDragOver, false);
    el.addEventListener('dragover', handleDragOver, false);
    el.addEventListener('dragleave', handleDragLeave, false);
    el.addEventListener('drop', handleDrop, false);
    el.addEventListener('dragend', handleDragEnd, false);
}

/** ============================
 *  Render & lógica
 *  ============================ */
function renderRound(){
    solved = false;
    resultBox.style.display = 'none';
    resultBox.className = 'mt-3 p-3 rounded fw-bold';
    dragList.innerHTML = '';

    const n = ROUNDS[roundIndex];
    const pool = shuffle(WORLD_CUPS.slice());
    currentSet = pool.slice(0, Math.min(n, WORLD_CUPS.length));

    // pintamos tarjetas en orden aleatorio
    const randomized = shuffle(currentSet.slice());
    randomized.forEach(item => {
        const li = document.createElement('li');
        li.className = 'drag-item';
        li.draggable = true;
        li.setAttribute('data-year', item.year); // año oculto para validar
        li.innerHTML = `
            <div class="d-flex align-items-center gap-3">
                <span class="flag">${item.flag}</span>
                <div>
                    <div class="tag-name">${item.champion}</div>
                    <div class="text-muted" style="font-size:.9rem;">Sede: ${item.host}</div>
                </div>
            </div>
            <div class="handle"><i class="fas fa-grip-lines"></i></div>
        `;
        dragList.appendChild(li);
        addDnDHandlers(li);
    });

    roundLabel.textContent = (roundIndex + 1);
    cardsLabel.textContent = currentSet.length;
    scoreLabel.textContent = score;

    refreshIndexBadges();
}

function refreshIndexBadges(){
    [...dragList.children].forEach((li, idx) => {
        li.style.setProperty('--idx', idx+1);
    });
}

function isCorrectOrder(){
    const years = [...dragList.children].map(li => parseInt(li.getAttribute('data-year')));
    const sorted = years.slice().sort((a,b)=>a-b);
    return years.every((v,i)=> v === sorted[i]);
}

function showSolution(){
    const sorted = currentSet.slice().sort((a,b)=>a.year-b.year);
    dragList.innerHTML = '';
    sorted.forEach(item => {
        const li = document.createElement('li');
        li.className = 'drag-item';
        li.draggable = true;
        li.setAttribute('data-year', item.year);
        li.innerHTML = `
            <div class="d-flex align-items-center gap-3">
                <span class="flag">${item.flag}</span>
                <div>
                    <div class="tag-name">${item.champion}</div>
                    <div class="text-muted" style="font-size:.9rem;">Sede: ${item.host}</div>
                </div>
            </div>
            <div class="handle"><i class="fas fa-grip-lines"></i></div>
        `;
        dragList.appendChild(li);
        addDnDHandlers(li);
    });
}

function nextRoundOrEnd(){
    roundIndex++;
    if(roundIndex >= ROUNDS.length){
        byId('game-region').style.display = 'none';
        byId('end-screen').style.display = 'block';
        byId('rounds-done').textContent = ROUNDS.length;
        byId('score-final').textContent = score;
        AudioManager.win();
        return;
    }
    renderRound();
}

/** ============================
 *  Botones
 *  ============================ */
byId('check-btn').addEventListener('click', () => {
    if (solved) return;
    if (isCorrectOrder()){
        AudioManager.success();
        resultBox.style.display = 'block';
        resultBox.classList.add('ok');
        resultBox.textContent = '✅ ¡Perfecto! Orden cronológico correcto.';
        score++;
        solved = true;
        setTimeout(nextRoundOrEnd, 900);
    }else{
        AudioManager.error();
        resultBox.style.display = 'block';
        resultBox.classList.add('bad');
        resultBox.textContent = '❌ Aún no. Revisa el orden de más antiguo a más reciente.';
        const years = [...dragList.children].map(li => parseInt(li.getAttribute('data-year')));
        const sorted = years.slice().sort((a,b)=>a-b);
        [...dragList.children].forEach((li,i)=>{
            if (years[i] !== sorted[i]) {
                li.animate([{transform:'translateX(0)'},{transform:'translateX(-4px)'},{transform:'translateX(4px)'},{transform:'translateX(0)'}], {duration:250});
            }
        });
    }
});

byId('reshuffle-btn').addEventListener('click', () => {
    const randomized = shuffle([...dragList.children]);
    dragList.innerHTML = '';
    randomized.forEach(li => { dragList.appendChild(li); addDnDHandlers(li); });
    resultBox.style.display = 'none';
});

byId('solution-btn').addEventListener('click', () => {
    showSolution();
    resultBox.style.display = 'block';
    resultBox.className = 'mt-3 p-3 rounded fw-bold ok';
    resultBox.textContent = '🔎 Aquí tienes el orden correcto. ¡Intenta memorizarlo y vuelve a mezclar!';
});

/** ============================
 *  Final: restart
 *  ============================ */
byId('restart-btn')?.addEventListener('click', () => {
    roundIndex = 0; score = 0;
    byId('end-screen').style.display = 'none';
    byId('game-region').style.display = 'block';
    renderRound();
});

/** ============================
 *  Inicio
 *  ============================ */
document.addEventListener('DOMContentLoaded', renderRound);
</script>

{{-- Font Awesome para el icono del "handle" --}}
<script src="https://kit.fontawesome.com/a2c5e6a3d2.js" crossorigin="anonymous"></script>
@endpush
