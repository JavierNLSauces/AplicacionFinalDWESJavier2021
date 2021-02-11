/*
    Author.- Javier Nieto Lorenzo
    Date.- 2020-01-22

*/

var aInputs;

function escribirMensajeError(posicion, mensaje) {
    var elementoPadre = aInputs[posicion][0].parentNode.parentNode;
    var elementError = elementoPadre.getElementsByClassName("error")[0];
    console.log(elementError);


    if (elementError != undefined) {
        elementError.innerHTML = mensaje;
    } else {
        if (mensaje != null) {
            var nodo = document.createElement("span");
            nodo.setAttribute("class", "error");
            nodo.appendChild(document.createTextNode(mensaje));
            elementoPadre.appendChild(nodo);
        }

    }
}

/* ----------------------- FUNCIONES DE VALIDACION ----------------------- */

function validarCampoNoVacio(posicion, tipo) {

    if (aInputs[posicion][0].value == null || aInputs[posicion][0].value.trim().length == 0) {
        if (tipo == "obligatorio") {
            aInputs[posicion][1] = "Campo vacio";
            escribirMensajeError(posicion, aInputs[posicion][1]);
        }
        return false;
    }

    aInputs[posicion][1];
    return true;
}

function validarAlfabetico(posicion, mensaje) {
    var campo = aInputs[posicion][0].value
    for (var letra = 0; letra < campo.length; letra++) {
        if (!isNaN(campo[letra])) {
            if (mensaje == null) {
                aInputs[posicion][1] = "El campo debe ser alfabetico";
            } else {
                aInputs[posicion][1] = mensaje;
            }

            escribirMensajeError(posicion, aInputs[posicion][1]);

            return false;
        }

    }

    return true;
}

function validarNumerico(posicion, mensaje) {
    if (isNaN(aInputs[posicion][0].value)) {
        if (mensaje == null) {
            aInputs[posicion][1] = "El campo debe ser numerico";
        } else {
            aInputs[posicion][1] = mensaje;
        }
        escribirMensajeError(posicion, aInputs[posicion][1])
        return false;
    }

    return true;
}

function validarLongitud(posicion, max_longitud, min_longitud, mensaje_max_longitud, mensaje_min_longitud) {
    if (aInputs[posicion][0].value.length < min_longitud) {
        if (mensaje_min_longitud == null) {
            aInputs[posicion][1] = `La longitud del campo es menor de ${min_longitud} caracteres`;
        } else {
            aInputs[posicion][1] = mensaje_min_longitud;
        }

        escribirMensajeError(posicion, aInputs[posicion][1]);
        return false;
    } else if (max_longitud != null && aInputs[posicion][0].value.length > max_longitud) {
        if (mensaje_max_longitud == null) {
            aInputs[posicion][1] = `La longitud del campo es mayor de ${max_longitud} caracteres`;
        } else {
            aInputs[posicion][1] = mensaje_max_longitud;
        }

        escribirMensajeError(posicion, aInputs[posicion][1]);
        return false;
    }

    return true;
}

/* ----------------------- FUNCIONES DE VALIDACION DE CAMPOS ----------------------- */

function validarCodUsuario(posicion) {
    if (!validarCampoNoVacio(posicion, "obligatorio")) {
        return false;
    } else if (!validarLongitud(posicion, 15, 3, null, null)) {
        return false;
    }
    escribirMensajeError(posicion, null)
    aInputs[posicion][1] = null;
    return true;
}

function validarDescUsuario(posicion) {
    if (!validarCampoNoVacio(posicion, "obligatorio")) {
        return false;
    } else if (!validarLongitud(posicion, 255, 3, null, null)) {
        return false;
    }
    escribirMensajeError(posicion, null)
    aInputs[posicion][1] = null;
    return true;
}

