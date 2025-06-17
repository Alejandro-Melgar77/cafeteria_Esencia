<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaDeCompra extends Model
{
    protected $fillable = [
        'codigo',
        'fecha',
        'monto_total',
        'proveedor_id',
        'usuario_id',
        'metodo_pago_id'
    ];
    public $table = 'notas_de_compra';

    public function detalles()
    {
        return $this->hasMany(DetalleDeCompra::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class);
    }
}
