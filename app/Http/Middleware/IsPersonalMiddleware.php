<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IsPersonalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $rol = DB::select("select rol.Cargo from rol, usuario, users where usuario.id = users.id and usuario.RolID=rol.id and users.id=?", [$user->id]);

        if (Auth::check() && $rol[0]->Cargo === 'Personal') {
            return $next($request);
        }

        abort(403, 'Acceso denegado');
    }
}
