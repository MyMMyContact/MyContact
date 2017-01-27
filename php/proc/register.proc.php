<?php 
extract($_POST);
	require_once('conexion.php');
	//primero comprobamos que el usuario no exista
	con="SELECT * FROM `tbl_usuario` WHERE `correo_usuario` LIKE '".$s_email;
 ?>