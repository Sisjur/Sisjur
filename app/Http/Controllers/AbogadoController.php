<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbogadoController extends Controller
{
    public function registrarVista(){
        $especialidads = \App\Especialidad::All();
        return view("abogado/registrar",compact("especialidads"));
    }
    public function registrar(Request $request){
        echo("entro!!");
        $dni = $request["dni"];
        $nombre = $request["nombre"];
        $apellido = $request["apellido"];
        $correo = $request["correo"];
        $pass = $request["contrasena"];
        $fecha_nac = $request["fechaNac"];
        $telefono = $request["telefono"];
        $almamater = $request["almamater"];
        $especialidads = $request["especialidades"];
        \App\Persona::create([
            "dni" => $dni,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "correo"=>$correo,
            "password"=>$pass,
            "fecha_nac"=>$fecha_nac,
            "telefono"=>$telefono,
            "almamater"=>$almamater,
            "celular"=>"5762777",
            "tipo"=>"abogado"
        ])->increment("id");
        return "registro correctamente";
    }
}
