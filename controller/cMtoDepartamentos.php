<?php

$imagenUsuario = $_SESSION['usuarioDAW217AplicacionFinal']->imagenPerfil;

if(isset($_REQUEST["Volver"])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["InsertarDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['altaDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["ConsultarModificarDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['consultarModificarDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["EliminarDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['eliminarDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["BajaLogicaDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['bajaLogicaDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["RehabilitacionDepartamento"])){
    $_SESSION['paginaEnCurso'] = $controladores['rehabilitacionDepartamento']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["ImportarDepartamentos"])){
    $_SESSION['paginaEnCurso'] = $controladores['importarDepartamentos']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST["ExportarDepartamentos"])){
    $_SESSION['paginaEnCurso'] = $controladores['exportarDepartamentos']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(!isset($_SESSION['BusquedaDepartamento'])){
    $_SESSION['BusquedaDepartamento'] = "";
}
if(!isset($_SESSION['CriterioBusqueda'])){
    $_SESSION['CriterioBusqueda'] = "descripcion";
}

// TODO variables sesion paginacion

$entradaOK = true;
define("OPCIONAL", 0);
$errorCodDepartamento = null;


if(isset($_REQUEST["Buscar"])){
    $errorCodDepartamento = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 255, 1, OPCIONAL);

    
    if($errorCodDepartamento != null){ // compruebo si hay algun mensaje de error 
        $entradaOK = false; // le doy el valor false a $entradaOK
        $_REQUEST['DescDepartamento'] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
    }

} else {
    $entradaOK = false;
}


if($entradaOK){
    $_SESSION['BusquedaDepartamento'] = $_REQUEST['DescDepartamento'];
    $_SESSION['CriterioBusqueda'] = $_REQUEST["BusquedaPor"];
    if($_SESSION['CriterioBusqueda']=="descripcion"){
        $aResultadoBusqueda = DepartamentoPDO::buscarDepartamentosPorDescripcion($_SESSION['BusquedaDepartamento'],1,10);
        $aDepartamentos = $aResultadoBusqueda[0];
    }else{
        $aResultadoBusqueda = DepartamentoPDO::buscarDepartamentosPorCodigo($_SESSION['BusquedaDepartamento'],1,10);
        $aDepartamentos = $aResultadoBusqueda[0];
    }
} else {
    if($_SESSION['CriterioBusqueda']=="descripcion"){
        $aResultadoBusqueda = DepartamentoPDO::buscarDepartamentosPorDescripcion($_SESSION['BusquedaDepartamento'],1,10);
        $aDepartamentos = $aResultadoBusqueda[0];
    }else{
        $aResultadoBusqueda = DepartamentoPDO::buscarDepartamentosPorCodigo($_SESSION['BusquedaDepartamento'],1,10);
        $aDepartamentos = $aResultadoBusqueda[0];
    }
}


$busquedaDepartamento = $_SESSION['BusquedaDepartamento'];
$criterioBusqueda = $_SESSION['CriterioBusqueda'];


$vistaEnCurso = $vistas['mtoDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>