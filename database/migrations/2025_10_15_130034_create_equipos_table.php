<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id'); // <-- ¡CORREGIDO! Asegura BigInt sin el método abreviado
            $table->string('nombre')->unique();
            $table->string('codigo_fifa', 3)->unique();
            $table->string('bandera_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};