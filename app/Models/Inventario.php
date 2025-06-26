<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inventario extends Model
{
    //
    protected $table = "inventarios";
    protected $fillable = ['nombre','fecha_vco','costo','stock'];

    public function productos() : HasOne {
        return $this->hasOne(Producto::class,'id');
    }

    public function ingredientes() : HasOne {
        return $this->hasOne(Ingrediente::class,'id');
    }
    public function notasDeVenta(): BelongsToMany
    {
        return $this->belongsToMany(NotaDeVenta::class, 'detalles_de_venta')
                    ->using(DetalleDeVenta::class)
                    ->withPivot('cantidad', 'created_at', 'updated_at');
    }
}



