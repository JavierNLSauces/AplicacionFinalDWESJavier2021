<?php

if (isset($_REQUEST['Cancelar'])) { // si se ha pulsado el boton de registrarse
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    
    header('Location: index.php');
    exit;
}


$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal'];

$imagenUsuario = $oUsuarioActual->getImagenPerfil(); // variable que tiene la imagen de perfil del usuario

$vistaEnCurso = $vistas['importarDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>