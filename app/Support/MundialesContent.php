<?php

namespace App\Support;

class MundialesContent
{
    public static function porAnio(int $anio): array
    {
        $data = [

            // ───────────────────────── 1974 ─────────────────────────
            1974 => [
                'sede_titulo' => '📜 La sede: ¿Por qué Alemania Federal (RFA)?',
                'sede_texto'  => 'La RFA fue elegida en 1966. Contaba con infraestructura moderna y estabilidad organizativa. Fue el primer Mundial con el nuevo trofeo FIFA y el debut del balón Telstar Durlast.',
                'goleadores'  => [
                    ['jugador'=>'Grzegorz Lato','pais'=>'Polonia','goles'=>7],
                    ['jugador'=>'Johan Neeskens','pais'=>'Países Bajos','goles'=>5],
                    ['jugador'=>'Andrzej Szarmach','pais'=>'Polonia','goles'=>5],
                    ['jugador'=>'Gerd Müller','pais'=>'RFA','goles'=>4],
                ],
                'asistidores' => [
                    ['jugador'=>'Johan Cruyff','pais'=>'Países Bajos','asis'=>'no oficial'],
                    ['jugador'=>'Uli Hoeneß','pais'=>'RFA','asis'=>'no oficial'],
                ],
                'alineacion_campeon' => [
                    'entrenador' => 'Helmut Schön',
                    'portero'    => 'Sepp Maier',
                    'defensa'    => ['Berti Vogts','Franz Beckenbauer (C)','Paul Breitner','Hans-Georg Schwarzenbeck'],
                    'medio'      => ['Rainer Bonhof','Uli Hoeneß','Wolfgang Overath'],
                    'delantera'  => ['Jürgen Grabowski','Gerd Müller','Bernd Hölzenbein'],
                ],
            ],

            // ───────────────────────── 1978 ─────────────────────────
            1978 => [
                'sede_titulo' => '📜 La sede: ¿Por qué Argentina?',
                'sede_texto'  => 'Elegida en 1966, Argentina organizó el torneo con ocho sedes. Se modificó el formato con dos fases de grupos antes de la final.',
                'goleadores'  => [
                    ['jugador'=>'Mario Kempes','pais'=>'Argentina','goles'=>6],
                    ['jugador'=>'Rob Rensenbrink','pais'=>'Países Bajos','goles'=>5],
                    ['jugador'=>'Teófilo Cubillas','pais'=>'Perú','goles'=>5],
                ],
                'asistidores' => [
                    ['jugador'=>'Osvaldo Ardiles','pais'=>'Argentina','asis'=>'no oficial'],
                    ['jugador'=>'René van de Kerkhof','pais'=>'Países Bajos','asis'=>'no oficial'],
                ],
                'alineacion_campeon' => [
                    'entrenador' => 'César Luis Menotti',
                    'portero'    => 'Ubaldo Fillol',
                    'defensa'    => ['Jorge Olguín','Daniel Passarella (C)','Luis Galván','Alberto Tarantini'],
                    'medio'      => ['Osvaldo Ardiles','Américo Gallego','Osvaldo Ardiles/Ardiles–Killer (rotaciones)'],
                    'delantera'  => ['Leopoldo Luque','Mario Kempes','Ricardo Villa / Ortiz'],
                ],
            ],

            // ───────────────────────── 1982 ─────────────────────────
            1982 => [
                'sede_titulo' => '📜 La sede: ¿Por qué España?',
                'sede_texto'  => 'España fue elegida en 1966. Fue el primer Mundial con 24 selecciones y segunda fase de grupos.',
                'goleadores'  => [
                    ['jugador'=>'Paolo Rossi','pais'=>'Italia','goles'=>6],
                    ['jugador'=>'Karl-Heinz Rummenigge','pais'=>'RFA','goles'=>5],
                    ['jugador'=>'Zico','pais'=>'Brasil','goles'=>4],
                ],
                'asistidores' => [
                    ['jugador'=>'Bruno Conti','pais'=>'Italia','asis'=>'no oficial'],
                    ['jugador'=>'Falcão','pais'=>'Brasil','asis'=>'no oficial'],
                ],
                'alineacion_campeon' => [
                    'entrenador' => 'Enzo Bearzot',
                    'portero'    => 'Dino Zoff (C)',
                    'defensa'    => ['Claudio Gentile','Gaetano Scirea','Fulvio Collovati','Antonio Cabrini'],
                    'medio'      => ['Marco Tardelli','Gabriele Oriali','Bruno Conti'],
                    'delantera'  => ['Francesco Graziani / Alessandro Altobelli','Paolo Rossi'],
                ],
            ],

            // ───────────────────────── 1986 ─────────────────────────
            1986 => [
                'sede_titulo' => '📜 La sede: ¿Por qué México (otra vez)?',
                'sede_texto'  => 'Colombia renunció por motivos económicos y México tomó la sede. Maradona firmó actuaciones históricas ante Inglaterra y Bélgica.',
                'goleadores'  => [
                    ['jugador'=>'Gary Lineker','pais'=>'Inglaterra','goles'=>6],
                    ['jugador'=>'Diego Maradona','pais'=>'Argentina','goles'=>5],
                    ['jugador'=>'Careca','pais'=>'Brasil','goles'=>5],
                ],
                'asistidores' => [
                    ['jugador'=>'Diego Maradona','pais'=>'Argentina','asis'=>'no oficial'],
                    ['jugador'=>'Jorge Valdano','pais'=>'Argentina','asis'=>'no oficial'],
                ],
                'alineacion_campeon' => [
                    'entrenador' => 'Carlos Bilardo',
                    'portero'    => 'Nery Pumpido',
                    'defensa'    => ['José Luis Brown','José Luis Cuciuffo','Óscar Ruggeri'],
                    'medio'      => ['Sergio Batista','Jorge Burruchaga','Héctor Enrique','Ricardo Giusti'],
                    'delantera'  => ['Diego Maradona (C)','Jorge Valdano'],
                ],
            ],

            // ───────────────────────── 1990 ─────────────────────────
            1990 => [
                'sede_titulo' => '📜 La sede: ¿Por qué Italia?',
                'sede_texto'  => 'Italia fue elegida en 1984. Mundial recordado por su carácter táctico y pocos goles, pero con altísima tensión competitiva.',
                'goleadores'  => [
                    ['jugador'=>'Salvatore Schillaci','pais'=>'Italia','goles'=>6],
                    ['jugador'=>'Tomas Skuhravy','pais'=>'Checoslovaquia','goles'=>5],
                    ['jugador'=>'Gary Lineker','pais'=>'Inglaterra','goles'=>4],
                ],
                'asistidores' => [
                    ['jugador'=>'Roberto Baggio','pais'=>'Italia','asis'=>'no oficial'],
                    ['jugador'=>'Lothar Matthäus','pais'=>'Alemania Federal','asis'=>'no oficial'],
                ],
                'alineacion_campeon' => [
                    'entrenador' => 'Franz Beckenbauer',
                    'portero'    => 'Bodo Illgner',
                    'defensa'    => ['Andreas Brehme','Jürgen Kohler','Guido Buchwald','Thomas Berthold'],
                    'medio'      => ['Lothar Matthäus (C)','Pierre Littbarski','Thomas Häßler'],
                    'delantera'  => ['Jürgen Klinsmann','Rudi Völler'],
                ],
            ],

            // ───────────────────────── 1994 ─────────────────────────
            1994 => [
                'sede_titulo' => '📜 La sede: ¿Por qué Estados Unidos?',
                'sede_texto'  => 'La FIFA apostó por expandir el fútbol en el mercado estadounidense. Asistencias récord y debut del formato con 3 puntos por victoria (en clasificatorias posteriores).',
                'goleadores'  => [
                    ['jugador'=>'Hristo Stoichkov','pais'=>'Bulgaria','goles'=>6],
                    ['jugador'=>'Oleg Salenko','pais'=>'Rusia','goles'=>6],
                    ['jugador'=>'Romário','pais'=>'Brasil','goles'=>5],
                ],
                'asistidores' => [
                    ['jugador'=>'Romário','pais'=>'Brasil','asis'=>'no oficial'],
                    ['jugador'=>'Gheorghe Hagi','pais'=>'Rumania','asis'=>'no oficial'],
                ],
                'alineacion_campeon' => [
                    'entrenador' => 'Carlos Alberto Parreira',
                    'portero'    => 'Cláudio Taffarel',
                    'defensa'    => ['Jorginho','Aldair','Marcio Santos','Branco'],
                    'medio'      => ['Mauro Silva','Dunga (C)'],
                    'delantera'  => ['Bebeto','Romário','Mazinho / Zinho (según partido)'],
                ],
            ],
        ];

        return $data[$anio] ?? [];
    }
}
