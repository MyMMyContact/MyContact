<?php
		require_once("conexion.php");
		//Iniciamos sesión
		session_start();
		//Creamos la consulta SQL para eliminar el usuario y sus contactos
		$del_con="DELETE FROM `tbl_usuario` WHERE `tbl_usuario`.`id_usuario` = ".$_SESSION['usu_id']."";
		$del_user_con="DELETE FROM `tbl_contacto` WHERE `id_usuario` = ".$_SESSION['usu_id']."";
		//La ejecutamos
		mysqli_query($conexion,$del_user_con);
		mysqli_query($conexion,$del_con);
		//destruimos la sessión
		session_destroy();
		//Mostramos mensaje de despedida y reedirigimos
		echo "<script type='text/javascript'>alert('Lamentamos que se vaya :(');
			location.href='../../index.php';</script>";
		
?>