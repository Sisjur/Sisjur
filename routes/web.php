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
    Rutas de abogados
*/
Route::get('/abogado/registrar','AbogadoController@registrarVista');
Route::post("/abogado/registrar","AbogadoController@registrar");
Route::get("/abogado/listar","AbogadoController@listarVista");

/*
    Rutas de clientes
*/

Route::get("/cliente/registrar","ClienteController@registrarVista");
Route::post("/cliente/registrar","ClienteController@registrar");
Route::get("/cliente/listar","ClienteController@listarVista");