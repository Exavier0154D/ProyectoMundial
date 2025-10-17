<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Uruguay
        Equipo::create(['nombre' => 'Uruguay', 'codigo_fifa' => 'URU']); 
        // 2. Argentina
        Equipo::create(['nombre' => 'Argentina', 'codigo_fifa' => 'ARG']); 
        // 3. Italia
        Equipo::create(['nombre' => 'Italia', 'codigo_fifa' => 'ITA']);
        // 4. Alemania
        Equipo::create(['nombre' => 'Alemania', 'codigo_fifa' => 'GER']);
        // 5. Brasil
        Equipo::create(['nombre' => 'Brasil', 'codigo_fifa' => 'BRA']);
        // 6. Inglaterra
        Equipo::create(['nombre' => 'Inglaterra', 'codigo_fifa' => 'ENG']);
        // 7. México
        Equipo::create(['nombre' => 'México', 'codigo_fifa' => 'MEX']);
        // 8. Francia
        Equipo::create(['nombre' => 'Francia', 'codigo_fifa' => 'FRA']);
        // 9. España
        Equipo::create(['nombre' => 'España', 'codigo_fifa' => 'ESP']);
        // 10. Países Bajos
        Equipo::create(['nombre' => 'Países Bajos', 'codigo_fifa' => 'NED']);
    }
}