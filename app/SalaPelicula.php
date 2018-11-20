<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaPelicula extends Model
{
    protected $table = 'salas_peliculas';
    public $timestamps = false;
    protected $fillable = ['id_sala','id_pelicula','desde','hasta'];
}
