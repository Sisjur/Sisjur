<?php
/**
 * Created by PhpStorm.
 * User: Eliam
 * Date: 12/03/2017
 * Time: 1:46 PM
 */
?>
@extends("app") @section("title") Sisjur Procesos @stop @section("content")
    <div id="registrar_cliente">
        <section class="content-header">
            <div class="row">
                <div class="col-md-4 col-sm-4" id="contenido-cabecera">

                </div>

                <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
                    @if (session("msj"))
                        <div v-if="there_msj" class="alert alert-success alert-dismissible" v-bind:class=" [type_msj]" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    {{session("msj")}}
                        </div>
                    @endif

                </div>
            </div>
        </section>
        <section style="padding : 10px 25px 25px 25px;">
            <form action="/procesos/store" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Radicado</label>
                                    <input type="text" class="form-control" name="radicado"
                                           placeholder="Digita el radicado (Opcional)" value="" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Clientes</label>

                                        <select requerid class="form-control" style="width: 100%;"
                                                tabindex="-1" aria-hidden="true" name="cliente">
                                            <option selected></option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input required type="text" class="form-control" name="tipo_caso"
                                           placeholder="Digita el tipo de caso" value="">
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
                                        <input required type="text" class="form-control pull-right" name="fecha_ini" id="datepicker"
                                               value="">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre del juez:</label>
                                    <input required type="text" class="form-control" placeholder="Nombre del juez del caso" name="nombre_juez">
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>


                        </div>


                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit" >Registrar</button>
                    </div>
                </div>
            </div>
            </form>
        </section>
    </div>

@stop @section("scripts")
    <script>
        animation_title("Registrar Proceso");


        /**
         * Controla los form de registrar abogado (Registro informacion y registro de especialidad)
         */
        $("#ctrl-tabs").on("click", function () {
            $("#tab-abogado").removeClass("active");
            $("#tab-especialidad").addClass("active");
            $("#a-especialidad").attr("aria-expanded", "true");
            $("#a-abogado").attr("aria-expanded", "false");
        });
        //mascara para celular
        $("input[name=txt_celular]").inputmask("mask", {"mask": "(999) 999-9999"});
        //solo admitir letras
        only_letters("input[name=txt_nombre]");
        only_letters("input[name=txt_apellido]");
        only_letters("#txt_instituto");

    </script>

@stop