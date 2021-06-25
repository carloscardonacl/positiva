<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Models\AutorizadoWebService;

use Firebase\JWT\JWT;


class AuthController extends Controller
{

    public function login()
    {
        $documento = request('user');
        $password = md5(request('password'));

        $credenciales =  AutorizadoWebService::where('Documento', $documento)
            ->where('Password', "$password")
            ->where('Estado', 'Activo')
            ->first();

        if ($credenciales) {
            $data = Auth::encode($credenciales);
            $res = [
                "message" => "succces",
                "data" => [
                    "token" => $data
                ],
                "fechaActual" => ""
            ];

            return response()->json($res, 200);
        } else {
            $res = [
                "success" => false,
                "httpResponseCode" => 401,
                "error" => "No se encontró el usuario con las credenciales ingresadas",
                "fechaActual" => ""
            ];
            return response()->json($res, 401);
        }
    }
}
