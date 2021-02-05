<?php 

/**
 * Class DepartamentoPDO
 *
 * Clase cuyos metodos hacen consultas a la tabla T02_Departamento de la base de datos
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.1
 * @copyright 29-01-2021
 * @version 1.1
 */
class DepartamentoPDO {
        
    /**
     * Metodo obtenerDatosDepartamento()
     * 
     * Metodo que obtiene los datos de un departamento cuyo codigo es el pasado como parametro
     *
     * @param  string $codDepartamento codigo del departamento del que queremos obtener los datos
     * @return null|\Departamento devuelve un objeto de tipo Departamento con los datos guardados en la base de datos y null si no se ha podido encontrar
     */
    public static function obtenerDatosDepartamento($codDepartamento){
        $oDepartamento = null;

        $sentenciaSQL = "Select * FROM T02_Departamento where T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL,[$codDepartamento]); // almacenamos en la variable $resultadoConsulta el departamento obtenidos en la consulta

        if($resultadoConsulta->rowCount()>0){
            $departamento = $resultadoConsulta->fetchObject();
            // Instanciamos un objeto Departamento con los datos devueltos por la consulta
            $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
        }

        return $oDepartamento;

    }


    /**
     * Metodo buscarDepartamentosPorCodigo()
     * 
     * Metodo que devuelve un array con los departamentos obtenidos en la busqueda de los departamentos por el codigo
     * y el numero de paginas totales para realizar la paginacion
     *
     * @param  string $codDepartamento codigo del departameto
     * @param  int $numPaginaActual numero de pagina actual
     * @param  int $numMaxDepartamentos numero de paginas totales
     * @return mixed[] array con los departamentos y el numero de paginas totales para realizar la paginacion
     */
    public static function buscarDepartamentosPorCodigo($codDepartamento, $numPaginaActual, $numMaxDepartamentos){
        $aDepartamentos = []; // declaramos e inicializamos el array de departamentos
        $numPaginasTotal = 1; // declaramos e inicializamos el numero de paginas totales

        $sentenciaSQL = "Select * FROM T02_Departamento where T02_CodDepartamento LIKE '%' ? '%' LIMIT ".(($numPaginaActual-1)*$numMaxDepartamentos).','.$numMaxDepartamentos;
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL,[$codDepartamento]); // almacenamos en la variable $resultadoConsulta los departamentos obtenidos en la consulta

        if($resultadoConsulta->rowCount()>0){ // si la consulta devuelve algun departamento
            $departamento = $resultadoConsulta->fetchObject(); // obtenemos el primer departmento de la consulta, lo almacenamos en la variable $departamento y avanzamos el puntero al siguiente departamento
            $numDepartamento = 0; // declaramos e inicializamos el numero del departamento del array equivalente a la posicion del array

            while($departamento){ // mientras haya algun departamento
                // Instanciamos un objeto Departamento con los datos devueltos por la consulta
                $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
                $aDepartamentos[$numDepartamento] = $oDepartamento; // añadimos el objeto departamento en la posicion del array correspondiente
                $numDepartamento ++; // incrementamos el numero del departamento equivalente a la posicion el array
                $departamento = $resultadoConsulta->fetchObject(); // almacenamos el siguiente departamento devuelto por la consulta y avanzamos el puntero al siguiente departamento
            } 
        }

        $sentenciaSQLNumDepartamentos = "Select count(*) FROM T02_Departamento WHERE T02_CodDepartamento LIKE '%' ? '%'";
        $resultadoConsultaNumDepartamentos = DBPDO::ejecutarConsulta($sentenciaSQLNumDepartamentos,[$codDepartamento]); // almacenamos en la variable $resultadoConsultaNumDepartamentos el resultado devuelto por la consulta
        $numDepartamentos = $resultadoConsultaNumDepartamentos->fetch(); // almacenamos el la variable $numDepartamentos el numero de departamentos devuelto por la consulta

        if($numDepartamentos[0] % $numMaxDepartamentos == 0){ // si devuelve un numero par
            $numPaginasTotal = ($numDepartamentos[0] / $numMaxDepartamentos); // el numero de paginas totales sera el resultado obtenido de dividir el numero de departamentos devuelto por la consulta y el numero maximo de paginas
        }else{ // si devuelve un numero impar
            $numPaginasTotal = (floor($numDepartamentos[0] / $numMaxDepartamentos) + 1); // el numero de paginas totales sera el resultado obtenido de dividir el numero de departamentos devuelto por la consulta y el numero maximo de paginas redondeado a la baja mas uno
        }

        settype($numPaginasTotal, "integer"); // convertimos el numero de paginas totales a integer para eliminar los decimales

