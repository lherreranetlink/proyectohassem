<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $nombre = $request->nombre;
        $nickName = $request->nick_name;
        $password = $request->password;
        $correo = $request->correo;
        $edad = $request->edad;
        $region = $request->pais;
        //$fotoPerfil = $request->foto_perfil;
    }
}
