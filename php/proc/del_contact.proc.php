<?php
		 session_start();
	    //importamos la conexión
	    if(!isset($_SESSION['usu_id'])){
	        header("location:../index.php");
	        //echo $_SESSION['usu_id'];
	    }
		extract($_GET);
		require_once("conexion.php");
		$del_con="DELETE FROM `tbl_contacto` WHERE `id_contacto` = ".$id_con."";
		mysqli_query($conexion,$del_con);
		//echo $del_con;die;
		//Mostramos mensaje de despedida y reedirigimos
		echo "<script type='text/javascript'>alert('Contacto eliminado de forma correcta ');
			location.href='../principal.php';</script>";
		
?>