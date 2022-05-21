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
        Schema::create('complementario_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('llave')->nullable();
            $table->string('valor')->nullable();
            $table->foreignId('complementario_cliente_id')->nullable()->constrained('complementario_clientes');
            $table->foreignId('cliente_id')->nullable()->constrained('clientes');
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
        Schema::dropIfExists('complementario_clientes');
    }
};
