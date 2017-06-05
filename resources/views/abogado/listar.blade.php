@extends("app") @section("title") Sisjur Abogado @stop @section("content")
<div id="listar_abogados">
  <section class="content-header">
    <div class="row">
      <div class="col-md-4 col-sm-4" id="contenido-cabecera">

      </div>

      <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
        @if (isset($msj))
        <div class="alert alert-success alert-dismissible"  role="alert" style="margin-bottom : -5px;margin-top : -5px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
            {{$msj}}
        </div>
        @endif
      
      </div>
    </div>
  </section>

  <section style="padding : 10px 25px 25px 25px;">
    <div class="box box-danger">
     
      <!-- /.box-header -->
      <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          
          <div class="row">
            <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                      aria-label="Rendering engine: activate to sort column descending" style="width: 105px;">DNI</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                      aria-label="Rendering engine: activate to sort column descending" style="width: 105px;">Imagen</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="Browser: activate to sort column ascending" style="width: 150px;">Nombre</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                      style="width: 131px;">Apellido</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Fecha Nac</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                      style="width: 101px;">Correo</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="CSS grade: activate to sort column ascending" >Telefono</th>
                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="CSS grade: activate to sort column ascending">Estado</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="CSS grade: activate to sort column ascending" >Acciones</th>
                      
                  </tr>

                </thead>
                <tbody>
                  @foreach ($listado_abogados as $abogado)

                    <tr role="row">
                      <td>{{$abogado->dni}}</td>
                      @if(file_exists(base_path()."/public/resources/images/".$abogado->dni.".jpg"))
                         <td><img src="{{asset('resources/images/').'/'.$abogado->dni}}.jpg"   class="img-circle img-sm" alt="User Image"></td> 
                          
                      @else
                        <td><img src="{{asset('dist/img/profile.jpg/')}}"  class="img-circle img-sm" alt="User Image"></td>
                      @endif
                      <td>{{$abogado->nombre}}</td>
                      <td>{{$abogado->apellido}}</td>
                      <td>{{$abogado->fecha_nac}}</td>
                      <td>{{$abogado->correo}}</td>
                      <td>{{$abogado->celular}}</td>
                      <td>
                        @if($abogado->estado=="alta")
                          <span class="label label-success">Activo</span>
                        @elseif($abogado->estado=="baja")
                          <span class="label label-danger">Inactivo</span>
                        @endif
                      </td>
                      @if(session("users")["tipo"]=="administrador")
                        <td><button title="Editar abogado" data-toggle="modal" data-target='#{{$abogado->dni}}' class="btn btn-primary  btn-sm" data-original-title="Ver información" data-toggle="tooltip" ><i class="fa fa-edit"></i></button>
                            <button title="Inactivar abogado" data-toggle="modal" data-target="#{{$abogado->dni}}2" class="btn btn-danger btn-sm" data-original-title="Eliminar abogado" data-toggle="tooltip" ><i class="fa fa-times" aria-hidden="true"></i></button>
                        </td>
                      @endif
                    </tr>
                    
                  @endforeach
                 
                </tbody>
                <tfoot>
                 
                </tfoot>
              </table>
            </div>
          </div>
          
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </section>
  @foreach($listado_abogados as $abogado)
    <div class="modal fade" tabindex="-1" role="dialog" id='{{$abogado->dni}}'>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body" style="padding:0">
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red-active">
              <h3 class="widget-user-username">{{$abogado->nombre}} {{$abogado->apellido}}</h3>
              <h5 class="widget-user-desc">Abogado</h5>
            </div>
            <div class="widget-user-image">
             @if(file_exists(base_path()."/public/resources/images/".$abogado->dni.".jpg"))
                <td><img src="{{URL::asset('resources/images/').'/'.$abogado->dni}}.jpg" style="max-width:100px;max-height:100px;" class="img-circle" alt="User Image"></td> 
                
             @else
              <td><img src="{{URL::asset('dist/img/profile.jpg/')}}"  class="img-circle img-sm" alt="User Image"></td>
             @endif
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$abogado->dni}}</h5>
                    <span class="description-text">DNI</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 border-right" style="">
                  <div class="description-block">
                    <h5 class="description-header">{{$abogado->fecha_nac}}</h5>
                    <span class="description-text">Nacimiento</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">{{$abogado->correo}}</h5>
                    <span class="description-text">Correo electronico</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$abogado->telefono}}</h5>
                    <span class="description-text">Telefono</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <form action="{{URL::asset('abogado/detalles')}}" method="POST" style="display:inline-block">
          <input type="hidden" name="id" value="{{$abogado->id}}">
           <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary">Detalles</button>
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
   <div class="modal fade" tabindex="-1" role="dialog" id='{{$abogado->dni}}2'>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          ¿Estas seguro?
        </div>
          <div class="modal-body text-center" >
            <p>Se inhabilitara al abogado, sus casos quedaran en estado de espera
              por asignacion hasta que otro abogado los tome.
            </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <form action="{{URL::asset('eliminarAbogado')}}" method="POST" style="display:inline-block">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$abogado->id}}">
            <button type="submit" class="btn btn-danger" >Inhabilitar</button>
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
@endforeach
@stop
 @section("scripts")
  <script>

    animation_title("Listado de abogados");
   

  
  </script>
@stop