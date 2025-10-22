<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class JuegosController extends Controller
{
    public function index()
    {
        $juegos = [
            [
                'nombre' => 'Trivia Histórica',
                'descripcion' => 'El clásico: responde preguntas de conocimiento general sobre los Mundiales.',
                'icono_url' => 'img/juegos/trivia.png', 
                'ruta' => 'juegos.trivia' 
            ],
            [
                // REEMPLAZADO: 'Adivina el Jugador' por 'Adivina el Campeón'
                'nombre' => 'Adivina el Campeón',
                'descripcion' => 'Identifica al campeón de un Mundial basándote en pistas clave.',
                'icono_url' => 'img/juegos/campeon.png', 
                'ruta' => 'juegos.adivinacampeon' // <--- RUTA CORREGIDA
            ],

        ];

        // CORRECCIÓN: Si el archivo se llama 'juegos.blade.php'
        return view('mundiales.juegos', compact('juegos'));
    }
    
    // Métodos temporales (Asegúrate de que 'leyenda' se elimine si ya no está en el array)
    public function conexiones() { return view('juegos.proximamente', ['juego' => 'Mundial Connections']); }
    public function impostor() { return view('juegos.proximamente', ['juego' => 'Alineación Impostora']); }
    public function logos() { return view('juegos.proximamente', ['juego' => 'Reto de Logos y Sede']); }
    public function goleador() { return view('juegos.proximamente', ['juego' => 'Top Goleadores']); }
    public function mascotas() { return view('juegos.proximamente', ['juego' => 'Mascotas Ocultas']); }
    public function cronologia() { return view('juegos.proximamente', ['juego' => 'Reto Cronológico']); }
    
}