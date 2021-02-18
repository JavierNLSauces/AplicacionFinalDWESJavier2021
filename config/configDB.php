<?php
//CONFIGURACIÓN CASA
/*
define('DNS', 'mysql:host=192.168.8.217;dbname=DAW217DBProyectoTema5;charset=utf8');//Dirección IP y nombre de la base de datos
define('USER', 'usuarioDAW217DBProyectoTema5');//Nombre de usuario de la base de datos
define('PASSWORD', 'P@ssw0rd');//Contraseña del usuario de la base de datos
define('PATH', 'http://192.168.8.217/');// ruta entorno de casa
*/


//CONFIGURACIÓN ENTORNO DE DESARROLLO

define('DNS','mysql:host=192.168.20.19:3306;dbname=DAW217DBProyectoTema5;charset=utf8'); // Direccion del host y nombre de la base de datos para la conexion con la base de datos
define('USER','usuarioDAW217DBProyectoTema5'); // Usuario administrador de la bsae de datos DAW217DBProyectoTema5
define('PASSWORD','paso'); // Contraseña de usuario administrador de la base de datos DAW217DBProyectoTema5  
define('PATH', 'http://daw217.sauces.local/');// ruta entorno de desarrollo 
define('PATH_CRISTINA', 'http://daw215.sauces.local/');// ruta entorno de desarrollo 

//CONFIGURACIÓN 1&1
/*
define('DNS','mysql:host=db5000278684.hosting-data.io;dbname=dbs272028;charset=utf8'); // Direccion del host y nombre de la base de datos para la conexion con la base de datos
define('USER','dbu287783'); // Usuario administrador de la base de datos DAW217DBProyectoTema5
define('PASSWORD','Covid1234$'); // Contraseña de usuario administrador de la base de datos DAW217DBProyectoTema5
define('PATH', 'https://daw217.ieslossauces.es/');// ruta entorno de 1&1 
define('PATH_CRISTINA', 'https://daw215.ieslossauces.es/');// ruta entorno de 1&1 
*/

define('MAX_DEPARTAMENTOS_PAGINA',10); // numero maximo de departamentos por pagina

define('API_KEY','7e0c8060cbc8392295f2be3a5f4f312aaed377ab5e8cb1cb01f47c2f9aa59e05'); // constante con le valor de la API key encriptada del servicio rest mediante el metodo POST
?>