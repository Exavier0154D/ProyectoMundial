<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdivinaCampeonController extends Controller
{
    // Simulación de “BD” de mundiales
    private $datosMundiales = [
        ['id'=>1930,'anio'=>1930,'campeon'=>'uruguay','pistas'=>[
            'Fue el primer Mundial de la historia y tuvo lugar en Sudamérica.',
            'Solo cuatro selecciones europeas viajaron para competir.',
            'El partido final se jugó en el Estadio Centenario.',
        ]],
        ['id'=>1934,'anio'=>1934,'campeon'=>'italia','pistas'=>[
            'El anfitrión fue el primer país europeo en albergar el torneo.',
            'Fue el único Mundial donde el campeón de la edición anterior no participó (Uruguay).',
            'El campeón fue dirigido por Vittorio Pozzo.',
        ]],
        ['id'=>1938,'anio'=>1938,'campeon'=>'italia','pistas'=>[
            'El anfitrión fue Francia, lo que provocó un boicot de los países sudamericanos.',
            'El campeón retuvo su título, siendo el primer equipo en lograrlo.',
            'La final se disputó contra Hungría.',
        ]],
        ['id'=>1950,'anio'=>1950,'campeon'=>'uruguay','pistas'=>[
            'El torneo regresó tras la Segunda Guerra Mundial y se celebró en Brasil.',
            'La fase final se decidió mediante un grupo, no una final directa.',
            'El partido decisivo es conocido como el "Maracanazo".',
        ]],
        ['id'=>1954,'anio'=>1954,'campeon'=>'alemania','pistas'=>[
            'Se celebró en Suiza.',
            'El campeón derrotó a Hungría en la final, "El Milagro de Berna".',
            'El equipo ganador estaba dirigido por Sepp Herberger.',
        ]],
        ['id'=>1958,'anio'=>1958,'campeon'=>'brasil','pistas'=>[
            'Se celebró en Suecia.',
            'Pelé (17 años) marcó seis goles; dos en la final.',
            'El campeón usó camiseta de emergencia azul en la final.',
        ]],
        ['id'=>1962,'anio'=>1962,'campeon'=>'brasil','pistas'=>[
            'Se celebró en Chile.',
            'El campeón retuvo su título; Pelé se lesionó al inicio.',
            'Garrincha fue la figura clave.',
        ]],
        ['id'=>1966,'anio'=>1966,'campeon'=>'inglaterra','pistas'=>[
            'Primer Mundial en el país que inventó el fútbol moderno.',
            'La mascota fue un león llamado "World Cup Willie".',
            'Gol polémico de Geoff Hurst en la final.',
        ]],
        ['id'=>1970,'anio'=>1970,'campeon'=>'brasil','pistas'=>[
            'Se celebró en México.',
            'Primer torneo transmitido a color.',
            'El campeón se quedó con el trofeo Jules Rimet.',
        ]],
        ['id'=>1974,'anio'=>1974,'campeon'=>'alemania','pistas'=>[
            'Se celebró en Alemania Occidental.',
            'Final contra la "Naranja Mecánica" (Países Bajos).',
            'Capitán: Franz Beckenbauer.',
        ]],
        ['id'=>1978,'anio'=>1978,'campeon'=>'argentina','pistas'=>[
            'Anfitrión campeón por primera vez.',
            'Final contra Países Bajos.',
            'Mario Kempes fue máximo goleador.',
        ]],
        ['id'=>1982,'anio'=>1982,'campeon'=>'italia','pistas'=>[
            'Se celebró en España.',
            'Campeón más veterano (promedio ~28.5 años).',
            'Paolo Rossi fue la gran figura.',
        ]],
        ['id'=>1986,'anio'=>1986,'campeon'=>'argentina','pistas'=>[
            'Se celebró en México (reemplazó a Colombia).',
            'Inglaterra cayó con la Mano de Dios y el Gol del Siglo.',
            'Maradona lideró al campeón.',
        ]],
        ['id'=>1990,'anio'=>1990,'campeon'=>'alemania','pistas'=>[
            'Se celebró en Italia.',
            'Uno de los Mundiales con menos goles.',
            'Alemania venció a Argentina en una final cerrada.',
        ]],
        ['id'=>1994,'anio'=>1994,'campeon'=>'brasil','pistas'=>[
            'Se celebró en Estados Unidos.',
            'Primera final decidida por penales.',
            'Baggio falló el penal decisivo.',
        ]],
        ['id'=>1998,'anio'=>1998,'campeon'=>'francia','pistas'=>[
            'Anfitrión campeón por primera vez.',
            'Zidane marcó dos de cabeza en la final.',
            'Mascota: Footix (gallo).',
        ]],
        ['id'=>2002,'anio'=>2002,'campeon'=>'brasil','pistas'=>[
            'Primero en Asia (Corea/Japón).',
            'Único campeón ganando sus 7 partidos.',
            'Ronaldo fue Pichichi con 8.',
        ]],
        ['id'=>2006,'anio'=>2006,'campeon'=>'italia','pistas'=>[
            'Se celebró en Alemania.',
            'Final recordada por la expulsión de Zidane.',
            'Capitán: Fabio Cannavaro.',
        ]],
        ['id'=>2010,'anio'=>2010,'campeon'=>'espana','pistas'=>[
            'Primer Mundial en África (Sudáfrica).',
            'Octavo país distinto en ser campeón.',
            'Iniesta marcó el gol del título.',
        ]],
        ['id'=>2014,'anio'=>2014,'campeon'=>'alemania','pistas'=>[
            'Se celebró en Brasil.',
            'Histórico 7–1 a Brasil en semis.',
            'Götze decidió la final.',
        ]],
        ['id'=>2018,'anio'=>2018,'campeon'=>'francia','pistas'=>[
            'Se celebró en Rusia.',
            'Segundo título para Francia.',
            'Mbappé (19) fue una de las figuras.',
        ]],
        ['id'=>2022,'anio'=>2022,'campeon'=>'argentina','pistas'=>[
            'Primer Mundial en Oriente Medio (Qatar).',
            'VAR plenamente implementado.',
            'Final épica, decidida por penales.',
        ]],
    ];

    /** Normaliza acentos/espacios y pasa a minúsculas */
    private function norm(string $s): string
    {
        $s = mb_strtolower(trim($s), 'UTF-8');
        $map = [
            'á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u','ü'=>'u','ñ'=>'n',
            'à'=>'a','è'=>'e','ì'=>'i','ò'=>'o','ù'=>'u',
        ];
        $s = strtr($s, $map);
        // compactar espacios
        $s = preg_replace('/\s+/', ' ', $s);
        return $s;
    }

    /** GET: arranca o reinicia juego */
    public function index(Request $request)
    {
        // Cada GET comienza juego nuevo
        $request->session()->forget('mundial_activo');

        $indice = array_rand($this->datosMundiales);
        $mundial = $this->datosMundiales[$indice];

        $request->session()->put('mundial_activo', $mundial);

        $mundialObjetivo = [
            'id'          => $mundial['id'],
            'anio'        => $mundial['anio'],
            'pistaInicial'=> $mundial['pistas'][0],
            'totalPistas' => count($mundial['pistas']),
        ];

        return view('juegos.adivinacampeon', compact('mundialObjetivo'));
    }

    /** POST: evalúa intento */
    public function submit(Request $request)
    {
        $request->validate([
            'campeon' => 'required|string|max:50',
            'intento' => 'required|integer|min:1',
        ]);

        $mundial = $request->session()->get('mundial_activo');
        if (!$mundial) {
            return response()->json(['error'=>'Sesión expirada o juego no iniciado.'], 400);
        }

        $respuesta = $this->norm($request->input('campeon'));
        $intento   = (int) $request->input('intento');
        $correcto  = $this->norm($mundial['campeon']);

        $resultado = [
            'esCorrecto'    => false,
            'proximaPista'  => null,
            'ultimoIntento' => false,
        ];

        if ($respuesta === $correcto) {
            $request->session()->forget('mundial_activo');
            $resultado['esCorrecto'] = true;
            $resultado['respuestaCorrecta'] = ucfirst($mundial['campeon']);
            return response()->json($resultado);
        }

        $total = count($mundial['pistas']);
        if ($intento < $total) {
            // La siguiente pista es el índice == intento actual
            $resultado['proximaPista'] = $mundial['pistas'][$intento];
        } else {
            $request->session()->forget('mundial_activo');
            $resultado['ultimoIntento'] = true;
            $resultado['respuestaCorrecta'] = ucfirst($mundial['campeon']);
        }

        return response()->json($resultado);
    }
}
