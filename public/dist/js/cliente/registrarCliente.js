/**
 * formulario de registrar cliente
 */
$("#registrarCliente").on("click", function () {
    $("#contenido-cabecera").html("Registrar Cliente").animate({
        left: headerToLeft() +  + 300 + "px"
    }, 500);;
    abrirVista("cliente/formularioRegistrarCliente");
});
/**
 * Created by McBro on 22/11/2016.
 */

function tomarInfoCliente() {
    var dni = $("input[name=txtDniCliente]").val();
    var nombre = $("input[name=txtNombreCliente]").val();
    var apellido = $("input[name=txtApellidoCliente]").val();
    var correo = $("input[name=txtCorreoCliente]").val();
    var clave = $("input[name=txtPassCliente]").val();
    var fechaNac = $("input[name=txtFechaNacimientoCliente]").val();
    var telefono = $("input[name=txtTelefonoCliente]").val();
    return {
        dni: dni,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        clave: clave,
        fechaNac: fechaNac,
        telefono: telefono
    };
}
function RCliente() {
    var info = tomarInfoCliente();
    $.ajax({
        type: "POST",
        url: "cliente/registrar",
        data: info,
        success: function (data) {
            $("#msj").html('<div class="alert alert-success alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' +
                '<h4><i class="icon fa fa-check"></i>Registró correctamente</h4>' +
                'Se ha registrado con exito el cliente' + info.nombre + "." +
                '</div>');
            limpiarTextCliente();
            setInterval(function () {
                $("#msj").html("");
            }, 2000);
        },
        error: function (err) {
            $("#msj").html('<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4><i class="icon fa fa-ban"></i> ¡Ups!</h4>' +
                'Algo ha ido mal, comprueba tu conexion a internet.' +
                '</div>');
            limpiarTextCliente();
            setInterval(function () {
                $("#msj").html("");
            }, 2000);
        }
    });
}
function ACliente() {
    var info = tomarInfoCliente();

    $.ajax({
        type: "POST",
        url: "cliente/actualizar",
        data: info,
        success: function (data) {
            $("#msj").html('<div class="alert alert-success alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' +
                '<h4><i class="icon fa fa-check"></i>Actualizado correctamente</h4>' +
                'Se ha actualizado con exito el cliente' + info.nombre + "." +
                '</div>');
            setTimeout(function () {
                $("#msj").html("");
            }, 2000);
        },
        error: function (err) {
            $("#msj").html('<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4><i class="icon fa fa-ban"></i> ¡Ups!</h4>' +
                'Algo ha ido mal, comprueba tu conexion a internet.' +
                '</div>');
            setInterval(function () {
                $("#msj").html("");
            }, 2000);
        }
    });
}

function limpiarTextCliente() {
    $("input[name=txtDniCliente]").val("");
    $("input[name=txtNombreCliente]").val("");
    $("input[name=txtApellidoCliente]").val("");
    $("input[name=txtCorreoCliente]").val("");
    $("input[name=txtPassCliente]").val("");
    $("input[name=txtFechaNacimientoCliente]").val("");
    $("input[name=txtTelefonoCliente]").val("");
}