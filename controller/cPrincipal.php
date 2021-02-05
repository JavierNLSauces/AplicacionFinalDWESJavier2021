<?php
$_SESSION['paginaEnCursoSinRegistro'] = $controladores['principal'];

if (isset($_REQUEST['IniciarSesion'])) { // si se ha pulsado el boton de registrarse
    $_SESSION['paginaEnCursoSinRegistro'] = $controladores['login']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["Tecnologias"])){
    $_SESSION['paginaAnterior'] = $controladores['principal'];
    $_SESSION['paginaEnCurso'] = $controladores['tecnologias']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


$vistaEnCurso = $vistas['principal']; // guardamos en la variable vistaEnCurso la vista que queremos implementar



require_once $vistas['layout'];
?> 