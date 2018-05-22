<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fan;
use App\User;
use DB;
use Storage;

class UsersController extends Controller
{

	public function get_users_per_regions(Request $request)
	{
		$regionId = DB::table('users')->where('users.id', $request->user_id)->join('pais_region', 'users.pais_region_id', 'pais_region.id')
																			->join('regions', 'pais_region.region_id', 'regions.id')
																			->select('regions.id')
																			->first()
																			->id;

		$usersPerRegion = DB::table('users')->join('pais_region', 'users.pais_region_id', 'pais_region.id')
											->join('regions', 'pais_region.region_id', 'regions.id')
											->where('regions.id', $regionId)
											->select('users.*')
											->get()
											->toArray();

		foreach ($usersPerRegion as $user) {
			$profilePhoto = Storage::disk('local')->get($user->foto_perfil_ruta);
			$user->foto_perfil_base64 = base64_encode($profilePhoto);
		}

		return response()->json($usersPerRegion);

	}

	public function follow_user(Request $request)
	{
		$fan = new Fan;
		$fan->user_id = $request->user_id;
		$fan->id_usuario_seguido = $request->id_usuario_seguido;

		$response = ($fan->save()) ? [
										"status"  => "success"
									 ] : 
									 [
									 	"status"  => "failed", 
									 	"message" => "There was an error creating a follower user"
									 ];
									 
		return response()->json($response);
	}

	public function remove_follow(Request $request)
	{
		$wasDeleted = DB::table('fans')->where('user_id', $request->user_id)
						 			   ->where('id_usuario_seguido', $request->id_usuario_seguido)
						 		       ->delete();

		$data = ($wasDeleted) ? ["status" => "success"] : [
															"status" => "error",
															"message" => "There was an error deleting fan",
														  ];
	}

}
