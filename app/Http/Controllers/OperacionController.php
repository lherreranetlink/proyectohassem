<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperacionController extends Controller
{
    public function make_connection(Request $request) {
        echo $request->pais. " ". $request->user_name;
    }
}
