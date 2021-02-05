<?php 

// url http://daw217.ieslossauces.es/AplicacionFinalDWESJavier2021/api/calculadora.php?num1=2&num2=3&operacion=suma

require_once '../model/RESTPropio.php'; // incluimos el modelo del Web Service

$jsonResponse = []; // inicializamos la variable


if($_SERVER['REQUEST_METHOD'] == 'GET'){ // si el metodo de peticion es GET
    if(isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])){ // si estan definidos los parametros
        if(is_numeric($_GET['num1']) && is_numeric($_GET['num2'])){ // si los numeros pasados como parametro son numericos
            $jsonResponse['Numero1'] = $_GET['num1'];
            $jsonResponse['Numero2'] = $_GET['num2'];
            $jsonResponse['Operacion'] = $_GET['operacion'];
            switch($_GET['operacion']){ // dependiendo del valor del parametro 'operacion' ejecutaremos un caso u otro
                case 'suma':
                    $jsonResponse['Suma'] = RESTPropio::sumar($_GET['num1'],$_GET['num2']);
                    break;
                case 'resta':
                    $jsonResponse['Resta'] = RESTPropio::restar($_GET['num1'],$_GET['num2']);
                    break;
                case 'multiplicacion':
                    $jsonResponse['Multiplicacion'] = RESTPropio::multiplicar($_GET['num1'],$_GET['num2']);
                    break;
                case 'division':
                    if($_GET['num2']==0){ // si el segundo parametro es cero
                        $jsonResponse['MensajeDeError'] = "No se puede dividir entre cero"; // guardamos un mensaje de error en el array
                    }else{
                        $jsonResponse['Division'] = RESTPropio::dividir($_GET['num1'],$_GET['num2']);                
                    }
                    break;
                default: // si la operacion pasada como parameto no coincide con los anteriores casos
                    $jsonResponse['MensajeDeError'] = "La operacion que solicita no se puede realizar"; // guardamos un mensaje de error en el array
                    break;
            }
        }else{
            $jsonResponse['MensajeDeError'] = "num1 y num2 deben ser numericos"; // guardamos un mensaje de error en el array
        }

    }else{
        $jsonResponse['MensajeDeError'] = "No se han pasado todos los parametros necesarios"; // guardamos un mensaje de error en el array
    }
}

header('Content-Type: application/json');  // especificamos que el contenido que vamos a devolver es de tipo JSON
echo json_encode($jsonResponse); // devuelve la representacion JSON del valor pasado como parametro
?>