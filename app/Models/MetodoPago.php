<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    //
    protected $fillable = ['nombre', 'descripcion', 'saldo'];
    public $table = 'metodos_pago';
}
