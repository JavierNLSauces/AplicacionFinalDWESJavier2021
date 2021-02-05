<?php

/**
 * Class RESTAjeno
 * 
 * Clase que se nos permite utilizar varios servicios API
 * 
 * 
 * @author Javier Nieto
 * @since 1.0
 * @copyright 26-01-2021
 * @version 1.0
 */
class RESTAjeno {
        
    /**
     * Metodo consultarPelicula()
     * 
     * Metodo que se conecta con una API que devuelve un listado de las caracteristicas de la pelicula encontrada
     *
     * @param  string $titulo titulo de la pelicula que se quiere buscar
     * @return string[] devuelve un array con los datos de la pelicula encontrada
     */
    public static function consultarPelicula($titulo){
        $aPelicula = null; // inicializamos la variable a null

        $titulo = trim($titulo); // quitamos los espacios en blanco por delante y por detras de la cadena de texto pasada como parametro
        $titulo = str_replace(" ","+",$titulo);// cambiamos los espacios entre palabras por simbolos de suma

        $id_key = 'b837ae2a'; // almacenamos el valor de la clave api para utilizar el servicio REST
        $JSONDecodificado = json_decode(file_get_contents("http://www.omdbapi.com/?t=$titulo&apikey=$id_key"),true); // almacenamos la informacion decodificada obtenida de la url como un array en la variable
        if($JSONDecodificado['Response']=="True"){ // si hay una respuesta exitosa
            $aPelicula = [ // almacenamos los datos recibidos en el array 
                'Titulo' => $JSONDecodificado['Title'],
                'Year' => $JSONDecodificado['Year'],
                'Duracion' => $JSONDecodificado['Runtime'],
                'Genero' => $JSONDecodificado['Genre'],
                'Puntuacion' => $JSONDecodificado['imdbRating']
            ];
        }
        
        return $aPelicula;
    }
    
    /**
     * Metodo crearImagenConTexto()
     *
     * Metodo que permite generar una imagen con un texto pasado como parametro
     * 
     * @param  string $texto texto que se quiere insertar en la imagen
     * @return string string de la imagen que despues se debe codificar con la funcion base64_encode() de php
     */
    public static function crearImagenConTexto($texto){
        $imagen = null; // inicializamos la variable a null
        
        $texto = trim($texto); // quitamos los espacios en blanco por delante y por detras de la cadena de texto pasada como parametro
        $texto = str_replace(" ","|",$texto); // cambiamos los espacios entre palabras por el simbolo de la barra vertical de suma

        $imagenObtenida = file_get_contents("http://ipsumimage.appspot.com/200x200,ffffff?s=10&l=$texto"); // almacenamos la informacion obtenida de la url como un array en la variable
        if($imagenObtenida != null){ // si se ha obtenido algo de la url
            $imagen = $imagenObtenida; // almacenamos el valor devuelto por la url en la variable 
        }
        

        return $imagen;
    }
        
    /**
     * Metodo consultarDatosDepartamentoCristinaGET()
     *
     * Metodo que utiliza el api rest de Cristina para obtener los datos de un departamento en 
     * base al codigo de departamento pasado como parametro
     * 
     * @param  string $codDepartamento codigo del departamento del que queremos obtener los datos
     * @return mixed[] un array vacio si no se ha podido obtener la informacion del servicio REST o un array con los datos decodificados
     */
    public static function consultarDatosDepartamentoCristinaGET($codDepartamento){
        $jsonresponse = []; // inicializamos el array vacio
        
        $JSONDecodificado = json_decode(file_get_contents("http://daw215.ieslossauces.es/AplicacionFinalDWESCristina2021/api/servicioDepartamento.php?codDepartamento=$codDepartamento"),true); // obtenemos y almacenamos los datos obtenidos en forma de array
        
        if($JSONDecodificado!=null){ // si hemos obtenido alguna informacion
            $jsonresponse = $JSONDecodificado; // almacenamos los datos obtenidos en el array
        }
        
        return $jsonresponse;
    } 
    
    /**
     * Metodo consultarDatosDepartamentoPropioPOST()
     *
     * Metodo que obtiene de un servicio REST propio los datos de un departamento en base al codigo del departamento y la clave de la clave de la api mediante el metodo POST
     * 
     * @param  string $codDepartamento codigo del departamento del que queremos obtener los datos
     * @param  string $api_key clave del servicio REST
     * @return mixed[] un array vacio si no se ha podido obtener la informacion del servicio REST o un array con los datos decodificados
     */
    public static function consultarDatosDepartamentoPropioPOST($codDepartamento, $api_key){
        $jsonresponse = [];
        
        $parametrosPOST = [ // creamos el array con los datos que vamos a enviar mediante el metodo POST
            'api_key' => hash("sha256", $api_key),
            'codDepartamento' => $codDepartamento
        ];
        
        // iniciamos una sesion cURL
        $cURLConnection = curl_init('http://daw217.ieslossauces.es/AplicacionFinalDWESJavier2021/api/consultarDatosDepartamento.php');
        // indicamos que queremos que los parametros sean enviados por post y pasamos como parametro el array de los datos a enviar
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $parametrosPOST); 
        // indicamos que queremos que al ejecutar la sesion cURL queremos que nos devuelva como un string la respuesta
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        // ejecutamos la sesion cURL
        $apiResponse = curl_exec($cURLConnection);
        // cerramos la sesion cURL
        curl_close($cURLConnection);
        
        $JSONDecodificado = json_decode($apiResponse); // decodificamos la respuesta que nos ha devuelto la ejecucion de la sesion cURL
        
        if($JSONDecodificado!=null){ // si hemos obtenido alguna informacion
            $jsonresponse = $JSONDecodificado; // almacenamos los datos obtenidos en el array
        }

        return $jsonresponse;
    } 


    
}