<?php
		extract($_GET);
		require_once("conexion.php");
		//Creamos la consulta SQL para eliminar el usuario y sus contactos
		$del_con="DELETE FROM `tbl_contacto` WHERE `id_contacto = ".$id_con."";
		//echo $del_con;die;
		mysqli_query($conexion,$del_con);
		//Mostramos mensaje de despedida y reedirigimos
		echo "<script type='text/javascript'>alert('Contacto eliminado de forma correcta ');
			location.href='../../principal.php';</script>";
		
?>