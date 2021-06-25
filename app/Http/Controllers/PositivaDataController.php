<?php

namespace App\Http\Controllers;

use App\Models\PositivaData;
use Illuminate\Http\Request;

class PositivaDataController extends Controller
{
    //
    public function store(Request $request)
    {
        try {


            $positiva = new PositivaData();

            $positiva->numeroAutorizacion = $request->get("numeroAutorizacion");
            $positiva->fechaHoraAutorizacion = $request->get("fechaHoraAutorizacion");
            $positiva->fechaVencimiento = $request->get("fechaVencimiento");
            $positiva->tieneTutela = $request->get("tieneTutela");

            $positiva->serviciosAutorizados = $request->get("serviciosAutorizados");
            $positiva->diagnosticos = $request->get("diagnosticos");



            #proveedor

            $proveedor = json_decode($request->get("proveedor"), true);

            $positiva->PtipoDocumento = $proveedor["tipoDocumento"];
            $positiva->PnumeroDocumento = $proveedor["numeroDocumento"];
            array_key_exists("codigoHabilitacion", $proveedor) ? $positiva->PcodigoHabilitacion =  $proveedor["codigoHabilitacion"] : "";
            $positiva->PrazonSocial = $proveedor["razonSocial"];

            array_key_exists("departamento", $proveedor) ? $positiva->Pdepartamento =  $proveedor['departamento'] : '';

            array_key_exists("codigoDepartamento", $proveedor) ? $positiva->PcodigoDepartamento =  $proveedor['codigoDepartamento'] : '';

            array_key_exists("municipio", $proveedor) ? $positiva->Pmunicipio =  $proveedor['municipio'] : '';

            array_key_exists("codigoMunicipio", $proveedor) ? $positiva->PcodigoMunicipio =  $proveedor['codigoMunicipio'] : '';

            array_key_exists("sede", $proveedor) ? $positiva->Psede =  $proveedor['sede'] : '';

            array_key_exists("direccion", $proveedor) ? $positiva->Pdireccion =  $proveedor['direccion'] : '';

            array_key_exists("indicativoTelefono", $proveedor) ? $positiva->PindicativoTelefono =  $proveedor['indicativoTelefono'] : '';

            array_key_exists("numeroTelefono", $proveedor) ? $positiva->PnumeroTelefono =  $proveedor['numeroTelefono'] : '';

            #return response(json_decode($request->get("proveedor"), true));

            #--afiliado
            $afiliado = json_decode($request->get("afiliado"), true);
            #return response($afiliado);

            $positiva->AFtipoDocumento  = $afiliado["tipoDocumento"];
            $positiva->AFnumeroDocumento  = $afiliado["numeroDocumento"];
            array_key_exists("primerNombre", $afiliado) ? $positiva->AFprimerNombre  =  $afiliado["primerNombre"] : "";
            array_key_exists("segundoNombre", $afiliado) ? $positiva->AFsegundoNombre  =  $afiliado["segundoNombre"] : "";
            array_key_exists("primerApellido", $afiliado) ? $positiva->AFprimerApellido  =  $afiliado["primerApellido"] : "";
            array_key_exists("segundoApellido", $afiliado) ? $positiva->AFsegundoApellido  =  $afiliado["segundoApellido"] : "";
            array_key_exists("fechaNacimiento", $afiliado) ? $positiva->AFfechaNacimiento  =  $afiliado["fechaNacimiento"] : "";
            array_key_exists("departamento", $afiliado) ? $positiva->AFdepartamento  =  $afiliado["departamento"] : "";
            array_key_exists("codigoDepartamento", $afiliado) ? $positiva->AFcodigoDepartamento  =  $afiliado["codigoDepartamento"] : "";
            array_key_exists("municipio", $afiliado) ? $positiva->AFmunicipio  =  $afiliado["municipio"] : "";
            array_key_exists("codigoMunicipio", $afiliado) ? $positiva->AFcodigoMunicipio  =  $afiliado["codigoMunicipio"] : "";
            array_key_exists("zona", $afiliado) ? $positiva->AFzona  =  $afiliado["zona"] : "";
            array_key_exists("localidad", $afiliado) ? $positiva->AFlocalidad  =  $afiliado["localidad"] : "";
            array_key_exists("direccionResidencial", $afiliado) ? $positiva->AFdireccionResidencial  =  $afiliado["direccionResidencial"] : "";
            array_key_exists("corroElectronico", $afiliado) ? $positiva->AFcorroElectronico  =  $afiliado["corroElectronico"] : "";
            array_key_exists("telefonoFijoParticularIndicativo", $afiliado) ? $positiva->AFtelefonoFijoParticularIndicativo  =  $afiliado["telefonoFijoParticularIndicativo"] : "";

            array_key_exists("telefonoFijoParticularNumero", $afiliado) ? $positiva->AFtelefonoFijoParticularNumero  =  $afiliado["telefonoFijoParticularNumero"] : "";

            $positiva->AFtelefonoCelularParticularNumero  = $afiliado["telefonoCelularParticularNumero"];
            $positiva->AFcodigoCoberturaSalud  = $afiliado["codigoCoberturaSalud"];
            array_key_exists("ramo", $afiliado) ? $positiva->AFramo  =  $afiliado["ramo"] : "";

            #--relacionLaboral
            $relacionLaboral = json_decode($request->get("relacionLaboral"), true);
            $positiva->RLtipoDocumento = $relacionLaboral["tipoDocumento"];
            $positiva->RLnumeroDocumento = $relacionLaboral["numeroDocumento"];
            $positiva->RLrazonSocial = $relacionLaboral["razonSocial"];
            array_key_exists("fechaVinculacion", $relacionLaboral) ? $positiva->RLfechaVinculacion =  $relacionLaboral["fechaVinculacion"] : "";
            $positiva->RLestadoRelacionLaboral = $relacionLaboral["estadoRelacionLaboral"];
            $positiva->RLmarcaEmpleador = $relacionLaboral["marcaEmpleador"];

            #siniestro
            $positiva->RLnumeroSolicitudSiniestro = $request->get("numeroSolicitudSiniestro");
            $positiva->RLnumeroSiniestro = $request->get("numeroSiniestro");

            $personaAutorizante = json_decode($request->get("personaAutorizante"), true);

            array_key_exists("nombre", $personaAutorizante) ? $positiva->PAnombre =   $personaAutorizante["nombre"] : "";
            array_key_exists("cargoActividad", $personaAutorizante) ? $positiva->PAcargoActividad =   $personaAutorizante["cargoActividad"] : "";
            array_key_exists("telefonoContactoUno", $personaAutorizante) ? $positiva->PAtelefonoContactoUno =   $personaAutorizante["telefonoContactoUno"] : "";
            array_key_exists("telefonoContactoDos", $personaAutorizante) ? $positiva->PAtelefonoContactoDos =   $personaAutorizante["telefonoContactoDos"] : "";

            $positiva->save();

            $res = [
                'message' => 'Guardad correctamente',
                "success" => true,
                "httpResponseCode" => 200,
            ];
            $status = 200;
        } catch (\Throwable $th) {
            //throw $th;
            $status = 400;
            $res = [
                'message' => 'Ha ocurrido un error',
                "success" => false,
                "httpResponseCode" => 400,
            ];
            #$res = ['message' => 'Ha ocurrido un error'.$th->getMessage()   ];
        }


        return response()->json($res, $status);
    }
}
