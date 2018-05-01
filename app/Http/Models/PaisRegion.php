<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaisRegion extends Model
{
    protected $table = "pais_region";
    protected $fillable = [
        'pais',
        'region_id',
    ];

}
