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
        $dni = trim($request["txt_dni"]);
        $nombre = trim($request["txt_nombre"]);
        $apellido = trim($request["txt_apellido"]);
        $correo = trim($request["txt_correo"]);
        $pass = $request["txt_contrasena"];
        $fecha_nac = date("jS F, Y", strtotime(trim($request["txt_fecha_nac"]))); 
        $celular = trim($request["txt_celular"]);
        //$almamater = trim($request["txt_almamater"]);
        $especialidads = $request["especialidades"];
        \App\Persona::create([
            "dni" => $dni,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "correo"=>$correo,
            "password"=>$pass,
            "fecha_nac"=>$fecha_nac,
            "telefono"=>"12345",
            //"almamater"=>$almamater,
            "celular"=>$celular,
            "tipo"=>"abogado"
        ]);
        return redirect("/abogado/registro")->with("msj","Se añadio correctamente un nuevo abogado.");
    }

    public function listarVista(){
        $listado_abogados = \App\Persona::where("tipo","abogado");

        return view("abogado/listar",compact("listado_abogados"));
    }
}
