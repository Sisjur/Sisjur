<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ClienteController extends Controller
{
    //

    public function registrarVista(){
        return view("cliente/registrar");
    }

    public function registrar(Request $request){
        try{
                 $persona = $this->registrar_persona("cliente");
                \App\Cliente::create(["id"=>$persona->id]);
                
            return view("cliente/registrar",["msj"=>"Se registro correctamente el usuario."]);
        }catch(Exception $e){
            return redirect("503");
        }
       
    }

    public function listarVista(Request $request){
        try{
            $listado_clientes = [];
            if(session("users")["tipo"] == "administrador"){
                $listado_clientes = \App\Persona::where("tipo","=","cliente")->get();
                 return view("cliente/listar",compact("listado_clientes"));
            }
            if(session("users")["tipo"] == "abogado"){
                $listado_clientes = \App\AbogadoCaso::join("casos","abogado_casos.id_caso","=","casos.id")
                                                    ->where("abogado_casos.id_abogado","=",session("users")["id"])
                                                    ->join("clientes","casos.id_cliente","=","clientes.id")
                                                    ->join("personas","clientes.id","=","personas.id")
                                                    ->select("personas.*")->get();
             return view("cliente/listar",compact("listado_clientes"));
            }
           
        }catch(Exception $e){
           return redirect("503");
        }
        
        
    }
      public function detalles(){
        if(session("users")["tipo"]=="administrador"){
           
            $persona = \App\Persona::where("id","=",Input::get("id"))->first();
            return view("cliente/detalles",compact('persona'));
        }
            return redirect("503");
    }
}
