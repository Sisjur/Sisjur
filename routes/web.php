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
Route::get("/","SessionController@inicio");
Route::post('/inicio','SessionController@inicioSession');
//Route::get('/prueba','SessionController@pruebaSession');
Route::get("/salir","SessionController@salir");


//Comprobamos que el usuario exista en la base de datos
//Route::post("/comprobar_usuario","SessionController@comprobar_usuario");
Route::get("/inicio",function(){
    return view("app");
});

/*
    Infomacion
*/
Route::get("/informacion",function(){
    return view("info");
});

/*
    Actualizar una persona
*/
Route::post("/actualizar","Controller@actualizar_persona");

/*
    Rutas de abogados
*/
Route::get('/abogado/registrar','AbogadoController@registrarVista');
Route::post("/abogado/registrar","AbogadoController@registrar");
Route::get("/abogado/listar","AbogadoController@listarVista");
Route::get("/abogado/informacion","AbogadoController@listarInformacion");
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