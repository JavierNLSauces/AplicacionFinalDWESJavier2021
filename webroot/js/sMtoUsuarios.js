var datos;

function consultarDatosUsuariosPorDescripcion(descUsuario) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    $.ajax({
        type: 'POST',
        url: '/AplicacionFinalDWESJavier2021/api/consultarDatosUsuariosPorDescripcion.php',
        data: {
            API_KEY: "7e0c8060cbc8392295f2be3a5f4f312aaed377ab5e8cb1cb01f47c2f9aa59e05",
            descUsuario: descUsuario
        },
        success: (data) => {
            if (data.error != null) {
                Toast.fire({
                    icon: 'error',
                    title: data.error
                });
            } else if (data.respuesta != null && data.respuesta.length > 0) {
                datos = data.respuesta;
                var tabla = "";
                for (let usuario = 0; usuario < datos.length; usuario++) {
                    tabla += "<tr>";
                    tabla += "<td>" + datos[usuario].CodigoDeUsuario + "</td>";
                    tabla += "<td>" + datos[usuario].DescripcionDeUsuario + "</td>";
                    tabla += "<td>" + datos[usuario].NumConexiones + "</td>";
                    var fecha = new Date(datos[usuario].FechaHoraUltimaConexion * 1000);
                    tabla += "<td>" + (fecha.toLocaleDateString() != "1/1/1970" ? fecha.toLocaleDateString() + " " + fecha.toLocaleTimeString() : "NULL") + "</td>";
                    tabla += "<td><button class='form-button' value='" + datos[usuario].CodigoDeUsuario + "' onclick='borrarUsuario(this.value)'>Eliminar</button></td>";
                    tabla += "</tr>";

                }
                document.getElementById('usuarios').innerHTML = tabla;
            }
        },
        error: (data) => {
            if(data.readyState == 4){
                Toast.fire({
                    icon: 'error',
                    title: "No se ha podido obtener datos de la pagina solicitada"
                });
            }
        }
    });
}

function borrarUsuario(codUsuario) {
    Swal.fire({
        title: 'Esta seguro de que desea borrar el usuario',
        text: "Esta es una accion irreversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Borrar Usuario'
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            $.ajax({
                type: 'POST',
                url: '/AplicacionFinalDWESJavier2021/api/borrarUsuario.php',
                data: {
                    API_KEY: "7e0c8060cbc8392295f2be3a5f4f312aaed377ab5e8cb1cb01f47c2f9aa59e05",
                    codUsuario: codUsuario
                },
                success: (data) => {
                    if (data.error != null) {
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        });
                    } else if (data.respuesta != null) {
                        Toast.fire({
                            icon: "success",
                            title: data.respuesta,
                        });
                        consultarDatosUsuariosPorDescripcion("");

                    }

                },
                error: (data) => {
                    if(data.readyState == 4){
                        Toast.fire({
                            icon: 'error',
                            title: "No se ha podido obtener datos de la pagina solicitada"
                        });
                    }
                }
            });
        }
    })

}
window.onload = () => {

    if (document.getElementById("menu-profile") != null) {
        var menuProfile = document.getElementById("menu-profile");
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

    consultarDatosUsuariosPorDescripcion("");
    $('#DescUsuario').keyup(() => {
        consultarDatosUsuariosPorDescripcion($('#DescUsuario').val());
    });

}


