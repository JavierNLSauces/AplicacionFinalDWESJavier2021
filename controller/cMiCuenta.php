<?php

if (isset($_REQUEST['Cancelar'])) { // si se ha pulsado el boton de canelar
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['CambiarPassword'])) { // si se ha pulsado el boton de canelar
    $_SESSION['paginaEnCurso'] = $controladores['cambiarPassword']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    header('Location: index.php');
    exit;
}

$_SESSION['paginaEnCurso'] = $controladores['miCuenta']; // se guarda la ruta del controlador actual en la variable de sesion 'paginaEncurso' 

$oUsuarioActual = $_SESSION['usuarioDAW217AplicacionFinal']; //  almacenamiento de la variable se sesion en la variable


$entradaOK=true; // declaro la variable que determina si esta bien la entrada de los campos introducidos por el usuario

define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios

$aErrores = [ //declaro e inicializo el array de errores
    'DescUsuario' => null,
    'ImagenUsuario' => null
];

$imagenUsuario = null;


if (isset($_REQUEST["Editar"])) { // comprueba que el usuario le ha dado a al boton de IniciarSesion y valida la entrada de todos los campos
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO); // comprueba que la entrada del codigo de usuario es correcta

    if (!empty($_FILES['ImagenUsuario']['name'])) { // si se ha subido un archvo
        if ($_FILES['ImagenUsuario']['size'] < 5242880) { // si el tamaño del archivo es menor de 5MB
            if (($_FILES["ImagenUsuario"]["type"] == "image/jpeg") || ($_FILES["ImagenUsuario"]["type"] == "image/jpg") || ($_FILES["ImagenUsuario"]["type"] == "image/png")) { // si el tipo del archivo es correcto
                $imagenUsuario = file_get_contents($_FILES["ImagenUsuario"]['tmp_name']); // pasa el el archivo a una cadena y se guarda en la variable $imagenUsuario
            } else {
                $aErrores['ImagenUsuario'] = "Los formatos admitidos son : jpeg,jpg,png";
            }
        } else {
            $aErrores['ImagenUsuario'] = "La imagen no puede ocupar mas de 5MB";
        }
        
        
    }
    if ($aErrores['DescUsuario'] != null) { // compruebo si hay algun mensaje de error en la descripcion
        $entradaOK = false; // le doy el valor false a $entradaOK
        $_REQUEST['DescUsuario'] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
    }
    
    if ($aErrores['ImagenUsuario'] != null) { // compruebo si hay algun mensaje de error en la imagen del suario
        $entradaOK = false; // le doy el valor false a $entradaOK
    }
} else { // si el usuario no le ha dado al boton de enviar
    $entradaOK = false; // le doy el valor false a $entradaOK
}

if($entradaOK){
    $_SESSION['usuarioDAW217AplicacionFinal'] = UsuarioPDO::modificarUsuario($oUsuarioActual->codUsuario,$_REQUEST['DescUsuario'],$imagenUsuario);
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}





$vistaEnCurso = $vistas['miCuenta']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>