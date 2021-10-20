<?php

/*$connect = new PDO("mysql:host=localhost;dbname=php_consultapdo", "root", "");*/
	
// DB CREDENCIALES DE USUARIO.
define('DB_HOST','10.19.16.68');
define('DB_USER','root');
define('DB_PASS','imaginart3');
define('DB_NAME','reporte');
 
//establecemos conexión.
try
{

$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>