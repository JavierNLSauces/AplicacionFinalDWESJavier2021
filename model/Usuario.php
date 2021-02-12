<?php

/**
 * Class Usuario
 *
 * Clase que se va a utilizar para crear un objeto de la clase Usuario
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @version 1.0
 */
class Usuario
{

    /**
     * Codigo del usuario 
     * 
     * @var string 
     */
    private $codUsuario;

    /**
     * Password del usuario 
     * 
     * @var string  
     */
    private $password;

    /**
     * Descripcion del usuario 
     * 
     * @var string 
     */
    private $descUsuario;

    /**
     * Numero de conexiones que ha realizado el usuario 
     * 
     * @var int 
     */
    private $numConexiones;

    /**
     * Ultima fecha y hora de la ultima conexion en formato timestamp 
     * 
     * @var int 
     */
    private $fechaHoraUltimaConexion;

    /**
     * Tipo de perfil del usuario (usuario, administrador) 
     * 
     * @var string 
     */
    private $perfil;

    /**
     * Datos de la imagen en formato binario de la base de datos
     * 
     * @var string 
     */
    private $imagenPerfil;

    /**
     * Metodo magico __construct()
     * 
     * Metodo magico del constructor de la clase Usuario
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @param string $descUsuario descripcion del usuario
     * @param int $numConexiones numero de conexiones del usuario
     * @param int $fechaHoraUltimaConexion fecha y hora de la ultima conexion del usuario en formato timestamp
     * @param string $perfil tipo de perfil del usuario
     * @param string $imagenPerfil imagen de perfil del usuario imagen en formato binario de la base de datos
     */
    function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil, $imagenPerfil)
    {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numConexiones = $numConexiones;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
        $this->imagenPerfil = $imagenPerfil;
    }

    /**
     * Metodo magico __set()
     * 
     * Metodo que devuelve el valor de un atributo
     * 
     * @param mixed $atributo atributo del que queremos obtener el valor
     * @return mixed valor del atributo que hemos pasado com parametro
     */
    function __get($atributo)
    {
        return $this->$atributo;
    }

    /**
     * Metodo magico __set()
     * 
     * Metodo que cambia el valor de un atributo
     * 
     * @param mixed $atributo atributo al cual queremos cambiarle el valor
     * @param mixed $nuevoValor nuevo valor que queremos para el atributo
     */
    function __set($atributo, $nuevoValor)
    {
        $this->$atributo = $nuevoValor;
    }
}
