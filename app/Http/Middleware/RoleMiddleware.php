<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            // abort(403,'No tienes los permisos requeridos para acceder a los siguientes datos o paginas.');
            return redirect()->route('home.index')->with('danger','No tienes los permisos requeridos para acceder a esa pagina!');
        }
        return $next($request);
    }
}
