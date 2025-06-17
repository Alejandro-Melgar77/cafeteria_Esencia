<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleDeSalida extends Model
{
    // Nombre explícito de la tabla (si no sigue convención plural)
    protected $table = 'detalles_de_salida';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'notas_de_salida_id',
        //'tipo',
        'inventario_id',
        'cantidad',
    ];

    /**
     * Relación con la nota de salida.
     * Cada detalle pertenece a una nota de salida.
     */
    public function notaDeSalida()
    {
        return $this->belongsTo(NotaDeSalida::class, 'nota_de_salida_id');
    }

    /**
     * Método para obtener el ítem relacionado (producto o ingrediente)
     * según el campo tipo.
     * 
     * Como es polimórfico manual, debes implementar lógica para esto.
     */
    public function item()
    {
    
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }
}

