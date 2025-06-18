<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'duracion',
        'hora',
    ];

    public function mesas()
    {
        return $this->belongsToMany(Mesa::class, 'reservas_mesas')
                    ->using(ReservaMesa::class) // Usar el modelo pivote
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}