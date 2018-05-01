<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $fillable = [
        'descripcion',
    ];

    protected function users() {
        return $this->belongsToMany('App\User', 'user_operacion');
    }
}
