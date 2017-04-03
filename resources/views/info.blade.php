@extends('app')

@section('title')
    Informacion
@stop
@section('content')
    <section class="content-header">
            <div class="row">
                <div class="col-md-4 col-sm-4" id="contenido-cabecera">

                </div>

                <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
                    @if(isset($msj))
                         <div class="alert alert-success alert-dismissible"  role="alert" style="margin-bottom : -5px;margin-top : -5px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    
                            {{$msj}}
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
                        <img id="preview" class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                        <!--  <button id="uploadImage" class="btn btn-primary btn-social btn-xs" style="margin : 30px 0px 0px 60px;">
                                                <i class="fa fa-upload"></i>
                                                <b>Subir imagen</b>
                                        </button>-->
                                        <br>
                                        <input class="col-md-offset-4" type="file" accept="image/jpg" name="image" onchange="load_image(event)" style="visibility:visible;">
                        <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>DNI</label>
                                <input required disabled="disabled" type="text" class="form-control" value="{{session("users")["dni"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required type="text" class="form-control" name="nombre" value="{{session("users")["nombre"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input required  type="text" class="form-control" name="apellido" value="{{session("users")["apellido"]}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Correo</label>
                                <input required   type="text" class="form-control" name="correo" value="{{session("users")["correo"]}}">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input required type="text" name="fecha_nac" class="form-control pull-right" id="fecha_nac" 
                                            value="{{session("users")["fecha_nac"]}}">
                                        </div>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" required  class="form-control" name="txt_contrasena" id="exampleInputPassword1" placeholder="Digita la contraseña"
                                    value="">
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
                                                <input type="text"   name="celular" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                    data-mask="(___.___)" value="{{session('users')['celular']}}">
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
                    <input type="submit" class="btn .btn-sm btn-danger" value="Actualizar" >

                </div>

                <!-- /.box-body -->
               
                </div>
        </form>

        </div>



        
         @if(session("users")["tipo"]=="abogado")
          <div class="box box-danger" >
                  <!-- /.box-header -->
                  <div class="box-body">
                    <ul class="products-list product-list-in-box">
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-50x50.gif" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">Samsung TV
                            <span class="label label-warning pull-right">$1800</span></a>
                              <span class="product-description">
                                Samsung 32" 1080p 60Hz LED Smart HDTV.
                              </span>
                        </div>
                      </li>
                      <!-- /.item -->
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-50x50.gif" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">Bicycle
                            <span class="label label-info pull-right">$700</span></a>
                              <span class="product-description">
                                26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                              </span>
                        </div>
                      </li>
                      <!-- /.item -->
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-50x50.gif" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                              <span class="product-description">
                                Xbox One Console Bundle with Halo Master Chief Collection.
                              </span>
                        </div>
                      </li>
                      <!-- /.item -->
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-50x50.gif" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">PlayStation 4
                            <span class="label label-success pull-right">$399</span></a>
                              <span class="product-description">
                                PlayStation 4 500GB Console (PS4)
                              </span>
                        </div>
                      </li>
                      <!-- /.item -->
                    </ul>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
              @endif
        </div>
    </section>
@stop

@section("scripts")
  <script>

    function load_image(){
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
    //mascara para celular
        $("input[name=txt_celular]").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        //solo admitir letras
        only_letters("input[name=txt_nombre]");
        only_letters("input[name=txt_apellido]");
        only_letters("#txt_instituto");
        animation_title(`Informacion del {{session('users')['tipo']}}`);
  </script>
@stop