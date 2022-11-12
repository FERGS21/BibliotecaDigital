<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaautoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaautores', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_libro')->unsigned();
            $table->bigInteger('id_autor')->unsigned();
            $table->timestamps();

            $table->foreign('id_libro')->references('id')->on('libros')->onDelete("cascade");
            $table->foreign('id_autor')->references('id')->on('autores')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaautores');
    }
}
