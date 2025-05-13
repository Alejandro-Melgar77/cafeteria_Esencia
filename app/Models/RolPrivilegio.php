<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolPrivilegio extends Model
{
    //
    protected $table = "rol_privilegio";
    protected $fillable = ["RolID", "PrivilegioID"];
    public $timestamps = false;
}
