<?php
/**
 * Created by PhpStorm.
 * User: Eliam
 * Date: 12/03/2017
 * Time: 1:46 PM
 */
?>
    @extends("app") @section("title") Sisjur Procesos @stop @section("content")
     <section class="content-header">
    <div class="row">
        <div class="col-md-4 col-sm-4" id="contenido-cabecera">

        </div>

        <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
            @if(isset($msj))
            <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>                {{$msj}}
            </div>
            @endif
        </div>
    </div>
</section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Actualizar</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Expediente</a></li>
                        <li class=""><a href="#tab_3" data-toggle="tab">Citas</a></li>
                        <li class=""><a href="#tab_4" data-toggle="tab">Observaciones</a></li>
                        <li class=""><a href="#tab_5" data-toggle="tab">Avance Cliente</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <br>
                            <div class="box-body">
                                <form action="#" method="post">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5><strong>Radicado</strong> &nbsp </h5>
                                            <input id="pro_radicado" data-original-title="Datos incompletos" value="{{$proceso->radicado}}" type="text" class="form-control" name="por_radicado" placeholder="Redicado">

                                        </div>
                                    </div>
                                    <div class="col-md-offset-4 col-md-2">
                                            
                                            <h5><strong>Estado</strong> &nbsp </h5>
                                            <div>
                                                @if($proceso->radicado)
                                                <span class="label label-success ">Aceptado</span> 
                                                @else
                                                <span class="label label-warning ">Estamos trabajando</span> @endif
                                            </div>

                                    </div>
                                    <div class="col-md-12"></div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Cliente</label>&nbsp
                                            <span class="label label-success">{{$clientes[0]->nombre}}</span>
                                            <select id="pro_cliente"  name="pro_cliente" class="form-control">
                                                @foreach($clientes as $cli)
                                                <option value="{{$cli->id}}" 
                                                @if($proceso->id_cliente==$cli->id)
                                                    selected 
                                                @endif>{{$cli->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Juez:</label>
                                            <input id="pro_juez" data-original-title="Datos incompletos" name="pro_juez" value="{{$proceso->nombre_juez}}" type="text" class="form-control" placeholder="Juez">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <textarea id="pro_descripcion" data-original-title="Datos incompletos" name="pro_descripcion" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$proceso->descripcion}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" id="actualizarProceso" class="btn btn-block btn-primary">Modificar</button>
                                    </div>


                                </form>
                            </div>
                        </div>



                        <!-- /.tab-pane -->
                        <div class="tab-pane " id="tab_2">
                            <div class="box-body">
                                <form id="form_espedientes" method="post" enctype="multipart/form-data" action="/procesos/registrarExpediente" >
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Titulo: </label>
                                            <input name="id_proceso" id="idProceso" type="hidden" value="{{$proceso->id}}">
                                            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <input id="exp_titulo" type="text" class="form-control" id="exampleInputFile" name="titulo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Expediente</label>
                                            <input name="file-2" data-origina-title="Datos incompletos" type="file" class="file" data-show-preview="false" accept="application/msword, application/pdf">
                                        </div>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Remitido: </label>
                                            <select id="exp_remitente" data-original-title="Datos incompletos" class="form-control" name="tipo_remitente">
                                                    <option value="abogado">Abogado</option>
                                                    <option value="juzgado">Juzgado</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Documento:</label>
                                            <select id="exp_documento" class="form-control" name="tipo_documento">
                                                    <option value="peticion">Petición</option>
                                                    <option value="respuesta">Respuesta</option>
                                                    <option value="audiencia">Audicencia</option>
                                                </select>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div>
                                            <textarea id="exp_descripcion" data-original-title="Datos incompletos" class="textarea" name="descripcion" placeholder="Message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-8 col-md-4">
                                        <input id="agregarExpediente" type="submit"  class="btn btn-block btn-primary" value="Añadir"> 
                                    </div>
                                    <div class="col-md-12" style="
                                height: 2px;
                                padding-bottom: 0px;
                                background-color: darkgreen;
                                padding-top: 0px;
                                margin-top: 20px;
                            "></div>

                                </form>
                                <!-- TABLE EXPEDIENTES-->

                                <div class="col-sm-12">
                                    <table id="lista-expediente" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 224px;">Descripción
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 205px;">
                                                    Fecha
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 205px;">
                                                    URL
                                                </th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 200px;">Acciones
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="tableExpediente">
                                            @foreach ($espedientes as $es) {

                                            <tr>
                                                <th>{{$es->descripcion}}</th>
                                                <th>{{$es->fecha}}</th>
                                                <?php 
                                                    $new_url = explode("public",$es->url)[1];
                                                ?>
                                                
                                                <th><button onclick="window.location = '{{asset($new_url)}}';" class="btn btn-success btn-sm" data-original-title="Descargar" download="" data-toggle="tooltip"><i class="fa fa-cloud-download"></i></button><!--<a href="{{$new_url}}" class="btn btn-success btn-sm" data-original-title="Descargar" download="" data-toggle="tooltip"><i class="fa fa-cloud-download"></i></a>--></th>
                                                <th> 
                                                <button class="btn btn-primary btn-sm" data-original-title="Modificar" data-toggle="tooltip" onclick="mostarExpediente({{$es->id}})"><i class=" fa fa-pencil-square-o"></i></button>                                                    
                                                <button class="btn btn-danger btn-sm" data-original-title="Eliminar" data-toggle="tooltip" onclick="eliminarExpediente({{$es->id}})"><i class="fa fa-remove"></i></button></th>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>

                                <!-- TABLE END-->
                            </div>
                        </div>



                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="box-body">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Asunto: </label>
                                        <input id="cit_asunto" data-original-title='Datos faltantes' type="text" class="form-control" name="cit_asunto">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha de cita:</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input required data-original-title='Fecha incorrecta' type="text" class="form-control pull-right" name="cli_fecha" id="datepicker">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <textarea id="cit_descripcion" data-original-title='Datos faltantes' class="textarea" name="cit_descripcion" placeholder="Message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <button type="button" id="agregarCita" class="btn btn-block btn-primary">Añadir </button>
                                </div>

                                <div class="col-md-12" style="
                            height: 2px;
                            padding-bottom: 0px;
                            background-color: #B49512;
                            padding-top: 0px;
                            margin-top: 20px;
                                    "></div>
                                <!--TABLA CITA -->

                                <div class="col-sm-12">
                                    <table id="lista-cita" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 177px;">Asunto
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 224px;">Descripcion
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 205px;">
                                                    Fecha
                                                </th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 200px;">Acciones
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="tableCita">
                                            <?php foreach($citas as $ci){?>
                                            <tr>
                                                <th>{{$ci->asunto}}</th>
                                                <th>{{$ci->descripcion}}</th>
                                                <th>{{$ci->fecha}}</th>
                                                <th><button class="btn btn-primary btn-sm" onclick="mostarCita({{$ci->id}})">Modificar</button>                                                    
                                                <button class="btn btn-danger btn-sm" onclick="eliminarCita({{$ci->id}})">Eliminar</button></th>
                                            </tr>
                                            <?php }?>
                                        </tbody>

                                    </table>
                                </div>

                                <!-- TABLA CITA END -->
                            </div>
                        </div>




                        <div class="tab-pane" id="tab_4">
                            <div class="box-body">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Titulo: </label>
                                        <input id="obs_titulo" data-original-title="Datos incompletos" type="text" class="form-control" name="obs_titulo">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <textarea id="obs_descripcion" data-original-title="Datos incompletos" class="textarea" name="obs_descripcion" placeholder="Message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>

                                <div class=" col-md-4">
                                    <button type="button" id="agregarObservacion" class="btn btn-block btn-primary">Añadir </button>
                                </div>
                                <div class="col-md-12" style="height: 2px;padding-bottom: 0px;background-color: #FF2F2F;padding-top: 0px;margin-top: 20px;"></div>
                                <!--TABLA OBSERVAXCIONES -->

                                <div class="col-sm-12">
                                    <table id="lista-observacion" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                    Titulo
                                                </th>
                                                <th class="sorting_asc" tabindex="0">
                                                    Descripción
                                                </th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 100px;">Fecha
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 200px;">Acciones
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="tableObservacion">
                                            @foreach($observaciones as $ob)
                                            <tr>
                                                <th>{{$ob->titulo}}</th>
                                                <th>{{$ob->nota}}</th>
                                                <th>{{$ob->fecha}}</th>
                                                <th><button class="btn btn-primary btn-sm" onclick="mostarObservacion({{$ob->id}})">Modificar</button>  
                                                    <button class="btn btn-danger btn-sm" onclick="eliminarObservacion({{$ob->id}})">Eliminar</button></th>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="tab-pane" id="tab_5">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <textarea id="ava_descripcion" data-original-title="Datos incompletos" class="textarea" name="ava_descripcion" placeholder="Descripcion" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>
                              
                                </div>
                                
                                <div class="col-md-offset-8 col-md-4">
                                    <button type="button" id="agregarAvance" class="btn btn-block btn-primary">Añadir </button>
                                </div>
                                <div class="col-md-12" style="
                                    height: 2px;
                                    padding-bottom: 0px;
                                    background-color: #670102;
                                    padding-top: 0px;
                                    margin-top: 20px;">
                                </div>
                                <!--TABLA CITA -->

                                <div class="col-sm-12">
                                    <table id="lista-avance" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                Mensaje
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                Enviado por
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 100px;">Fecha
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 200px;">Acciones
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="tableAvance">
                                            @foreach($avances as $ava)
                                            <tr>
                                                <th>{{$ava->asunto}}</th>
                                                <th>
                                                @if($ava->tipo=="abogado")
                                                    Mi
                                                @else
                                                    @foreach($clientes as $cli)
                                                            @if($proceso->id_cliente==$cli->id)
                                                               <span class="label label-danger">Cliente</span> {{$cli->nombre}}
                                                            @endif
                                                    @endforeach
                                                @endif
                                                </th>
                                                <th>{{$ava->fecha}}</th>
                                                <th>@if($ava->tipo=="abogado")
                                                    <button class="btn btn-primary btn-sm" onclick="mostarAvance({{$ava->id}})">Modificar</button>
                                                    <button class="btn btn-danger btn-sm" onclick="eliminarAvance({{$ava->id}})">Eliminar</button>                                                   
                                                     @endif
                                                </th>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>

        <!-- /.row (main row) -->

    </section>
    <!-- /////////////////////////////////////////////////// MODALS///////////////////////////////////////  -->



   

    @stop @section("scripts")


    <script>
        

        $("input[name=file-2]").fileinput({
            showUpload:false
        });
         $('body').on('focus', "input[name=cli_fecha]", function () {
            $(this).datepicker({
                autoclose: true
            });
         });
    ;
    </script>

    <script type="">
        $(document).ready(function(){
            animation_title("Informacion del caso");
           
           
        });
        /////////////////////////////////////////EXPEDIENTE//////////////////////////////////////////////////////
        
    </script>
 @stop