function validarPassword(posicion) {
    if (!validarCampoNoVacio(posicion, "obligatorio")) {
        return false;
    } else if (!validarAlfabetico(posicion, null)) {
        return false;
    } else if (!validarLongitud(posicion, 8, 1, null, null)) {
        return false;
    }
    escribirMensajeError(posicion, null)
    aInputs[posicion][1] = null;
    return true;
}

function validarPasswordRepetida(posicion) {
    if (!validarCampoNoVacio(posicion, "obligatorio")) {
        return false;
    } else if (!validarAlfabetico(posicion, null)) {
        return false;
    } else if (!validarLongitud(posicion, 8, 1, null, null)) {
        return false;
    } else if (aInputs[posicion - 1][0].value !== aInputs[posicion][0].value) {
        aInputs[posicion][1] = "Las contraseñas no coinciden";
        escribirMensajeError(posicion, aInputs[posicion][1]);
        return false;
    }

    escribirMensajeError(posicion, null)
    aInputs[posicion][1] = null;
    return true;
}




/* ----------------------- FUNCION VALIDACION DE FORMULARIO ----------------------- */

function validarFormulario() {
    validarCodUsuario(1);
    validarCodUsuario(0);
    validarDescUsuario(1);
    validarPassword(2);
    validarPasswordRepetida(3);

    for (var i = 0; i < aInputs.length; i++) {
        if (aInputs[i][1] != null) {
            return false;
        }
    }
    return true;
}


window.onload = () => {
    if (document.getElementById("main-registro") != null) {
        aInputs = new Array(4);
        for (var i = 0; i <= 4; i++) {
            aInputs[i] = new Array(2);
            aInputs[i][1] = null;
        }

        aInputs[0][0] = document.getElementById("CodUsuario");
        aInputs[1][0] = document.getElementById("DescUsuario");
        aInputs[2][0] = document.getElementById("Password");
        aInputs[3][0] = document.getElementById("PasswordRepetida");



        aInputs[0][0].onblur = () => {
            validarCodUsuario(0);
        };
        aInputs[1][0].onblur = () => {
            validarDescUsuario(1);
        };
        aInputs[2][0].onblur = () => {
            validarPassword(2);
        };
        aInputs[3][0].onblur = () => {
            validarPasswordRepetida(3);
        };

        document.getElementById('form-registro').onsubmit = () => {
            return validarFormulario();
        }
    } else {



        var menuProfile = document.getElementById("menu-profile");
        if (menuProfile != null) {
            var fotoPerfil = document.getElementById("fotoPerfil");
            fotoPerfil.addEventListener("click", () => {
                var menu_profile = document.getElementById("menu-profile");
                if (menu_profile.style.display == "none" || menu_profile.style.display == "") {
                    menu_profile.style.display = "flex";
                } else {
                    menu_profile.style.display = "none";
                }
            });
        }

        var mainInicio = document.getElementById("main-inicio");
        if (mainInicio != null) {
            mainInicio.addEventListener("click", () => {
                if (menuProfile != null && menuProfile.style.display == "flex") {
                    menuProfile.style.display = "none";
                }
            });
        }


        var boxAppInfo = document.getElementById("app-info-box");
        if (boxAppInfo != null) {
            var appInfoButon = document.getElementById("app-info-button");
            appInfoButon.addEventListener("click", () => {
                var menu_app_info = document.getElementById("app-info-box");
                if (menu_app_info.style.transform == "translateY(-150%)" || menu_app_info.style.transform == "") {
                    menu_app_info.style.transform = "translateY(0%)";
                } else {
                    menu_app_info.style.transform = "translateY(-150%)";
                }
            });
        }

        var mainLogin = document.getElementById("main-login");
        if (mainLogin != null) {
            document.getElementById("main-login").addEventListener("click", () => {
                if (boxAppInfo != null && boxAppInfo.style.transform == "translateY(0%)") {
                    boxAppInfo.style.transform = "translateY(-150%)";
                }
            });
        }
    }
}