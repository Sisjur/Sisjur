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

            <div class="col-md-5 col-sm-4" id="msj" style="float:right">
                 @if (isset($msj))
                <div class="alert align-right alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
                    {{$msj}}
                </div>
                @endif
                  @if (isset($err))
                <div class="alert  alert-error alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
                    {{$err}}
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
                                <form action="{{URL::asset('procesos/update')}}" method="POST" >
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5><strong>Radicado</strong> &nbsp </h5>
                                            <input name="id_proceso" id="idProceso" type="hidden" value="{{$proceso->id}}">
                                            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <input required id="pro_radicado" data-original-title="Datos incompletos" value="{{$proceso->radicado}}" type="text" class="form-control"
                                                name="pro_radicado" placeholder="Redicado">

                                        </div>
                                    </div>
                                    <div class="col-md-offset-4 col-md-2">

                                        <h5><strong>Estado</strong> &nbsp </h5>
                                        <div>
                                            @if($proceso->radicado)
                                            <span class="label label-success ">Aceptado</span> @else
                                            <span class="label label-warning ">Estamos trabajando</span> @endif
                                        </div>

                                    </div>
                                    <div class="col-xs-12"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5><strong>Fecha inicio</strong> &nbsp </h5>
                                            {{$proceso->fecha_inicio}}
                                        </div>
                                    </div>
                                    <div class="col-md-12"></div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Cliente</label>&nbsp
                                            <span class="label label-success">{{$clientes[0]->nombre}}</span>
                                            <select required id="pro_cliente" name="pro_cliente" class="form-control">
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
                                            <input required id="pro_juez" data-original-title="Datos incompletos" name="pro_juez" value="{{$proceso->nombre_juez}}" type="text"
                                                class="form-control" placeholder="Juez">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <textarea required id="pro_descripcion" name="pro_descripcion" data-original-title="Datos incompletos" name="pro_descripcion" class="textarea" placeholder="Message"
                                                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$proceso->descripcion}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit"  class="btn btn-block btn-primary">Modificar</button>
                                    </div>


                                </form>
                            </div>
                        </div>



                        <!-- /.tab-pane -->
                        <div class="tab-pane " id="tab_2">
                            <div class="box-body">
                                <form id="form_espedientes" method="post" enctype="multipart/form-data" action="{{URL::asset('procesos/registrarExpediente')}}">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Titulo: </label>
                                            <input name="id_proceso" id="idProceso" type="hidden" value="{{$proceso->id}}">
                                            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <input required id="exp_titulo" type="text" class="form-control" id="exampleInputFile" name="titulo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Expediente</label>
                                            <input required name="file-2" data-origina-title="Datos incompletos" type="file" class="file" data-show-preview="false" accept="application/msword, application/pdf">
                                        </div>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Remitido: </label>
                                            <select required id="exp_remitente" data-original-title="Datos incompletos" class="form-control" name="tipo_remitente">
                                                    <option value="abogado">Abogado</option>
                                                    <option value="juzgado">Juzgado</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Documento:</label>
                                            <select required id="exp_documento" class="form-control" name="tipo_documento">
                                                    <option value="peticion">Petición</option>
                                                    <option value="respuesta">Respuesta</option>
                                                    <option value="audiencia">Audicencia</option>
                                                </select>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div>
                                            <textarea  id="exp_descripcion" data-original-title="Datos incompletos" class="textarea" name="descripcion" placeholder="Message"
                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-8 col-md-4">
                                        <input id="agregarExpediente" type="submit" class="btn btn-block btn-primary" value="Añadir">
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
                                                    Descargar
                                                </th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 200px;">Acciones
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="tableExpediente">
                                            @foreach ($espedientes as $es) 

                                            <tr>
                                                <th>{{$es->descripcion}}</th>
                                                <th>{{$es->fecha}}</th>
                                                <?php
                                                    $new_url = explode("public",$es->url)[1];
                                                ?>

                                                    <th><button onclick="window.location = '{{asset($new_url)}}';" class="btn btn-success btn-sm"
                                                            data-original-title="Descargar" download="" data-toggle="tooltip"><i class="fa fa-cloud-download"></i></button>
                                                        <!--<a href="{{$new_url}}" class="btn btn-success btn-sm" data-original-title="Descargar" download="" data-toggle="tooltip"><i class="fa fa-cloud-download"></i></a>--></th>
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
                                        <input required id="cit_asunto" data-original-title='Datos faltantes' type="text" class="form-control" name="cit_asunto">
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
                                        <textarea id="cit_descripcion" data-original-title='Datos faltantes' class="textarea" name="cit_descripcion" placeholder="Message"
                                            style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                        <input required id="obs_titulo" data-original-title="Datos incompletos" type="text" class="form-control" name="obs_titulo">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <textarea required id="obs_descripcion" data-original-title="Datos incompletos" class="textarea" name="obs_descripcion" placeholder="Message"
                                            style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                        <textarea required id="ava_descripcion" data-original-title="Datos incompletos" class="textarea" name="ava_descripcion" placeholder="Descripcion"
                                            style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

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
                                                    @if($ava->tipo=="abogado") Mi @else @foreach($clientes as $cli) @if($proceso->id_cliente==$cli->id)
                                                    <span class="label label-danger">Cliente</span> {{$cli->nombre}} @endif
                                                    @endforeach @endif
                                                </th>
                                                <th>{{$ava->fecha}}</th>
                                                <th>@if($ava->tipo=="abogado")
                                                    <button class="btn btn-primary btn-sm" onclick="mostarAvance({{$ava->id}})">Modificar</button>
                                                    <button class="btn btn-danger btn-sm" onclick="eliminarAvance({{$ava->id}})">Eliminar</button>                                                    @endif
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

    <form id="form_mod_espedientes" name="form_mod_espedientes" action="{{URL::asset('procesos/updateExpediente')}}" method="post"
        enctype="multipart/form-data">
        <div class="modal fade" id="modalExpedientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modificar expediente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Titulo: </label>
                                <input name="id" type="hidden" id="exp_mod_id">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input required type="text" class="form-control" name="titulo" id="exp_mod_titulo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="archivo">
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Remitido: </label>
                                <select required class="form-control" name="tipo_remitente" id="exp_mod_tipo_remitente">
                                    <option value="abogado">Abogado</option>
                                    <option value="juzgado">Juzgado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Documento:</label>
                                <select required class="form-control" name="tipo_documento" id="exp_mod_tipo_documento">
                                    <option value="peticion">Petición</option>
                                    <option value="respuesta">Respuesta</option>
                                    <option value="audiencia">Audicencia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <textarea id="exp_mod_descripcion" class="textarea" name="descripcion" placeholder="Message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Modificar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="form_mod_citas" name="form_mod_citas" action="#" method="post">
        <div class="modal fade" id="modalCitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel_1">Modificar cita</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Asunto: </label>
                                <input name="id" type="hidden" id="mod_cit_id">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input id="mod_cit_asunto" type="text" class="form-control" name="asunto">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input required type="text" class="form-control pull-right" name="fecha" id="mod_cit_fecha">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <textarea id="mod_cit_descripcion" class="textarea" name="descripcion" placeholder="Message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12" style="
                                height: 2px;
                                padding-bottom: 0px;
                                background-color: darkgreen;
                                padding-top: 0px;
                                margin-top: 20px;
                            "></div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="modificarCita()">Modificar</button>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="form_mod_observacion" name="form_mod_citas" action="#" method="post">
        <div class="modal fade" id="modalObservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel_2">Modificar observación</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Asunto: </label>
                                <input name="id" type="hidden" id="mod_obs_id">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input id="mod_obs_titulo" type="text" class="form-control" name="titulo">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div>
                                <textarea id="mod_obs_descripcion" class="textarea" name="nota" placeholder="Message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12" style="
                                height: 2px;
                                padding-bottom: 0px;
                                background-color: darkgreen;
                                padding-top: 0px;
                                margin-top: 20px;
                            "></div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="modificarObservacion()">Modificar</button>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="form_mod_avance" name="form_mod_avanca" action="#" method="post">
        <div class="modal fade" id="modalAvance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_3">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel_3">Modificar avance</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Asunto: </label>
                                <input name="id" type="hidden" id="mod_ava_id">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div>
                                <textarea id="mod_ava_descripcion" class="textarea" name="asunto" placeholder="Message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12" style="
                                height: 2px;
                                padding-bottom: 0px;
                                background-color: darkgreen;
                                padding-top: 0px;
                                margin-top: 20px;
                            "></div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="modificarAvance()">Modificar</button>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </form>
    @stop @section("scripts")


    <script>
        $("input[name=file-2]").fileinput({
            showUpload: false
        });
        $('body').on('focus', "input[name=cli_fecha]", function () {
            $(this).datepicker({
                autoclose: true
            });
        });
        ;
    </script>

    <script>
        $(document).ready(function () {
            animation_title("Informacion del caso");
            // $('#a').click(function(){
            // });
            $('#agregarObservacion').click(function () {
                var desc = $('#obs_descripcion').val();
                var titu = $('#obs_titulo').val();
                var proc = $('#idProceso').val();
                var token = $('#token').val();
                if (desc.length === 0) {
                    $('#obs_descripcion').attr('data-toggle', 'tooltip');
                    $('#obs_descripcion').tooltip('show');
                    return;
                }
                if (titu.length === 0) {
                    $('#obs_titulo').attr('data-toggle', 'tooltip');
                    $('#obs_titulo').tooltip('show');
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "{{URL::asset('procesos/registrarObservacion')}}",
                    data: { nota: desc, titulo: titu, id_proceso: proc, _token: token },
                    success: function (res) {
                        $("#msj").html(
                            `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                ${res}
                            </div>`
                        );
                        window.location.href = window.location.href;
                        $('#obs_descripcion').val("");
                        $('#obs_titulo').val("");
                    },
                    error: function (err) {
                    }
                });
            });
            $('#agregarCita').click(function () {
                var descrip = $('#cit_descripcion').val();
                var fe = $('#datepicker').val();
                var asu = $('#cit_asunto').val();
                var proc = $('#idProceso').val();
                var token = $('#token').val();
                if (descrip.length === 0) {
                    console.log(descrip);
                    $('#cit_descripcion').attr('data-toggle', 'tooltip');
                    $('#cit_descripcion').attr('data-placement', 'top');
                    $('#cit_descripcion').tooltip('show');
                    return;
                }
                if (asu.length === 0) {
                    $('#cit_asunto').attr('data-toggle', 'tooltip');
                    $('#cit_asunto').attr('data-placement', 'top');
                    $('#cit_asunto').tooltip('show');
                    return;
                }
                if (fe.length === 0) {
                    $('#datepicker').attr('data-toggle', 'tooltip');
                    $('#datepicker').attr('data-placement', 'top');
                    $('#datepicker').tooltip('show');
                    return;
                }
                if (!comprobar_fecha_futura('#datepicker')) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "{{URL::asset('procesos/registrarCita')}}",
                    data: { descripcion: descrip, fecha: fe, asunto: asu, id_proceso: proc, _token: token },
                    success: function (res) {
                        $("#msj").html(
                            `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${res}
                                </div>`
                        );
                        window.location.href = window.location.href;
                        $('#cit_descripcion').val("");
                        $('#datepicker').val("");
                        $('#cit_asunto').val("");
                    },
                    error: function (err) {
                    }
                });
            });
            $('#agregarAvance').click(function () {
                var descrip = $('#ava_descripcion').val();
                var proc = $('#idProceso').val();
                var token = $('#token').val();
                if (descrip.length === 0) {
                    $('#ava_descripcion').attr('data-toggle', 'tooltip');
                    $('#ava_descripcion').attr('data-placement', 'top');
                    $('#ava_descripcion').tooltip('show');
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "{{URL::asset('procesos/registrarAvance')}}",
                    data: { asunto: descrip, id_proceso: proc, _token: token },
                    success: function (res) {
                        $("#msj").html(
                            `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${res.msg}
                                </div>`
                        );
                        window.location.href = window.location.href;
                        console.log(res.res.asunto);
                        $('#tableAvance').append("<tr><th>" + res.res.asunto + "</th><th></th>" + res.res.fecha + "<th></th></tr>");
                        $('#ava_descripcion').val("");
                    },
                    error: function (err) {
                        $("#msj").html(
                            `<div  class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                ¡Ups! algo ha ido mal, intentalo de nuevo.
                            </div>`
                        );
                        window.location.href = window.location.href;
                    }
                });
            });
            // $('#agregarExpediente').click(function(){
            //     var datos = $('#form_espedientes').serialize();
            //     console.log(datos);
            //     // $.ajax({
            //     //     type: "POST",
            //     //     url: "/procesos/registrarExpediente",
            //     //     data: $('#form_espedientes').serialize(),
            //     //     success: function (res) {
            //     //          $("#msj").html(
            //     //             `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
            //     //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            //     //                     ${res}
            //     //                 </div>`
            //     //         );
            //     //          window.location.href=window.location.href;
            //     //         $('#exp_titulo').val('');
            //     //         $('#exp_documento').val('');
            //     //         $('#exp_descripcion').val('');
            //     //         $('#exp_file').val('');
            //     //         $('#exp_remitente').val('');
            //     //     },
            //     //     error: function (err) {
            //     //     }
            //     // });
            // });
            $('#actualizarProceso').click(function () {
                var rad = $("#pro_radicado").val();
                var cli = $('#pro_cliente').val();
                var jue = $('#pro_juez').val();
                var des = $('#pro_descripcion').val();
                var proc = $('#idProceso').val();
                var token = $('#token').val();
                if (rad.length === 0) {
                    $("#pro_radicado").attr('data-toggle', 'tooltip');
                    $("#pro_radicado").attr('data-placement', 'top');
                    $("#pro_radicado").tooltip('show');
                    return;
                }
                if (jue.length === 0) {
                    $('#pro_juez').attr('data-toggle', 'tooltip');
                    $('#pro_juez').attr('data-placement', 'top');
                    $('#pro_juez').tooltip('show');
                    return;
                }
                if (des.length === 0) {
                    $('#pro_descripcion').attr('data-toggle', 'tooltip');
                    $('#pro_descripcion').attr('data-placement', 'top');
                    $('#pro_descripcion').tooltip('show');
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "{{URL::asset('procesos/update')}}",
                    data: { descripcion: des, cliente: cli, id: proc, juez: jue, radicado: rad, _token: token },
                    success: function (res) {
                        $("#msj").html(
                            `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            ${res}
                                        </div>`
                        );
                        window.location.href = window.location.href;
                    },
                    error: function (err) {
                        console.log('Error')
                    }
                });
            });
        });
        /////////////////////////////////////////EXPEDIENTE//////////////////////////////////////////////////////
        function mostarExpediente(id) {
            $.ajax({
                type: "GET",
                url: "{{URL::asset('procesos/mostrarExpediente')}}/" + id,
                success: function (res) {
                    dato = res[0];
                    $('#exp_mod_titulo').val(dato.titulo);
                    $('#exp_mod_descripcion').val(dato.descripcion);
                    $('#exp_mod_id').val(dato.id);
                    $('#exp_mod_tipo_documento').val(dato.tipo_documento);
                    $('#exp_mod_tipo_remitente').val(dato.tipo_remitente);
                    $('#modalExpedientes').modal({
                        show: 'false'
                    });
                },
                error: function (err) {
                }
            });
        }
        function modificarExpediente() {
            // var data = $('#form_mod_espedientes').serializeArray();
            // $.each($('#form_mod_espedientes')[0].files, function(i, file) {
            //     data.push({name:'file-'+i,value: file});
            // });
            //  $.ajax({
            //         type: "POST",
            //         url: "/procesos/updateExpediente",
            //         data: data,
            //         success: function (res){
            //             mostrarTablaExpe(res[0]);
            //         },
            //         error: function (err) {

            //         }
            //     });
        }
        function eliminarExpediente(id) {
            let _token = $("#token").val();
            $.ajax({
                type: "POST",
                url: "{{URL::asset('procesos/deleteExpediente')}}",
                data: { 'id': id,'_token':_token },
                success: function (res) {
                    $("#msj").html(
                        `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${res}
                                </div>`
                    );
                    window.location.href = window.location.href;
                },
                error: function (err) {
                }
            });
        }
        function mostrarTablaExpe(dataTable) {
            dato = '';
            for (var i = 0; i < dataTable.length; i++) {
                r = dataTable[i];
                console.log(r);
                dato += '<tr>' +
                    '<th>' + r.descripcion + '</th>' +
                    '<th>' + r.fecha + '</th>' +
                    '<th>' + r.url + '</th>' +
                    '<th><button class="btn btn-primary btn-sm" onclick="mostarExpediente(' + r.id + ')" >Modificar</button>  <button  class="btn btn-danger btn-sm" onclick="eliminarExpediente(' + r.id + ')" >Eliminar</button></th></tr>';
            }
            $('#tableExpediente').html(dato);
            $('#modalExpedientes').modal('hide');
        }
        ///////////////////////////////// FIN EXPEDEIENTE/////////////////////////////
        /////////////////////////////////////////CITAS//////////////////////////////////////////////////////
        function mostarCita(id) {
            $.ajax({
                type: "GET",
                url: "{{URL::asset('procesos/mostrarCita')}}/" + id,
                success: function (res) {
                    dato = res[0];
                    $('#mod_cit_asunto').val(dato.asunto);
                    $('#mod_cit_descripcion').val(dato.descripcion);
                    $('#mod_cit_fecha').val(dato.fecha);
                    $('#mod_cit_id').val(dato.id);
                    $('#modalCitas').modal({
                        show: 'false'
                    });
                },
                error: function (err) {
                }
            });
        }
        function modificarCita() {
            $.ajax({
                type: "POST",
                url: "{{URL::asset('procesos/updateCita')}}",
                data: $('#form_mod_citas').serialize(),
                success: function (res) {
                    $("#msj").html(
                        `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${res}
                                </div>`
                    );
                    window.location.href = window.location.href;
                    //mostrarTablaCita(res[0]);
                },
                error: function (err) {
                }
            });
        }
        function eliminarCita(id) {
            $.ajax({
                type: "POST",
                url: "{{URL::asset('procesos/deleteCita')}}",
                data: { 'id': id, _token: $("#token").val() },
                success: function (res) {
                    $("#msj").html(
                        `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${res}
                                </div>`
                    );
                    window.location.href = window.location.href;
                    // mostrarTablaCita(res[0]);
                },
                error: function (err) {
                }
            });
        }
        function mostrarTablaCita(dataTable) {
            dato = '';
            for (var i = 0; i < dataTable.length; i++) {
                r = dataTable[i];
                console.log(r);
                dato += '<tr>' +
                    '<th>' + r.asunto + '</th>' +
                    '<th>' + r.descripcion + '</th>' +
                    '<th>' + r.fecha + '</th>' +
                    '<th><button class="btn btn-primary btn-sm" onclick="mostarCita(' + r.id + ')" >Modificar</button>  <button  class="btn btn-danger btn-sm" onclick="eliminarCita(' + r.id + ')" >Eliminar</button></th></tr>';
            }
            $('#tableCita').html(dato);
            $('#modalCitas').modal('hide');
        }
        ///////////////////////////////// FIN CITA/////////////////////////////
        /////////////////////////////////////////OBSERVACION//////////////////////////////////////////////////////
        function mostarObservacion(id) {
            $.ajax({
                type: "GET",
                url: "{{URL::asset('procesos/mostrarObservacion')}}/" + id,
                success: function (res) {
                    dato = res[0];
                    $('#mod_obs_descripcion').val(dato.nota);
                    $('#mod_obs_titulo').val(dato.titulo);
                    $('#mod_obs_id').val(dato.id);
                    $('#modalObservacion').modal({
                        show: 'false'
                    });
                },
                error: function (err) {
                }
            });
        }
        function modificarObservacion() {
            $.ajax({
                type: "POST",
                url: "{{URL::asset('procesos/updateObservacion')}}",
                data: $('#form_mod_observacion').serialize(),
                success: function (res) {
                   // mostrarTablaObservacion(res[0]);
                            window.location.href = window.location.href;

                },
                error: function (err) {
                }
            });
        }
        function eliminarObservacion(id) {
            $.ajax({
                type: "POST",
                url: "{{URL::asset('procesos/deleteObservacion')}}",
                data: { 'id': id, _token: $("#token").val() },
                success: function (res) {
                    $("#msj").html(
                        `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${res}
                                </div>`
                    );
                    window.location.href = window.location.href;
                    //mostrarTablaObservacion(res[0]);
                },
                error: function (err) {
                }
            });
        }
        function mostrarTablaObservacion(dataTable) {
            dato = '';
            for (var i = 0; i < dataTable.length; i++) {
                r = dataTable[i];
                console.log(r);
                dato += '<tr>' +
                    '<th>' + r.titulo + '</th>' +
                    '<th>' + r.nota + '</th>' +
                    '<th>' + r.fecha + '</th>' +
                    '<th><button class="btn btn-primary btn-sm" onclick="mostarObservacion(' + r.id + ')" >Modificar</button>  <button  class="btn btn-danger btn-sm" onclick="eliminarObservacion(' + r.id + ')" >Eliminar</button></th></tr>';
            }
            $('#tableObservacion').html(dato);
            $('#modalObservacion').modal('hide');
        }
        ///////////////////////////////// FIN OBSERVACION/////////////////////////////
        /////////////////////////////////////////AVANCE//////////////////////////////////////////////////////
        function mostarAvance(id) {
            $.ajax({
                type: "GET",
                url: "{{URL::asset('procesos/mostrarAvance')}}/" + id,
                success: function (res) {
                    dato = res[0];
                    $("#mod_ava_descripcion").val(dato.asunto);
                    $("#mod_ava_id").val(dato.id);
                    $('#modalAvance').modal({
                        show: 'false'
                    });
                },
                error: function (err) {
                }
            });
        }
        function modificarAvance() {
            $.ajax({
                type: "POST",
                url: "{{URL::asset('procesos/updateAvance')}}",
                data: $('#form_mod_avance').serialize(),
                success: function (res) {
                   // mostrarTablaAvence(res[0]);
                    window.location.href = window.location.href;
                },
                error: function (err) {
                }
            });
        }
        function eliminarAvance(id) {
            $.ajax({
                type: "POST",
                url: "{{URL::asset('procesos/deleteAvance')}}",
                data: { 'id': id },
                success: function (res) {
                   // mostrarTablaAvence(res[0]);
                    window.location.href = window.location.href;
                },
                error: function (err) {
                }
            });
        }
        function mostrarTablaAvence(dataTable) {
            dato = '';
            for (var i = 0; i < dataTable.length; i++) {
                r = dataTable[i];
                console.log(r);
                dato += '<tr>' +
                    '<th>' + r.asunto + '</th>' +
                    '<th>' + r.fecha + '</th>' +
                    '<th><button class="btn btn-primary btn-sm" onclick="mostarAvance(' + r.id + ')" >Modificar</button>  <button  class="btn btn-danger btn-sm" onclick="eliminarAvance(' + r.id + ')" >Eliminar</button></th></tr>';
            }
            $('#tableAvance').html(dato);
            $('#modalAvance').modal('hide');
        }
        ///////////////////////////////// FIN AVANCE/////////////////////////////
    </script>
    @stop