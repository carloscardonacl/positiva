<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositivaData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positiva_data', function (Blueprint $table) {
            $table->id();
            $table->integer("numeroAutorizacion");
            $table->dateTime("fechaHoraAutorizacion");
            $table->date("fechaVencimiento");
            $table->integer("tieneTutela");
            $table->json("serviciosAutorizados");
            $table->json("diagnosticos");

            #proveedor
            $table->string("PtipoDocumento",50);
            $table->string("PnumeroDocumento",255);
            $table->integer("PcodigoHabilitacion");
            $table->string("PrazonSocial",255);
            $table->string("Pdepartamento",255);
            $table->string("PcodigoDepartamento",255);
            $table->string("Pmunicipio",255);
            $table->string("PcodigoMunicipio",255);
            $table->string("Psede",255);
            $table->string("Pdireccion",255);
            $table->integer("PindicativoTelefono");
            $table->string("PnumeroTelefono",100);
          

            #--afiliado
            $table->string("AFtipoDocumento",200);
            $table->string("AFnumeroDocumento",200);
            $table->string("AFprimerNombre",200);
            $table->string("AFsegundoNombre",200);
            $table->string("AFprimerApellido",200);
            $table->string("AFsegundoApellido",200);
            $table->date("AFfechaNacimiento");
            $table->string("AFdepartamento",255);
            $table->string("AFcodigoDepartamento",255);
            $table->string("AFmunicipio",255);
            $table->string("AFcodigoMunicipio",255);
            $table->string("AFzona",255);
            $table->string("AFlocalidad",255);
            $table->string("AFdireccionResidencial",255);
            $table->string("AFcorroElectronico",255);

            $table->integer("AFtelefonoFijoParticularIndicativo");
            $table->integer("AFtelefonoFijoParticularNumero");
            $table->integer("AFtelefonoCelularParticularNumero");
            $table->string("AFcodigoCoberturaSalud",255);
            $table->string("AFramo",255);

            #--relacionLaboral
            $table->string("RLtipoDocumento",255);
            $table->string("RLnumeroDocumento",255);
            $table->string("RLrazonSocial",255);
            $table->date("RLfechaVinculacion");
            $table->string("RLestadoRelacionLaboral",255);
            $table->string("RLmarcaEmpleador",255);

            $table->string("RLnumeroSolicitudSiniestro",255);
            $table->string("RLnumeroSiniestro",255);

            ##$table->string("personaAutorizante",255);

            $table->string("PAnombre",255);
            $table->integer("PAcargoActividad");
            $table->integer("PAtelefonoContactoUno");
            $table->integer("PAtelefonoContactoDos");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positiva_data');
    }
}
