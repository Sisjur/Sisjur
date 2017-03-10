@extends("app") @section("title") Sisjur Cliente @stop @section("content")
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
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cliente</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <!--<form role="form" action="cliente/registrar" method="post">-->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>DNI</label>
                                <input required type="number" class="form-control" name="txt_dni" placeholder="Digita la identifiacion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required type="text" class="form-control" name="txt_nombre" placeholder="Digita el nombre">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input required type="text" class="form-control" name="txt_apellido" placeholder="Digita el apellido">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input required type="email" class="form-control" name="txt_correo" id="exampleInputEmail1" placeholder="Digita el correo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" class="form-control" name="txt_contrasena" id="exampleInputPassword1" placeholder="Digita la contraseña">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input readonly required type="text" class="form-control pull-right" name="txt_fecha_nac" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input required type="text" class="form-control" name="txt_celular" class="phone_us">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" id="RCliente" class="btn btn-danger" value="Registrar">
                    <input hidden type="submit" id="ACliente" class="btn btn-danger"  style="display : none;" value="Actualizar">
                </div>
                <!--  </form>-->
            </div>
        </div>
    </section>
</div>

@stop @section("scripts")
<script>
    animation_title("Registrar Cliente");
  

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