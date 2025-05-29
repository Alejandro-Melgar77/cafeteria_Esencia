<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolPrivilegio extends Model
{
    //
    protected $table = "roles_privilegios";


    protected $fillable = ["RolID", "PrivilegioID"];

}
