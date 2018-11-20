<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario')->unsigned();
           // $table->foreign('id_usuario')->references('id_usuario_reserva')->on('reservas');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->date('fecha_de_nacimiento');
            $table->string('contrasenia');
            $table->boolean('esAdmin');
            //$table->int('esAdmin');//ver si agrego o no
           // $table->rememberToken();

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
