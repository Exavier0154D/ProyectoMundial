<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    
    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'mundial_id', 
        'equipo_local_id', 
        'equipo_visitante_id', 
        'fase', 
        'goles_local', 
        'goles_visitante'
    ];
    
    /**
     * Relación: Obtiene el Mundial al que pertenece este partido.
     */
    public function mundial()
    {
        // Un Partido pertenece a un Mundial
        return $this->belongsTo(Mundial::class, 'mundial_id');
    }
    
    /**
     * Relación: Obtiene el equipo que jugó como Local.
     */
    public function equipoLocal()
    {
        // Un Partido pertenece a un Equipo (el local)
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }
    
    /**
     * Relación: Obtiene el equipo que jugó como Visitante.
     */
    public function equipoVisitante()
    {
        // Un Partido pertenece a un Equipo (el visitante)
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }
}