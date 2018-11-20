<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSalas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->increments('id_sala')->unsigned();
            //$table->foreign('id_sala','sala_reserva')->references('id_sala_reserva')->on('reservas');
            //$table->foreign('id_sala','sala_pelicula')->references('id_sala')->on('salas_peliculas');
            $table->integer('cantidad_butacas');
            $table->float('precio');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas');
    }
}
