<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    public $timestamps = false;
    protected $fillable = ['nombre','apellido','email','telefono','fecha_de_nacimiento','contrasenia','esAdmin'];
    protected $hidden = [
        'contrasenia', 
    ];
}
