<?php 
session_start();
extract($_GET);
	require_once('conexion.php');
	
		
		//preparamos la consulta de inserción
		$insert_contact="INSERT INTO `tbl_contacto` SET `nombre_contacto` = '".$user_name."', `apellido1_contacto` = '".$user_lastname1."', `apellido2_contacto` = '".$user_lastname2."', `correo_contacto` = '".$user_mail."' WHERE `tbl_contacto`.`id_usuario` = ".$_SESSION['usu_id'].";";
		//echo $update_con;die;
		mysqli_query($conexion,$insert_contact);
		//Comprobamos si se ha modificado correctamente
		if(mysqli_affected_rows($conexion)>0)
		{
			echo "<script type='text/javascript'>alert('Contacto agregado');
			location.href='../principal.php';</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Contacto NO agregado');
			location.href='../modificar_user.php';</script>";
		}
	
 ?>
