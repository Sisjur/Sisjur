<?php

namespace App\Http\Controllers;

use App\AbogadoCaso;
use App\Avence;
use App\Caso;
use App\Cita;
use App\Cliente;
use App\Espediente;
use App\Observacion;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CasoController extends Controller
{


  public function infor($id){
      try{
              $abogadoCaso=AbogadoCaso::where('id_caso',$id)->first();
              $proceso=Caso::where('id',$id)->first();
              $clientes=Persona::where('tipo','cliente')->get();
              $espedientes=Espediente::where('id_caso',$id)->get();
              //creo que lista todas las citas que tiene un abogado en vez de listar las citas de un caso
              $citas=Cita::where('id_abogado_caso',$abogadoCaso->id)->get();

              return view('proceso.informacion',compact('clientes','proceso','espedientes'));

      }catch(Exception $e){
          return redirect("503");
      }

  }


    public function info(Request $request){
        try{
            if(session("users")["tipo"]=="cliente"){
                $id = session("users")['id'];
                $caso = \App\Caso::where("casos.id_cliente","=",$id)->first();
                if($caso==null){
                    return view("cliente/alert");
                }
                $citas = \App\Cita::join("abogado_casos",function($join){
                    $join->on("citas.id_abogado_caso","=","abogado_casos.id");
                })->join("casos",function($join){
                    $join->on("casos.id","=","abogado_casos.id_caso");
                })->join("clientes",function($join){
                    $join->on("casos.id_cliente","=","clientes.id");
                })->get();
                $avances = \App\Avence::where("id_cliente","=",$id)->get();
                $abogado = \App\Persona::join("abogado_casos","personas.id","=","abogado_casos.id_abogado")
                                    ->where("abogado_casos.id_caso","=",$caso->id)->first();
                return view("proceso/info",["abogado"=>$abogado],compact("caso","citas","avances"));
            }
            return redirect("503");

        }catch(Exception $e){
            return view("errors/503");
        }

    }

    public function asignarShow($id){
        try{
                $abogadoCaso=AbogadoCaso::where('id_caso',$id)->first();
                $proceso=Caso::where('id',$id)->first();
              $abogados=Persona::where('tipo','abogado')->get();
                $clientes=Persona::where('tipo','cliente')->get();
                $espedientes=Espediente::where('id_caso',$id)->get();

                $citas=Cita::where('id_abogado_caso',$abogadoCaso->id)->get();

                return view('proceso.asignar',compact('clientes','proceso','espedientes','abogados'));

        }catch(Exception $e){
            return redirect("503");
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            if(session("users")["tipo"]=="abogado"){
                $casos = \App\Caso::join("abogado_casos",function($join){
                    $id_abogado = session("users")["id"];
                    $join->on("casos.id","=","abogado_casos.id_caso")->where("abogado_casos.id_abogado","=",$id_abogado);
                })->get();
                foreach($casos as $caso){
                    $clie=Persona::where('id','=',$caso->id_cliente)->first();
                    $caso['nombre_cliente']=$clie->nombre." ".$clie->apellido;

                }
                return view("proceso.listar",compact("casos"));
            }
            if(session("users")["tipo"]=="administrador"){
                $casos=\App\Caso::all();
                foreach($casos as $caso){
                    $clie=Persona::where('id','=',$caso->id_cliente)->first();
                    $caso['nombre_cliente']=$clie->nombre." ".$clie->apellido;
                }
                return view('proceso.listar',compact('casos'));
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
            return view('proceso.create',compact('clientes'));
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
            $caso=new Caso();
            $id=session('users')['id'];
            $caso->id_cliente=$request->get('cliente');
            $caso->nombre_juez=$request->get('nombre_juez');
            $caso->descripcion=$request->get('descripcion');
            $caso->tipo=$request->get('tipo_caso');
            if($request->get('fecha_ini')!=""){
                $fechaP=explode("/",$request->get('fecha_ini'));
                $caso->fecha_inicio=$fechaP[2]."-".$fechaP[0]."-".$fechaP[1];
            }
            if($request->get('radicado')!=""){
                $caso->radicado=$request->get('radicado');
                $caso->estado="Activo";
            }else{
                $caso->estado="Pendiente";
            }
            $caso->save();
            AbogadoCaso::create(['id_abogado'=>$id,'id_caso'=>$caso->id]);

            $clientes=Persona::where('tipo','=','cliente')->get();
            return view('proceso.create',["msj"=>"Se registro correctamente el caso."],compact('clientes'));
        }catch(Exception $e){
            return view("errors/503");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function show(Caso $caso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso $caso,$id)
    {
        try{
            if(session('users')["tipo"]=="abogado"){
                $abogadoCaso=AbogadoCaso::where('id_caso',$id)->first();
                $proceso=Caso::where('id',$id)->first();
                $clientes=Persona::where('tipo','cliente')->get();
                $espedientes=Espediente::where('id_caso',$id)->get();
                //creo que lista todas las citas que tiene un abogado en vez de listar las citas de un caso
                $citas=Cita::where('id_abogado_caso',$abogadoCaso->id)->get();
                //igual croe que lista todas las observaciones
                $observaciones=Observacion::where('id_abogado_caso',$abogadoCaso->id)->get();
                $avances=Avence::where('id_abogado_caso',$abogadoCaso->id)->get();
                //dd($clientes);
                return view('proceso.edit',compact('clientes','proceso','espedientes','citas','observaciones','avances'));
            }
            return redirect("503");
        }catch(Exception $e){
            return redirect("503");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caso $caso)
    {
        try{
            if(session("users")["tipo"]=="abogado"){
                $caso=Caso::findOrFail($request->id);

                $request['estado']=($request->radicado=="")?false:true;

                $caso->fill($request->all());
                $caso->update();
                return response("Se actualizo correctamente el caso",200)->header("Content-Type","text/plain");
            }
            return redirect("503");
        }catch(Exception $e){
            return redirect("503");
        }

    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Caso  $caso
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Caso $caso,$id)
    // {
    //     //
    // }
    public function createCita(Request $request){
        try{
            if(session("users")["tipo"]=="abogado"){
                $id=session('users')['id'];
                $abogadocaso= \App\AbogadoCaso::where('id_caso',$request->id_proceso)
                    ->where('id_abogado',$id)->first();
                dd($id);
                $request['id_abogado_caso']=$abogadocaso->id;
                $fechaP=explode("/",$request->fecha);
                $request['fecha']=$fechaP[2]."-".$fechaP[0]."-".$fechaP[1];
                \App\Cita::create($request->all());
                return response("Se registro una nueva cita",200)->header("Content-Type","text/plain");
            }
            return redirect("503");
        }catch(Exception $e){
            return redirect("503");
        }
    }

    public function showCita($id){
        try{
            if(session("users")["tipo"]=="abogado"){
                $cita=\App\Cita::where('id',$id)->first();
                        return response()->json([
                            $cita->toArray()
                        ],200);
            }
            return redirect("503");
        }catch(Exception $e){
            return redirect("503");
        }
    }
    public function updateCita(Request $request){
        try{
            if(session("users")["tipo"]=="abogado"){
                $cita=\App\Cita::findOrFail($request->id);
                $cita->fill($request->all());
                $cita->update();
                return response("Se actualizo la cita",200)->header("Content-Type","text/plain");
            }
           return redirect("503");
        }catch(Exception $e){
           return redirect("503");
        }
    }

    public function deleteCita(Request $request){
        try{
            if(session("users")["tipo"]=="abogado"){
                \App\Cita::destroy($request->id);
                return response("Se elimino correctamente la cita",200)->header("Content-Type","text/plain");
            }
           return redirect("503");
        }catch(Exception $e){
           return redirect("503");
        }

    }

///////////////////////OBSERVACIONES//////////////////////////////////////////////
    public function createObservacion(Request $request){
        try{
            if(session("users")["tipo"]=="abogado"){
                $id=session('users')['id'];
            $abogadocaso=AbogadoCaso::where('id_caso',$request->id_proceso)
                ->where('id_abogado',$id)->first();
            $request['id_abogado_caso']=$abogadocaso->id;
            $request['fecha']=date('Y-m-d');
            Observacion::create($request->all());
            return response("Se registro una nueva observacion",200)->header("Content-Type","text/plain");
            }
           return redirect("503");
        }catch(Exception $e){
            return redirect("503");
        }

    }
    public function showObservacion($id){
        try{
            if(session("users")["tipo"]=="abogado"){
                  $res=Observacion::where('id',$id)->first();
                    return response()->json([
                        $res->toArray()
                    ],200);
            }
            return redirect("503");
        }catch(Exception $e){
            return redirect("503");
        }
    }

    public function updateObservacion(Request $request){
        $res=Observacion::findOrFail($request->id);
        $res->fill($request->all());
        $res->update();
        return response()->json([
            Observacion::where('id_abogado_caso',$res->id_abogado_caso)->get()
        ],200);
    }

    public function deleteObservacion(Request $request){
        \App\Observacion::destroy($request->id);
        return response("Se elimino la observacion.",200)->header("Content-Type","text/plain");
        //return response("Se elimino correctamente la observacion.",200)->header("Content-Type","text/plain");
    }
////////////////////////AVANCES////////////////////////////////////////
    public function createAvance(Request $request){

        $id=session('users')['id'];
        $persona = \App\Persona::where("personas.id","=",$id)->first();
        if($persona->tipo=="abogado"){
            $cliente = \App\Cliente::join("casos",function($join){
                $join->on("casos.id_cliente","=","clientes.id")->where("casos.id","=",Input::get("id_proceso"));
            })->select("clientes.*")->first();
            $request['tipo']="abogado";
            $request["id_cliente"] = $cliente->id;

        }else{
            $request['tipo']="cliente";
            $request["id_cliente"] = $id;
        }
        $abogadocaso=AbogadoCaso::where('id_caso',$request->id_proceso)->first();

        $request['id_abogado_caso']=$abogadocaso->id;
        $request['fecha']=date('Y-m-d');
        Avence::create($request->all());
        return response()->json([
            "msg"=>"Se creo un nuevo avance.",
            "res"=>$request->toArray()
        ],200);
    }
    public function showAvance($id){
        $cita=Avence::where('id',$id)->first();
        return response()->json([
            $cita->toArray()
        ],200);
    }

    public function updateAvance(Request $request){
        $avance=Avence::findOrFail($request->id);
        $avance->fill($request->all());
        $avance->update();
        $avances=Avence::where('id_abogado_caso',$avance->id_abogado_caso)->get();
        return response()->json([
            $avances
        ],200);
    }

    public function deleteAvance(Request $request){

    }

///////////////////////EXPEDIENTES//////////////////////////////
    public function createExpedientes(Request $request){
        try{
            $request['id_caso']=$request->get('id_proceso');
            $request['fecha']=date('Y-m-d');
            $file = Input::file("file-2");
            $destino = base_path()."/public/resources/expedientes";
            $nombre = $request["id_caso"]."-".$file->getClientOriginalName();
            $file->move($destino,$nombre);
            $request["url"]=$destino."/".$nombre;
            Espediente::create($request->all());
             $casos = \App\Caso::join("abogado_casos",function($join){
                $id_abogado = session("users")["id"];
                $join->on("casos.id","=","abogado_casos.id_caso")->where("abogado_casos.id_abogado","=",$id_abogado);
            })->get();
            foreach($casos as $caso){
                $clie=Persona::where('id','=',$caso->id_cliente)->first();
                $caso['nombre_cliente']=$clie->nombre." ".$clie->apellido;
            }
            return view("proceso.listar",["msj"=>"Se agrego correctamente un nuevo expediente."],compact("casos"));
        }catch(Exception $e){
            return view("app");
        }

    }

    public function showExpediente($id){
        $expediente=Espediente::where('id',$id)->first();
        return response()->json([
            $expediente->toArray()
        ],200);
    }

    public function updateExpediente(Request $request){
        try{
            $espe=Espediente::findOrFail($request->id);
            $file = Input::file("archivo");
            if(isset($file)){
                $destino = base_path()."/public/resources/expedientes";
                $nombre = $request["id_caso"]."-".$file->getClientOriginalName();
                $file->move($destino,$nombre);
                $request["url"]=$destino."/".$nombre;
            }


            $espe->fill($request->all());
            $espe->update();
            $id_caso=$espe->id_caso;
            $exp=Espediente::where('id_caso',$id_caso)->get();

            $casos = \App\Caso::join("abogado_casos",function($join){
                $id_abogado = session("users")["id"];
                $join->on("casos.id","=","abogado_casos.id_caso")->where("abogado_casos.id_abogado","=",$id_abogado);
            })->get();
            foreach($casos as $caso){
                $clie=Persona::where('id','=',$caso->id_cliente)->first();
                $caso['nombre_cliente']=$clie->nombre." ".$clie->apellido;
            }


            return view("proceso.listar",["msj"=>"Se actualizo correctamente el expediente."],compact("casos"));
        }catch(Exception $e){
            return view("app");
        }

    }

    public function deleteExpediente(Request $request){
        try{
            \App\Expediente::destroy($request["id"]);
            return response("Se elimino el expediente",200)->header("Content-Type","text/plain");
        }catch(Exception $e){
            return reponse("¡Ups! algo ha ido mal.",404)->header("Content-Type","text/plain");
        }

    }

}
