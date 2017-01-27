<?php 
  
	$servidor="localhost";
	$usuario="root";
	$password="";
	$bd="bd_mycontacts";
	$conexion=new mysqli($servidor,$usuario,$password);
	if (!$conexion)
	{
		echo"ERROR AL CONECTARCE CON EL SERVIDOR";
		exit();
	}

	
?>