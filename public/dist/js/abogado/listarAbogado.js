/**
 * Created by McBro on 22/11/2016.
 */
/**
 * we list the lawyers registered
 */
$("#listarAbogado").on("click", function () {
    $("#contenido-cabecera").html("Abogados Registrados").animate({
        left: headerToLeft() +  + 300 + "px"
    }, 500);;
    abrirVista("abogado/formularioListarAbogados");
});
