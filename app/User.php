<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

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
        'pais_region_id',
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

    public function idolos()
    {
        return $this->hasMany('App\Models\Fan', 'user_id');
    }

    public function get_fans()
    {
        $fansInstances = [];
        $fans = $this->fans;

        foreach ($fans as $fan)  {
          $userInstance = User::find($fan->user_id);
          $userInstance->foto_perfil_base64 = base64_encode(Storage::disk('local')->get($userInstance->foto_perfil_ruta));
          $fansInstances[] = $userInstance;
        }

        return $fansInstances;

    }

    public function get_idolos()
    {
        $idolosInstances = [];
        $idolos = $this->idolos;

        foreach($idolos as $idolo) {
            $userInstance = User::find($idolo->id_usuario_seguido);
            $userInstance->foto_perfil_base64 = base64_encode(Storage::disk('local')->get($userInstance->foto_perfil_ruta));
            $idolosInstances[] = $userInstance;
        }

        return $idolosInstances;

    }

    public function operaciones() {
        return $this->belongsToMany('App\Model\Operacion', 'user_operacion');
    }
}
