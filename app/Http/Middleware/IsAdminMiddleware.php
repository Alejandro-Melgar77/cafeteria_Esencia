<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Acceso denegado');
        }

        $result = DB::select(
            "SELECT rol.Cargo FROM rol
             JOIN usuario ON usuario.RolID = rol.id
             JOIN users ON users.id = usuario.id
             WHERE users.id = ? LIMIT 1",
            [$user->id]
        );

        if (empty($result)) {
            abort(403, 'Acceso denegado');
        }

        $cargo = strtolower($result[0]->Cargo);
        $roles = array_map('strtolower', $roles);

        if (!in_array($cargo, $roles)) {
            abort(403, 'Acceso denegado');
        }

        return $next($request);
    }
}
