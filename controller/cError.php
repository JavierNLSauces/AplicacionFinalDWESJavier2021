<?php 
if(isset($_REQUEST["VolverError"])){
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

$errorCode = http_response_code();

$vistaEnCurso = $vistas['error']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>