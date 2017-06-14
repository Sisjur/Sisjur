@extends('app') @section('title') Informacion @stop @section('content')
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
    <!--Especialidades-->
    <div style="padding : 5px 25px 25px 25px;">
        <div class="col-md-12">
            <form action="{{URL::asset('actualizar_from_admin')}}" method="POST" enctype="multipart/form-data" onsubmit='return comprobar()'>
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="row ">
                            <div class="col-md-4 col-md-offset-4">
                                @if(file_exists(base_path()."/public/resources/images/".$persona->dni.".jpg"))
                                <img id="preview" class="profile-user-img img-responsive img-circle" src="{{asset('resources/images').'/'.$persona->dni.'.jpg'}}"
                                    alt="User profile picture">
                                <!--  <button id="uploadImage" class="btn btn-primary btn-social btn-xs" style="margin : 30px 0px 0px 60px;">
                                                        <i class="fa fa-upload"></i>
                                                        <b>Subir imagen</b>
                                                </button>-->

                                @else
                                <img id="preview" class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/profile2.png')}}" alt="User profile picture">                                @endif

                                <br>
                                <input required id="profile_image" type="file" name="image" class="file" data-show-preview="false" onchange="load_image(event)" accept="image/jpeg">

                                <!--<input class="col-md-offset-4" type="file" accept="image/jpg" name="image" onchange="load_image(event)" style="visibility:visible;">-->
                                <br>
                            </div>


                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input required  name="dni" type="text" class="form-control" value="{{$persona->dni}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required type="text" class="form-control" name="nombre" value="{{$persona->nombre}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input required type="text" class="form-control" name="apellido" value="{{$persona->apellido}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input required type="text" class="form-control" name="correo" value="{{$persona->correo}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required type="text" name="fecha_nac" class="form-control pull-right" id="fecha_nac" value="{{$persona->fecha_nac}}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" required class="form-control" name="txt_contrasena" id="exampleInputPassword1" placeholder="Digita la contraseña"
                                        value="" >
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Celular:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input required type="text" name="celular" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="(___.___)"
                                            value="{{$persona->celular}}">
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-4 col-md-offset-4">
                                <div class="form-group " >
                                    <label for="exampleInputPassword2">Repite la contraseña</label>
                                    <input type="password" required class="form-control"  id="exampleInputPassword2" placeholder="Digita nuevamente la contraseña"
                                        value=""  data-placement="bottom" title="Las contraseñas no coinciden.">
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
                    <div class="box-footer">
                        <input type="submit" class="btn .btn-sm btn-danger" value="Actualizar">

                    </div>

                    <!-- /.box-body -->

                </div>
            </form>

        </div>

    </div>
</section>
@stop @section("scripts")
<script>
    function load_image() {
        var output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        this.image = event.target.files[0];
        console.log(output.src);
    }

    $('body').on('focus', "#fecha_nac", function () {
        $(this).datepicker({
            autoclose: true
        });
    });
    $("#profile_image").fileinput({
        showUpload: false
    });
    //mascara para celular
    $("input[name=celular]").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    //solo admitir letras
    only_letters("input[name=nombre]");
    only_letters("input[name=apellido]");
    only_letters("#txt_instituto");
    animation_title(`Informacion del cliente`);
    $('[data-toggle="tooltip"]').tooltip('show');


    function comprobar() {
           var pass1 = $("input[name=txt_contrasena]").val();
        var pass2 = $("#exampleInputPassword2").val();
        if(pass1!==pass2){
            $("#exampleInputPassword2").attr("data-toggle","tooltip");
            $("#exampleInputPassword2").tooltip("show");
            return false;
        }
        return comprobar_fecha_nac("input[name=fecha_nac]");
    }

</script>
@stop