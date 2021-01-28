<?php

if(isset($_REQUEST["Volver"])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["InsertarDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['altaDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["ConsultarModificarDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['consultarModificarDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["EliminarDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['eliminarDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["BajaLogicaDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['bajaLogicaDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["RehabilitacionDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['rehabilitacionDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["ImportarDepartamentos"])){
    $_SESSION['paginaEnCurso'] = $controladores['importarDepartamentos']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["ExportarDepartamentos"])){
    $_SESSION['paginaEnCurso'] = $controladores['exportarDepartamentos']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal'];

$imagenUsuario = $oUsuarioActual->getImagenPerfil(); // variable que tiene la imagen de perfil del usuario

$vistaEnCurso = $vistas['mtoDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>