        return [$aDepartamentos, $numPaginasTotal];
    }


    /**
     * Metodo buscarDepartamentosPorDescripcion()
     * 
     * Metodo que devuelve un array con los departamentos obtenidos en la busqueda de los departamentos por la descripcion
     * y el numero de paginas totales para realizar la paginacion
     *
     * @param  string $descDepartamento descripcion del departamento
     * @param  int $numPaginaActual numero de pagina actual
     * @param  int $numMaxDepartamentos numero de paginas totales
     * @return mixed[] array con los departamentos y el numero de paginas totales para realizar la paginacion
     */
    public static function buscarDepartamentosPorDescripcion($descDepartamento, $numPaginaActual, $numMaxDepartamentos){
        $aDepartamentos = []; // declaramos e inicializamos el array de departamentos
        $numPaginasTotal = 1; // declaramos e inicializamos el numero de paginas totales

        $sentenciaSQL = "Select * FROM T02_Departamento where T02_DescDepartamento LIKE '%' ? '%' LIMIT ".(($numPaginaActual-1)*$numMaxDepartamentos).','.$numMaxDepartamentos;
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL,[$descDepartamento]); // almacenamos en la variable $resultadoConsulta los departamentos obtenidos en la consulta

        if($resultadoConsulta->rowCount()>0){ // si la consulta devuelve algun departamento
            $departamento = $resultadoConsulta->fetchObject(); // obtenemos el primer departmento de la consulta, lo almacenamos en la variable $departamento y avanzamos el puntero al siguiente departamento
            $numDepartamento = 0; // declaramos e inicializamos el numero del departamento del array equivalente a la posicion del array

            while($departamento){ // mientras haya algun departamento
                // Instanciamos un objeto Departamento con los datos devueltos por la consulta
                $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
                $aDepartamentos[$numDepartamento] = $oDepartamento; // añadimos el objeto departamento en la posicion del array correspondiente
                $numDepartamento ++; // incrementamos el numero del departamento equivalente a la posicion el array
                $departamento = $resultadoConsulta->fetchObject(); // almacenamos el siguiente departamento devuelto por la consulta y avanzamos el puntero al siguiente departamento
            } 
        }

        $sentenciaSQLNumDepartamentos = "Select count(*) FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%' ? '%'";
        $resultadoConsultaNumDepartamentos = DBPDO::ejecutarConsulta($sentenciaSQLNumDepartamentos,[$descDepartamento]); // almacenamos en la variable $resultadoConsultaNumDepartamentos el resultado devuelto por la consulta
        $numDepartamentos = $resultadoConsultaNumDepartamentos->fetch(); // almacenamos el la variable $numDepartamentos el numero de departamentos devuelto por la consulta

        if($numDepartamentos[0] % $numMaxDepartamentos == 0){ // si devuelve un numero par
            $numPaginasTotal = ($numDepartamentos[0] / $numMaxDepartamentos); // el numero de paginas totales sera el resultado obtenido de dividir el numero de departamentos devuelto por la consulta y el numero maximo de paginas
        }else{ // si devuelve un numero impar
            $numPaginasTotal = (floor($numDepartamentos[0] / $numMaxDepartamentos) + 1); // el numero de paginas totales sera el resultado obtenido de dividir el numero de departamentos devuelto por la consulta y el numero maximo de paginas redondeado a la baja mas uno
        }

        settype($numPaginasTotal, "integer"); // convertimos el numero de paginas totales a integer para eliminar los decimales

        return [$aDepartamentos, $numPaginasTotal];
    }
    
    /**
     * Metodo altaDepartamento()
     * 
     * Metodo para añadir un nuevo departamento en la base de datos 
     * devolviendo true si se ha añadido con exito o false si no se ha podido incluir en la base de datos
     *
     * @param  string $codDepartamento codigo del departamento
     * @param  string $descDepartamento descripcion del departamento
     * @param  float $volumenNegocio volumen de negocio del departamento
     * @return boolean true si se ha añadido con exito o false si no se ha podido incluir en la base de datos
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
        $altaDepartamento = false; // declaramos e inicializamos $altaDepartamento a false

        $sentenciaSQL = "Insert into T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio) values (?,?,?,?)";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento, $descDepartamento, time(), $volumenDeNegocio]); // almacenamos en la variable $resultadoConsulta el resultado obtenido al ejecutar la consulta

        if($resultadoConsulta){ // si la consulta se ha ejecutado correctamente
            $altaDepartamento = true; // cambiamos el valor de la variable $altaDepartamento a true
        }

        return $altaDepartamento;
    }


    /**
     * Metodo bajaFisicaDepartamento()
     * 
     * Metodo que elimina un departamento por completo de la base de datos cuyo codigo es el pasado como parametro
     *
     * @param  string $codDepartamento codigo del departamento que queremos eliminar
     * @return boolean true si se ha eliminado correctamente el departamento, false en caso contrario
     */
    public static function bajaFisicaDepartamento($codDepartamento){
        $departamentoEliminado = false; // Inicializamos la variable departamentoEliminado a false

        $sentenciaSQL = "Delete from T02_Departamento where T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if($resultadoConsulta){ // Si se ha realizado la consulta correctamente
            $departamentoEliminado = true; // Cambiamos el valor de la variable departamentoEliminado a true 
        }

        return $departamentoEliminado;
    }
    
    /**
     * Metodo bajaLogicaDepartamento()
     *
     * Metodo que da de baja logica un departamento cuyo codigo es pasado por parametro
     * 
     * @param  string $codDepartamento codigo del departamento que queremos dar de baja logica
     * @param  string $fechaBaja fecha de baja con el formato "dd/mm/aaaa"
     * @return boolean true si se ha dado de baja logica correctamente, false ne caso contrario
     */
    public static function bajaLogicaDepartamento($codDepartamento,$fechaBaja){
        $bajaLogica = false; // Inicializamos la variable bajaLogica a false
        $dateTimeBaja = new DateTime($fechaBaja); // Inicializamos la variable $dateTimeBaja con un objeto de tipo DateTime de la fechaBaja pasada como parametro

        $sentenciaSQL = "Update T02_Departamento set T02_FechaBajaDepartamento=? WHERE T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$dateTimeBaja->getTimestamp(), $codDepartamento]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if($resultadoConsulta){ // Si se ha realizado la consulta correctamente
            $bajaLogica = true; // Cambiamos el valor de la variable bajaLogica a true
        }

        return $bajaLogica;
    }


    /**
     * Metodo modificarDepartamento()
     * 
     * Metodo para modificar los datos de un departamento en la base de datos
     * devolviendo true si se ha modificado con exito o false si no se ha podido modificar en la base de datos
     *
     * @param  string $codDepartamento codigo del departamento
     * @param  string $descDepartamento descripcion del departamento
     * @param  float $volumenNegocio volumen de negocio del departamento
     * @return boolean true si se ha modificado con exito o false si no se ha podido modificar en la base de datos
     */
    public static function modificarDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
        $departamentoModificado = false; // declaramos e inicializamos $departamentoModificado a false

        $sentenciaSQL = "Update T02_Departamento set T02_DescUsuario = ?, T02_VolumenNegocio = ? where T02_CodDepartamento = ?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$descDepartamento, $volumenDeNegocio, $codDepartamento]); // almacenamos en la variable $resultadoConsulta el resultado obtenido al ejecutar la consulta

        if($resultadoConsulta){ // si la consulta se ha ejecutado correctamente
            $departamentoModificado = true; // cambiamos el valor de la variable $departamentoModificado a true
        }

        return $departamentoModificado;
    }

    
    /**
     * Metodo rehabilitacionDepartamento()
     *
     * Metodo que rehabilita un departamento poniendo su fehca de baja a null
     * 
     * @param  string $codDepartamento codigo del departamento que queremos rehabilitar
     * @return boolean true si se ha rehabilitado el departamento, false en caso contrario 
     */
    public static function rehabilitacionDepartamento($codDepartamento){
        $rehabilitacion = false; // Inicializamos la variable rehabilitacion a false

        $sentenciaSQL = "Update T02_Departamento set T02_FechaBajaDepartamento=null WHERE T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if($resultadoConsulta){ // Si se ha realizado la consulta correctamente
            $rehabilitacion = true; // Cambiamos el valor de la variable rehabilitacion a true
        }

        return $rehabilitacion;
    }

    /**
     * Metodo validarCodNoExiste()
     * 
     * Metodo que valida si un codigo de departamento ya se encuentra o no en la base de datos,
     * devolviendo true si el codigo introducido no existe o false si ya existe
     *
     * @param string $codDepartamento codigo del departamento
     * @return boolean true si el codigo introducido no existe o false si ya existe
     */
    public static function validarCodNoExiste($codDepartamento){
        $codNoExiste = true; // declaramos e inicializamos $codNoExiste a true

        $sentenciaSQL = "Select T02_CodDepartamento from T02_Departamento where T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento]); // almacenamos en la variable $resultadoConsulta el resultado obtenido al ejecutar la consulta

        if($resultadoConsulta->rowCount()>0){ // si el codigo de departamento se encuentra en la base de datos
            $codNoExiste = false;// cambiamos el valor de la variable $codNoExiste a false
        }

        return $codNoExiste;
    }
}
?>