<?php

if(isset($_REQUEST["Volver"])){
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


$vistaEnCurso = $vistas['WIP']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>