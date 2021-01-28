<?php

if (isset($_REQUEST['Cancelar'])) { // si se ha pulsado el boton de canelar
    $_SESSION['paginaEnCurso'] = $controladores['miCuenta']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    
    header('Location: index.php');
    exit;
}

$_SESSION['paginaAnterior'] = $controladores['cambiarPassword']; // se guarda la ruta del controlador actual en la variable de sesion 'paginaAnterior' 

$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal']; //  almacenamiento de la variable se sesion en la variable



define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios

$entradaOK = true;

$aErrores = [ //declaro e inicializo el array de errores
    'Password' => null,
    'PasswordNueva' => null,
    'PasswordRepetida' => null
];


if (isset($_REQUEST["CambiarPassword"])) { // comprueba que el usuario le ha dado a al boton de IniciarSesion y valida la entrada de todos los campos

    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    $aErrores['PasswordNueva'] = validacionFormularios::validarPassword($_REQUEST['PasswordNueva'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    $aErrores['PasswordRepetida'] = validacionFormularios::validarPassword($_REQUEST['PasswordRepetida'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    
    if($_REQUEST['PasswordNueva'] != $_REQUEST['PasswordRepetida']){
        $aErrores['PasswordRepetida'] = "Las contraseñas no coinciden";
    }
    
    
    foreach ($aErrores as $campo => $error) { // recorro el array de errores
        if ($error != null) { // compruebo si hay algun mensaje de error en algun campo
            $entradaOK = false; // le doy el valor false a $entradaOK
            $_REQUEST[$campo] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }

    if($entradaOK){
        if(hash("sha256", $oUsuarioActual->codUsuario . $_REQUEST['Password']) != $oUsuarioActual->password){
            $aErrores['Password'] = "Password incorrecta";
            $_REQUEST['Password'] = "";
            $entradaOK = false;
        }
    }

    
} else { // si el usuario no le ha dado al boton de enviar
    $entradaOK = false; // le doy el valor false a $entradaOK
}

if ($entradaOK) { // si la entrada esta bien recojo los valores introducidos y hago su tratamiento

    $_SESSION['usuarioDAW217AplicacionFinal'] = UsuarioPDO::cambiarPassword($oUsuarioActual->codUsuario,$_REQUEST['PasswordNueva']); // guardamos en la variable de sesion el objeto usuario de la funcion
    $_SESSION['paginaEnCurso'] = $controladores['miCuenta']; // guardamos en la variable de sesion 'pagina' la ruta del controlador de miCuenta
    header('Location: index.php'); // redirige al index.php
    exit;

}








$vistaEnCurso = $vistas['cambiarPassword']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>