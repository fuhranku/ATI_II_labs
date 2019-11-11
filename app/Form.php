<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['Nombre','Apellido','Email','Cedula','Genero'];
}
