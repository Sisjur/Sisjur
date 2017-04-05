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
        echo($request["image"]);
        $this->registrar_persona($request,"cliente");
        return redirect("/cliente/registrar",["msj"=>"Se registro correctamente el usuario."]);
    }

    public function listarVista(Request $request){
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
            })->get();
        }
        return view("cliente/listar",compact("listado_clientes"));
        
    }
}
