<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = "bitacoras";
    protected $fillable = ["fecha", "hora", "accion", "ip", "codigoUsuario"];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigoUsuario');
    }

}
