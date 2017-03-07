/**
 * Created by McBro on 22/11/2016.
 */

$("#listarProcesos").on("click",function () {
    $("#contenido-cabecera").html("Procesos Existentes").animate({
        left: headerToLeft() +  + 300 + "px"
    }, 500);
    abrirVista("proceso/formularioListarProcesos");
});
