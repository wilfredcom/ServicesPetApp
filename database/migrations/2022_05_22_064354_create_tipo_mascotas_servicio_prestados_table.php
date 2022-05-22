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
        Schema::create('tipo_mascotas_servicio_prestados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_mascota_id')->nullable()->constrained('tipo_mascotas');
            $table->foreignId('servicio_prestados_id')->nullable()->constrained('servicio_prestados');
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
        Schema::dropIfExists('tipo_mascotas_servicio_prestados');
    }
};
