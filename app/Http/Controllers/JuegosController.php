<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class JuegosController extends Controller
{
    /**
     * Muestra la cuadrícula de minijuegos disponibles.
     */
    public function index()
    {
        $juegos = [
            [
                'nombre' => 'Trivia Mundialista',
                'descripcion' => 'Pon a prueba tu memoria con preguntas sobre todos los Mundiales.',
                'ruta' => 'juegos.trivia',
                'icono' => 'fas fa-question-circle',
                'color' => 'success'
            ],
            [
                'nombre' => 'Adivina el Campeón',
                'descripcion' => 'Mira el año y adivina la selección ganadora. ¡Próximamente!',
                'ruta' => '#',
                'icono' => 'fas fa-trophy',
                'color' => 'secondary'
            ],
            [
                'nombre' => 'Memoria de Jugadores',
                'descripcion' => 'Encuentra los pares de jugadores legendarios. ¡Próximamente!',
                'ruta' => '#',
                'icono' => 'fas fa-brain',
                'color' => 'info'
            ],
        ];

        // CAMBIO CLAVE: La vista se llama 'indexjuegos' 
        return view('indexjuegos', compact('juegos')); 
    }
}