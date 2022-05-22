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
        Schema::create('disponibilidad_horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dia_semana')->nullable();
            $table->boolean('atencion_festivos')->nullable();
            $table->date('hora_inicia')->nullable();
            $table->date('hora_finalizada')->nullable();
            $table->foreignId('disponibilidad_servicio_id')->nullable()->constrained('disponibilidad_servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibilidad_horarios');
    }
};
