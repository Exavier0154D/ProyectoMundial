<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mundial extends Model
{
    use HasFactory;

    // 👇 Esta línea soluciona el error
    protected $table = 'mundiales';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'anio', 
        'pais_sede', 
        'campeon_id', 
        'subcampeon_id', 
        'goles_totales', 
        'logo_url'
    ];

    public function campeon()
    {
        return $this->belongsTo(Equipo::class, 'campeon_id');
    }

    public function subcampeon()
    {
        return $this->belongsTo(Equipo::class, 'subcampeon_id');
    }

    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }
}
