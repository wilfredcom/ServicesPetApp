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
        Schema::create('prestador_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('tipo_persona')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->bigInteger('numero_documento')->nullable();
            $table->string('ruta_imagenes')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedId')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('tipo_cuenta_bancaria')->nullable();
            $table->string('numero_cuenta_bancaria')->nullable();
            $table->string('banco')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ubicacion')->nullable();
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
        Schema::dropIfExists('prestador_servicios');
    }
};

