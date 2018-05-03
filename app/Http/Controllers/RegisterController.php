<?php

namespace App\Http\Controllers;

use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Http\Request;
use App\User;
use App\Models\PaisRegion;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $paisRegionId = PaisRegion::get_pais_region_id_by_country_name($request->pais);
        $user = new User;
        $user->name = $request->nombre;
        $user->nick_name = $request->nick_name;
        $user->password = bcrypt($request->password);
        $user->email = $request->correo;
        $user->pais_region_id = $paisRegionId;
        Storage::disk('local')->put('fotos_perfil/foto_perfil.jpg', base64_decode($request->foto_perfil));

        return ($user->save()) ? response()->json(['status' => 'Success'])
                               : response()->json([
                                 'status' => 'Error',
                                 'message' => 'Error registrando usuario',
                               ]);
    }
}
