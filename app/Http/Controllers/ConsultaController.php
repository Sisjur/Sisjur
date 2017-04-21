<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use App\Persona;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
          if(session("users")["tipo"]=="administrador"){
              $consultas=Consulta::all();
              foreach($consultas as $caso){
                  $clie=Persona::where('id','=',$caso->id_cliente)->first();
                  $caso['nombre_cliente']=$clie->nombre." ".$clie->apellido;
              }
              return view('consulta.listar',compact('consultas'));
          }
      }catch(Exception $e){
          return view("errors/503");
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      try{
          $clientes=Persona::where('tipo','=','cliente')->get();
          return view('consulta.create',compact('clientes'));
      }catch(Exception $e){
          return view("errors/503");
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try{
          $consulta=new Consulta();
          $id=session('users')['id'];
          $consulta->id_cliente=$request->get('cliente');
          $consulta->descripcion=$request->get('descripcion');
          $consulta->tipo=$request->get('tipo_caso');
          if($request->get('fecha_ini')!=""){
              $fechaP=explode("/",$request->get('fecha_ini'));
              $consulta->fecha_inicio=$fechaP[2]."-".$fechaP[0]."-".$fechaP[1];
          }
          $consulta->estado=false;

          $consulta->save();

          $clientes=Persona::where('tipo','=','cliente')->get();
          return view('consulta.create',["msj"=>"Se registro correctamente la consulta."],compact('clientes'));
      }catch(Exception $e){
          return view("errors/503");
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      try{

          $consulta=Consulta::where('id',$id)->first();
          $clientes=Persona::where('tipo','cliente')->get();
          $abogados=Persona::where('tipo','abogado')->get();
          //dd($clientes);
          return view('consulta.edit',compact('consulta','clientes','abogados'));
      }catch(Exception $e){
          return view("errors/503");
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
