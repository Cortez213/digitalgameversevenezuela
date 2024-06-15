var mainHeader = document.getElementById('main-header');
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        mainHeader.style.top = "0";
    } else {
        mainHeader.style.top = "-200px"; // Asegúrate de que este valor es igual a la altura de tu encabezado
    }
    prevScrollpos = currentScrollPos;
}




