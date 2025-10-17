<?php

namespace Database\Seeders;

use App\Models\Mundial;
use Illuminate\Database\Seeder;

class MundialSeeder extends Seeder
{
    public function run(): void
    {
        // IDs ASUMIDOS: URU=1, ARG=2, ITA=3, GER=4, BRA=5, ENG=6, FRA=8, ESP=9, NED=10
        // (Asegúrate de que estos IDs coincidan con tu EquipoSeeder)

        // 1930
        Mundial::create(['anio' => 1930, 'pais_sede' => 'Uruguay', 'campeon_id' => 1, 'subcampeon_id' => 2, 'goles_totales' => 70, 
            'logo_url' => '/img/1930.jpg' ]);
        // 1934
        Mundial::create(['anio' => 1934, 'pais_sede' => 'Italia', 'campeon_id' => 3, 'subcampeon_id' => 4, 'goles_totales' => 70, 
            'logo_url' => '/img/1934.jpg' ]);
        // 1938
        Mundial::create(['anio' => 1938, 'pais_sede' => 'Francia', 'campeon_id' => 3, 'subcampeon_id' => 4, 'goles_totales' => 84, 
            'logo_url' => '/img/1938.jpg' ]);
        // 1950
        Mundial::create(['anio' => 1950, 'pais_sede' => 'Brasil', 'campeon_id' => 1, 'subcampeon_id' => 2, 'goles_totales' => 88, 
            'logo_url' => '/img/1950.jpg' ]);
        // 1954
        Mundial::create(['anio' => 1954, 'pais_sede' => 'Suiza', 'campeon_id' => 4, 'subcampeon_id' => 5, 'goles_totales' => 140, 
            'logo_url' => '/img/1954.jpg' ]);
        // 1958
        Mundial::create(['anio' => 1958, 'pais_sede' => 'Suecia', 'campeon_id' => 5, 'subcampeon_id' => 4, 'goles_totales' => 126, 
            'logo_url' => '/img/1958.jpg' ]);
        // 1962
        Mundial::create(['anio' => 1962, 'pais_sede' => 'Chile', 'campeon_id' => 5, 'subcampeon_id' => 4, 'goles_totales' => 89, 
            'logo_url' => '/img/1962.jpg' ]);
        // 1966
        Mundial::create(['anio' => 1966, 'pais_sede' => 'Inglaterra', 'campeon_id' => 6, 'subcampeon_id' => 4, 'goles_totales' => 89, 
            'logo_url' => '/img/1966.jpg' ]);
        // 1970
        Mundial::create(['anio' => 1970, 'pais_sede' => 'México', 'campeon_id' => 5, 'subcampeon_id' => 3, 'goles_totales' => 95, 
            'logo_url' => '/img/1970.jpg' ]);
        // 1974
        Mundial::create(['anio' => 1974, 'pais_sede' => 'Alemania', 'campeon_id' => 4, 'subcampeon_id' => 10, 'goles_totales' => 97, 
            'logo_url' => '/img/1974.jpg' ]);
        // 1978
        Mundial::create(['anio' => 1978, 'pais_sede' => 'Argentina', 'campeon_id' => 2, 'subcampeon_id' => 10, 'goles_totales' => 102, 
            'logo_url' => '/img/1978.jpg' ]);
        // 1982
        Mundial::create(['anio' => 1982, 'pais_sede' => 'España', 'campeon_id' => 3, 'subcampeon_id' => 4, 'goles_totales' => 146, 
            'logo_url' => '/img/1982.jpg' ]);
        // 1986
        Mundial::create(['anio' => 1986, 'pais_sede' => 'México', 'campeon_id' => 2, 'subcampeon_id' => 4, 'goles_totales' => 132, 
            'logo_url' => '/img/1986.jpg' ]);
        // 1990
        Mundial::create(['anio' => 1990, 'pais_sede' => 'Italia', 'campeon_id' => 4, 'subcampeon_id' => 2, 'goles_totales' => 115, 
            'logo_url' => '/img/1990.jpg' ]);
        // 1994
        Mundial::create(['anio' => 1994, 'pais_sede' => 'USA', 'campeon_id' => 5, 'subcampeon_id' => 3, 'goles_totales' => 141, 
            'logo_url' => '/img/1994.jpg' ]);
        // 1998
        Mundial::create(['anio' => 1998, 'pais_sede' => 'Francia', 'campeon_id' => 8, 'subcampeon_id' => 5, 'goles_totales' => 171, 
            'logo_url' => '/img/1998.jpg' ]);
        // 2002
        Mundial::create(['anio' => 2002, 'pais_sede' => 'Japón/Corea', 'campeon_id' => 5, 'subcampeon_id' => 4, 'goles_totales' => 161, 
            'logo_url' => '/img/2002.jpg' ]);
        // 2006
        Mundial::create(['anio' => 2006, 'pais_sede' => 'Alemania', 'campeon_id' => 3, 'subcampeon_id' => 8, 'goles_totales' => 147, 
            'logo_url' => '/img/2006.jpg' ]);
        // 2010
        Mundial::create(['anio' => 2010, 'pais_sede' => 'Sudáfrica', 'campeon_id' => 9, 'subcampeon_id' => 10, 'goles_totales' => 145, 
            'logo_url' => '/img/2010.jpg' ]);
        // 2014
        Mundial::create(['anio' => 2014, 'pais_sede' => 'Brasil', 'campeon_id' => 4, 'subcampeon_id' => 2, 'goles_totales' => 171, 
            'logo_url' => '/img/2014.jpg' ]);
        // 2018
        Mundial::create(['anio' => 2018, 'pais_sede' => 'Rusia', 'campeon_id' => 8, 'subcampeon_id' => 4, 'goles_totales' => 169, 
            'logo_url' => '/img/2018.jpg' ]);
        // 2022
        Mundial::create(['anio' => 2022, 'pais_sede' => 'Qatar', 'campeon_id' => 2, 'subcampeon_id' => 8, 'goles_totales' => 172, 
            'logo_url' => '/img/2022.jpg' ]);
    }
}