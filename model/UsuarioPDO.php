<?php

/**
 * Class UsuarioPDO
 *
 * Clase cuyos metodos hacen consultas a la tabla T_01Usuario de la base de datos
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @version 1.0
 */
class UsuarioPDO implements UsuarioDB{
    
    /**
     * Metodo validarUsuario()
     * 
     * Metodo que valida si existe un determinado usuario y password en la base de datos.
     * Si existe el usuario actualiza la ultima conexion y el numero de conexiones de ese usuario y lo devuelve.
     * Si no existe el usuario devuelve null.
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @return mixed[] Si existe, un array con un objeto de tipo Usuario con los datos de la base de datos y la fechaHoraUltimaConexionAnterior. Si no existe null.
     */
    public static function validarUsuario($codUsuario, $password){
        $oUsuario = null; // inicializo la variable que tendrá el objeto de clase ususario en el casod e que se encuentre en la base de datos
        
        // comprueba que el usuario y el password introducido existen en la base de datos
        $consulta = "Select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?";
        $passwordEncriptado=hash("sha256", ($codUsuario.$password)); // enctripta el password pasado como parametro
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario,$passwordEncriptado]); // guardo en la variable resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
        
        if($resultadoConsulta->rowCount()>0){ // si la consulta me devuleve algun resultado
            $oUsuarioConsulta = $resultadoConsulta->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
            
            $fechaHoraUltimaConexionAnterior = $oUsuarioConsulta->T01_FechaHoraUltimaConexion; // almacenamos en la variable la ultima conexion del usuario antes de actualizarla

            // actualiza la ultima fecha de conexion
            $consultaActualizacionFechaConexion = "Update T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
            $resultadoActualizacionFechaConexion = DBPDO::ejecutaConsulta($consultaActualizacionFechaConexion, [time(),$codUsuario]);
            
            if($resultadoActualizacionFechaConexion){
                // instanciacion de un objeto Usuario con los datos del usuario
                $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones+1, time() , $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
            }
        }
        
        return [$oUsuario, $fechaHoraUltimaConexionAnterior];
    }

    /**
     * Metodo altaUsuario()
     * 
     * Metodo que da de alta en la base de datos a un nuevo usuario
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @param string $descripcion descripcion del usuario
     * @return null|\Usuario devuelve un objeto de tipo Usuario con los datos guardados en la base de datos y null si no se ha podido dar de alta
     */
    public static function altaUsuario($codUsuario, $password, $descripcion){
        $oUsuario = null;

        $consulta = "Insert into T01_Usuario (T01_CodUsuario, T01_DescUsuario, T01_Password , T01_NumConexiones, T01_FechaHoraUltimaConexion) values (?,?,?,1,?)";
        $passwordEncriptado=hash("sha256", ($codUsuario.$password)); // enctripta el password pasado como parametro
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $descripcion, $passwordEncriptado,  time()]);

        
        $consultaDatosUsuario = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultadoDatosUsuario = DBPDO::ejecutaConsulta($consultaDatosUsuario, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
        
        if($resultadoDatosUsuario->rowCount()>0){ // si la consulta me devuelve algun resultado
            $oUsuarioConsulta = $resultadoDatosUsuario->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
            // instanciacion de un objeto Usuario con los datos del usuario
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
        }

        return $oUsuario;
    }
    
    /**
     * Metodo modificarUsuario()
     *
     * Metodo que modifica el valor de la descripcion del usuarios. 
     * Si el valor del parametro de la imagen no es null modifica tambien la imagen de perfil del usuario.
     * 
     * @param  string $codUsuario codigo del usuario que quremos modificar
     * @param  string $descUsuario nueva descripcion del usuario
     * @param  string $imagenPerfil nueva imagen de perfil
     * @return null|\Usuario devuelve un objeto de tipo Usuario con los datos guardados en la base de datos y null si no se ha podido modificar
     */
    public static function modificarUsuario($codUsuario,$descUsuario,$imagenPerfil){
        $oUsuario = null;

        $consulta = "Update T01_Usuario set T01_DescUsuario=?". (($imagenPerfil!=null) ? ", T01_ImagenUsuario=?" : "") . " where T01_CodUsuario=?";

        if($imagenPerfil!=null){
            $parametros = [$descUsuario, $imagenPerfil, $codUsuario];
        }else{
            $parametros = [$descUsuario, $codUsuario];
        }

        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, $parametros); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta
        
        if($resultadoConsulta){ // si se ha ejecutado la consulta correctamente
            $consultaDatosUsuario = "Select * from T01_Usuario where T01_CodUsuario=?";
            $resultadoDatosUsuario = DBPDO::ejecutaConsulta($consultaDatosUsuario, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
            
            if($resultadoDatosUsuario->rowCount()>0){ // si la consulta me devuelve algun resultado
                $oUsuarioConsulta = $resultadoDatosUsuario->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
                // instanciacion de un objeto Usuario con los datos del usuario
                $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
            }
        }

        return $oUsuario;
    }

    
    /**
     * Metodo cambiarPassword()
     * 
     * Metodo que cambia el password del usuario pasado como parametro
     *
     * @param  string $codUsuario codigo de usuario del usuario al que queremos cambiar el password
     * @param  string $passwordNueva nueva password que se quiere poner al usuario
     * @return null|\Usuario devuelve un objeto de tipo Usuario con los datos guardados en la base de datos y null si no se ha podido modificar el password
     */
    public static function cambiarPassword($codUsuario, $passwordNueva){
        $oUsuario = null;

        $consulta = "Update T01_Usuario set T01_Password=? where T01_CodUsuario=?";
        $passwordEncriptado = hash("sha256", $codUsuario.$passwordNueva); // encripta el password pasado como parametro
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$passwordEncriptado,$codUsuario]);

        if($resultadoConsulta){
            $consultaDatosUsuario = "Select * from T01_Usuario where T01_CodUsuario=?";
            $resultadoDatosUsuario = DBPDO::ejecutaConsulta($consultaDatosUsuario, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
            
            if($resultadoDatosUsuario->rowCount()>0){ // si la consulta me devuelve algun resultado
                $oUsuarioConsulta = $resultadoDatosUsuario->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
                // instanciacion de un objeto Usuario con los datos del usuario
                $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
            }
        }

        return $oUsuario;
    }

        
    /**
     * Metodo borrarUsuario()
     * 
     * Metodo que elimina un usuario de la base de datos
     *
     * @param  string $codUsuario codigo del usuario que queremos borrar
     * @return boolean true si se ha borrado el usuario y false en caso contrario
     */
    public static function borrarUsuario($codUsuario){
        $usuarioEliminado = false; // Inicializamos la variable usuarioEliminado a false

        $consulta = "Delete from T01_Usuario where T01_CodUsuario=?";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if($resultadoConsulta){ // Si se ha realizado la consulta correctamente
            $usuarioEliminado = true; // Cambiamos el valor de la variable usuarioEliminado a true 
        }

        return $usuarioEliminado; // devolvemos la variable usuarioEliminado
    }

    /**
     * Metodo validarCodNoExiste()
     * 
     * Metodo que comprueba si un usuario existe o no en la base de datos 
     * 
     * @param string $codUsuario codigo de usuario que queremos comprobar
     * @return boolean devuelve true si no existe y false en caso contrario
     */
    public static function validarCodNoExiste($codUsuario){
        $usuarioNoExiste = true; // inicializo la variable booleana a true
        
        // comprueba que el usuario introducido existen en la base de datos
        $consulta = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
        
        if($resultadoConsulta->rowCount()>0){ // si la consulta me devuleve algun resultado
            $usuarioNoExiste = false; // inicializo la variable booleana a false
        }
        
        return $usuarioNoExiste;
    }

    

}