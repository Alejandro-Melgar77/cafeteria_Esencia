<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = "bitacoras";
    protected $fillable = ["fecha", "hora", "accion","codigoUsuario"];

    public $timestamps = false;

}
 