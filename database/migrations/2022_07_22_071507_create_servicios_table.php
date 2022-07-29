<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('type_solicitud')->nullable();
            // ServicioSolicitado.value.type_solicitud = data, // taxi || envio de paquetes
            $table->text('inicio_ruta_coords')->nullable();
            // ServicioSolicitado.value.inicio_ruta_coords = requestServices.value.inicio.LtnLng,
            $table->text('final_ruta_coords')->nullable();
            // ServicioSolicitado.value.final_ruta_coords = requestServices.value.final.LtnLng,
            $table->text('inicio_ruta_address')->nullable();
            // ServicioSolicitado.value.inicio_ruta_address = requestServices.value.inicio.direccion,
            $table->text('final_ruta_address')->nullable();
            // ServicioSolicitado.value.final_ruta_address = requestServices.value.final.direccion,
            $table->text('distancia_servicio')->nullable();
            // ServicioSolicitado.value.distancia_servicio = requestServices.value.distancia,// en kilometros/metros
            $table->text('tiempo_aproximado_de_viaje')->nullable();
            // ServicioSolicitado.value.tiempo_aproximado_de_viaje = requestServices.value.tiempo,// minutos
            $table->float('costo')->nullable();
            // ServicioSolicitado.value.costo = requestServices.value.costo_servicio,
            $table->text('estado')->nullable();
            // ServicioSolicitado.value.estado = "solicitando servicio"; // solicitando servicio || servicio aceptado  || servicio iniciado || servicio finalizado 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
