<?php

use App\Http\Controllers\HubController;
use App\Http\Controllers\MundialController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\JuegosController; // Añadir el nuevo controlador de Índice de Juegos
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth;   

// ======================================
// 1. RUTA PRINCIPAL (HUB)
// ======================================
Route::get('/', [HubController::class, 'index'])->name('hub.index');

// ======================================
// 2. SECCIÓN ENCICLOPEDIA
// ======================================
Route::get('/enciclopedia', [MundialController::class, 'index'])->name('enciclopedia.index');
Route::get('/enciclopedia/{mundial}', [MundialController::class, 'show'])->name('enciclopedia.show');

// ======================================
// 3. MINIJUEGOS (PROTEGIDO)
// Todas estas rutas requieren que el usuario esté logueado.
// ======================================
Route::middleware(['auth'])->group(function () {
    
    // RUTA 3.1: Muestra la CUADRÍCULA de todos los minijuegos
    Route::get('/juegos', [JuegosController::class, 'index'])->name('juegos.index');
    
    // RUTA 3.2: RUTA ESPECÍFICA para iniciar el juego de Trivia
    // El controlador de Trivia manejará la lógica del juego.
    Route::get('/juegos/trivia', [TriviaController::class, 'index'])->name('juegos.trivia');
    
    // Aquí irán otras rutas de juegos específicos
});


// ======================================
// 4. RUTAS DE AUTENTICACIÓN
// Carga /register, /login, /logout, etc.
// ======================================
Auth::routes();