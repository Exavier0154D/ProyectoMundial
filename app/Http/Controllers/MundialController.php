<?php

namespace App\Http\Controllers;

use App\Models\Mundial; // ¡ESTA LÍNEA DEBE ESTAR AHÍ!
use Illuminate\Http\Request;

class MundialController extends \Illuminate\Routing\Controller
{
    /**
     * Muestra la lista de todos los Mundiales (Vista Principal/Índice).
     */
    public function index()
    {
        // Obtiene todos los mundiales, ordenados cronológicamente y cargando el campeón.
        $mundiales = Mundial::with('campeon')
                           ->orderBy('anio', 'asc')
                           ->get();
                           
        // Carga la vista principal (index.blade.php).
        return view('mundiales.index', compact('mundiales'));
    }

    /**
     * Muestra los detalles de un Mundial específico.
     */
    public function show(Mundial $mundial)
    {
        // Carga todas las relaciones necesarias para la vista de detalle
        $mundial->load(['campeon', 'subcampeon', 'partidos.equipoLocal', 'partidos.equipoVisitante']); 
        
        return view('mundiales.show', compact('mundial'));
    }
}