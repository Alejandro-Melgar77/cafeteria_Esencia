<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuario";
    protected $fillable = ["Nombre", "Email", 'Telefono', 'RolID', "id_user", "codigo"];

    public $timestamps = false;
}
