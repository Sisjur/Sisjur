@extends("app") @section("title") Sisjur Abogado @stop @section("content")
<div id="listar_abogados">
  <section class="content-header">
    <div class="row">
      <div class="col-md-4 col-sm-4" id="contenido-cabecera">

      </div>

      <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
        @if (session("msj"))
        <div v-if="there_msj" class="alert alert-success alert-dismissible" v-bind:class=" [type_msj]" role="alert" style="margin-bottom : -5px;margin-top : -5px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>          {{session("msj")}}
        </div>
        @endif

      </div>
    </div>
  </section>

  <section style="padding : 10px 25px 25px 25px;">
    <div class="box">
      
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="Browser: activate to sort column ascending" style="width: 150px;">Nombre</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                      style="width: 131px;">Apellido</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Fecha Nac</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                      style="width: 101px;">Correo</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                      aria-label="CSS grade: activate to sort column ascending" style="width: 70px;">Telefono</th>
                     
                  </tr>
                </thead>
                <tbody>
                  @foreach ($listado_clientes as $cliente)

                    <tr role="row">
                      <td>{{$cliente->dni}}</td>
                      <td>{{$cliente->nombre}}</td>
                      <td>{{$cliente->apellido}}</td>
                      <td>{{$cliente->fecha_nac}}</td>
                      <td>{{$cliente->correo}}</td>
                      <td>{{$cliente->celular}}</td>
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

</div>

@stop
 @section("scripts")
  <script>

    animation_title("Listado de clientes");
   

  </script>
@stop