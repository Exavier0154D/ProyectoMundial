<?php

use App\Http\Controllers\HubController;
use App\Http\Controllers\MundialController;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\AdivinaCampeonController; // <-- AÑADIDO: Importa el nuevo controlador
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth; 

// Rutas Públicas
Route::get('/', [HubController::class, 'index'])->name('hub.index');

Route::get('/enciclopedia', [MundialController::class, 'index'])->name('enciclopedia.index');
Route::get('/enciclopedia/{mundial}', [MundialController::class, 'show'])->name('enciclopedia.show');

// Rutas Protegidas (Requieren autenticación)
Route::middleware(['auth'])->group(function () {
    
    // Índice de Juegos
    Route::get('/juegos', [JuegosController::class, 'index'])->name('juegos.index');
    
    // Rutas de los 8 Minijuegos
    
    // 1. Trivia
    Route::get('/juegos/trivia', [TriviaController::class, 'index'])->name('juegos.trivia');
    
    // 2. Adivina el Campeón (USA SU PROPIO CONTROLADOR Y RUTA POST)
    Route::get('/juegos/adivina-campeon', [AdivinaCampeonController::class, 'index'])->name('juegos.adivinacampeon');
    Route::post('/juegos/adivina-campeon/submit', [AdivinaCampeonController::class, 'submit'])->name('juegos.adivinacampeon.submit');

    // 3-8. Otros juegos (manteniendo los temporales por ahora)
    Route::get('/juegos/mascotas', [JuegosController::class, 'mascotas'])->name('juegos.mascotas');
    Route::get('/juegos/goleador', [JuegosController::class, 'goleador'])->name('juegos.goleador');
    Route::get('/juegos/logos', [JuegosController::class, 'logos'])->name('juegos.logos');
    Route::get('/juegos/records', [JuegosController::class, 'records'])->name('juegos.records');
    Route::get('/juegos/sede', [JuegosController::class, 'sede'])->name('juegos.sede');
    Route::get('/juegos/banderas', [JuegosController::class, 'banderas'])->name('juegos.banderas');
    
});

// Rutas de Autenticación
Auth::routes();