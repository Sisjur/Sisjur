<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //

    public function registrarVista(){
        return view("cliente/registrar");
    }

    public function registrar(Request $request){
        echo($request["image"]);
        $this->registrar_persona($request,"cliente");
        return redirect("/cliente/registrar")->with("msj","Se registro correctamente el cliente");
    }
    public function listarVista(Request $request){
        $listado_clientes = \App\Persona::where("tipo","=","cliente")->get();
        return view("cliente/listar",compact("listado_clientes"));
    }
}
