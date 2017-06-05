<?php
/**
 * Created by PhpStorm.
 * User: Eliam
 * Date: 12/03/2017
 * Time: 12:28 PM
 */
?>

@extends("app") @section("title") Sisjur Procesos @stop @section("content")
    <div id="listar_consultas">
        <section class="content-header">
            <div class="row">
                <div class="col-md-4 col-sm-4" id="contenido-cabecera">

                </div>

                <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
                    @if (isset($msj))
                        <div class="alert alert-success alert-dismissible"  role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{$msj}}
                        </div>
                    @endif

                </div>
            </div>
        </section>

        <section style="padding : 10px 25px 25px 25px;">
            <div class="box box-danger">

                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending" style="width: 150px;">Cliente</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 131px;">Descripción</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Fecha inicio</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                            style="width: 101px;">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending" style="width: 70px;">Acciones</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($consultas as $c)
                                        <tr role="row">
                                            <td>{{$c->nombre_cliente}}</td>
                                            <td>{{$c->descripcion}}</td>
                                            <td>{{$c->fecha_inicio}}</td>
                                            @if($c->estado!="Pendiente")
                                                <td><span class="label label-success">Caso</span></td>
                                            @else
                                                <td><span class="label label-warning">Consulta</span></td>
                                            @endif
                                            <td>
                                              @if($c->estado=="Pendiente")
                                                <a title="Editar consulta" href="editar/{{$c->id}}" class="btn btn-primary  btn-sm" data-original-title="Editar" data-toggle="tooltip" ><i class="fa fa-edit"></i>
                                                </a>
                                              @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </section>

    </div>

@stop
@section("scripts")
    <script>

        animation_title("Listado de consultas");



    </script>
@stop
