@extends("app") @section("title") Informacion del caso @stop @section("content")
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
            @if(isset($caso))
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Caso</a></li>
                    <!-- <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Expediente</a></li>-->
                        <li class=""><a href="#tab_3" data-toggle="tab">Citas</a></li>
                        <li class=""><a href="#tab_5" data-toggle="tab">Avances</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        <div class="box-body">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5><strong>Radicado</strong> &nbsp </h5>
                                            @if($caso->radicado!=0)
                                            <span class="label label-success ">{{$caso->radicado}}</span> 
                                            @else
                                            <span class="label label-warning ">Pendiente</span> @endif
                                        </div>
                                        <div class="col-md-4">
                                            <h5><strong>Estado</strong> &nbsp </h5>
                                            <div>
                                                @if($caso->estado=="Activo")
                                                    <span class="label label-success ">{{$caso->estado}}</span> 
                                                @elseif($caso->estado=="Pendiente")
                                                    <span class="label label-warning ">{{$caso->estado}}</span> 
                                                @elseif($caso->estado=="Por asignar")
                                                    <span class="label label-danger ">{{$caso->estado}}</span> 
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <h5><strong>Cliente</strong> &nbsp </h5>
                                            <h5>{{session("users")["nombre"]." ".session("users")["apellido"]}}</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5><strong>Juez</strong> &nbsp </h5>
                                            <h5>{{$caso->nombre_juez}}</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="box-title"><strong>Descripción</strong></h5>
                                            <p>{{$caso->descripcion}}</p>
                                        </div>

                                    </div>
                                    
                                </div>


                            </div>






                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3">
                         <!--TABLA CITA -->
                                    <table id="lista-cita" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending" style="width: 105px;">Asunto</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending" style="width: 150px;">Descripcion</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 131px;">Fecha</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 131px;">Acciones</th>

                                            </tr>
                                    </thead>
                                        <tbody id="tableCita">
                                            @foreach($citas as $ci)
                                            <tr>
                                                <th>{{$ci->asunto}}</th>
                                                <th>{{$ci->descripcion}}</th>
                                                <th>{{$ci->fecha}}</th>
                                                <th>
                                                    <a href="#" data-original-title="Cancelar cita" data-toggle="tooltip" class="btn btn-danger btn-sm"><i class="fa fa-calendar-times-o"></i></a>
                                                </th>
                                                <!--<th><button class="btn btn-primary btn-sm" onclick="mostarCita({{$ci->id}})">Modificar</button>                                                    <button class="btn btn-danger btn-sm" onclick="eliminarCita({{$ci->id}})">Eliminar</button></th>-->
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                               

                    </div>
                    <div class="tab-pane" id="tab_5">
                        <div class="box-body">
                                <input id="token"  type="hidden" value="{{ csrf_token() }}">
                                <input id="idProceso"  type="hidden" value="{{ $caso->id }}">

                                <div class="row">

                                    <div class="col-md-10">
                                        <textarea id="ava_descripcion" class="textarea" name="ava_descripcion" placeholder="Descripcion" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

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
                                    <table id="" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
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
                                                @if($ava->tipo=="cliente")
                                                    Mi
                                                @else
                                                   <span class="label label-danger">Abogado</span> {{$abogado->nombre}}
                                                @endif
                                                </th>
                                                <th>{{$ava->fecha}}</th>
                                                <th>@if($ava->tipo=="cliente")
                                                    <button class="btn btn-primary btn-sm" onclick="mostarAvance({{$ava->id}})">Modificar</button>
                                                    <button class="btn btn-danger btn-sm" onclick="eliminarAvance({{$ava->id}})">Eliminar</button>                                                   
                                                     @else
                                                        Ninguna
                                                     @endif
                                                </th>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                    </div>


                </div>
                <!-- /.tab-content -->
            </div>
            @else
                <div class="col-md-12">
                    <div class="callout callout-warning">
                        <h4>Aun no tienes un caso.</h4>

                        <p>Aun no se te ha asignado un caso.</p>
                    </div>
                </div>
               
            @endif
            <!-- nav-tabs-custom -->
        </div>
    </div>
</section>


@stop @section("scripts")
<script>

    $('#agregarAvance').click(function(){
        var descrip=$('#ava_descripcion').val();
        var proc=$('#idProceso').val();
        var token=$('#token').val();
        $.ajax({
            type: "POST",
            url: "/procesos/registrarAvance",
            data: {asunto:descrip,id_proceso:proc,_token:token},
            success: function (res) {
                    $("#msj").html(
                    `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ${res.msg}
                        </div>`
                );
                    window.location.href=window.location.href;
                console.log(res.res.asunto);
                $('#tableAvance').append("<tr><th>"+res.res.asunto+"</th><th></th>"+res.res.fecha+"<th></th></tr>");
                $('#ava_descripcion').val("");
            },
            error: function (err) {
                $("#msj").html(
                `<div  class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        ¡Ups! algo ha ido mal, intentalo de nuevo.
                    </div>`
                );
                window.location.href=window.location.href;
            }
        });
    });
    animation_title("Informacion del caso");
</script>
@stop