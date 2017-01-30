<?php 
extract($_GET);
	require_once('conexion.php');
	
		
		//preparamos la consulta de inserción
		$update_con="UPDATE `tbl_contacto` SET `nombre_contacto` = '".$contact_name."', `apellido1_contacto` = '".$contact_lastname1."', `apellido2_contacto` = '".$contact_lastname2."', `correo_contacto` = '".$mail."', `telefono1_contacto` = '".$phone."', `telefono2_contacto` = '".$phone2."', `ubicacion1_contacto` = '".$location1."', `ubicacion2_contacto` = '".$location2."' WHERE `tbl_contacto`.`id_contacto` = ".$con_id.";";
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
			location.href='../modificar.php?contact_id=".$con_id."';</script>";
		}
	
 ?>
