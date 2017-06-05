<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function registrar_persona( $tipo){
            $dni = trim(Input::get("txt_dni"));
            $aux = \App\Persona::where("dni","=",$dni)->count();
            if($aux>0){
                return 0;
            }
            $aux = \App\Persona::where("correo","=",Input::get("txt_correo"))->count();
            if($aux>0){
                return 1;
            }
            $nombre = trim(Input::get("txt_nombre"));
            $apellido = trim(Input::get("txt_apellido"));
            $correo = trim(Input::get("txt_correo"));
            $pass = Input::get("txt_contrasena");
            $fecha_nac = date("m-d-y", strtotime(trim(Input::get("txt_fecha_nac"))));
            $celular = trim(Input::get("txt_celular"));
            $image = Input::file("image");
            if(isset($image)){
                $destino = base_path()."/public/resources/images";
                $extension = $image->getClientOriginalExtension();
                $nombre_image = $dni.".".$extension;
                $image->move($destino,$nombre_image);
            }
            $persona = \App\Persona::create([
            "estado"=>"alta",
            "dni" => $dni,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "correo"=>$correo,
            "password"=>password_hash($pass,PASSWORD_DEFAULT),
            "fecha_nac"=>$fecha_nac,
            "telefono"=>"12345",
            //"almamater"=>$almamater,
            "celular"=>$celular,
            "tipo"=>$tipo
            ]);
            return $persona;

    }

    public function actualizar_from_admin(Request $request){
          try{
                $nombre = trim(Input::get("nombre"));
                $apellido = trim(Input::get("apellido"));
                $correo = trim(Input::get("correo"));
                $fecha = trim(Input::get("fecha_nac"));
                $celular =trim(Input::get("celular"));
                $pass = trim(Input::get("txt_contrasena"));
                $image = $request->file("image");
                $dni = $request["dni"];
                $persona = \App\Persona::where("dni","=",$dni)->first();
                
                $persona->update(["nombre"=>$nombre,"apellido"=>$apellido,
                "correo"=>$correo,"fecha_nac"=>$fecha,"celular"=>$celular,"correo"=>$correo,"password"=>password_hash($pass,PASSWORD_DEFAULT)]);
                if(!empty($image)){
                    $destino = base_path()."/public/resources/images";
                    Storage::delete($destino."/".$dni.".jpg");
                    $extension = $image->getClientOriginalExtension();
                    $nombre = $dni.".jpg";
                    $image->move($destino,$nombre);
                }
                //Session::put("users",$persona->toArray());
                    $actas = Controller::solicitar_informacion();
                    return view("abogado/detalles",["msj"=>"Actualizado correctamente"],compact("actas","persona"));
                
          

          }catch(Exception $e){
            return redirect("503");
          }
    }
      public function actualizar_persona(Request $request){
          try{
                $nombre = trim(Input::get("nombre"));
                $apellido = trim(Input::get("apellido"));
                $correo = trim(Input::get("correo"));
                $fecha = trim(Input::get("fecha_nac"));
                $celular =trim(Input::get("celular"));
                $pass = trim(Input::get("txt_contrasena"));
                $image = $request->file("image");
                $dni = session("users")["dni"];
                $persona = \App\Persona::where("dni",$dni)->first();
                $persona->update(["nombre"=>$nombre,"apellido"=>$apellido,
                "correo"=>$correo,"fecha_nac"=>$fecha,"celular"=>$celular,"correo"=>$correo,"password"=>password_hash($pass,PASSWORD_DEFAULT)]);
                if(!empty($image)){
                    $destino = base_path()."/public/resources/images";
                    Storage::delete($destino."/".$dni.".jpg");
                    $extension = $image->getClientOriginalExtension();
                    $nombre = $dni.".jpg";
                    $image->move($destino,$nombre);
                }
                Session::put("users",$persona->toArray());
                if(session("users")["tipo"]=="abogado"){
                    $actas = Controller::solicitar_informacion();
                    return view("info",["msj"=>"Actualizado correctamente"],compact("actas"));
                }
            return view("info",["msj"=>"Actualizado correctamente."]);
          }catch(Exception $e){
            return view("info",["msj","¡Ups! algo ha ido mal."]);
          }

    }

    public function informacion(Request $request){
        try{
            if(session("users")["tipo"]=="abogado"){
               $actas = Controller::solicitar_informacion();
                return view("info",compact("actas"));

            }
            return view("info");

        }catch(Exception $e){
             return redirect("503");
        }

    }

    public function solicitar_informacion(){
        try{
         $actas = \App\Especialidad::join("abogado_especialistas",function($join){
                $id=session("users")["id"];
                $join->on("especialidads.id","=","abogado_especialistas.id_especialista")->
                where("abogado_especialistas.id_abogado","=",$id);
            })->get();
            foreach($actas as $especialidad){
                $tip_acta = \App\tipo_especialidad::where("id","=",$especialidad->tipo)->first();
                $especialidad["tipo_espe"] = $tip_acta->nombre;
            }
            return $actas;
        }catch(Exception $e){
            return redirect("503");
        }
    }

 
}
