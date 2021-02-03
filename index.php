<?php 
require_once 'config/config.php';// incluye el fichero de configuracion de la aplicacion 
require_once 'config/configDB.php'; // incluye el fichero de configuracion de la base de datos

session_start(); // inicia una sesion o recupera una anterior

if(http_response_code() != 200){ // si el codigo HTTP de respuesta es distinto de 200
    require_once $controladores['error']; // incluye el controlador de los errores
    exit;
} else {
    
    

    if(isset($_REQUEST['Tecnologias'])){ //  si se ha pulsado el boton Tecnologias
        require_once $controladores['WIP']; // incluye el controlador de Tecnologias
        exit;
    }


    if(isset($_SESSION['usuarioDAW217AplicacionFinal'])){ // si se ha iniciado sesion
        require_once $_SESSION['paginaEnCurso']; // incluye el controlador de la pagina en curso
    } else if (isset($_SESSION['paginaEnCursoSinRegistro'])){ // si no se ha iniciado sesion pero esta inicializada la variable de sesion 'paginaEnCursoSinRegistro'
        require_once $_SESSION['paginaEnCursoSinRegistro']; // incluye el controlador de la pagina en curso de usuarios sin registrar
    }else{
        require_once $controladores['login']; // incluye el controlador del login
    }
}

?>