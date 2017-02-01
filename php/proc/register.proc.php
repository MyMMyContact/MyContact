<?php 
extract($_POST);
	require_once('conexion.php');
	
	//primero comprobamos que el usuario no exista
		$con="SELECT * FROM `tbl_usuario` WHERE `correo_usuario` LIKE '".$s_email."'";
		//echo $con;
	//Lanzamos la consulta a la BD
		$result	=	mysqli_query($conexion,$con);
	//Contamos los resultados que nos devuelve
		$total  = mysqli_num_rows($result);
	//Comprobamos si el resultado ya existe
	if($total>=1){
		echo "<script type='text/javascript'>alert('Ya se encuentra registrado');
			location.href='../../index.php';</script>";
	}
		//Si no existe, lo añadimos a la base de datos
	else{
		//Cogemos la fecha actual del servidor
			$fecha= date("Y")."/".date("m")."/".date("d");
		//preparamos la consulta de inserción
		$inser_con="INSERT INTO `tbl_usuario` (`nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `fechaAlta_usuario`, `correo_usuario`, `contrasena_usuario`) VALUES ('".$s_name."', '".$s_lastname1."', '".$s_lastname2."', '".$fecha."', '".$s_email."', '".$s_password."');";
		//echo $inser_con;die;
		mysqli_query($conexion,$inser_con);
		echo "<script type='text/javascript'>alert('registro completado');
			location.href='../../index.php';</script>";
	}
 ?>
