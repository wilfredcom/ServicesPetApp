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
        Schema::create('certificaicon_prestadors', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('institucion')->nullable();
            $table->integer('ultimo_año_cursado')->nullable();
            $table->boolean('fue_completado')->nullable();
            $table->string('ruta_imagenes')->nullable();
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
        Schema::dropIfExists('certificaicon_prestadors');
    }
};
