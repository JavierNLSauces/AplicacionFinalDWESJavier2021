<?php

// url http://daw217.sauces.local/AplicacionFinalDWESJavier2021/api/consultarDatosDepartamento.php?codDepartamento=CON

require_once '../model/RESTPropio.php'; // incluimos el modelo del Web Service

$jsonResponse = []; // inicializamos la variable

if($_SERVER['REQUEST_METHOD'] == 'GET'){ // si el metodo de peticion es GET
    if(isset($_GET['codDepartamento'])){ // si se ha pasado como parametro codDepartamento
        $codDepartamento = $_GET['codDepartamento'];
        if($codDepartamento != null){ // si el coddepartamento no es null
            if(strlen($codDepartamento)<3 || strlen($codDepartamento)>3 || !ctype_upper($codDepartamento)){ // si el codDepartamento no tiene 3 letras y esta escrito en minuscula
                $jsonResponse['MensajeDeError'] = "El formato de departamento es incorrecto debe ser de 3 letras mayusculas";  // guardamos un mensaje de error en el array
            }else{
                $aDatosDepartamento = RESTPropio::obtenerDatosDepartamento($_GET['codDepartamento']);
                if($aDatosDepartamento!=null){ // si el volumen de negocio no es null
                    $jsonResponse['CodigoDeDepartamento'] = $codDepartamento; // almacenamos el valor del codigo del departamento en el array
                    $jsonResponse['VolumenDeNegocio'] = $aDatosDepartamento['VolumenDeNegocio']; // almacenamos el valor del volumen de negocio del departamento en el array
                } else{
                    $jsonResponse['MensajeDeError'] = "No hay ningun departamento con ese codigo"; // guardamos un mensaje de error en el array
                }
            }
        }else{
            $jsonResponse['MensajeDeError'] = "No se ha establecido ningun codigo de departamento";  // guardamos un mensaje de error en el array
        }
        
    }else{
        $jsonResponse['MensajeDeError'] = "No se ha introducido ningun codigo de departamento";  // guardamos un mensaje de error en el array
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){ // si el metodo de peticion es POST
    if(isset($_POST['api_key']) ){ // si se ha introducido una api_key
        if($_POST['api_key'] == API_KEY){ // si el valor de la api_key es igual al la encriptacion en sha256 de 'DAW217'
            if(isset($_POST['codDepartamento'])){ // si se ha pasado como parametro codDepartamento
                $codDepartamento = $_POST['codDepartamento'];
                if($codDepartamento != null){ // si el coddepartamento no es null
                    if(strlen($codDepartamento)<3 || strlen($codDepartamento)>3 || !ctype_upper($codDepartamento)){ // si el codDepartamento no tiene 3 letras y esta escrito en minuscula
                        $jsonResponse['MensajeDeError'] = "El formato de departamento es incorrecto debe ser de 3 letras mayusculas";  // guardamos un mensaje de error en el array
                    }else{
                        $aDatosDepartamento = RESTPropio::obtenerDatosDepartamento($_POST['codDepartamento']);
                        if($aDatosDepartamento!=null){ // si el volumen de negocio no es null
                            $jsonResponse = $aDatosDepartamento; // almacenamos los datos del departamento en el array
                             
                        } else{
                            $jsonResponse['MensajeDeError'] = "No hay ningun departamento con ese codigo"; // guardamos un mensaje de error en el array
                        }
                    }
                }else{
                    $jsonResponse['MensajeDeError'] = "No se ha establecido ningun codigo de departamento";  // guardamos un mensaje de error en el array
                }
                
            }else{
                $jsonResponse['MensajeDeError'] = "No se ha introducido ningun codigo de departamento";  // guardamos un mensaje de error en el array
            }
        }else{
            $jsonResponse['MensajeDeError'] = "No se ha introducido api key correcta";  // guardamos un mensaje de error en el array
        }
    }else{
        $jsonResponse['MensajeDeError'] = "No se ha introducido ninguna api key";  // guardamos un mensaje de error en el array
    }
}

header('Content-Type: application/json'); // especificamos que el contenido que vamos a devolver es de tipo JSON
echo json_encode($jsonResponse); // devuleve la representacion JSON del valor pasado como parametro

?>
