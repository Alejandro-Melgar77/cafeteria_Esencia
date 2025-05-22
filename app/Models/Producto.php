<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    
    protected $primaryKey = 'id';
    protected $table = "productos";
    protected $fillable = ['id', 'Precio_venta','Costo_produccion','Porcentaje_utilidad'];

    public function inventarios(): BelongsTo {
        return $this->belongsTo(Inventario::class,'id');
    }
}