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
        Schema::create('disponibilidad_servicios', function (Blueprint $table) {
            $table->id();
            $table->date('desde')->nullable();
            $table->date('hasta')->nullable();
            $table->foreignId('servicio_prestado_id')->nullable()->constrained('servicio_prestados');
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
        Schema::dropIfExists('disponibilidad_servicios');
    }
};
