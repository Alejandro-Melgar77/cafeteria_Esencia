<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingrediente extends Model
{
    
    protected $primaryKey = 'id';
     protected $table = "ingredientes";
    protected $fillable = ['id', 'Unidad_Medida','Costo_Unitario','Costo_Promedio'];
    
    public function inventarios(): BelongsTo {
        return $this->belongsTo(Inventario::class,'id');
    }
}
