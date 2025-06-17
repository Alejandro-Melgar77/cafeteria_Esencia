<?php

namespace App\Observers;

use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BitacoraObserver
{
    protected function registrar(Model $model, string $evento)
    {
        if (!Auth::check())
            return;

        Bitacora::create([
            'fecha' => Carbon::now()->toDateString(),
            'hora' => Carbon::now()->toTimeString(),
            'accion' => "Se {$evento} el registro en " . class_basename($model) . " con ID {$model->id}",
            'ip' => request()->ip(),
            'codigoUsuario' => Auth::id(),
        ]);
    }

    public function created(Model $model): void
    {
        $this->registrar($model, 'creó');
    }

    public function updated(Model $model): void
    {
        $this->registrar($model, 'modificó');
    }

    public function deleted(Model $model): void
    {
        $this->registrar($model, 'eliminó');
    }
}