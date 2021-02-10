<?php

if (isset($_REQUEST['Cancelar'])) { // si se ha pulsado el boton de cancelar
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    
    header('Location: index.php');
    exit;
}



define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios

$entradaOK = true;


$errorPassword = null; // inicializacion de la variable de errores del passwors


if(isset($_REQUEST['BorrarCuenta'])) { // comprueba que el usuario le ha dado a al boton de IniciarSesion y valida la entrada de todos los campos
    
    $errorPassword = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    
    if(hash("sha256", $_SESSION['usuarioDAW217AplicacionFinal']->codUsuario . $_REQUEST['Password']) != $_SESSION['usuarioDAW217AplicacionFinal']->password){
        $errorPassword = "Password incorrecta";
    }
    
    
    if ($errorPassword != null) { // compruebo si hay algun mensaje de error en algun campo
        $entradaOK = false; // le doy el valor false a $entradaOK
        $_REQUEST['Password'] = ""; // si el password tiene un mensaje de error pongo $_REQUEST a null
    }

} else { // si el usuario no le ha dado al boton de enviar
    $entradaOK = false; // le doy el valor false a $entradaOK
}

if($entradaOK){
    if(UsuarioPDO::borrarUsuario($_SESSION['usuarioDAW217AplicacionFinal']->codUsuario)){
        session_destroy();
        header('Location: index.php');
        exit;
    }
}

$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal']; // almacenamos el usuario en curso en la variable

$imagenUsuario = $oUsuarioActual->imagenPerfil; // variable que tiene la imagen de perfil del usuario

$vistaEnCurso = $vistas['borrarCuenta']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>