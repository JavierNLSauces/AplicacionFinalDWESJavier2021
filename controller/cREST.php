<?php

$_SESSION['paginaEnCurso'] = $controladores['REST']; // se guarda la ruta del controlador actual en la variable de sesion 'paginaEncurso' 

if(isset($_REQUEST["Volver"])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


if(isset($_REQUEST["BuscarPelicula"])){
    $aDatosPelicula = REST::consultarPelicula($_REQUEST['NombrePelicula']);
}

$errorTextoImagen = null;
if(isset($_REQUEST["GenerarImagen"])){
    define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorio
    $errorTextoImagen = validacionFormularios::comprobarAlfaNumerico($_REQUEST['TextoImagen'], 20, 3, OBLIGATORIO);
    if($errorTextoImagen==null){ // si no hay ningun error en el input
        $imagen = REST::crearImagenConTexto($_REQUEST['TextoImagen']);
    }
}

$vistaEnCurso = $vistas['REST']; 
require_once $vistas['layout'];

?>