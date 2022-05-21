<?php

// Aunque utilicemos un try-catch, si la BBDD No est� operativa
// Se visualiza un warning en el navegador y el proyecto sigue
// funcionando, la solucion es:

// Desactivar toda notificaci�n de error
error_reporting(0);

$c=null;

function conecta(){
	$mysql_server="localhost";	
	$mysql_login="try";
	$mysql_pass="P@ssw0rd";
	
    global $c;

	try{
		$c=mysqli_connect($mysql_server,$mysql_login,$mysql_pass);		
	}
	catch(Exception $e){
		// Si salta la excepcion es mejor registrar el fallo
		// en un LOG simplemente. Evitar mostrar mensajes 
		// dentro de una funcion
		echo $e->getMessage();
		echo "a";
	}
}

?>