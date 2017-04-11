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
                                            @if($caso->estado)
                                            <span class="label label-success ">{{$caso->radicado}}</span> @else
                                            <span class="label label-warning ">Pendiente</span> @endif
                                        </div>
                                        <div class="col-md-4">
                                            <h5><strong>Estado</strong> &nbsp </h5>
                                            <div>
                                                @if($caso->estado)
                                                <span class="label label-success ">Aceptado</span> @else
                                                <span class="label label-warning ">Estamos trabajando</span> @endif
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
                        <div class="box box-success">
                            <div class="box-header ui-sortable-handle">
                            <i class="fa fa-comments-o"></i>

                            <h3 class="box-title">Mensajes</h3>
                            </div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
                            <!-- chat item -->
                            <div class="item">
                                <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                                <p class="message">
                                <a href="#" class="name">
                                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                    Mike Doe
                                </a>
                                I would like to meet you to discuss the latest news about
                                the arrival of the new theme. They say it is going to be one the
                                best themes on the market
                                </p>
                                <div class="attachment">
                                <h4>Attachments:</h4>

                                <p class="filename">
                                    Theme-thumbnail-image.jpg
                                </p>

                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                                </div>
                                </div>
                                <!-- /.attachment -->
                            </div>
                            <!-- /.item -->
                            <!-- chat item -->
                            <div class="item">
                                <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                                <p class="message">
                                <a href="#" class="name">
                                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                    Alexander Pierce
                                </a>
                                I would like to meet you to discuss the latest news about
                                the arrival of the new theme. They say it is going to be one the
                                best themes on the market
                                </p>
                            </div>
                            <!-- /.item -->
                            <!-- chat item -->
                            <div class="item">
                                <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                                <p class="message">
                                <a href="#" class="name">
                                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                                    Susan Doe
                                </a>
                                I would like to meet you to discuss the latest news about
                                the arrival of the new theme. They say it is going to be one the
                                best themes on the market
                                </p>
                            </div>
                            <!-- /.item -->
                            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            <!-- /.chat -->
                            <div class="box-footer">
                            <div class="input-group">
                                <input class="form-control" placeholder="Type message...">

                                <div class="input-group-btn">
                                <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
    </div>
</section>


@stop @section("scripts")
<script>
    animation_title("Informacion del caso");
</script>
@stop