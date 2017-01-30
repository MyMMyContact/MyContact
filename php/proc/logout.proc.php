<?php
		//Iniciamos sesión
		session_start();
		//Destruimos la variable de sesión
		session_destroy();
		//Mostramos mensaje de despedida y reedirigimos
		echo "<script type='text/javascript'>alert('Hasta pronto');
			location.href='../../index.php';</script>";
		
?>