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
                    
                  

                </div>
            </div>
      </section>
      <section class="content">

     
      <!--Especialidades-->
        <div style="padding : 10px 25px 25px 25px;">
        <div class="col-md-12">
                <div class="box box-danger">
                <div class="box-body">
                    <div class="row ">
                        <img id="preview" class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                        <!--  <button id="uploadImage" class="btn btn-primary btn-social btn-xs" style="margin : 30px 0px 0px 60px;">
                                                <i class="fa fa-upload"></i>
                                                <b>Subir imagen</b>
                                        </button>-->
                        <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>DNI</label>
                                <label class="control-label">{{session("users")["dni"]}}</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <label class="control-label">{{session("users")["nombre"]}}</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido</label>
                                <label class="control-label">{{session("users")["apellido"]}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Correo</label>
                                <label class="control-label">{{session("users")["correo"]}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <label class="control-label">{{session("users")["fecha_nac"]}}</label>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular:</label>
                                <label class="control-label">{{}}</label>
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
               
                </div>
                

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
     animation_title(`Informacion del {{session('users')['tipo']}}`);
  </script>
@stop