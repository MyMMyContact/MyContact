<?php 
session_start();
extract($_GET);
	require_once('conexion.php');
	
		
		//preparamos la consulta de inserción
		$update_con="UPDATE `tbl_usuario` SET `nombre_usuario` = '".$user_name."', `apellido1_usuario` = '".$user_lastname1."', `apellido2_usuario` = '".$user_lastname2."', `correo_usuario` = '".$user_mail."', `contrasena_usuario` = '".$new_pass."' WHERE `tbl_usuario`.`id_usuario` = ".$_SESSION['usu_id'].";";
		//echo $update_con;die;
		mysqli_query($conexion,$update_con);
		//Comprobamos si se ha modificado correctamente
		if(mysqli_affected_rows($conexion)>0)
		{
			echo "<script type='text/javascript'>alert('Modificación correcta');
			location.href='../principal.php';</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Modificación incorrecta');
			location.href='../modificar_user.php';</script>";
		}
	
 ?>
