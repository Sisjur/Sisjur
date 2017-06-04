<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    //
   

    public function salir()
    {
        Session::flush();
        return redirect("/");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function inicioSession(Request $request){
      $pass=$request['contrasena'];
      //$pass=$request['contrasena'];
      $persona=Persona::where('correo',$request['usuario']);
      if($persona->count()!=0){
          //dd($user->all());
          $persona = $persona->first();
          if(password_verify($pass,$persona->password)){
          Session::put('users',$persona->toArray());
          return redirect('/inicio');

          }else{
              return redirect("/")->with("status","Usuario o contraseña incorrectos.");
          }
          //if($request['estado'])
           //   Session::put('estado',1);
          //else Session::put('estado',0);
          //dd($user->toArray());
         
      }
      return redirect("/")->with("status","No existe el usuario.");
      //return view('inicio');

    }

    public function inicio(){
        return view('login');
    }

    public function pruebaSession(){

      dd(Persona::find(1)->cliente());
    }
  
}
