<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaDeSalida extends Model
{
    protected $fillable = [
        'codigo',
        'fecha',
        'descripcion',
        'usuario_id'
    ];

    public $table = 'notas_de_salida';

    // Relación: una nota de salida tiene muchos detalles de salida
    public function detalles()
    {
        return $this->hasMany(DetalleDeSalida::class,'notas_de_salida_id');
    }

    // Relación: una nota de salida pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}

