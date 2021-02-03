<?php

$imagenUsuario = $_SESSION['usuarioDAW217AplicacionFinal']->imagenPerfil;

if (isset($_REQUEST['Cancelar'])) { // si se ha pulsado el boton de registrarse
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    
    header('Location: index.php');
    exit;
}


$vistaEnCurso = $vistas['importarDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>