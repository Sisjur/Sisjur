<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use App\Persona;
use App\Caso;
use App\AbogadoCaso;

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
        //   if($request->get("fecha_ini2")==undefined||$request->get("cliente")==undefined||$request->get("descripcion")==undefined||$request->get("tipo_caso")==undefined){
        //     return redirect("503");
        //   }
          $consulta=new Consulta();
          $id=session('users')['id'];
          $consulta->id_cliente=$request->get('cliente');
          $consulta->descripcion=$request->get('descripcion');
          $consulta->tipo=$request->get('tipo_caso');
          
          if($request->get('fecha_ini2')!=""){
             // dd($request->get("fecha_ini2"));
              $fechaP=explode("/",$request->get('fecha_ini2'));
              $consulta->fecha_inicio=$fechaP[2]."-".$fechaP[0]."-".$fechaP[1];
          }
          $consulta->estado="Pendiente";

          $consulta->save();

          return redirect()->back()->withErrors('El caso fue registrado con exito');
      }catch(Exception $e){
          return redirect("503");
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
    public function update(Request $request){
      try{
        $mens="NO SE REALIZO NINGUN CAMBIO.";
        $consulta=Consulta::findOrFail($request->id);
        if($consulta->fecha_inicio!=$request->fecha_ini||$consulta->tipo!=$request->tipo_caso||$consulta->descripcion!=$request->descripcion||$consulta->id_cliente!=$request->cliente){
          $mens="FUE ACTIALIZADO CON EXITO LA CONSULTA..";
          if($consulta->fecha_inicio!=$request->fecha_ini)
            $consulta->fecha_inicio=$request->fecha_ini;
          if($consulta->tipo!=$request->tipo_caso)
            $consulta->tipo=$request->tipo_caso;
          if($consulta->descripcion!=$request->descripcion)
            $consulta->descripcion=$request->descripcion;
          if($consulta->id_cliente!=$request->cliente)
            $consulta->id_cliente=$request->cliente;
        }
        if($consulta->caso==null){
          if($request->pro_radicado!=""&&$request->pro_juez!=""){
            $caso=Caso::where('radicado',$request->pro_radicado)->first();
            if($caso==null){
              $caso=new Caso();
              $caso->fecha_inicio=$consulta->fecha_inicio;
              $caso->nombre_juez=$request->pro_juez;
              $caso->id_cliente=$consulta->id_cliente;
              $caso->descripcion=$request->descripcion;
              $caso->radicado=$request->pro_radicado;
              $caso->tipo=$consulta->tipo;
              $caso->estado="Activo";
              $caso->save();

              $abo_caso=new AbogadoCaso();
              $abo_caso->id_abogado=$request->pro_abogado;
              $abo_caso->id_caso=$caso->id;
              $abo_caso->save();

              $consulta->caso=$caso->id;
              $consulta->estado="Caso";
              $mens="Se ha creado el caso exitosamente";
            }else $mens="EL RADICADO YA EXISTE.";

          }else{
            if($request->pro_radicado!="")
              $mens=" NECESARIO PARA EL CASO EL NOMBRE DEL JUEZ";
            else if($request->pro_juez!="")
                $mens=" NECESITA EL NUMERO DE RADICADO PARA CREAR EL PROCESO";
          }
        }
        $consulta->update();
        return redirect()->back()->withErrors($mens);
      }catch(Exception $e){
          return view("errors/503");
      }
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
