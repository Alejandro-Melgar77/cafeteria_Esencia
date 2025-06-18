<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['fecha'];

    public function inventarios(): BelongsToMany
    {
        return $this->belongsToMany(Inventario::class, 'menus_inventarios')
                    ->using(MenuInventario::class)
                    ->withPivot('cantidad'); 
    }
}