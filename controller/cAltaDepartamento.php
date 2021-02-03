<?php

$imagenUsuario = $_SESSION['usuarioDAW217AplicacionFinal']->imagenPerfil;

if(isset($_REQUEST["Cancelar"])){
    $_SESSION['paginaEnCurso'] = $controladores['mtoDepartamentos']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


$vistaEnCurso = $vistas['altaDepartamento']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];


?>