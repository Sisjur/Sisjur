@extends("app") @section("title") Sisjur Abogado @stop @section("content")
<div id="registrar_abogado">
    <section class="content-header">
        <div class="row">
            <div class="col-md-4 col-sm-4" id="contenido-cabecera">

            </div>

            <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
                @if (isset($msj))
                <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    {{$msj}}
                </div>
                @endif

            </div>
        </div>
    </section>
    <section class="content">
        <div class="col-md-12">

            <form action="/abogado/especializacion" method="post" enctype="multipart/form-data">
                <div class="box box-danger">
                <div class="box-body">
                    <input type="hidden" name="id_abogado" value="{{$abogado}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Subir acta</label>
                                <div>
                                    
                                         <input id="file" name="file"  type="file" class="file" data-show-preview="false" accept="application/msword, application/pdf">
                                        <!--<input id="file" onchange="loadFile('event')" name="file" type="file" accept="application/msword, application/pdf">-->
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo</label>

                                <select name="tipo_especialidad" class="selectpicker form-control" data-live-search="true" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                                                <option selected></option>
                                                
                                                @foreach ($especialidads as $esp)
                                                    <option data-tokens="{{$esp->nombre}}" value="{{$esp->id}}">{{$esp->nombre}}</option>
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
                                    <input v-model="fecha_acta" required type="text" class="form-control pull-right" name="tfecha_acta">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required type="text" class="form-control" placeholder="Nombre del acta" name="nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Universidad/Instituto</label>
                                <input required type="text" class="form-control" placeholder="Universidad/Instituto de la especialización." name="instituto">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" name="descripcion" rows="3" placeholder="Enter ..."></textarea>
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
                                                        <th>Tipo</th>
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
                    <input type="submit" id="registrar_especializacion" class="btn btn-danger btn-sm" value="Registrar Especialización">
                    @if(session("users")["tipo"]=="administrador")
                        <a href="/abogado/listar" class="btn btn-primary btn-sm">Seguir</a>
                    @elseif(session("users")["tipo"]=="abogado")
                        <a href="/informacion" class="btn btn-primary btn-sm">Atras</a>
                    @endif
                </div>
            </div>
            </form>
            



            <!--</form>-->







        </div>



    </section>
</div>
@stop @section("scripts")
<script>
    var count = 1;
    var acta_file;
    var actas = [];
  

    $('body').on('focus', "input[name=tfecha_acta]", function () {
        $(this).datepicker({
            autoclose: true
        });
    });
    /*
        File image
    */
    $("#file").fileinput({
        showUpload: false
    })


    /*
        File input
    */
    // $("body").on("load","#file",function(){
    //     $(this).fileinput({
    //     showUpload:false
    // });
    // })



    /*
        barra de titulo de el formulario
    */
    animation_title("Añadir especializacion");


    //Combobox de bootstrap para buscar en los selects
    $('#listEsp').selectpicker({
        size: 4
    });

    // $("#open_btn").click(function () {
    //     $.FileDialog({ multiple: true }).on('files.bs.filedialog', function (ev) {
    //         var files = ev.files;
    //         var text = "";
    //         files.forEach(function (f) {
    //             $("#form-files").append(`<div class="row">
    //                                 <div class="col-md-12">
    //                                     <div class="box box-default">
    //                                         <div class="box-header with-border">
    //                                         <h3 class="box-title">${f.name}</h3>

    //                                         <div class="box-tools pull-right">
    //                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    //                                             </button>
    //                                         </div>
    //                                         <!-- /.box-tools -->
    //                                         </div>
    //                                         <!-- /.box-header -->
    //                                         <div class="box-body" style="display: block;">
                                            
    //                                         </div>
    //                                         <!-- /.box-body -->
    //                                     </div>
    //                                 </div>
                                    
    //                             </div>`)
    //             console.log(f);
    //             text += f.name + "<br/>";
    //         });
    //         $("#output").html(text);
    //     }).on('cancel.bs.filedialog', function (ev) {
    //         $("#output").html("Cancelled!");
    //     });
    // });

</script>
@stop