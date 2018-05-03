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

    public static function get_pais_region_id_by_country_name($country) {
        return PaisRegion::where('pais_region.pais', '=', $country)->select('pais_region.id')
                                                                   ->first()
                                                                   ->id;
    }

}
