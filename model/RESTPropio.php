<?php

require_once '../config/configDB.php';
require_once 'DBPDO.php';
require_once 'DepartamentoPDO.php';


/**
 * Class RESTPropio
 * 
 * Clase que será utilizada para ofrecer servicios REST
 * 
 * @author Javier Nieto
 * @since 1.0
 * @copyright 2020-2021 Javier Nieto
 * @version 1.0
 */
class RESTPropio
{
    /**
     * Metodo obtenerDatosDepartamento()
     *
     * Metodo que obtiene los datos de un departamento
     * 
     * @param  string $codDepartamento codigo del departamento del que queremos obtener los datos
     * @return int volumen de negocio del departamento
     */
    public static function obtenerDatosDepartamento($codDepartamento)
    {
        $aDatosDepartamento = null;

        if (!DepartamentoPDO::validarCodNoExiste($codDepartamento)) { // si el codigo de departamento existe
            $sentenciaSQL = "Select * from T02_Departamento where T02_CodDepartamento=?";
            $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

            if ($resultadoConsulta) { // Si se ha realizado la consulta correctamente
                $aResultadoconsulta = $resultadoConsulta->fetch(); // almacenamos en la variable el darray con la respuesta de la consulta
                $aDatosDepartamento = [
                    'CodigoDeDepartamento' => $aResultadoconsulta['T02_CodDepartamento'],
                    'DescripcionDeDepartamento' => $aResultadoconsulta['T02_DescDepartamento'],
                    'FechaCreacionDeDepartamento' => $aResultadoconsulta['T02_FechaCreacionDepartamento'],
                    'FechaBajaDeDepartamento' => $aResultadoconsulta['T02_FechaBajaDepartamento'],
                    'VolumenDeNegocio' => $aResultadoconsulta['T02_VolumenNegocio']
                ];
            }
        }

        return $aDatosDepartamento;
    }

    /**
     * Metodo borrarUsuario()
     * 
     * Metodo que elimina un usuario de la base de datos
     *
     * @param  string $codUsuario codigo del usuario que queremos borrar
     * @return boolean true si se ha borrado el usuario y false en caso contrario
     */
    public static function borrarUsuario($codUsuario)
    {
        $usuarioEliminado = false; // Inicializamos la variable usuarioEliminado a false

        $sentenciaSQL = "Delete from T01_Usuario where T01_CodUsuario=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codUsuario]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if($resultadoConsulta){ // Si se ha realizado la consulta correctamente
            $usuarioEliminado = true; // Cambiamos el valor de la variable usuarioEliminado a true 
        }

        return $usuarioEliminado; // devolvemos la variable usuarioEliminado
        
    }

    /**
     * Metodo obtenerUsuariosPorDescripcion()
     *
     * Metodo que obtiene todos los usuarios de la base de datos con la descripcion pasada como parametro
     * 
     * @return mixed[] devuleve un array con los datos de los usuarios si se han podido obtener y un array vacio en caso contrario
     */
    public static function obtenerUsuariosPorDescripcion($descUsuario)
    {
        $aUsuarios = [];
        $sentenciaSQL = "Select * from T01_Usuario where T01_DescUsuario LIKE '%' ? '%'";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$descUsuario]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if ($resultadoConsulta->rowCount() >0) { // Si se ha realizado la consulta correctamente
            $aResultadoConsulta = $resultadoConsulta->fetch(); // almacenamos en la variable el darray con la respuesta de la consulta
            while ($aResultadoConsulta) {
                if ($aResultadoConsulta['T01_CodUsuario'] != "admin") {
                    $aUsuarios[] = [
                        'CodigoDeUsuario' => $aResultadoConsulta['T01_CodUsuario'],
                        'DescripcionDeUsuario' => $aResultadoConsulta['T01_DescUsuario'],
                        'NumConexiones' => $aResultadoConsulta['T01_NumConexiones'],
                        'FechaHoraUltimaConexion' => $aResultadoConsulta['T01_FechaHoraUltimaConexion'],
                    ];
                }

                $aResultadoConsulta = $resultadoConsulta->fetch();
            }
        }
        return $aUsuarios;
    }

    /**
     * Metodo restablecerPassword()
     *
     * Metodo que restablece el password de un usuario a 'paso'
     * 
     * @param  string $codUsuario codigo del usuario que queremos restablecer el password
     * @return boolean true si se ha restablecido el password el usuario y false en caso contrario
     */
    public static function restablecerPassword($codUsuario)
    {
        $passwordCambiado = false;
        
        $sentenciaSQL = "Update T01_Usuario set T01_Password=? where T01_CodUsuario=?";
        $passwordNueva = hash("sha256", $codUsuario.'paso'); // encripta el password pasado como parametro
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$passwordNueva,$codUsuario]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta
        
        if($resultadoConsulta){ // Si se ha realizado la consulta correctamente
            $passwordCambiado = true; // Cambiamos el valor de la variable usuarioEliminado a true 
        }

 

        return $passwordCambiado; // devolvemos la variable usuarioEliminado
    }

    /**
     * Metodo sumar()
     * 
     * Metodo que suma dos numeros pasados como parametro
     *
     * @param  int|float $numero1 primer numero a sumar
     * @param  int|float $numero2 segundo numero a sumar
     * @return int|float resultado de la suma
     */
    public static function sumar($numero1, $numero2)
    {
        return $numero1 + $numero2;
    }

    /**
     * Metodo restar()
     *
     * Metodo que resta dos numeros pasados como parametro
     * 
     * @param  int|float $numero1 primer numero a restar
     * @param  int|float $numero2 segundo numero a restar
     * @return int|float resultado de la resta
     */
    public static function restar($numero1, $numero2)
    {
        return $numero1 - $numero2;
    }

    /**
     * Metodo multiplicar()
     *
     * Metodo que multiplica dos numeros pasados como parametro
     * 
     * @param  int|float $numero1 primer numero a multiplicar
     * @param  int|float $numero2 segundo numero a multiplicar
     * @return int|float resultado de la multiplicacion
     */
    public static function multiplicar($numero1, $numero2)
    {
        return $numero1 * $numero2;
    }
    /**
     * Metodo dividir()
     *
     * Metodo que divide dos numeros pasados como parametro
     * 
     * @param  int|float $numero1 primer numero a dividir
     * @param  int|float $numero2 segundo numero a dividir
     * @return int|float resultado de la division
     */
    public static function dividir($numero1, $numero2)
    {
        return $numero1 / $numero2;
    }
}
