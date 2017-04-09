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
                            <input class="col-md-offset-4" type="file" accept="image/jpg" name="image" onchange="load_image(event)" style="visibility:visible;">
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
              <h3 class="box-title">Casos</h3>

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
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Popularity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
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
    //mascara para celular
    $("input[name=celular]").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    //solo admitir letras
    only_letters("input[name=nombre]");
    only_letters("input[name=apellido]");
    animation_title(`Informacion del {{session('users')['tipo']}}`);
    $('[data-toggle="tooltip"]').tooltip('show');
</script>
@stop