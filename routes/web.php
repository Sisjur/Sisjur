<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("503",function (){
  return view("errors/503");
});

Route::get("/","SessionController@inicio");
Route::post('inicio','SessionController@inicioSession');
//Route::get('/prueba','SessionController@pruebaSession');
Route::get("salir","SessionController@salir");



//Route::post("/comprobar_usuario","SessionController@comprobar_usuario");
Route::get("inicio",function(){
    if(session("users")["tipo"]=="administrador"){
        $casos = \App\Caso::all();
        foreach($casos as $caso){
            $persona = \App\Persona::where("id","=",$caso->id_cliente)->first();
            $caso["nombre_cliente"] = $persona->nombre." ".$persona->apellido;
        }
        return view("proceso.listar",compact("casos"));
    }
     if(session("users")["tipo"]=="abogado"){
              $casos = \App\Caso::join("abogado_casos",function($join){
                $id_abogado = session("users")["id"];
                $join->on("casos.id","=","abogado_casos.id_caso")->where("abogado_casos.id_abogado","=",$id_abogado);
            })->get();
            foreach($casos as $caso){
                $clie=\App\Persona::where('id','=',$caso->id_cliente)->first();
                $caso['nombre_cliente']=$clie->nombre." ".$clie->apellido;

            }
            return view("proceso.listar",compact("casos"));
        }
    // if(session("users")["tipo"]=="abogado"){
    //     return redirect("/procesos/listar");
    // }
    if(session("users")["tipo"]=="cliente"){
           $id = session("users")['id'];
            $caso = \App\Caso::where("casos.id_cliente","=",$id)->first();
            $citas = \App\Cita::join("abogado_casos",function($join){
                $join->on("citas.id_abogado_caso","=","abogado_casos.id");
            })->join("casos",function($join){
                $join->on("casos.id","=","abogado_casos.id_caso");
            })->join("clientes",function($join){
                $join->on("casos.id_cliente","=","clientes.id");
            })->get();
            $avances = \App\Avence::where("id_cliente","=",$id)->get();
            $abogado_caso = DB::table("abogado_casos")->where("abogado_casos.id","=",$avances[0]->id_abogado_caso)->first();
            $abogado = DB::table("personas")->where("personas.id","=",$abogado_caso->id_abogado)->select("personas.nombre")->first();
            // $abogado = \App\Persona::join("abogado_casos","abogado_casos.id","=",$avances[0]->id_abogado_caso)->
            //              where("personas.id","=","abogado_casos.id_abogado")->select("personas.*")->first();

            return view("proceso/info",["abogado"=>$abogado],compact("caso","citas","avances"));
    }
    return redirect("/");
});

/*
    ADMIN
*/
Route::post("/eliminar","Controller@eliminar");
Route::post("actualizar_from_admin","Controller@actualizar_from_admin");
/*
    Infomacion
*/
Route::get("/informacion","Controller@informacion");


/*
    Ver informacion de un abogado
*/
/*
    Actualizar una persona
*/
Route::post("/actualizar","Controller@actualizar_persona");


/*
    Rutas de abogados
*/
Route::get("abogado/especializacion","AbogadoController@especializacionVista");
Route::get("/Informacion_abogado/{id}","AbogadoController@ver_informacion");
Route::get('/abogado/registrar','AbogadoController@registrarVista');
Route::post("/abogado/registrar","AbogadoController@registrar");
Route::post("/abogado/especializacion","AbogadoController@registrar_acta");
Route::get("/abogado/listar","AbogadoController@listarVista");
Route::get("/abogado/informacion","AbogadoController@listarInformacion");
Route::post("/abogado/detalles/","AbogadoController@detalles");
/*
    Rutas de clientes
*/
Route::post("/cliente/registrar","ClienteController@actualizar");
Route::get("/cliente/registrar","ClienteController@registrarVista");
Route::post("/cliente/registrar","ClienteController@registrar");
Route::get("/cliente/listar","ClienteController@listarVista");

/*
 Rutas de procesos

 */
Route::get("/procesos/info","CasoController@info");
Route::get("/procesos/listar","CasoController@index");
Route::get('/procesos/registrar','CasoController@create');
Route::post('/procesos/store','CasoController@store');
Route::get('/procesos/editar/{id}','CasoController@edit');
Route::post('/procesos/update','CasoController@update');

Route::post('/procesos/registrarCita','CasoController@createCita');
Route::get("/procesos/mostrarCita/{id}","CasoController@showCita");
Route::post("/procesos/updateCita","CasoController@updateCita");
Route::post("/procesos/deleteCita","CasoController@deleteCita");

Route::post('/procesos/registrarObservacion','CasoController@createObservacion');
Route::get("/procesos/mostrarObservacion/{id}","CasoController@showObservacion");
Route::post("/procesos/updateObservacion","CasoController@updateObservacion");
Route::post("/procesos/deleteObservacion","CasoController@deleteObservacion");

Route::post('/procesos/registrarAvance','CasoController@createAvance');
Route::get("/procesos/mostrarAvance/{id}","CasoController@showAvance");
Route::post("/procesos/updateAvance","CasoController@updateAvance");
Route::post("/procesos/deleteAvance","CasoController@deleteAvance");

Route::post('/procesos/registrarExpediente','CasoController@createExpedientes');
Route::get("/procesos/mostrarExpediente/{id}","CasoController@showExpediente");
Route::post("/procesos/updateExpediente","CasoCOntroller@updateExpediente");
Route::post("/procesos/deleteExpediente","CasoController@deleteExpediente");

/////////////////CONSULTAS/////////////////////
Route::get("/consultas/info/{id}","ConsultaController@show");
Route::get("/consultas/listar","ConsultaController@index");
Route::get('/consultas/registrar','ConsultaController@create');
Route::post('/consultas/store','ConsultaController@store');
Route::get('/consultas/editar/{id}','ConsultaController@edit');
Route::post('/consultas/update','ConsultaController@update');
