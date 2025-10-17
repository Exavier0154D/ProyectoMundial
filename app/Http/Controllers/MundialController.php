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

    // ------------------------------------------------------------------
    // *** MÉTODO MODIFICADO PARA USAR VISTAS ESPECÍFICAS DEL AÑO (e.g., mundiales.1930) ***
    // ------------------------------------------------------------------
    /**
     * Muestra los detalles de un Mundial específico.
     */
    public function show(Mundial $mundial)
    {
        // Carga todas las relaciones necesarias para la vista de detalle
        $mundial->load(['campeon', 'subcampeon', 'partidos.equipoLocal', 'partidos.equipoVisitante']); 
        
        // Construye el nombre de la vista a partir del año: e.g., 'mundiales.1930'
        $viewName = 'mundiales.' . $mundial->anio;
        
        // Verifica si la vista existe (e.g., 1930.blade.php). Si no, devuelve un error.
        if (view()->exists($viewName)) {
            return view($viewName, compact('mundial')); 
        }

        // En caso de que no exista la vista específica (e.g., 1934.blade.php), puedes redirigir.
        abort(404, 'Vista de detalle no encontrada para el año ' . $mundial->anio);
    }
    // ------------------------------------------------------------------
    
    /**
     * Método de prueba/hardcodeado para mostrar el Mundial de 1930 (Mantenido).
     */
    public function show1930()
    {
        // En un proyecto real, buscarías el objeto Mundial::where('anio', 1930)->first();
        $data = (object) ['anio' => 1930, 'pais_sede' => 'Uruguay', /* ... otros datos */]; 
        return view('mundiales.1930', ['mundial' => $data]);
    }
}