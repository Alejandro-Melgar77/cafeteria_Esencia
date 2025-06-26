<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DetalleDeVenta extends Pivot
{
    protected $table = 'detalles_de_venta';
    protected $fillable = [
        'nota_de_venta_id',
        'inventario_id',
        'cantidad'
    ];

    public function notaDeVenta()
    {
        return $this->belongsTo(NotaDeVenta::class);
    }

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }
}