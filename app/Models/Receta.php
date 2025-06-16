<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nro',
        'producto_id'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingredientes_recetas')
                    ->withPivot(['cantidad', 'created_at', 'updated_at'])
                    ->withTimestamps();
    }
}
