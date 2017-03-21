<?php
	 session_start();
	    //importamos la conexión
	    if(!isset($_SESSION['usu_id'])){
	        header("location:../index.php");
	        //echo $_SESSION['usu_id'];
	    }
	extract($_POST);
	require_once('conexion.php');
	//Consulta de busqueda del usuario
	$con="SELECT * FROM `tbl_usuario` WHERE `correo_usuario` LIKE '".$l_mail."' AND `contrasena_usuario` LIKE '".$l_password."' ";
	//echo $con;die;
	//Lanzamos la consulta a la BD
	$result	=	mysqli_query($conexion,$con);
	//Contamos los resultados que nos devuelve
	$total  = mysqli_num_rows($result); 
	//Ponemos el condicional según el nombre de registros que nos devuelva
	if($total>=1)
	{
		//Iniciamos sessión para las variables de sesion
		session_start();
		while ($fila = mysqli_fetch_array($result)) 
		{
			//Asignamos la variable de session "usu_id" al ID del usuario
			$_SESSION['usu_id']	=	$fila['id_usuario'];
			header("location:../principal.php");
		}
			
	}
	//Si no nos devuelve registros, significa que no existe en la base de datos
	else
	{
		header("location: ../../index.php?nolog=1");
		
	}
?>