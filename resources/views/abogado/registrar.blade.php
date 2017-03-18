@extends("app") @section("title") Sisjur Abogado @stop @section("content")
<div id="registrar_abogado">
    <section class="content-header">
        <div class="row">
            <div class="col-md-4 col-sm-4" id="contenido-cabecera">

            </div>

            <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
                
               

            </div>
        </div>
    </section>
    <section class="content">
        <div class="col-md-12">
            <div class="nav-tabs-custom">

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
                        <form role="form" method="POST" action="/abogado/registrar" id="form" enctype="multipart/form-data" >
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="box-body">
                                <div class="row ">
                                    <img id="preview" class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg"  alt="User profile picture">
                                    <!--  <button id="uploadImage" class="btn btn-primary btn-social btn-xs" style="margin : 30px 0px 0px 60px;">
                                                <i class="fa fa-upload"></i>
                                                <b>Subir imagen</b>
                                        </button>-->
                                    <br>
                                    <input class="col-md-offset-4" type="file" accept="image/jpg" name="image" v-on:change="loadImage(event)" style="visibility:visible;">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DNI</label>
                                            <input required type="number"  class="form-control" name="txt_dni" placeholder="Digita tu identifiacion"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input required type="text" class="form-control" name="txt_nombre" placeholder="Digita el nombre" value=''>
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

                                <a href="#especializacion" class="btn btn-primary btn-sm" data-toggle="tab" aria-expanded="true" id="ctrl-tabs">Agregar especialización</a>

                                <input type="submit" class="btn .btn-sm btn-danger" value="Actualizar" style="display: none;">

                            </div>
                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="especializacion">
                        <form role="form" id="form-especialidad" v-on:submit="validar_especializacion">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Subir acta</label>
                                            <div>
                                                <!-- <button id="uploadFile" class="btn btn-primary btn-social btn-xs">
                                                        <i class="fa fa-upload"></i>
                                                        <b>Subir Acta</b>
                                                    </button>-->
                                                <input required type="file" id="file" accept="application/msword, application/pdf" v-on:change="loadFile(event)" style="visibility:visible;">
                                            </div>

                                        </div>
                                    </div>

                                </div>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha de entrega del acta:</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input v-model="fecha_acta" required type="text" class="form-control pull-right" id="txt_fecha_acta">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Universidad/Instituto</label>
                                    <input required type="text" v-model="instituto_acta" class="form-control" placeholder="Universidad/Instituto de la especialización."
                                        id="txt_instituto">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" v-model="descripcion_acta" id="txt_descripcion" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">


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
                                <input type="submit" id="anadir-especialidad" class="btn btn-danger btn-sm" value="Añadir Especialización">
                                <input type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-especialidades" value="Ver especialidades">
                                <div class="row" style="margin:10px 0px 0px 1px;">
                                    <input type="button" class="btn .btn-sm btn-danger" onclick="click_registrar()" value="Registrar" style="">
                                    <input type="submit" class="btn .btn-sm btn-danger" value="Actualizar" style="display: none;">
                                </div>
                            </div>
                        </form>

                    </div>



                </div>
            </div>



        </div>



    </section>
