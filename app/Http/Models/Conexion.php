<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conexion extends Model
{

  protected $fillable = [
      'nick_name',
      'password',
      'pais',
      'fecha_hora',
      'fue_exitosa',
  ];

}
