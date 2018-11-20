<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSalasPeliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas_peliculas', function (Blueprint $table) {
            $table->integer('id_sala')->unsigned()->index();;
            $table->integer('id_pelicula')->unsigned()->index();;
            $table->date('desde');
            $table->date('hasta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas_peliculas');
    }
}
