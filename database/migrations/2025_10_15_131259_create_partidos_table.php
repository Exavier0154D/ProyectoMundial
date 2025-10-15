<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->bigIncrements('id'); // Usamos BigInt aquí para coincidir
            
            // Clave Foránea al Mundial
            $table->unsignedBigInteger('mundial_id');
            $table->foreign('mundial_id')->references('id')->on('mundiales')->onDelete('cascade');
            
            // Claves Foráneas a los equipos
            $table->unsignedBigInteger('equipo_local_id');
            $table->foreign('equipo_local_id')->references('id')->on('equipos')->onDelete('cascade');

            $table->unsignedBigInteger('equipo_visitante_id');
            $table->foreign('equipo_visitante_id')->references('id')->on('equipos')->onDelete('cascade');

            $table->string('fase'); 
            $table->integer('goles_local');
            $table->integer('goles_visitante');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};