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
        Schema::create('complementario_mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('llave')->nullable();
            $table->string('valor')->nullable();
            $table->foreignId('complementario_mascotas_id')->nullable()->constrained('complementario_mascotas');
            $table->foreignId('mascotas_id')->nullable()->constrained('mascotas');
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
        Schema::dropIfExists('complementario_mascotas');
    }
};
