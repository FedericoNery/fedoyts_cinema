<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';
    public $timestamps = false;
    protected $fillable = [
    	'cantidad_butacas','precio'
    ];
}
