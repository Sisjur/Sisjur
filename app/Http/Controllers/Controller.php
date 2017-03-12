<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function registrar_persona(Request $request, $tipo){
            $dni = trim($request["txt_dni"]);
            $nombre = trim($request["txt_nombre"]);
            $apellido = trim($request["txt_apellido"]);
            $correo = trim($request["txt_correo"]);
            $pass = $request["txt_contrasena"];
            $fecha_nac = date("m-d-y", strtotime(trim($request["txt_fecha_nac"])));
            $celular = trim($request["txt_celular"]);
            $image = $request["image"];
            $persona = \App\Persona::create([
            "dni" => $dni,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "correo"=>$correo,
            "password"=>$pass,
            "fecha_nac"=>$fecha_nac,
            "telefono"=>"12345",
            //"almamater"=>$almamater,
            "celular"=>$celular,
            "tipo"=>$tipo
            ]);
            return $persona;
    }
}
