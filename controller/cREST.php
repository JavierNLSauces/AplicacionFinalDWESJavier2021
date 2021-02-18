<?php

$_SESSION['paginaAnterior'] = $controladores['REST']; // se guarda la ruta del controlador actual en la variable de sesion 'paginaEncurso' 

$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal']; // almacenamos en la variable el usuario actual

if(isset($_REQUEST["Volver"])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


if(isset($_REQUEST["BuscarPelicula"])){
    $aDatosPelicula = RESTAjeno::consultarPelicula($_REQUEST['NombrePelicula']);
}

define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorio


if(isset($_REQUEST["GenerarImagen"])){
    $errorTextoImagen = null;
    
    $errorTextoImagen = validacionFormularios::comprobarAlfaNumerico($_REQUEST['TextoImagen'], 20, 3, OBLIGATORIO);
    if($errorTextoImagen==null){ // si no hay ningun error en el input
        $imagen = RESTAjeno::crearImagenConTexto($_REQUEST['TextoImagen']);
    }
}

if(isset($_REQUEST["ConsultarVolumenDeNegocioCristinaGET"])){
    $errorCodDepartamento = null;
    
    $errorCodDepartamento = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'], 3, 3, OBLIGATORIO);
    if($errorCodDepartamento==null){ // si no hay ningun error en el input
        $aDatosDepartamento = RESTAjeno::consultarDatosDepartamentoCristinaGET($_REQUEST['CodDepartamento']);
    }
    
}

if(isset($_REQUEST["ConsultarDatosDepartamentoPropioPOST"])){
    $errorCodDepartamento2 = null;
    $errorApiKey = null;
    
    $errorCodDepartamento2 = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento2'], 3, 3, OBLIGATORIO);
    $errorApiKey = validacionFormularios::comprobarAlfaNumerico($_REQUEST['ApiKey'], 50, 6, OBLIGATORIO);
    if($errorCodDepartamento2==null && $errorApiKey==null){ // si no hay ningun error en el input
        $aDatosDepartamento2 = RESTAjeno::consultarDatosDepartamentoPropioPOST($_REQUEST['CodDepartamento2'],$_REQUEST['ApiKey']);
    }
    
}


$vistaEnCurso = $vistas['REST']; 
require_once $vistas['layout'];

?>