@extends("app") @section("title") Sisjur Abogado @stop @section("content")
<div id="registrar_abogado">
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
                <?php session()->forget("msj") ?>
                <div v-if="there_msj" class="alert alert-dismissible" v-bind:class=" [type_msj]" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    @{{msj}}

                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="col-md-12">
            <!-- general form elements -->
            <form role="form" action="/abogado/registrar" method="POST">
                <div class="nav-tabs-custom">



                    <!-- /.box -->


                    <!-- Nav tabs -->
                    <ul id="ml-tah" class="nav nav-tabs" role="tablist">
                        <li role="presentation" id="tab-abogado" class="active">
                            <a href="#abogado" id="a-abogado" aria-controls="home" role="tab" aria-expanded="true" data-toggle="tab">Abogado</a>
                        </li>
                        <li role="presentation" id="tab-especialidad">
                            <a href="#especializacion" id="a-especialidad" aria-controls="profile" aria-expanded="false" role="tab" data-toggle="tab">Especializacion</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="abogado">

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DNI</label>
                                            <input required type="number" class="form-control" name="txt_dni" placeholder="Digita tu identifiacion" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input required type="text" class="form-control" name="txt_nombre" placeholder="Digita el nombre" value=''>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input required type="text" class="form-control" name="txt_apellido" placeholder="Digita el apellido" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Correo</label>
                                            <input required type="email" class="form-control" name="txt_correo" id="exampleInputEmail1" placeholder="Digita el correo"
                                                value="">
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
                                                <input readonly required type="text" class="form-control pull-right" name="txt_fecha_nac" id="datepicker" value="">
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
                                                <input type="text" name="txt_celular" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="(___.___)">
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
                                <a href="#especializacion" class="btn btn-primary btn-sm" data-toggle="tab" aria-expanded="true" id="ctrl-tabs">Agregar especialización</a>
                            <div class="row" style="margin:10px 0px 0px 1px;">
                                <input type="submit" class="btn .btn-sm btn-danger" value="Registrar" style="">
                                <input type="submit" class="btn .btn-sm btn-danger" value="Actualizar" style="display: none;">
                            </div>
                                
                            </div>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="especializacion">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre</label>

                                            <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="listEsp">
                                            <option selected></option>
                                            
                                            @foreach ($especialidads as $esp)
                                                <option value="{{$esp->nombre}}">{{$esp->nombre}}</option>
                                            @endforeach
                                        

                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fecha de entrega del acta:</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input readonly type="text" class="form-control pull-right" id="txt_fecha_acta">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Universidad/Instituto</label>
                                    <input type="text" class="form-control" placeholder="Universidad/Instituto de la especialización." id="txt_instituto">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="txt_descripcion" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="esp_values"></div>

                                        <div class="modal  fade" id="modal-especialidades" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                        <h4 class="modal-title" id="gridSystemModalLabel">Especialidades</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <!-- /.box-header -->
                                                        <table class="table table-hover" id="tabla-especialidades">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Fecha</th>
                                                                    <th>Universidad/Instituto</th>
                                                                    <th>Descripción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                            </tbody>
                                                        </table>
                                                        <!-- /.box-body -->
                                                        <!-- /.box -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cerrar
                                                    </button>

                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->

                                    </div>

                                </div>
                            </div>

                            <div class="box-footer">
                                <input type="button" id="anadir-especialidad" class="btn btn-danger btn-sm" v-on:click="anadir_spec" value="Añadir Especialización">
                                <input type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-especialidades" value="Ver especialidades">
                                <div class="row" style="margin:10px 0px 0px 1px;">
                                    <input type="submit" class="btn .btn-sm btn-danger" value="Registrar" style="">
                                    <input type="submit" class="btn .btn-sm btn-danger" value="Actualizar" style="display: none;">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
               

            </form>

        </div>



    </section>
</div>
@stop @section("scripts")
<script>
    var app = new Vue({
        el: "#registrar_abogado",
        data: {
            type_msj: "alert-success",
            msj: '',
            there_msj: false
        },
        methods: {
            anadir_spec: function () {
                var nombre = $("#listEsp").val();
                var descripcion = $("#txt_descripcion").val();
                var fecha = $("#txt_fecha_acta").val();
                var universidad = $("#txt_instituto").val();
                var t = $('#tabla-especialidades').DataTable();
                t.row.add([
                    nombre,
                    fecha,
                    universidad,
                    descripcion
                ]).draw();
                if (this.check_fields_espec()) {
                    this.message("alert-success", "Haz añadido una nueva especialidad.");
                    setTimeout(function () {
                        this.msj = "";
                        this.there_msj = false;
                        this.type_msj = "";
                    }, 2000);
                    var especialidades = $("#tabla-especialidades").dataTable().fnGetData();
                    $("#esp_values").html("");
                    $("#esp_values").html(`<input type="hidden" name="especialidades" values="[${especialidades}]">`);
                    this.clear_fields_espec();
                }

            },
            message: function (type_msj, msj) {
                this.there_msj = true;
                this.type_msj = type_msj;
                this.msj = msj;
                setTimeout(function () {
                    this.there_msj = false;
                    $("#msj").html(`<div v-if="there_msj" class="alert alert-dismissible" v-bind:class=" [type_msj]" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>           
                        @{{msj}}
                    </div>`);
                }, 2000);
            },
            check_fields_espec: function () {
                var bin = true;
                if ($("#listEsp").val().length === 0) {
                    $("#listEsp").attr({ "data-toggle": "tooltip", "title": "Completa este campo", "data-placement": "top" })
                        .tooltip("show");
                    bin = false;
                }
                if ($("#txt_descripcion").val().length === 0) {
                    $("#txt_descripcion").attr({ "data-toggle": "tooltip", "title": "Completa este campo", "data-placement": "top" })
                        .tooltip("show");
                    bin = false;
                }
                if ($("#txt_fecha_acta").val().length === 0) {
                    $("#txt_fecha_acta").attr({ "data-toggle": "tooltip", "title": "Completa este campo", "data-placement": "top" })
                        .tooltip("show");
                    bin = false;
                }
                if ($("#txt_instituto").val().length === 0) {
                    $("#txt_instituto").attr({ "data-toggle": "tooltip", "title": "Completa este campo", "data-placement": "top" })
                        .tooltip("show");
                    bin = false;
                }
                return bin;
            },
            clear_fields_espec: function () {

                $("#listEsp").val("");
                $("#listEsp").removeAttr("data-toggle").removeAttr("title").removeAttr("data-placement");
                $("#txt_descripcion").val("");
                $("#txt_descripcion").removeAttr("data-toggle").removeAttr("title").removeAttr("data-placement");
                $("#txt_fecha_acta").val("");
                $("#txt_fecha_acta").removeAttr("data-toggle").removeAttr("title").removeAttr("data-placement");
                $("#txt_instituto").val("");
                $("#txt_instituto").removeAttr("data-toggle").removeAttr("title").removeAttr("data-placement");
            },
            clear_fields_abogado: function () {
                $("input[name=txt_dni]").val("");
                $("input[name=txt_nombre]").val("");
                $("input[name=txt_apellido]").val("");
                $("input[name=txt_correo]").val("");
                $("input[name=txt_contrasena]").val("");
                $("input[name=txt_fecha_nac]").val("");
                $("input[name=txt_telefono]").val("");
                $("input[name=txt_almamater]").val("");
                $("#tabla-especialidades").Datatable({ data: [] });
            }

        }
    });


    /*
        barra de titulo de el formulario
    */
    animation_title("Registro de abogado");


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