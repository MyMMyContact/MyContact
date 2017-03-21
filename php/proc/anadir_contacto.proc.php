<?php 
session_start();

    //importamos la conexión

    if(!isset($_SESSION['usu_id'])){
       // header("location:../index.php");
        echo $_SESSION['usu_id'];
    }
extract($_GET);
	require_once('conexion.php');
		//Comprobamos si las variables opcionales, apellido2 y telefono2 existen:
			if(!isset($contact_lastname2)){
				//Si no existe se le asigna un valor por defecto
				$contact_lastname2="No disponible";
			}
			if(!isset($contact_phone2)){
				//Si no existe se le asigna un valor por defecto
				$contact_phone2="00000000";
			}
		//Comprobamos si existe el contacto con el mail
			$con_sql="SELECT * FROM `tbl_contacto` WHERE `correo_contacto` LIKE '".$contact_mail."' ";
			$result=mysqli_query($conexion,$con_sql);
			$total  = mysqli_num_rows($result); 
			
			//Ponemos el condicional según el nombre de registros que nos devuelva
			if($total>=1)
			{
				echo "<script type='text/javascript'>alert('Contacto ya existente');
				location.href='../anadir_contacto.php';</script>";
			}
			else{


				//preparamos la consulta de inserción
				$insert_contact="INSERT INTO `tbl_contacto` (`nombre_contacto`, `apellido1_contacto`, `apellido2_contacto`, `correo_contacto`, `telefono1_contacto`, `telefono2_contacto`, `ubicacion1_contacto`, `ubicacion2_contacto`, `id_usuario`) VALUES ('".$contact_name."', '".$contact_lastname1."', '".$contact_lastname2."', '".$contact_mail."', '".$contact_phone."', '".$contact_phone2."', '".$contact_location."', '".$contact_location2."', '".$_SESSION['usu_id']."');";
				//echo $insert_contact;die;
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
					location.href='../anadir_contacto.php';</script>";
				}
		}//END ELSE
	
 ?>
