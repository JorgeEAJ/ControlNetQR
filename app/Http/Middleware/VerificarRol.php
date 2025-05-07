<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerificarRol
{
    public function handle($request, Closure $next, ...$roles)
    {
        $usuario = Auth::user();

        if (!$usuario || !in_array($usuario->rol, $roles)) {
            return redirect()->route('login')->withErrors('No tienes permiso para acceder.');
        }

        return $next($request);
    }

}
