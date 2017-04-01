<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;


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
      public function actualizar_persona(Request $request){
        $nombre = trim($request["nombre"]);
        $apellido = trim($request["apellido"]);
        $correo = trim($request["correo"]);
        $fecha = trim($request["fecha_nac"]);
        $celular =trim($request["celular"]);
        $pass = trim($request["txt_contrasena"]);
        $image = trim($request["image"]);
        $dni = session("users")["dni"];
        $persona = \App\Persona::where("dni",$dni)->first();
        $persona->update(["nombre"=>$nombre,"apellido"=>$apellido,
        "correo"=>$correo,"fecha_nac"=>$fecha,"celular"=>$celular,"correo"=>$correo,"password"=>$pass]);
        if(!empty($image)){
            $destino = base_path()."/public/resources/assets/images";
            Storage::delete($destino."/".$dni.".jpg");
            $extension = $image->getClientOriginalExtension();
            $nombre = $dni.".".$extension;
            $image->move($destino,$nombre);
        }
        Session::put("users",$persona->toArray());
        return view("info",["msj"=>"Actualizado correctamente."]);
    }
}
