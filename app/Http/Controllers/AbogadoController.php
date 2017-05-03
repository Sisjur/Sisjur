<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class AbogadoController extends Controller
{
    public function registrarVista(){
                return view("abogado/registrar");
    }

    
  
    /*

    */
    public function registrar(){
        try{
              $persona = $this->registrar_persona("abogado");
          
            //$almamater = trim($request["txt_almamater"]);
                $abogado = \App\Abogado::create(["id"=>$persona->id]);
                
                $especialidads = \App\tipo_especialidad::All();
          return view("abogado/especializacion",["msj"=>"Se registro correctamente el abogado","abogado"=>$abogado->id],compact("especialidads"));

        }catch(Exception $e){
            return view("errors/503");
        }
    }

    public function registrar_acta(){
        try{
                 $file = Input::file("file");
                 $tipo_especialidad = Input::get("tipo_especialidad");
                 $tfecha_acta = Input::get("tfecha_acta");
                 $nombre = Input::get("nombre");
                 $instituto = Input::get("instituto");
                 $descripcion=Input::get("descripcion");
                 $id_abogado = Input::get("id_abogado");

                  $especialidad =  \App\Especialidad::create([
                    "nombre"=>$nombre,
                    "tipo"=>$tipo_especialidad,
                    "descripcion"=>$descripcion,
                    "fecha"=>$tfecha_acta,
                    "instituto"=>$instituto,
                    "url"=>"None"
                ]);
                 $abogado_espec =  \App\AbogadoEspecialista::create([
                    "id_abogado"=>$id_abogado,
                    "id_especialista"=>$especialidad->id
                ]);
                $nombre = $id_abogado."-".$file->getClientOriginalName();
                $path = base_path()."/public/resources/actas";
                $file->move($path,$nombre);

                 \App\Especialidad::where("id","=",$especialidad->id)->update([
                    "url"=>$path."/".$nombre
                ]);
                $especialidads = \App\tipo_especialidad::All();
            return view("abogado/especializacion",["msj"=>"Se registro correctamente un acta","abogado"=>Input::get("id_abogado")],compact("especialidads"));
        }catch(Exception $e){
            DB::rollback();
            return view("errors/503");
        }
  
    }
    public function listarVista(){
        try{
                $listado_abogados = \App\Persona::where("tipo","=","abogado")->get();
                return view("abogado/listar",compact("listado_abogados"));
        }catch(Exception $e){
            return view("errors/503");
        }
        
        
    }

    public function listarInformacion(Request $request){
        return view("abogado/informacion");
    }
}