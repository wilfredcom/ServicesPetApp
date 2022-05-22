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
        Schema::create('servicio_prestados', function (Blueprint $table) {
            $table->id();
            $table->float('valor')->nullable();
            $table->float('descuento')->nullable();
            $table->string('descripcion_adicional')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ubicaion')->nullable();
            $table->integer('servicio_destacado')->nullable();
            $table->integer('capcidad_maxima')->nullable();
            $table->foreignId('prestador_servicio_id')->nullable()->constrained('prestador_servicios');
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
        Schema::dropIfExists('servicio_prestados');
    }
};
