@extends("app") @section("title") Sisjur Abogado @stop @section("content")
<div id="listar_abogados">
  <section class="content-header">
    <div class="row">
      <div class="col-md-4 col-sm-4" id="contenido-cabecera">

      </div>

      <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
        @if (session("msj"))
        <div class="alert alert-success alert-dismissible"  role="alert" style="margin-bottom : -5px;margin-top : -5px;">
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
                  @foreach ($listado_abogados as $abogado)

                    <tr role="row">
                      <td>{{$abogado->dni}}</td>
                      <td>{{$abogado->nombre}}</td>
                      <td>{{$abogado->apellido}}</td>
                      <td>{{$abogado->fecha_nac}}</td>
                      <td>{{$abogado->correo}}</td>
                      <td>{{$abogado->celular}}</td>
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

    animation_title("Listado de abogados");
   

    /**
    * Controla los form de registrar abogado (Registro informacion y registro de especialidad)
    */
    $("#ctrl-tabs").on("click", function () {
      $("#tab-abogado").removeClass("active");
      $("#tab-especialidad").addClass("active");
      $("#a-especialidad").attr("aria-expanded", "true");
      $("#a-abogado").attr("aria-expanded", "false");
    });
  </script>
@stop