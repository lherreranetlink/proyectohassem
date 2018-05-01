<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $fillable = [
        'user_id',
        'id_usuario_seguido',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
