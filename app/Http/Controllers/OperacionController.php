<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conexion;
use App\Models\PaisRegion;
use App\Models\Region;
use App\User;
use Carbon\Carbon;
use Storage;

class OperacionController extends Controller
{
    public function try_login(Request $request) {
        $conection = $this->registerConection($request);

        $user = User::where('nick_name', '=', $request->nick_name)->where('password', '=', $request->password)
                                                                    ->select('users.*')->first();

        if (!$user) {
            $conection->fue_exitosa = 0;
            $conection->save();

            return response()->json([
                                        'status' => 'Error',
                                        'message' => 'Invalid User or Password',
                                    ]);
        }

        $conection->fue_exitosa = 1;
        $conection->save();

        $regionInfo = DB::table('pais_region')->join('regions', 'pais_region.region_id', '=', 'regions.id')
                                              ->where('pais_region.pais', '=', $request->pais)
                                              ->select('ip_address', 'http_port')
                                              ->get()
                                              ->first();

        $data = ($request->movil_app) ? [
                                            'status' => 'Success',
                                            'ip_address' => $regionInfo->ip_address,
                                            'http_port' => $regionInfo->http_port,
                                            'user_id' => $user->id,
                                            'user_profile_photo' => base64_encode(Storage::disk('local')->get($user->foto_perfil_ruta)),
                                            'user_stack_name' => $user->name,
                                        ] 
                                      : [
                                            'status' => 'Success',
                                            'ip_address' => $regionInfo->ip_address,
                                            'http_port' => $regionInfo->http_port,
                                            'user_id' => $user->id,
                                        ];

        return response()->json($data);
    }

    private function registerConection(Request $request){
        return Conexion::create([
            'nick_name' => $request->nick_name,
            'password' => $request->password,
            'pais' => $request->pais,
            'fecha_hora' => Carbon::now()->toDateTimeString()
          ]);
    }

}
