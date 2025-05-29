<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = "roles";
    protected $fillable = ['Cargo'];

    public function privilegios()
    {
        return $this->belongsToMany(Privilegio::class, 'roles_privilegios', 'RolID', 'PrivilegioID');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'RolID');
    }
}
