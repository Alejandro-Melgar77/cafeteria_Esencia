<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $fillable = ["Nombre", "Email", 'Telefono', 'RolID', "id_user"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'RolID');
    }

    public function notasDeVenta()
    {
        return $this->hasMany(NotaDeVenta::class);
    }

    public function tienePrivilegio($privilegio)
    {
        return $this->rol ? $this->rol->privilegios->contains('Funcion', $privilegio) : false;
    }

    public function scopeClientes($query)
    {
        return $query->whereHas('rol', fn($q) => $q->where('Cargo', 'Cliente'));
    }

    public function scopePersonal($query)
    {
        return $query->whereHas('rol', fn($q) => $q->where('Cargo', 'Personal'));
    }
}


