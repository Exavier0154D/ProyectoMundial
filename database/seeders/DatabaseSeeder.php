<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Deshabilitamos la creación de usuarios de prueba para evitar errores
        // User::factory(10)->create();
        // User::factory()->create(['name' => 'Test User','email' => 'test@example.com']);
        
        // ¡AGREGAMOS TUS SEEDERS PERSONALIZADOS!
        $this->call([
            EquipoSeeder::class,
            MundialSeeder::class,
            // Aquí puedes agregar PartidoSeeder::class más adelante
        ]);
    }
}