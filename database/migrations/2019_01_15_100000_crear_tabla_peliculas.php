<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPeliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id_pelicula')->unsigned();
           // $table->foreign('id_pelicula')->references('id_pelicula')->on('salas_peliculas');
            $table->string('nombre',45);
            $table->string('duracion',10);
            $table->string('sinopsis',700);
            $table->string('actores',200);
            $table->date('fecha_de_estreno',100);
            $table->integer('id_audio');
            $table->integer('id_subtitulos');

            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
