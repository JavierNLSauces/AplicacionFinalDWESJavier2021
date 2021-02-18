<?php

$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal']; // almacenamos en la variable el usuario actual

if(isset($_REQUEST["Volver"])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

$vistaMtoUsuarios = $vistas['mtoUsuarios'];
$vistaEnCurso = $vistas['mtoUsuarios']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>