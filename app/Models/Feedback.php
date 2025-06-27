<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
        'descripcion',
        'calificacion',
        'nota_de_venta_id'
    ];

    // Relación con NotaDeVenta
    public function notaDeVenta(): BelongsTo
    {
        return $this->belongsTo(NotaDeVenta::class);
    }
}