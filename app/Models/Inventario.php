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
}
