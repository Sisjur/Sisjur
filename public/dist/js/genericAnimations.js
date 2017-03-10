

function headerToLeft() {
    $("#contenido-cabecera").animate({
        left: "-300px"
    }, 100);
    return -300;
}

function only_letters(obj) {
    $(obj).keypress((event) => {
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 0].map((num) => {
            if (num == event.key) {
                event.preventDefault();
            }
        });
    });
}

function animation_title(title){
    $("#contenido-cabecera").html(title).animate({
        left: headerToLeft() + 300 + "px",
        opacity: 1
    }, 500);
}
