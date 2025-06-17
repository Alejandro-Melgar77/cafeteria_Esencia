<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleDeCompra extends Model
{
    protected $fillable = [
        'nota_de_compra_id',
       // 'tipo',
        'inventario_id',
        'cantidad',
        'precio_unitario'
    ];
    public $table = 'detalles_de_compra';

    public function nota()
    {
        return $this->belongsTo(NotaDeCompra::class, 'nota_de_compra_id');
    }

    public function item()
    {
        // Relación polimórfica: puede ser Producto o Ingrediente
       // return $this->morphTo(null, 'tipo', 'item_id');
       return $this->belongsTo(Inventario::class, 'inventario_id' );
       
    }
}
