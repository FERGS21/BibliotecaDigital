<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
        
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->Integer('no_paginas');
            $table->string('isbn');
            $table->Integer('anio_edicion');
            $table->bigInteger('id_editorial')->unsigned();
            $table->bigInteger('id_edicion')->unsigned();
            $table->bigInteger('id_area')->unsigned();
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('id_editorial')->references('id')->on('editoriales')->onDelete("cascade");
            $table->foreign('id_edicion')->references('id')->on('ediciones')->onDelete("cascade");
            $table->foreign('id_area')->references('id')->on('areas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
