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
        Schema::table('servicios', function (Blueprint $table) {
            // alto
            $table->float('alto')->nullable();
            // largo
            $table->float('largo')->nullable();
            // ancho
            $table->float('ancho')->nullable();
            // peso
            $table->float('peso')->nullable();
            // descripcion
            $table->string('descripcion')->nullable();
            // cantidad
            $table->float('cantidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropColumn('alto');
            $table->dropColumn('largo');
            $table->dropColumn('ancho');
            $table->dropColumn('peso');
            $table->dropColumn('descripcion');
            $table->dropColumn('cantidad');

        });
    }
};
