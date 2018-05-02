<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Operacion extends Model
{
    protected $fillable = [
        'descripcion',
    ];

    protected function users() {
        return $this->belongsToMany('App\User', 'user_operacion');
    }
}
