/**
 * Created by McBro on 22/11/2016.
 */
   








/**
 * Se encarga de añadir especializacion a la tabla
 */
function anadirEspec() {


}

function tomarInfo() {
    var dni = $("input[name=txtDniAbogado]").val();
    var nombre = $("input[name=txtNombreAbogado]").val();
    var apellido = $("input[name=txtApellidoAbogado]").val();
    var correo = $("input[name=txtCorreoAbogado]").val();
    var clave = $("input[name=txtPassAbogado]").val();
    var fechaNac = $("input[name=txtFechaNacimientoAbogado]").val();
    var telefono = $("input[name=txtTelefonoAbogado]").val();
    var alma = $("input[name=txtAlmamaterAbogado]").val();
    var especialidades = $("#tabla-especialidades").dataTable().fnGetData();
    especialidades = JSON.stringify(especialidades);
    return {
        dni: dni,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        clave: clave,
        fechaNac: fechaNac,
        telefono: telefono,
        almamater: alma,
        especialidades: especialidades
    };
}


function actualizarA() {
    if (info.dni == "" || info.nombre == "" || info.apellido == "" || info.correo == "" || info.clave == "" || info.fechaNac == "" || info.telefono == "" ||
        info.almamater == "" || info.especialidades == undefined) {

    } else {
        var info = tomarInfo();
        $.ajax({
            type: "POST",
            url: "abogado/actualizar",
            data: info,
            success: function () {
                $("#msj").html('<div class="alert alert-success alert-dismissible">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' +
                    '<h4><i class="icon fa fa-check"></i>Actualizado correctamente</h4>' +
                    'Se ha actualizado con exito el abogado ' + info.nombre + "." +
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
                setTimeout(function () {
                    $("#msj").html("");
                }, 2000);
            }
        });
    }
}
function RAbogado() {

    var info = tomarInfo();
    if (info.dni == "" || info.nombre == "" || info.apellido == "" || info.correo == "" || info.clave == "" || info.fechaNac == "" || info.telefono == "" ||
        info.almamater == "" || info.especialidades == undefined) {

    } else {
        $.ajax({
            type: "POST",
            url: "abogado/registrar",
            data: info,
            success: function (data) {
                $("#msj").html('<div class="alert alert-success alert-dismissible">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' +
                    '<h4><i class="icon fa fa-check"></i>Registro correctamente</h4>' +
                    'Se ha registrado con exito el abogado ' + info.nombre + "." +
                    '</div>');
                limpiarTextAbogado();
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
                limpiarTextAbogado();
                setTimeout(function () {
                    $("#msj").html("");
                }, 2000);

            }
        });
    }

}

function limpiarTextAbogado() {
    $("input[name=txtDniAbogado]").val("");
    $("input[name=txtNombreAbogado]").val("");
    $("input[name=txtApellidoAbogado]").val("");
    $("input[name=txtCorreoAbogado]").val("");
    $("input[name=txtPassAbogado]").val("");
    $("input[name=txtFechaNacimientoAbogado]").val("");
    $("input[name=txtTelefonoAbogado]").val("");
    $("input[name=txtAlmamaterAbogado]").val("");
    $("#tabla-especialidades").dataTable().clear().draw();
}