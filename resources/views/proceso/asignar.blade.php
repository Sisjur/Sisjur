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

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <br>
                            <div class="box-body">
                                <form action="{{URL::asset('procesos/asignar')}}" method="POST" >
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Abogado</label>&nbsp
                                            <span class="label label-success">{{$proceso->abogado[0]->persona->nombre}} {{$proceso->abogado[0]->persona->apellido}}</span>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <input name="caso" type="hidden" value="{{ $proceso->id }}">    
                                            <select required  name="abogado" class="form-control">
                                                @foreach($abogados as $dat)
                                                <option value="{{$dat->id}}"
                                                @if($proceso->abogado[0]->id==$dat->id)
                                                    selected
                                                @endif
                                                >{{$dat->nombre}} {{$dat->apellido}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5><strong>Radicado</strong> &nbsp </h5>
                                            {{$proceso->radicado}}

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                            <h5><strong>Estado</strong> &nbsp </h5>
                                            <div>

                                                @if($proceso->radicado)
                                                <span class="label label-success ">Aceptado</span>
                                                @else
                                                <span class="label label-warning ">Estamos trabajando</span> @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xs-12"></div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <h5><strong>Fecha inicio</strong> &nbsp </h5>
                                        {{$proceso->fecha_inicio}}
                                        {{$proceso->abogado[0]->id}}
                                      </div>
                                    </div>
                                    <div class="col-md-12"></div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Cliente</label>&nbsp
                                            <span class="label label-success">{{$clientes[0]->nombre}}</span>

                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Juez:</label>
                                            {{$proceso->nombre_juez}}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <textarea required id="pro_descripcion" data-original-title="Datos incompletos" name="pro_descripcion" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled>
                                                {{$proceso->descripcion}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary">Asignar</button>
                                    </div>


                                </form>
                            </div>
                        </div>



                        <!-- /.tab-pane -->
                        <div class="tab-pane " id="tab_2">
                            <div class="box-body">
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

                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>

                                <!-- TABLE END-->
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
            animation_title("Asignar proceso");


        });
        /////////////////////////////////////////EXPEDIENTE//////////////////////////////////////////////////////

    </script>
 @stop
