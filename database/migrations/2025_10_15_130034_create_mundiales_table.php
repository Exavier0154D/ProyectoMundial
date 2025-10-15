<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mundiales', function (Blueprint $table) {
            $table->bigIncrements('id'); // <-- ¡CORREGIDO! Asegura BigInt para la referencia
            $table->integer('anio')->unique();
            $table->string('pais_sede');
            
            // Las claves foráneas aquí están bien con 'foreignId'
            $table->foreignId('campeon_id')->constrained('equipos');
            $table->foreignId('subcampeon_id')->constrained('equipos');

            $table->integer('goles_totales')->nullable();
            $table->string('logo_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mundiales');
    }
};