<?php

require_once('conexion.php');
extract($_POST);

/*$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];*/


/*$conexionsql=mssql_connect() or
  die("Error de conexión.");
mssql_select_db( 'examen') or
  die("Error de selección de base de datos.");
mssql_query("insert empleados(clave_emp, nombre, email, empresa, ciudad, salario_base) values('$clave','$nombre','$email','$empresa','$ciudad','$salario'") or
  die("Error SQL");
mssql_close($conexionsql);*/
/*$sql="select distinct tbl_contacto(telefono1_contacto, telefono2_contacto, nombre_contacto, correo_contacto) values('$telefono1','$telefono2','$nombre','$email')";
$registro=mysqli_query($sql,$conexion);*/

//$sql="insert tbl_contacto(`telefono1_contacto`, `telefono2_contacto`, `nombre_contacto`, `correo_contacto`) values('$telefono1','$telefono2','$nombre','$email')";
	
$sql ="INSERT INTO `tbl_contacto` (`nombre_contacto`, `correo_contacto`, `telefono1_contacto`, `telefono2_contacto`, `apellido1_contacto`, `apellido2_contacto`, `ubicacion1_contacto`, `ubicacion2_contacto`) VALUES ('$nombre', '$email', '$telefono1','$telefono2','$apellido1','$apellido2','$ubicacion1','$ubicacion2')";
echo $sql; 
	mysqli_query($conexion,$sql);
die;
/*if(!$registro)
{
echo"
<script language='javascript'>
alert('ERROR AL GUARDAR EL CONTACTO')
window.location='altas.html'
</script>";
exit();
}
else
{
echo"
<script language='javascript'>
alert('CONTACTO AGREGADO CORRECTAMENTE')
window.location='altas.html'
</script>";
}*/
?>