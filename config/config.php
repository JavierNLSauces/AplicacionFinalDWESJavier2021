<?php
require_once "core/libreriaValidacion.php";

require_once "model/Usuario.php";
require_once "model/UsuarioDB.php";
require_once "model/UsuarioPDO.php";
require_once "model/DBPDO.php";
require_once "model/REST.php";

$controladores = [
    "login" => "controller/cLogin.php",
    "inicio" => "controller/cInicio.php",
    "tecnologias" => "controller/cTecnologias.php",
    "registro" => "controller/cRegistro.php",
    "miCuenta" => "controller/cMiCuenta.php",
    "borrarCuenta" => "controller/cBorrarCuenta.php",
    "cambiarPassword" => "controller/cCambiarPassword.php",
    "mtoDepartamentos" => "controller/cMtoDepartamentos.php",
    "altaDepartamento" => "controller/cAltaDepartamento.php",
    "bajaLogicaDepartamento" => "controller/cBajaLogicaDepartamento.php",
    "rehabilitacionDepartamento" => "controller/cRehabilitacionDepartamento.php",
    "consultarModificarDepartamento" => "controller/cConsultarModificarDepartamento.php",
    "importarDepartamentos" => "controller/cImportarDepartamentos.php",
    "eliminarDepartamento" => "controller/cEliminarDepartamento.php",
    "WIP" => "controller/cWIP.php",
    "REST" => "controller/cREST.php"
    
];

$vistas = [
    "layout" => "view/layout.php",
    "login" => "view/vLogin.php",
    "inicio" => "view/vInicio.php",
    "tecnologias" => "view/vTecnologias.php",
    "registro" => "view/vRegistro.php",
    "miCuenta" => "view/vMiCuenta.php",
    "borrarCuenta" => "view/vBorrarCuenta.php",
    "cambiarPassword" => "view/vCambiarPassword.php",
    "mtoDepartamentos" => "view/vMtoDepartamentos.php",
    "altaDepartamento" => "view/vAltaDepartamento.php",
    "bajaLogicaDepartamento" => "view/vBajaLogicaDepartamento.php",
    "rehabilitacionDepartamento" => "view/vRehabilitacionDepartamento.php",
    "consultarModificarDepartamento" => "view/vConsultarModificarDepartamento.php",
    "importarDepartamentos" => "view/vImportarDepartamentos.php",
    "eliminarDepartamento" => "view/vEliminarDepartamento.php",
    "WIP" => "view/vWIP.php",
    "REST" => "view/vREST.php"
];
?>