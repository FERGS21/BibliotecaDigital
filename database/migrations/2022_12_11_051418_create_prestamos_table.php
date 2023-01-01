<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');
            //ejemplares
            $table->unsignedBigInteger('ejemplare_id');
            $table->foreign('ejemplare_id')->references('id')->on('ejemplares')->onDelete("cascade");
            //usuarios
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete("cascade");
            /*crearlos de forma manual en base de datos
            $table->timestamps('fecha_prestamo');
            $table->timestamps('fecha_devoluvion');*/
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
        Schema::dropIfExists('prestamos');
    }
}
