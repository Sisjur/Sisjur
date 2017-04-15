@extends("app") @section("title") Sisjur Abogado @stop @section("content")
<div id="registrar_abogado">
    <section class="content-header">
        <div class="row">
            <div class="col-md-4 col-sm-4" id="contenido-cabecera">

            </div>

            <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
                 @if (isset($msj))
                <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
                                 {{$msj}}
                </div>
                @endif
               

            </div>
        </div>
    </section>
    <section class="content">
        <div class="col-md-12">
                <div class="box box-danger">
                    <!-- /.box-header -->
                    <div class="box-body" style="display: block;">
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
                                         <input id="file-image" name="image" type="file" class="file" data-show-preview="false" v-on:change="loadImage(event)" accept="image/jpg">

                                    <!--<input class="col-md-offset-4" type="file" accept="image/jpg" name="image" v-on:change="loadImage(event)" style="visibility:visible;">-->
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


                            </div>


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input type="submit" class="btn .btn-sm btn-danger" id="registrar" value="Registrar" style="">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
             

                        




        </div>



    </section>
</div>
@stop @section("scripts")
<script>
   
   


    // $("#form").submit(function(e){
    //     e.preventDefault();
    //     var form = new FormData($("#form")[0]);
    //     var actas2 = JSON.stringify(actas);
        
    //     // files.forEach(function(val,index){
    //     //     form.append(actas[index].file,val);
    //     // });
    //     form.append("actas",actas2);
    //     console.log(actas2);
    //     console.log(form);
    //     $.ajax({
    //                 url: "/abogado/registrar",
    //                 data: form,
    //                 dataType:"text",
    //                 type: "POST",
    //                 mimeTypes:"multipart/form-data",
    //                 contentType : false,
    //                 processData : false,
    //                 success: function (msj) {
    //                     $("#msj").html(
    //                         `<div  class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
    //                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    //                                 ${msj}
    //                             </div>`
    //                     );
    //                     setTimeout(function () {
    //                         $("#msj").html('');
    //                     }, 2000)
    //                 },
    //                 error: function (e) {
    //                      $("#msj").html(
    //                         `<div  class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
    //                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    //                                 ${e}
    //                             </div>`
    //                     );
    //                     setTimeout(function () {
    //                         $("#msj").html('');
    //                     }, 2000)
    //                 }
    //             });
    // });

    $('body').on('focus', "input[name=txt_fecha_nac]", function () {
        $(this).datepicker({
            autoclose: true
    });
    });
  
    $("#file-image").fileinput({
            showUpload :false
        })
    
    
    /*
        File input
    */
    // $("body").on("load","#file",function(){
    //     $(this).fileinput({
    //     showUpload:false
    // });
    // })
    
    // $("#registrar").click(function(){
    //     $(this).attr("disabled","disabled");
    // });

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
    //Combobox de bootstrap para buscar en los selects
    $('#listEsp').selectpicker({
        size: 4
    });

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