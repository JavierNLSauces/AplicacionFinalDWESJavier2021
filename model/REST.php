<?php

/**
 * Class REST
 * 
 * Clase que se nos permite utilizar varios servicios API
 * 
 * 
 * @author Javier Nieto
 * @since 1.0
 * @copyright 26-01-2021
 * @version 1.0
 */
class REST {
        
    /**
     * Metodo consultarPelicula()
     * 
     * Metodo que se conecta con una API que devuelve un listado de las caracteristicas de la pelicula encontrada
     *
     * @param  string $titulo titulo de la pelicula que se quiere buscar
     * @return string[] devuelve un array con los datos de la pelicula encontrada
     */
    public static function consultarPelicula($titulo){
        $pelicula = null;

        $titulo = trim($titulo);
        $titulo = str_replace(" ","+",$titulo);

        $id_key = 'b837ae2a';
        $JSONDecodificado = json_decode(file_get_contents("http://www.omdbapi.com/?t=$titulo&apikey=$id_key"),true);
        if($JSONDecodificado['Response']=="True"){
            $pelicula = [
                'Titulo' => $JSONDecodificado['Title'],
                'Year' => $JSONDecodificado['Year'],
                'Duracion' => $JSONDecodificado['Runtime'],
                'Genero' => $JSONDecodificado['Genre'],
                'Puntuacion' => $JSONDecodificado['imdbRating']
            ];
        }
        
        return $pelicula;
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
        $imagen = null;
        
        $texto = trim($texto);
        $texto = str_replace(" ","|",$texto);

        $imagenObtenida = file_get_contents("http://ipsumimage.appspot.com/200x200,ffffff?s=10&l=$texto");
        if($imagenObtenida != null){
            $imagen = $imagenObtenida;
        }
        

        return $imagen;
    }
    
}