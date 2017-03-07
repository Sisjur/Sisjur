/**
 * Created by McBro on 30/11/2016.
 */
$("#avancesProceso").on("click", function () {
    $("#contenido-cabecera").html("Avance del proceso").animate({
        left: headerToLeft() +  + 300 + "px"
    }, 500);;
    abrirVista("proceso/formularioAvanceProceso");
});

function registrarEvento() {
    if ($("textarea[name=message]").val() == "") {
        $("#msj").html('<div class="alert alert-warning alert-dismissible">' +
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' +
            '<h4><i class="icon fa fa-check"></i>Datos vacios</h4>' +
            'Asegurate de digitar todos los datos ' +
            '</div>');
        setTimeout(function () {
            $("#msj").html("");
        }, 2000);
    } else {
        var dnicliente = $("input[name=dniabogado]").val();
        var dniabogado = $("input[name=dnicliente]").val();
        var dnicaso = $("input[name=dnicaso]").val();
        var mes = $("textarea[name=message]").val();
        alert(mes);
        $.ajax({
            url: "proceso/registrarAvance",
            type: "POST",
            data: {message: mes, dnicaso: dnicaso, dniabogado: dniabogado, dnicliente: dnicliente},
            success: function (data) {

            }
        });
    }
}