</div>
@stop @section("scripts")
<script>
    var actas = [];
    var app = new Vue({
        el: "#registrar_abogado",
        data: {
            acta_file: {},
            fecha_acta: "",
            instituto_acta: "",
            descripcion_acta: ""
        },
        methods: {
            validar_especializacion: function () {
                event.preventDefault();
                var acta = {
                    file: this.acta_file,
                    tipo: $("#listEsp").val(),
                    fecha: $("#txt_fecha_acta").val(),
                    instituto: this.instituto_acta,
                    descripcion: this.descripcion_acta
                };
                var t = $('#tabla-especialidades').DataTable();
                t.row.add([acta.tipo, acta.fecha, acta.instituto, acta.descripcion]).draw();
                actas.push(acta);
                this.clear_fields_espec();
                this.message("alert-success","Se añadio correctamente una especializacion.");
            },
            loadFile: function () {
                this.acta_file = event.target.files[0];
            },
            loadImage: function () {
                var output = document.getElementById('preview');
                output.src = URL.createObjectURL(event.target.files[0]);
                this.image = event.target.files[0];
                console.log(output.src);
            },
            message: function (type_msj, msj) {
                 $("#msj").html(
                    `<div  class="alert ${type_msj} alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ${msj}
                        </div>`
                );
                setTimeout(function () {
                    $("#msj").html('');
                }, 2000)
            },
            // check_fields_espec: function () {
            //     var bin = true;
            //     if ($("#listEsp").val().length === 0) {
            //         $("#listEsp").attr({
            //                 "data-toggle": "tooltip",
            //                 "title": "Completa este campo",
            //                 "data-placement": "top"
            //             })
            //             .tooltip("show");
            //         bin = false;
            //     }
            //     if ($("#txt_descripcion").val().length === 0) {
            //         $("#txt_descripcion").attr({
            //                 "data-toggle": "tooltip",
            //                 "title": "Completa este campo",
            //                 "data-placement": "top"
            //             })
            //             .tooltip("show");
            //         bin = false;
            //     }
            //     if ($("#txt_fecha_acta").val().length === 0) {
            //         $("#txt_fecha_acta").attr({
            //                 "data-toggle": "tooltip",
            //                 "title": "Completa este campo",
            //                 "data-placement": "top"
            //             })
            //             .tooltip("show");
            //         bin = false;
            //     }
            //     if ($("#txt_instituto").val().length === 0) {
            //         $("#txt_instituto").attr({
            //                 "data-toggle": "tooltip",
            //                 "title": "Completa este campo",
            //                 "data-placement": "top"
            //             })
            //             .tooltip("show");
            //         bin = false;
            //     }

            //     return bin;
            // },
            clear_fields_espec: function () {

                $("#listEsp").val("");
                $("#txt_descripcion").val("");
                $("#txt_fecha_acta").val("");
                $("#txt_instituto").val("");
                $("#file").val("");
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
                $("#tabla-especialidades").Datatable({
                    data: []
                });
            }

        }
    });

    $("#form").submit(function(e){
        e.preventDefault();
        var form = new FormData($("#form")[0]);
        
        var actas2 = JSON.stringify(actas);

        console.log(actas);
        form.append("actas",actas2);
        console.log(actas2);
        $.ajax({
                    url: "/abogado/registrar",
                    data: form,
                    type: "POST",
                    mimeTypes:"multipart/form-data",
                    contentType : false,
                    processData : false,
                    success: function (msj) {
                        $("#msj").html(
                            `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${msj}
                                </div>`
                        );
                        setTimeout(function () {
                            $("#msj").html('');
                        }, 2000)
                    },
                    error: function (e) {
                         $("#msj").html(
                            `<div  class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    ${e}
                                </div>`
                        );
                        setTimeout(function () {
                            $("#msj").html('');
                        }, 2000)
                    }
                });
    });


    //trigger para dar click al boton de subir imagen
    $("#uploadImage").click(function () {
        $("input[name=image]").trigger("click");
    });


    //trigger para dar click al boton de subir acta
    $("#uploadFile").click(function () {
        $("#file").trigger("click");
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
    $("input[name=txt_celular]").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    //solo admitir letras
    only_letters("input[name=txt_nombre]");
    only_letters("input[name=txt_apellido]");
    only_letters("#txt_instituto");


    //hace click en el boton de registrar original
    function click_registrar() {
        $("#registrar").trigger("click");
    }

    // function toJSON(array){
    //     var actas = [];
    //     for(i in array){
    //         var json = {
    //         'lastModified'     : array[i].file.lastModified,
    //         'lastModifiedDate' : array[i].file.lastModifiedDate,
    //         'name'             : array[i].file.name,
    //         'size'             : array[i].file.size,
    //         'type'             : array[i].file.type
    //         }
    //         var jsonInfo = {"fecha" : array[i].fecha,"descripcion" : array[i].descripcion,"instituto":array[i].instituto,"tipo":array[i].tipo};

    //         var vec = [jsonInfo,json];
    //         actas.push(JSON.stringify(vec));
    //     }
    //     return actas;
    // }
</script>
@stop