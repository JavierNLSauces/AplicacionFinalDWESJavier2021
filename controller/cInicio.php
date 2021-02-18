<?php

$_SESSION['paginaAnterior'] = $controladores['inicio']; // se guarda la ruta del controlador actual en la variable de sesion 'paginaEncurso' 


if(isset($_REQUEST['MiCuenta'])){ // si se ha pulsado el boton de Mi Cuenta
    $_SESSION['paginaEnCurso'] = $controladores['miCuenta']; // almacenamos en la variable de sesion 'pagina' la ruta del controlador de MiCuenta
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST['BorrarCuenta'])){ // si se ha pulsado el boton de Borrar Cuenta
    $_SESSION['paginaEnCurso'] = $controladores['borrarCuenta']; // almacenamos en la variable de sesion 'pagina' la ruta del controlador del BorrarCuenta
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST['REST'])){ // si se ha pulsado el boton de REST
    $_SESSION['paginaEnCurso'] = $controladores['REST']; // almacenamos en la variable de sesion 'pagina' la ruta del controlador del REST
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST['MtoDepartamentos'])){ // si se ha pulsado el boton de Mto Departamentos
    $_SESSION['paginaEnCurso'] = $controladores['mtoDepartamentos']; // almacenamos en la variable de sesion 'pagina' la ruta del controlador del MtoDepartamentos
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST['MtoUsuarios'])){ // si se ha pulsado el boton de Mto Usuarios
    $_SESSION['paginaEnCurso'] = $controladores['mtoUsuarios']; // almacenamos en la variable de sesion 'pagina' la ruta del controlador del MtoUsuarios
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal']; // almacenamos en la variable el usuario actual

if(isset($_SESSION['fechaHoraUltimaConexionAnterior'])){
    $fechaHoraUltimaConexionAnterior = $_SESSION['fechaHoraUltimaConexionAnterior']; // variable que tiene la ultima hora de conexion anterior del usuario
}


$vistaEnCurso = $vistas['inicio']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>