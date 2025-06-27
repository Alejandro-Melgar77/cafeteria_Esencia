<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Importar BelongsTo para las relaciones belongsTo
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Importar correctamente BelongsToMany
use Illuminate\Database\Eloquent\Relations\HasOne;

class NotaDeVenta extends Model
{
    use HasFactory;
    protected $table = 'notas_de_venta';
    protected $fillable = [
        'importe',
        'fecha',
        'metodo_pago_id',
        'usuario_id' 
    ];

    public function metodoPago(): BelongsTo
    {
        return $this->belongsTo(MetodoPago::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function inventarios(): BelongsToMany
    {
        return $this->belongsToMany(Inventario::class, 'detalles_de_venta')
                    ->using(DetalleDeVenta::class)
                    ->withPivot('cantidad', 'created_at', 'updated_at');
    }
    public function comprobante()
    {
        return $this->hasOne(Comprobante::class);
    }
    public function feedback(): HasOne
    {
        return $this->hasOne(Feedback::class);
    }
}