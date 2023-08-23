<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id("idMovimientos");
            $table->string("id_activo_tegnologicos")->nullable();
            $table->string("idUsuario")->nullable();
            $table->string("nombre")->nullable();
            $table->string("cedula")->nullable();
            $table->string("activo_fijo")->nullable();
            $table->binary("huella")->nullable();
            $table->string("accion")->nullable();
            $table->string("ubicacion")->nullable();
            $table->string("punto")->nullable();
            $table->dateTime("fecha_creacion")->nullable();
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
        Schema::dropIfExists('movimientos');
    }
}
