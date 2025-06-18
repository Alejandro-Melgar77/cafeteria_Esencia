<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ReservaMesa extends Pivot
{
    protected $table = 'reservas_mesas';

    protected $fillable = [
        'reserva_id',
        'mesa_id',
        'cantidad',
    ];

    // Relación con Reserva
    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    // Relación con Mesa
    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}