/**
 * Created by miguel on 16/11/2016.
 */

/**
 * @param url
 * @param etiqueta
 */
function abrirVista(url) {

    $.get(url, function () {
        console.log('envio solicitud')
    })
    //inicia el proceso de lectura o descarga
        .done(function (data) {
            insertHtml('.content', data);
        })
        .fail(function () {

        })
        //termina todos los proceso de $.get
        //sirve para cargar js a las etiquetas agregadas dinamicamente
        .always(function () {

        });
}
// agregar codigo javascript en ejecucion
function insertHtml(id, html) {
    var ele = document.querySelector(id);
    ele.innerHTML = html;

    var codes = ele.getElementsByTagName("script");
    for (var i = 0; i < codes.length; i++) {
        eval(codes[i].text);
    }
}


