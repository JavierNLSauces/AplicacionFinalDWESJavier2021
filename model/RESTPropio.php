<?php 

require_once '../config/configDB.php';
require_once 'DBPDO.php';
require_once 'DepartamentoPDO.php';


/**
 * Class RESTPropio
 * 
 * Clase que será utilizada para ofrecer servicios REST
 * 
 */
class RESTPropio{
    
    /**
     * Metodo obtenerDatosDepartamento()
     *
     * Metodo que obtiene los datos de un departamento
     * 
     * @param  string $codDepartamento codigo del departamento del que queremos obtener los datos
     * @return int volumen de negocio del departamento
     */
    public static function obtenerDatosDepartamento($codDepartamento){
        $aDatosDepartamento = null;

        if(!DepartamentoPDO::validarCodNoExiste($codDepartamento)){// si el codigo de departamento existe
            $sentenciaSQL = "Select * from T02_Departamento where T02_CodDepartamento=?";
            $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

            if($resultadoConsulta){ // Si se ha realizado la consulta correctamente
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
     * Metodo sumar()
     * 
     * Metodo que suma dos numeros pasados como parametro
     *
     * @param  int|float $numero1 primer numero a sumar
     * @param  int|float $numero2 segundo numero a sumar
     * @return int|float resultado de la suma
     */
    public static function sumar($numero1, $numero2){
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
    public static function restar($numero1, $numero2){
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
    public static function multiplicar($numero1, $numero2){
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
    public static function dividir($numero1, $numero2){
        return $numero1 / $numero2;
    }
}
?>