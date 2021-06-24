<?php

namespace App\Http\Controllers;

use App\Models\PositivaData;
use Illuminate\Http\Request;

class PositivaDataController extends Controller
{
    //
    public function store(Request $request)
    {


        $positiva = new PositivaData();

        $positiva->numeroAutorizacion = $request->get("numeroAutorizacion");
        $positiva->fechaHoraAutorizacion = $request->get("fechaHoraAutorizacion");
        $positiva->fechaVencimiento = $request->get("fechaVencimiento");
        $positiva->tieneTutela = $request->get("tieneTutela");

       /*  $positiva->serviciosAutorizados = $request->get("serviciosAutorizados");
        $positiva->diagnosticos = $request->get("diagnosticos"); */



        #proveedor
        $proveedor = json_decode($request->get("proveedor"), true);
       
        $positiva->PtipoDocumento = $proveedor["tipoDocumento"];
        $positiva->PnumeroDocumento = $proveedor["numeroDocumento"];
        $positiva->PcodigoHabilitacion = array_key_exists("codigoHabilitacion", $proveedor) ? $proveedor["codigoHabilitacion"] : "";
        $positiva->PrazonSocial = $proveedor["razonSocial"];

        $positiva->Pdepartamento = array_key_exists("departamento", $proveedor) ? $proveedor['departamento'] : '';

        $positiva->PcodigoDepartamento = array_key_exists("codigoDepartamento", $proveedor) ? $proveedor['codigoDepartamento'] : '';

        $positiva->Pmunicipio = array_key_exists("municipio", $proveedor) ? $proveedor['municipio'] : '';

        $positiva->PcodigoMunicipio = array_key_exists("codigoMunicipio", $proveedor) ? $proveedor['codigoMunicipio'] : '';

        $positiva->Psede = array_key_exists("sede", $proveedor) ? $proveedor['sede'] : '';

        $positiva->Pdireccion = array_key_exists("direccion", $proveedor) ? $proveedor['direccion'] : '';

        $positiva->PindicativoTelefono = array_key_exists("indicativoTelefono", $proveedor) ? $proveedor['indicativoTelefono'] : '';

        $positiva->PnumeroTelefono = array_key_exists("numeroTelefono", $proveedor) ? $proveedor['numeroTelefono'] : '';


        #--afiliado
        $afiliado = json_decode($request->get("afiliado"), true);

        $positiva->AFtipoDocumento  = $afiliado["tipoDocumento"];
        $positiva->AFnumeroDocumento  = $afiliado["numeroDocumento"];
        $positiva->AFprimerNombre  = array_key_exists("primerNombre", $afiliado) ? $afiliado["primerNombre"] : "";
        $positiva->AFsegundoNombre  = array_key_exists("segundoNombre", $afiliado) ? $afiliado["segundoNombre"] : "";
        $positiva->AFprimerApellido  = array_key_exists("primerApellido", $afiliado) ? $afiliado["primerApellido"] : "";
        $positiva->AFsegundoApellido  = array_key_exists("segundoApellido", $afiliado) ? $afiliado["segundoApellido"] : "";
        $positiva->AFfechaNacimiento  = array_key_exists("fechaNacimiento", $afiliado) ? $afiliado["fechaNacimiento"] : "";
        $positiva->AFdepartamento  = array_key_exists("departamento", $afiliado) ? $afiliado["departamento"] : "";
        $positiva->AFcodigoDepartamento  = array_key_exists("codigoDepartamento", $afiliado) ? $afiliado["codigoDepartamento"] : "";
        $positiva->AFmunicipio  = array_key_exists("municipio", $afiliado) ? $afiliado["municipio"] : "";
        $positiva->AFcodigoMunicipio  = array_key_exists("codigoMunicipio", $afiliado) ? $afiliado["codigoMunicipio"] : "";
        $positiva->AFzona  = array_key_exists("zona", $afiliado) ? $afiliado["zona"] : "";
        $positiva->AFlocalidad  = array_key_exists("localidad", $afiliado) ? $afiliado["localidad"] : "";
        $positiva->AFdireccionResidencial  = array_key_exists("direccionResidencial", $afiliado) ? $afiliado["direccionResidencial"] : "";
        $positiva->AFcorroElectronico  = array_key_exists("corroElectronico", $afiliado) ? $afiliado["corroElectronico"] : "";
        $positiva->AFtelefonoFijoParticularIndicativo  = array_key_exists("telefonoFijoParticularIndicativo", $afiliado) ? $afiliado["telefonoFijoParticularIndicativo"] : "";

        $positiva->AFtelefonoFijoParticularNumero  = array_key_exists("telefonoFijoParticularNumero", $afiliado) ? $afiliado["telefonoFijoParticularNumero"] : "";

        $positiva->AFtelefonoCelularParticularNumero  = $afiliado["telefonoCelularParticularNumero"];
        $positiva->AFcodigoCoberturaSalud  = $afiliado["codigoCoberturaSalud"];
        $positiva->AFramo  = array_key_exists("ramo", $afiliado) ? $afiliado["ramo"] : "";

        #--relacionLaboral
        $relacionLaboral = json_decode($request->get("relacionLaboral"), true);
        $positiva->RLtipoDocumento = $relacionLaboral["tipoDocumento"];
        $positiva->RLnumeroDocumento = $relacionLaboral["numeroDocumento"];
        $positiva->RLrazonSocial = $relacionLaboral["razonSocial"];
        $positiva->RLfechaVinculacion = array_key_exists("fechaVinculacion", $relacionLaboral) ? $relacionLaboral["fechaVinculacion"] : "";
        $positiva->RLestadoRelacionLaboral = $relacionLaboral["estadoRelacionLaboral"];
        $positiva->RLmarcaEmpleador = $relacionLaboral["marcaEmpleador"];

        #siniestro
        $positiva->RLnumeroSolicitudSiniestro = $request->get("numeroSolicitudSiniestro");
        $positiva->RLnumeroSiniestro = $request->get("numeroSiniestro");

        ##$positiva->string("personaAutorizante",255);
        $personaAutorizante = json_decode($request->get("personaAutorizante"), true);

        $positiva->PAnombre =  array_key_exists("nombre", $personaAutorizante) ? $personaAutorizante = ["nombre"] : "";
        $positiva->PAcargoActividad =  array_key_exists("cargoActividad", $personaAutorizante) ? $personaAutorizante = ["cargoActividad"] : "";
        $positiva->PAtelefonoContactoUno =  array_key_exists("telefonoContactoUno", $personaAutorizante) ? $personaAutorizante = ["telefonoContactoUno"] : "";
        $positiva->PAtelefonoContactoDos =  array_key_exists("telefonoContactoDos", $personaAutorizante) ? $personaAutorizante = ["telefonoContactoDos"] : "";

        $positiva->save();
        //code...

       /*  $res = ['mensaje' => 'Guardad correctamente']; */
        //throw $th;

        return response('ok');
    }
}
