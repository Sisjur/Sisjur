/**
 * Created by McBro on 28/11/2016.
 */
$("#registrarProceso").on("click", function () {
    $("#contenido-cabecera").html("Registro de proceso").animate({
        left: headerToLeft() +  + 300 + "px"
    }, 500);;
    abrirVista("proceso/formularioRegistrarProceso");

});


function RProceso() {
    var rad = $("input[name=rad]").val();
    var cliente = $("select[name=pro]").val();
    var tipo = $("input[name=txtTipo]").val();
    var fecha = $("input[name=txtFecha]").val();
    var juez = $("input[name=txtJuez]").val();
    var desc = $("textarea[name=txtArea]").val();
    if (rad == "" || cliente == "" || tipo == "" || fecha == "" || juez == "" || desc == "") {
        $("#msj").html(' <div class="alert alert-warning alert-dismissible">' +
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
            '<h4><i class="icon fa fa-warning"></i> ¡Datos vacios!</h4>' +
            'Asegurate de digitar toda la informacion.' +
            '</div>');
    }
    else {
        $.ajax({
            type: "POST",
            url: "proceso/registrarProceso",
            data: {rad: rad, descripcion: desc, dnicliente: cliente, tipo: tipo, fechaini: fecha, juez: juez},
            success: function (res) {
                if (res) {
                    $("#msj").html(' <div class="alert alert-success alert-dismissible">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                        '<h4><i class="icon fa fa-warning"></i> ¡Registro exito!</h4>' +
                        'Se registro correctamente el proceso.' +
                        '</div>');
                }

            },
            error: function (err) {
                $("#msj").html(' <div class="alert alert-danger alert-dismissible">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                    '<h4><i class="icon fa fa-warning"></i> ¡Ups!</h4>' +
                    'Algo ha ido mal.' +
                    '</div>');
            }
        });
    }

}