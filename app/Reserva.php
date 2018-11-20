<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
   	protected $table = 'reservas';
    public $timestamps = false;

    protected $fillable = [
    	'id_sala_reserva','id_usuario_reserva','dia_hora',
    	'id_butaca'
    ];

}
