<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AbogadoController extends Controller
{
    public function registrarVista(){
        try{
                $especialidads = \App\tipo_especialidad::All();
                return view("abogado/registrar",compact("especialidads"));
            
        }catch(Exception $e){
            return view("app");
        }
     
       
    }

    
  
    /*

    */
    public function registrar(){
        try{
           DB::transaction(function(){
              $persona = $this->registrar_persona("abogado");
          
            //$almamater = trim($request["txt_almamater"]);
                $abogado = \App\Abogado::create(["id"=>$persona->id]);
           

            $actas = json_decode(Input::get("actas"));
            
            foreach($actas as $acta){
                $especialidad =  \App\Especialidad::create([
                    "nombre"=>$acta->nombre,
                    "tipo"=>$acta->tipo,
                    "descripcion"=>$acta->descripcion,
                    "fecha"=>$acta->fecha,
                    "instituto"=>$acta->instituto,
                    "url"=>"None"
                ]);
                $abogado_espec =  \App\AbogadoEspecialista::create([
                    "id_abogado"=>$abogado->id,
                    "id_especialista"=>$especialidad->id
                ]);
                //dd(Input::file($acta->file));
                //$file = Input::file($acta->file)->move(base_path()."/public/resources/actas","algo.pdf");
                // $destino = base_path()."/public/resources/actas";
                // $aux = explode(".",$acta->file);
                // $extension = $aux[count($aux)-1];
                // $nombre = $persona->dni.$acta->nombre.$extension;
                // $image->move($destino,$nombre);
                \App\Especialidad::where("id","=",$especialidad->id)->update([
                    "url"=>base_path()."/public/resources/actas"
                ]);
            }
            
           },3);
          return response("Se registro correctamente el abogado.",200)->header('Content-Type', 'text/plain');

        }catch(Exception $e){
            DB::rollback();
            return response('!Ups! algo ha ido mal.', 200)
            ->header('Content-Type', 'text/plain');
        }
    }

    public function listarVista(){
        try{
                $listado_abogados = \App\Persona::where("tipo","=","abogado")->get();
                return view("abogado/listar",compact("listado_abogados"));
            
        }catch(Exception $e){
            return view("app");
        }
        
        
    }

    public function listarInformacion(Request $request){
        return view("abogado/informacion");
    }
}