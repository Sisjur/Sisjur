<?php
/**
 * Created by PhpStorm.
 * User: Eliam
 * Date: 17/04/2017
 * Time: 11:45 AM
 */
?>
@extends("app") @section("title") Sisjur Procesos @stop @section("content")
    <div id="editar_consulta">
        <section class="content-header">
            <div class="row">
                <div class="col-md-4 col-sm-4" id="contenido-cabecera">

                </div>

                <div class=" col-md-5 col-sm-4" id="msj"  style="float:right">
                    @if (count($errors) > 0)
                        <div  class="alert alert-success alert-dismissible"  role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <section style="padding : 10px 25px 25px 25px;">
            <form action="{{URL::asset('consultas/update')}}" method="POST">
                <input name="id" type="hidden" value="{{$consulta->id}}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Clientes</label>

                                        <select requerid class=" selectpicker form-control" style="width: 100%;"
                                                tabindex="-1" aria-hidden="true" name="cliente">
                                            @foreach ($clientes as $cliente)
                                                <option data-tokens="{{$cliente->id}}" value="{{$cliente->id}}"
                                                  @if($cliente->id==$consulta->cliente)
                                                     selected="selected"
                                                  @endif
                                                  >{{$cliente->nombre}} {{$cliente->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input required type="text" class="form-control" name="tipo_caso" placeholder="Digita el tipo de caso" value="{{$consulta->tipo}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required type="text" class="form-control pull-right" name="fecha_ini" id="datepicker" value="{{$consulta->fecha_inicio}}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Enter ...">{{$consulta->descripcion}}</textarea>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>


                  <div class="box box-primary collapsed-box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Informacion caso</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                    <div class="box-body" style="display: none;">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label >Radicado</label>
                              <input id="pro_radicado" value="" type="text" class="form-control" name="pro_radicado" placeholder="Digita el radicado">

                          </div>
                      </div>
                      <div class="col-md-6 ">
                          <div class="form-group">
                              <label>Abogado</label>
                              <select id="pro_abogado" name="pro_abogado" class="form-control">
                                  @foreach($abogados as $dato)
                                  <option value="{{$dato->id}}" >{{$dato->nombre}} {{$dato->apellido}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6 ">
                          <div class="form-group">
                              <label>Juez:</label>
                              <input id="pro_juez" name="pro_juez" value="" type="text" class="form-control" placeholder="Dijita el nombre del Juez">
                          </div>
                      </div>

                    </div><!-- /.box-body -->
                  </div>


                  <div class="box box-success">
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit" >Actualizar</button>
                    </div>
                  </div>

                </div>
            </form>
        </section>
    </div>

@stop @section("scripts")
    <script>
        animation_title("Modificar Consulta");



        //mascara para celular
        $("input[name=txt_celular]").inputmask("mask", {"mask": "(999) 999-9999"});
        //solo admitir letras


        $('body').on('focus', "input[name='fecha_ini']", function () {
            $(this).datepicker({
                autoclose: true
            });
        });
        $(document).ready(function(){

        }
    </script>

@stop
