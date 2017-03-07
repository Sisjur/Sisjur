function actualizarProceso(id){
    $(".content-header").html("Actualizar Procesos").animate({
        left: headerToLeft() +  + 300 + "px"
    }, 500);;
    abrirVista("proceso/formularioShowProcesos/"+id);
};
