
/**
 * formulario de listar clientes
 */
$("#listarCliente").on("click",function () {
    $("#contenido-cabecera").html("Clientes registrados").animate({
        left: headerToLeft() +  + 300 + "px"
    }, 500);;
    abrirVista("cliente/listadoClientes");
});
/**
 * Created by McBro on 22/11/2016.
 */
