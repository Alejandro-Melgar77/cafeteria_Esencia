<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuInventario extends Pivot
{
    protected $table = 'menus_inventarios';
    protected $fillable = [
        'menu_id',
        'inventario_id',
        'cantidad' 
    ];
}   