<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fan;
use App\User;
use DB;

class FansController extends Controller
{
	public function get_followers(Request $request)
	{
		return response()->json(User::find($request->user_id)->get_fans());
	}

	public function get_idolos(Request $request)
	{
		return response()->json(User::find($request->user_id)->get_idolos());
	}
}
