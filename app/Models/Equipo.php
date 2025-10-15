<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'codigo_fifa', 
        'bandera_url'
    ];

    /**
     * Relación: Mundiales ganados (donde es campeón).
     */
    public function mundialesGanados()
    {
        return $this->hasMany(Mundial::class, 'campeon_id');
    }

    /**
     * Relación: Mundiales donde fue subcampeón.
     */
    public function mundialesSubcampeon()
    {
        return $this->hasMany(Mundial::class, 'subcampeon_id');
    }
    
    /**
     * Relación: Partidos jugados como local.
     */
    public function partidosLocal()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    /**
     * Relación: Partidos jugados como visitante.
     */
    public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}