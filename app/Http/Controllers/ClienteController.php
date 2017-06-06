<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return view("503");
        }
       
    }

    public function listarVista(Request $request){
        try{
            $listado_clientes = [];
            if(session("users")["tipo"] == "administrador"){
                $listado_clientes = \App\Persona::where("tipo","=","cliente")->get();
                
            }elseif(session("users")["tipo"] == "abogado"){
                $listado_clientes = DB::table("abogado_casos")->join("casos",function($join){
                    $id = session("users")["id"];
                    $join->on("abogado_casos.id_caso","=","casos.id")->
                    where("abogado_casos.id_abogado","=",$id);
                })->join("clientes",function($join){
                    $join->on("casos.id_cliente","=","clientes.id");
                })->join("personas","personas.id","=","clientes.id")->select("personas.*")->get();
            }
            return view("cliente/listar",compact("listado_clientes"));
        }catch(Exception $e){
            return view("app");
        }
        
        
    }
}
