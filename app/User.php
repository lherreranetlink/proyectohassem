<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto_perfil_ruta',
        'nick_name',
        'fecha_nac',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fans()
    {
        return $this->hasMany('App\Models\Fan', 'id_usuario_seguido');
    }

    public function get_fans()
    {
        $fansInstances = array();
        $fans = $this->fans;

        foreach ($fans as $fan)
          $fansInstances[] = User::find($fan->user_id);

        return $fansInstances;

    }

    public function operaciones() {
        return $this->belongsToMany('App\Model\Operacion', 'user_operacion');
    }
}
