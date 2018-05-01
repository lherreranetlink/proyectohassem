<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'nombre',
        'ssh_username',
        'ssh_password',
        'ip_address',
    ];
}
