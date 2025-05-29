<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Privilegio extends Model
{
    //
    protected $table = "privilegios";
    protected $fillable = ["Funcion"];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Rol::class, 'roles_privilegios', 'PrivilegioID', 'RolID');
    }

}
