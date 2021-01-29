/*
    Author.- Javier Nieto Lorenzo
    Date.- 2020-01-22

*/

window.onload = () => {

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