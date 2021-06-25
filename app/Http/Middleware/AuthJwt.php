<?php

namespace App\Http\Middleware;
use App\Models\Auth;
use Closure;
use Illuminate\Http\Request;

class AuthJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check($request->get('token'))) {
            return $next($request);
        }
        $res = [
            "success"=> false,
            "httpResponseCode"=> 401,
            "error"=> "No se encontró el usuario con las credenciales ingresadas",
            "fechaActual"=> ""
        ];


        return response()->json($res,400);

    }
}
