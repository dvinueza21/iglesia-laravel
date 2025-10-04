<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyAdminEmail
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user(); // null si no hay login

        // ✅ sólo este correo puede pasar
        if ($user && $user->email === 'admin@iglesia.com') {
            return $next($request);
        }

        abort(403, 'Acceso denegado.');
    }
}
