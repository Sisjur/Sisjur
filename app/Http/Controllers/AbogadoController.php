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
        try{
            $persona = $this->registrar_persona($request,"abogado");
            //$almamater = trim($request["txt_almamater"]);
            $especialidades = $request["especialidades"];
          
            
            $abogado = \App\Abogado::create(["id"=>$persona->id]);
            return response("Se registro correctamente el abogado.",200)->header('Content-Type', 'text/plain');
        }catch(Exception $e){
            return response('!Ups! algo ha ido mal.', 200)
            ->header('Content-Type', 'text/plain');
        }
        
        //return redirect("/abogado/registro")->with("msj","Se añadio correctamente un nuevo abogado.");
    }
    
    public function listarVista(){
        $listado_abogados = \App\Persona::where("tipo","=","abogado")->get();
        return view("abogado/listar",compact("listado_abogados"));
    }
}