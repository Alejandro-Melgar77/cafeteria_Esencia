<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $usuario = Auth::user()?->usuario;

        if (!$usuario) {
            abort(403, 'No autorizado');
        }

        if (!in_array(strtolower($usuario->rol->Cargo), $roles)) {
            // abort(403, 'No tienes el rol necesario');
            return redirect()->back()->with('danger', 'No tienes el rol necesario para acceder a esa página');
        }

        return $next($request);
    }
}
