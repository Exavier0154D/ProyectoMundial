<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;
use App\Models\Mundial;
use App\Models\Partido;

class MisMundialesSeeder extends Seeder
{
    public function run(): void
    {
        // Equipos mínimos para 1970–1994 (finalistas)
        $equipos = [
            ['nombre'=>'Brasil',          'codigo_fifa'=>'BRA'],
            ['nombre'=>'Italia',          'codigo_fifa'=>'ITA'],
            ['nombre'=>'Países Bajos',    'codigo_fifa'=>'NED'],
            ['nombre'=>'RFA',             'codigo_fifa'=>'FRG'], // Alemania Federal
            ['nombre'=>'Argentina',       'codigo_fifa'=>'ARG'],
        ];

        $map = [];
        foreach ($equipos as $e) {
            $team = Equipo::firstOrCreate(
                ['nombre' => $e['nombre']],
                ['codigo_fifa' => $e['codigo_fifa'], 'bandera_url' => null]
            );
            $map[$e['nombre']] = $team->id;
        }

        // Mundiales + finalistas (datos concisos)
        $mundiales = [
            // anio, sede, campeon, subcampeon, goles_totales, final(local,visitante,golesL,golesV)
            [1970,'México','Brasil','Italia',95,   ['Brasil','Italia',4,1]],
            [1974,'RFA','RFA','Países Bajos',97,   ['RFA','Países Bajos',2,1]],
            [1978,'Argentina','Argentina','Países Bajos',102, ['Argentina','Países Bajos',3,1]], // (aet, simplificado)
            [1982,'España','Italia','RFA',146,     ['Italia','RFA',3,1]],
            [1986,'México','Argentina','RFA',132,  ['Argentina','RFA',3,2]],
            [1990,'Italia','RFA','Argentina',115,  ['RFA','Argentina',1,0]],
            [1994,'Estados Unidos','Brasil','Italia',141, ['Brasil','Italia',0,0]], // penales no modelados
        ];

        foreach ($mundiales as [$anio,$sede,$camp,$sub,$golesTot,$final]) {
            $m = Mundial::firstOrCreate(
                ['anio'=>$anio],
                [
                    'pais_sede'      => $sede,
                    'campeon_id'     => $map[$camp],
                    'subcampeon_id'  => $map[$sub],
                    'goles_totales'  => $golesTot,
                    'logo_url'       => null,
                ]
            );

            // Partido de la final (suficiente para poblar tus secciones)
            [$loc,$vis,$gl,$gv] = $final;
            Partido::firstOrCreate(
                [
                    'mundial_id'        => $m->id,
                    'equipo_local_id'   => $map[$loc],
                    'equipo_visitante_id'=> $map[$vis],
                    'fase'              => 'Final',
                    'goles_local'       => $gl,
                    'goles_visitante'   => $gv,
                ],
                [] // sin campos extra
            );
        }
    }
}
