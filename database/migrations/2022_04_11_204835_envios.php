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
        Schema::create('envios', function (Blueprint $table) {
            $table->id('id_envio');
            $table->tinyInteger('estado');
            Stable->String('nombre_emisor');
            $table->String('direccion_emisor');
            $table->String('nombre_receptor');
            $table->String('direccion_receptor');
            $table->String('fecha_envio');
            $table->String('fecha_estimada');
            $table->tinyInteger('completada');
            $table->Integer('prioridad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envios');
    }
};
