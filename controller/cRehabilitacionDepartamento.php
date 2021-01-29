<?php

if(isset($_REQUEST["Cancelar"])){
    $_SESSION['paginaEnCurso'] = $controladores['mtoDepartamentos']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal'];

$imagenUsuario = $oUsuarioActual->getImagenPerfil(); // variable que tiene la imagen de perfil del usuario

$vistaEnCurso = $vistas['rehabilitacionDepartamento']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];


?>