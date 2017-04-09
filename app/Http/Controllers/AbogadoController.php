<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbogadoController extends Controller
{
    public function registrarVista(){
        $especialidads = \App\tipo_especialidad::All();
        return view("abogado/registrar",compact("especialidads"));
    }

    
  
    /*

    */
    public function registrar(Request $request){
        try{
           
            $persona = $this->registrar_persona($request,"abogado");
            //$almamater = trim($request["txt_almamater"]);
            $abogado = \App\Abogado::create(["id"=>$persona->id]);
            $actas = json_decode($request["actas"]);
            foreach($actas as $acta){
                $especialidad = \App\Especialidad::create([
                    "nombre"=>$acta->nombre,
                    "tipo"=>$acta->tipo,
                    "descripcion"=>$acta->descripcion,
                    "fecha"=>$acta->fecha,
                    "instituto"=>$acta->instituto,
                    "url"=>"None"
                ]);
                \App\AbogadoEspecialista::create([
                    "id_abogado"=>$abogado->id,
                    "id_especialista"=>$especialidad->id
                ]);
                $destino = base_path()."/public/resources/actas";
                $extension = $acta->file->getClientOriginalExtension();
                $nombre = $persona->dni.$acta->nombre.$extension;
                $image->move($destino,$nombre);
                \App\Especialidad::where("id",$especialidad->id)->update([
                    "url"=>$nombre
                ]);
            }
            return response("Se registro correctamente el abogado.",200)->header('Content-Type', 'text/plain');

        }catch(Exception $e){
            return response('!Ups! algo ha ido mal.', 200)
            ->header('Content-Type', 'text/plain');
        }
    }

    public function listarVista(){
        $listado_abogados = \App\Persona::where("tipo","=","abogado")->get();
        return view("abogado/listar",compact("listado_abogados"));
    }

    public function listarInformacion(Request $request){
        return view("abogado/informacion");
    }
}