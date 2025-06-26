<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comprobante extends Model
{
    use HasFactory;

    protected $table = 'comprobantes';

    protected $fillable = [
        'nota_de_venta_id'
    ];

    public function notaDeVenta(): BelongsTo
    {
        return $this->belongsTo(NotaDeVenta::class);
    }
}