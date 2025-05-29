<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermisoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permiso): Response
    {
        $usuario = Auth::user()?->usuario;

        if (!$usuario) {
            abort(403, 'No autorizado');
        }

        // Verificar si el rol del usuario tiene el privilegio
        $privilegios = $usuario->rol->privilegios->pluck('Funcion')->map(fn($f) => strtolower($f));

        if (!$privilegios->contains(strtolower($permiso))) {
            // abort(403, 'No tienes permiso');
            return redirect()->back()->with('danger', 'No tienes permiso para acceder a esa página');
        }

        return $next($request);
    }
}
