<?php

require_once '../model/RESTPropio.php'; // incluimos el modelo del Web Service

header("Access-Control-Allow-Origin: ".PATH); // especificamos que cualquier puede acceder 
header('Content-Type: application/json'); // especificamos que el contenido que vamos a devolver es de tipo JSON
$jsonResponse = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // si el metodo de peticion es POST
    if (isset($_POST['API_KEY']) && API_KEY == $_POST['API_KEY']) { // si se ha pasado una clave api y es correcta
        if (isset($_POST['codUsuario'])) {
            if (RESTPropio::borrarUsuario($_POST['codUsuario'])) {
                $jsonResponse["respuesta"] = "El usuario se ha eliminado con exito";
            } else {
                $jsonResponse['error'] = "No se ha podido borrar el usuario solicitado"; // guardamos un mensaje de error en el array
            }
        }else{
            $jsonResponse['error'] = "No se ha recibido ningun codigo de usuario"; // guardamos un mensaje de error en el array
        }
    } else{
        $jsonResponse['error'] = "La clave api es incorrecta"; // guardamos un mensaje de error en el array
    }
    
}else{
    $jsonResponse['error'] = "El metodo de peticion es incorrecto debe ser 'POST'";  // guardamos un mensaje de error en el array
}
echo json_encode($jsonResponse); // devuleve la representacion JSON del valor pasado como parametro