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


    public function especializacionVista(){
         $especialidads = \App\tipo_especialidad::All();
         $abogado = session("users")["id"];
        return view("abogado/especializacion",compact("especialidads"))->with("abogado",$abogado);
    }
    
  
    /*

    */
    public function registrar(){
        try{
              $persona = $this->registrar_persona("abogado");
              if($persona==null){
                  return view("abogado/registrar")->with("err","Ya existe una persona registrada con este dni o correo.");
              }
              
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

    public function ver_informacion(){
      
        $actas = \App\Especialidad::join("abogado_especialistas",function($join){
            $join->on("especialidads.id","=","abogado_especialistas.id_especialista")->
            where("abogado_especialistas.id_abogado","=",Input::get('id'));
        })->get();
        foreach($actas as $especialidad){
            $tip_acta = \App\tipo_especialidad::where("id","=",$especialidad->tipo)->first();
            $especialidad["tipo_espe"] = $tip_acta->nombre;
        }
        return view("info",compact($actas));
    }


    public function detalles(){
        if(session("users")["tipo"]=="administrador"){
            $actas = \App\Especialidad::join("abogado_especialistas",function($join){
                $join->on("especialidads.id","=","abogado_especialistas.id_especialista")->
                where("abogado_especialistas.id_abogado","=",Input::get('id'));
            })->get();
            foreach($actas as $especialidad){
                $tip_acta = \App\tipo_especialidad::where("id","=",$especialidad->tipo)->first();
                $especialidad["tipo_espe"] = $tip_acta->nombre;
            }
            $persona = \App\Persona::where("id","=",Input::get("id"))->first();
            return view("abogado/detalles",compact('actas','persona'));
        }
            return redirect("503");
    }

    public function listarInformacion(Request $request){
        return view("abogado/informacion");
    }

       public function eliminar(){
        if(session("users")["tipo"]=="administrador"){
           $persona = \App\Persona::where("id","=",Input::get("id"))->first();
           $persona->update(["estado"=>"baja"]);
           $casos = AbogadoController::obtener_casos_abogado($persona->id);
           foreach($casos as $caso ){
               $caso->update(["estado"=>"Por asignar"]);
            //or $caso->estado=false;$caso->save();
           }
            $listado_abogados = \App\Persona::where("tipo","=","abogado")->get();
            return view("abogado/listar",compact("listado_abogados"))->with("msj","Se dio de baja el abogado");
        }
        return redirect("503");
    }

    public function obtener_casos_abogado($id){
        $casos = \App\Caso::join("abogado_casos","casos.id","=","abogado_casos.id_caso")
                          ->join("abogados","abogado_casos.id_abogado","=","abogados.id")->get();
        return $casos;
    }
}