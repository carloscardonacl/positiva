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

        $Documento = request('Documento');
        $password = md5(request('Password'));

        $credenciales =  AutorizadoWebService::where('Documento', $Documento)
            ->where('Password', "$password")
            ->where('Estado', 'Activo')
            ->first();

        if ($credenciales) {
            $data = Auth::encode($credenciales);
            return response()->json(['Data' => $data, 'Cod' => 'ok', 'Message' => 'Autenticación extosa'], 200);
        } else {
            $res = ['Cod' => 'error', 'Message' => 'Error de autenticación'];
            return response()->json($res, 400);
        }
    }
}
