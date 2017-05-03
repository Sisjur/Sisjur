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
            <form action="/actualizar" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="row ">
                        @if(file_exists(base_path()."/public/resources/images/".session("users")['dni'].".jpg"))
                            <img id="preview" class="profile-user-img img-responsive img-circle" src="{{asset('resources/images').'/'.session('users')['dni'].'.jpg'}}"
                                alt="User profile picture">
                            <!--  <button id="uploadImage" class="btn btn-primary btn-social btn-xs" style="margin : 30px 0px 0px 60px;">
                                                <i class="fa fa-upload"></i>
                                                <b>Subir imagen</b>
                                        </button>-->
                            
                        @else
                             <img id="preview" class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/profile.jpg')}}"
                                alt="User profile picture">
                        @endif
                            
                            <br>
                             <input id="profile_image" type="file" name="image" class="file" data-show-preview="false" onchange="load_image(event)" accept="image/jpg">

                            <!--<input class="col-md-offset-4" type="file" accept="image/jpg" name="image" onchange="load_image(event)" style="visibility:visible;">-->
                            <br>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input required disabled="disabled" type="text" class="form-control" value="{{session('users')['dni']}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required type="text" class="form-control" name="nombre" value="{{session('users')['nombre']}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input required type="text" class="form-control" name="apellido" value="{{session('users')['apellido']}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Correo</label>
                            <input required type="text" class="form-control" name="correo" value="{{session('users' )['correo']}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required type="text" name="fecha_nac" class="form-control pull-right" id="fecha_nac" value="{{session('users')['fecha_nac']}}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" required class="form-control" name="txt_contrasena" id="exampleInputPassword1" placeholder="Digita la contraseña"
                                        value="" data-toggle="tooltip" data-placement="bottom" title="Digita tu nueva contraseña o escribe la actual.">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Celular:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" name="celular" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="(___.___)"
                                            value="{{session('users')['celular']}}">
                                    </div>
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
             @if(session("users")["tipo"]=="abogado")
            <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Actas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Instituto</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($actas as $acta)
                    <tr>
                        <td>{{$acta->nombre}}</td>
                        <td>{{$acta->tipo_espe}}</td>
                        <td>{{$acta->descripcion}}</td>
                        <td>{{$acta->fecha}}</td>
                        <td>{{$acta->instituto}}</td>
                         <?php 
                            $new_url = explode("public",$acta->url)[1];
                         ?>
                        <td><button onclick="window.location = '{{asset($new_url)}}';" class="btn btn-primary btn-sm" data-original-title="Descargar" data-toggle="tooltip"><i class="fa fa-cloud-download"></i></button></td>
                    </tr>
                  @endforeach
                
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
          </div>
        @endif
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
        showUpload:false
    });
    //mascara para celular
    $("input[name=celular]").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    //solo admitir letras
    only_letters("input[name=nombre]");
    only_letters("input[name=apellido]");
    only_letters("#txt_instituto");
    animation_title(`Informacion del {{session('users')['tipo']}}`);
    $('[data-toggle="tooltip"]').tooltip('show');
</script>
@stop