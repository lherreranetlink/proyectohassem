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
        $user->password = $request->password;
        $user->email = $request->correo;
        $user->pais_region_id = $paisRegionId;
        $guardado = $user->save();

        if ($guardado){
            $storagePath = "fotos_perfil/". $user->id.".jpg";
            Storage::disk('local')->put($storagePath, base64_decode($request->foto_perfil));
            $user->foto_perfil_ruta = $storagePath;
            $user->save();
        }

        return ($guardado) ? response()->json(['status' => 'Success'])
                               : response()->json([
                                 'status' => 'Error',
                                 'message' => 'Error registrando usuario',
                               ]);
    }
}
