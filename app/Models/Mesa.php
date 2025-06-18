<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesas';
    protected $fillable = [
        'Nro',
        'Capacidad', 
        'created_at',
        'updated_at'
    ];
    public function reservas()
    {
        return $this->belongsToMany(Reserva::class, 'reservas_mesas')
                    ->using(ReservaMesa::class) // Usar el modelo pivote
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}