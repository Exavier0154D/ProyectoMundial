@extends('layouts.app')

@section('title', 'Enciclopedia Interactiva')

@section('content')
<div class="container shadow-lg text-serif"
     style="max-width:1300px; padding:0; margin-top:2.5rem; margin-bottom:2.5rem; border-radius:18px; overflow:hidden; border:1px solid #e9eef5; background:linear-gradient(180deg,#f9fbff 0%,#f3f6fb 100%);">

    {{-- ====== Estilos locales del hub ====== --}}
    <style>
        .hub-wrap{
            --prime:#7f1734; --accent:#c8a600; --mint:#26b893;
            --ink:#0f172a; --muted:#6b7280; --soft:#eef2f7; --card:#ffffff;
        }
        .hero{
            background:
                radial-gradient(1200px 380px at 20% -10%, rgba(127,23,52,.14), transparent 60%),
                radial-gradient(900px 260px at 85% 0%, rgba(200,166,0,.14), transparent 55%),
                linear-gradient(180deg,#ffffff 0%, #f7f9ff 100%);
            border-bottom:1px solid #e9eef5;
        }
        .hero .title{ letter-spacing:.5px; color:var(--ink); }
        .subtitle{ color:var(--muted); }
        .divider{
            width:200px; height:4px; margin:14px auto 0;
            background:linear-gradient(90deg,var(--prime),var(--accent));
            border-radius:999px; opacity:.9;
        }
        .chip{
            display:inline-flex; align-items:center; gap:.5rem;
            background:#fff; border:1px solid #e9eef5; padding:.35rem .7rem;
            border-radius:999px; font-weight:600; font-size:.85rem; color:#3b4151;
        }
        .chip .dot{ width:9px; height:9px; border-radius:999px; background:var(--prime); box-shadow:0 0 0 3px rgba(127,23,52,.14); }
        .card-pro{
            background:var(--card); border-radius:16px; border:1px solid #e9eef5;
            box-shadow:0 16px 36px rgba(15,23,42,.06);
            transition: transform .25s ease, box-shadow .25s ease; position:relative;
        }
        .card-pro:hover{ transform: translateY(-4px); box-shadow:0 22px 50px rgba(15,23,42,.10); }
        .card-pro::before{
            content:""; position:absolute; inset:0; z-index:0; border-radius:16px;
            padding:1px; background:linear-gradient(135deg, rgba(127,23,52,.35), rgba(200,166,0,.35));
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor; mask-composite: exclude;
        }
        .card-body{ position:relative; z-index:1; }
        .img-thumb{ max-height: 190px; object-fit:cover; border-radius:12px; box-shadow: 0 10px 25px rgba(15,23,42,.10); }
        .btn-classic{ border-radius:999px; font-weight:700; letter-spacing:.2px; }
        .small-muted{ color:var(--muted); }
        .bk-stripes{
            position:absolute; inset:0; pointer-events:none; opacity:.15;
            background: repeating-linear-gradient(135deg, #0000 0 18px, #0001 18px 36px);
        }
    </style>

    <div class="hub-wrap position-relative">
        <div class="bk-stripes"></div>

        {{-- ====== HERO ====== --}}
        <section class="hero px-4 px-md-5 py-5 text-center">
            {{-- Chips centradas --}}
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-2 mb-3">
                <span class="chip"><span class="dot"></span> Enciclopedia</span>
                <span class="chip">Actualizado • <strong>{{ now()->format('M Y') }}</strong></span>
                <span class="chip">Mundiales disponibles: <strong>22</strong></span>
            </div>

            <h1 class="title font-title display-5 fw-bold mb-2">
                Enciclopedia Interactiva de la Copa Mundial 🏆
            </h1>
            <p class="subtitle lead font-elegant mb-2">
                Elige tu aventura: explora la historia de los mundiales o pon a prueba tus conocimientos.
            </p>
            <div class="divider"></div>
        </section>

        {{-- ====== TARJETAS ====== --}}
        <section class="px-4 px-md-5 py-5">
            <div class="row g-4 justify-content-center">

                {{-- Enciclopedia --}}
                <div class="col-md-6 col-lg-5">
                    <div class="card-pro h-100 p-4">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('img/hub/Enciclopedia.png') }}" class="img-fluid img-thumb mb-3" alt="Enciclopedia">
                            <h2 class="font-title text-dark fs-3 mb-2">Sección Enciclopedia</h2>
                            <p class="font-elegant small-muted mb-3">
                                Accede al índice histórico y sumérgete en los detalles de cada torneo desde 1930.
                            </p>
                            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-dark btn-lg mt-auto btn-classic px-4">
                                Abrir el Índice
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Minijuegos --}}
                <div class="col-md-6 col-lg-5">
                    <div class="card-pro h-100 p-4">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('img/hub/Minijuegos.png') }}" class="img-fluid img-thumb mb-3" alt="Minijuegos">
                            <h2 class="font-title text-dark fs-3 mb-2">Zona de Minijuegos</h2>
                            <p class="font-elegant small-muted mb-3">
                                Demuestra que eres un experto en historia mundialista.
                            </p>

                            @guest
                                <a href="{{ route('register') }}" class="btn btn-dark btn-lg mt-auto btn-classic px-4">Crear Cuenta / Jugar</a>
                                <p class="mt-2 small text-muted">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-decoration-underline">Inicia sesión</a></p>
                            @else
                                <a href="{{ route('juegos.index') }}" class="btn btn-success btn-lg mt-auto btn-classic px-4">Comenzar a Jugar</a>
                                <p class="mt-2 small text-muted mb-1">¡Hola, {{ Auth::user()->name }}!</p>

                                {{-- Opciones de cuenta --}}
                                <div class="mt-2">
                                    {{-- Cerrar sesión (POST) --}}
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="btn btn-outline-dark btn-sm btn-classic me-2">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    {{-- Registrar otra cuenta --}}
                                    @php
                                        $hasSwitch = \Illuminate\Support\Facades\Route::has('auth.switch');
                                        $switchHref = $hasSwitch ? route('auth.switch') : route('register');
                                    @endphp
                                    <a href="{{ $switchHref }}"
                                       @unless($hasSwitch)
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit(); setTimeout(()=>window.location.href='{{ route('register') }}', 200);"
                                       @endunless
                                       class="btn btn-outline-primary btn-sm btn-classic">
                                        Registrar otra cuenta
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- CTA inferior --}}
        <div class="text-center mb-5">
            <a href="{{ route('mundiales.index') }}" class="btn btn-outline-dark btn-sm btn-classic me-2">Explorar Enciclopedia</a>
            @auth
                <a href="{{ route('juegos.index') }}" class="btn btn-success btn-sm btn-classic">Ir a Minijuegos</a>
            @endauth
        </div>
    </div>
</div>
@endsection
