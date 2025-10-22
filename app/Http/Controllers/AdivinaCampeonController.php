<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdivinaCampeonController extends Controller
{
    // Datos completos de los 22 Mundiales (Simulando una base de datos)
    private $datosMundiales = [
        [
            'id' => 1930, 
            'anio' => 1930, 
            'campeon' => 'uruguay',
            'pistas' => [
                'Fue el primer Mundial de la historia y tuvo lugar en Sudamérica.',
                'Solo cuatro selecciones europeas viajaron para competir.',
                'El partido final se jugó en el Estadio Centenario.'
            ]
        ],
        [
            'id' => 1934, 
            'anio' => 1934, 
            'campeon' => 'italia',
            'pistas' => [
                'El anfitrión fue el primer país europeo en albergar el torneo.',
                'Fue el único Mundial donde el campeón de la edición anterior no participó (Uruguay).',
                'El campeón fue dirigido por Vittorio Pozzo.'
            ]
        ],
        [
            'id' => 1938, 
            'anio' => 1938, 
            'campeon' => 'italia',
            'pistas' => [
                'El anfitrión fue Francia, lo que provocó un boicot de los países sudamericanos.',
                'El campeón retuvo su título, siendo el primer equipo en lograrlo.',
                'La final se disputó contra Hungría.'
            ]
        ],
        [
            'id' => 1950, 
            'anio' => 1950, 
            'campeon' => 'uruguay',
            'pistas' => [
                'El torneo regresó tras la Segunda Guerra Mundial y se celebró en Brasil.',
                'La fase final se decidió mediante un grupo, no una final directa.',
                'El partido decisivo es conocido como el "Maracanazo".'
            ]
        ],
        [
            'id' => 1954, 
            'anio' => 1954, 
            'campeon' => 'alemania',
            'pistas' => [
                'Se celebró en Suiza.',
                'El campeón derrotó a Hungría en la final, un partido conocido como "El Milagro de Berna".',
                'El equipo ganador estaba dirigido por Sepp Herberger.'
            ]
        ],
        [
            'id' => 1958, 
            'anio' => 1958, 
            'campeon' => 'brasil',
            'pistas' => [
                'Se celebró en Suecia.',
                'Un joven de 17 años, Pelé, hizo su debut y marcó seis goles, incluyendo dos en la final.',
                'El campeón usó una camiseta de emergencia de color azul en la final.'
            ]
        ],
        [
            'id' => 1962, 
            'anio' => 1962, 
            'campeon' => 'brasil',
            'pistas' => [
                'Se celebró en Chile.',
                'El campeón retuvo su título, a pesar de que Pelé se lesionó al comienzo del torneo.',
                'Garrincha fue la figura clave del equipo ganador.'
            ]
        ],
        [
            'id' => 1966, 
            'anio' => 1966, 
            'campeon' => 'inglaterra',
            'pistas' => [
                'Fue el primer Mundial en celebrarse en el país que inventó el fútbol moderno.',
                'La mascota fue un león llamado "World Cup Willie".',
                'El gol más polémico de la final fue un remate de Geoff Hurst.'
            ]
        ],
        [
            'id' => 1970, 
            'anio' => 1970, 
            'campeon' => 'brasil',
            'pistas' => [
                'Se celebró en México.',
                'Fue el primer torneo transmitido a color.',
                'El campeón se quedó con el trofeo Jules Rimet de forma permanente.'
            ]
        ],
        [
            'id' => 1974, 
            'anio' => 1974, 
            'campeon' => 'alemania',
            'pistas' => [
                'Se celebró en Alemania Occidental.',
                'La final fue contra la innovadora selección de Países Bajos (la "Naranja Mecánica").',
                'El capitán del equipo ganador fue Franz Beckenbauer.'
            ]
        ],
        [
            'id' => 1978, 
            'anio' => 1978, 
            'campeon' => 'argentina',
            'pistas' => [
                'El país anfitrión ganó su primer título mundial en casa.',
                'La final se disputó contra Países Bajos.',
                'Mario Kempes fue el máximo goleador y la figura del campeón.'
            ]
        ],
        [
            'id' => 1982, 
            'anio' => 1982, 
            'campeon' => 'italia',
            'pistas' => [
                'Se celebró en España.',
                'El campeón era el equipo más veterano, con una edad promedio de 28.5 años.',
                'Paolo Rossi fue la estrella del equipo ganador y máximo goleador.'
            ]
        ],
        [
            'id' => 1986, 
            'anio' => 1986, 
            'campeon' => 'argentina',
            'pistas' => [
                'Se celebró en México (reemplazando a Colombia).',
                'El campeón eliminó a Inglaterra con dos goles históricos: La Mano de Dios y el Gol del Siglo.',
                'Diego Armando Maradona lideró al equipo.'
            ]
        ],
        [
            'id' => 1990, 
            'anio' => 1990, 
            'campeon' => 'alemania',
            'pistas' => [
                'Se celebró en Italia.',
                'Fue considerado uno de los Mundiales con menos goles de la historia.',
                'El campeón venció a Argentina en una de las finales menos emocionantes.'
            ]
        ],
        [
            'id' => 1994, 
            'anio' => 1994, 
            'campeon' => 'brasil',
            'pistas' => [
                'Se celebró en Estados Unidos.',
                'El campeón fue el primero en la historia en ganar por penales en la final.',
                'Roberto Baggio falló el penal decisivo para Italia.'
            ]
        ],
        [
            'id' => 1998, 
            'anio' => 1998, 
            'campeon' => 'francia',
            'pistas' => [
                'El país anfitrión ganó su primer título mundial en casa.',
                'Zinedine Zidane marcó dos goles de cabeza en la final.',
                'La mascota fue un gallo llamado "Footix".'
            ]
        ],
        [
            'id' => 2002, 
            'anio' => 2002, 
            'campeon' => 'brasil',
            'pistas' => [
                'Fue el primer torneo celebrado en Asia (Corea del Sur y Japón).',
                'El campeón fue la única selección en ganar sus siete partidos.',
                'Ronaldo "Fenómeno" fue el máximo goleador con ocho tantos.'
            ]
        ],
        [
            'id' => 2006, 
            'anio' => 2006, 
            'campeon' => 'italia',
            'pistas' => [
                'Se celebró en Alemania.',
                'El campeón venció a Francia en una final recordada por la expulsión de Zinedine Zidane.',
                'Fabio Cannavaro fue el capitán del equipo ganador.'
            ]
        ],
        [
            'id' => 2010, 
            'anio' => 2010, 
            'campeon' => 'espana',
            'pistas' => [
                'Fue el primer torneo celebrado en África (Sudáfrica).',
                'El campeón se convirtió en el octavo país diferente en ganar la copa.',
                'El gol de la victoria en la final fue anotado por Andrés Iniesta.'
            ]
        ],
        [
            'id' => 2014, 
            'anio' => 2014, 
            'campeon' => 'alemania',
            'pistas' => [
                'Se celebró en Brasil.',
                'El campeón protagonizó una victoria histórica de 7-1 en semifinales contra el anfitrión.',
                'Mario Götze marcó el gol de la victoria en la final contra Argentina.'
            ]
        ],
        [
            'id' => 2018, 
            'anio' => 2018, 
            'campeon' => 'francia',
            'pistas' => [
                'Se celebró en Rusia.',
                'El campeón ganó el torneo por segunda vez en su historia.',
                'Kylian Mbappé, de 19 años, se convirtió en una de las figuras clave del equipo.'
            ]
        ],
        [
            'id' => 2022, 
            'anio' => 2022, 
            'campeon' => 'argentina',
            'pistas' => [
                'Se celebró en Qatar, siendo el primer Mundial en Oriente Medio.',
                'Fue el primer Mundial con el árbitro asistido por video (VAR) implementado de forma masiva.',
                'La final, considerada una de las mejores de la historia, se decidió por penales.'
            ]
        ],
    ];

    /**
     * Muestra la vista inicial del juego seleccionando un Mundial al azar.
     */
   // app/Http/Controllers/AdivinaCampeonController.php

// ...

    /**
     * Muestra la vista inicial del juego seleccionando un Mundial al azar.
     */
    public function index(Request $request)
    {
        // 0. (NUEVA LÍNEA DE SEGURIDAD) Limpia la sesión actual si ya existe.
        // Esto asegura que cada carga de página (GET) es un nuevo juego.
        $request->session()->forget('mundial_activo'); 
        
        // 1. Si no hay un Mundial en la sesión (que ahora siempre será TRUE)
        // Selecciona uno al azar.
        $indiceAleatorio = array_rand($this->datosMundiales);
        $mundialActivo = $this->datosMundiales[$indiceAleatorio];
        
        // Guarda el Mundial completo en la sesión para las peticiones POST posteriores
        $request->session()->put('mundial_activo', $mundialActivo);
        
        // 2. Prepara los datos para la vista (Línea 250 en tu captura)
        $mundialObjetivo = [
            'id' => $mundialActivo['id'],
            'anio' => $mundialActivo['anio'], // <--- ESTA LÍNEA DEJA DE SER PROBLEMÁTICA
            // Solo envía la primera pista inicialmente
            'pistaInicial' => $mundialActivo['pistas'][0], 
            'totalPistas' => count($mundialActivo['pistas'])
        ];
        
        // Retorna la vista: resources/views/juegos/adivinacampeon.blade.php
        return view('juegos.adivinacampeon', compact('mundialObjetivo'));
    }

// ... (El resto del controlador, incluido el método submit, se mantiene igual)

    /**
     * Procesa la respuesta y devuelve el resultado o la siguiente pista.
     */
    public function submit(Request $request)
    {
        // 1. Validar y obtener el Mundial objetivo de la sesión
        $request->validate([
            'campeon' => 'required|string|max:50',
            'intento' => 'required|integer|min:1',
        ]);
        
        $mundial = $request->session()->get('mundial_activo');

        if (!$mundial) {
            return response()->json(['error' => 'Sesión expirada o juego no iniciado. Por favor, reinicia el juego.'], 400);
        }

        // 2. Obtener datos y realizar comparación
        $respuestaUsuario = strtolower(trim($request->input('campeon')));
        $intentoActual = $request->input('intento');
        $campeonCorrecto = $mundial['campeon'];
        
        $esCorrecto = ($respuestaUsuario === $campeonCorrecto);
        $totalPistas = count($mundial['pistas']);
        
        $resultado = [
            'esCorrecto' => $esCorrecto,
            'proximaPista' => null,
            'ultimoIntento' => false
        ];

        // 3. Lógica de resultado
        if ($esCorrecto) {
            // Respuesta Correcta: Limpiar sesión al finalizar el juego
            $request->session()->forget('mundial_activo');
            $resultado['respuestaCorrecta'] = ucfirst($mundial['campeon']);
        } else {
            // Respuesta Incorrecta: Progresión de pistas
            if ($intentoActual < $totalPistas) {
                // Hay más pistas disponibles. El intento 1 necesita la pista [1], el intento 2 la [2], etc.
                $resultado['proximaPista'] = $mundial['pistas'][$intentoActual]; 
            } else {
                // No quedan más pistas (último intento fallido)
                $request->session()->forget('mundial_activo');
                $resultado['ultimoIntento'] = true;
                $resultado['respuestaCorrecta'] = ucfirst($mundial['campeon']);
            }
        }

        return response()->json($resultado);
    }
}