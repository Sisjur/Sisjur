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
            <form role="form" action="/cliente/registrar" method="POST"  id="form" enctype="multipart/form-data" >
                <div class="box">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="row ">
                        <img id="preview" class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                        <!--  <button id="uploadImage" class="btn btn-primary btn-social btn-xs" style="margin : 30px 0px 0px 60px;">
                                                <i class="fa fa-upload"></i>
                                                <b>Subir imagen</b>
                                        </button>-->
                        <br>
                        <input class="col-md-offset-4" type="file" name="image" v-on:change="loadImage(event)" style="visibility:visible;">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>DNI</label>
                                <input required type="number" class="form-control" name="txt_dni" placeholder="Digita tu identifiacion"
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required type="text"  class="form-control" name="txt_nombre" placeholder="Digita el nombre" value=''>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input required type="text"  class="form-control" name="txt_apellido" placeholder="Digita el apellido"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input required type="email"  class="form-control" name="txt_correo" id="exampleInputEmail1" placeholder="Digita el correo"
                                    value="">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password"  class="form-control" name="txt_contrasena" id="exampleInputPassword1" placeholder="Digita la contraseña">
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
                                    <input required  type="text" class="form-control pull-right" name="txt_fecha_nac" id="datepicker"
                                        value="">
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
                                    <input type="text"  name="txt_celular" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                        data-mask="(___.___)">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    <!--  <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Almamater</label>
                                                <input required type="text" class="form-control" placeholder="Universidad de pregrado" name="txt_almamater" value="">
                                            </div>
                                        </div>

                                    </div>-->

                </div>


                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="submit" class="btn .btn-sm btn-danger" id="registrar" value="Registrar" style="">
                    <input type="submit" class="btn .btn-sm btn-danger" value="Actualizar" style="display: none;">

                </div>
                </div>
                
            </form>

        </div>
    </section>
</div>

@stop @section("scripts")
<script>

    var app = new Vue({
        el: "#registrar_cliente",
        data: {
            image : {},

        },
        methods: {
            loadImage: function () {
                var output = document.getElementById('preview');
                output.src = URL.createObjectURL(event.target.files[0]);
                this.image = event.target.files[0];
                console.log(output.src);
            },
        }
    });
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
    $("input[name=txt_celular]").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    //solo admitir letras
    only_letters("input[name=txt_nombre]");
    only_letters("input[name=txt_apellido]");
    only_letters("#txt_instituto");
    
</script>

@stop