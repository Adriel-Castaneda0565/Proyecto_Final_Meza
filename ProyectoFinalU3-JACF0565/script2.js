// Función para obtener una cookie por su nombre
function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([.$?|{}()[]\/+^])/g, '\\$1') + "=([^;])"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
// Función para establecer una cookie
function setCookie(name, value, options = {}) {
    options = {
        path: '/',
        // añade cualquier opción adicional (por ejemplo, 'expires')
        ...options
    };
    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }
    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }
    document.cookie = updatedCookie;
}
document.addEventListener('DOMContentLoaded', function() {
    // Verificar si la ventana emergente ya se ha mostrado
    var popupShown = getCookie('popupShown');
    if (!popupShown) {
        // Mostrar la ventana emergente 2 segundos después de cargar la página
        var popup = document.getElementById('popup');
        setTimeout(function() {
            popup.style.display = 'block';
        }, 2000);
        // Cerrar la ventana emergente al hacer clic en el botón de cierre
        var closeBtn = document.getElementById('close-popup');
        closeBtn.onclick = function() {
            popup.style.display = 'none';
            setCookie('popupShown', 'true', { 'max-age': 3600 }); // Cookie válida por 1 hora
        }
        // Cerrar la ventana emergente al hacer clic fuera de ella
        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = 'none';
                setCookie('popupShown', 'true', { 'max-age': 3600 }); // Cookie válida por 1 hora
            }
   }
}
});