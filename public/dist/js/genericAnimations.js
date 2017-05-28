

function headerToLeft() {
    $("#contenido-cabecera").animate({
        left: "-300px"
    }, 100);
    return -300;
}

function only_letters(obj) {
    $(obj).keypress((event) => {
        if (event.keyCode != 32 && (event.keyCode < 97 || event.keyCode > 122)) {
            event.preventDefault();
        }
    });
}
function only_numbers(obj) {
    $(obj).keypress((event) => {
        if (event.keyCode < 48 || event.keyCode > 57) {
            event.preventDefault();
        }
    });
}

function animation_title(title) {
    $("#contenido-cabecera").html(title).animate({
        left: headerToLeft() + 300 + "px",
        opacity: 1
    }, 500);
}

function comprobar_fecha_nac(obj) {
    var fecha_actual = new Date();
    var fecha_selected = $(obj).val().split("/");
    fecha_selected = new Date(parseInt(fecha_selected[2]), parseInt(fecha_selected[0]) - 1, parseInt(fecha_selected[1]))
    if (fecha_selected.getTime() >= fecha_actual.getTime()) {
        $(obj).attr('data-toggle', 'tooltip');
        // $(obj).attr('data-origin-title','Fecha incorrecta');
        // $(obj).attr('data-placement','top');
        $(obj).tooltip('show');
        return false;
    }
    return true;
}
//comprobar que la fecha digitada no sea menor que la fecha actual
function comprobar_fecha_futura(obj) {
    var fecha_actual = new Date();
    var fecha_selected = $(obj).val().split("/");
    fecha_selected = new Date(parseInt(fecha_selected[2]), parseInt(fecha_selected[0]) - 1, parseInt(fecha_selected[1]))
    if (fecha_selected.getTime() <= fecha_actual.getTime()) {
        if (fecha_selected.getTime() <= fecha_actual.getTime()) {
            $(obj).attr('data-toggle', 'tooltip');
            // $(obj).attr('data-origin-title','Fecha incorrecta');
            // $(obj).attr('data-placement','top');
            $(obj).tooltip('show');
            return false;
        }
        return true;
    }
}