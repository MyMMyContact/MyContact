<html>
<head>
<script language="JavaScript" type="text/javascript">
function cancelar()
{
    window.location="bajas.html"
}
</script>

</head>


<?php 
include("conexion.php");
$clave=$_POST['clave'];
if(empty($clave))
{
 echo"<script language='JavaScript' type='text/JavaScript'>
           window.location='bajas.html'
        </script>
       ";
	   exit();
}
$conexion=conectar();
$sql="select * from tbl_contactos where nombre_contacto='$clave'";
$registro=mysqli_query($conexion,$sql);
if(!$registro)
{
 echo"<script language='JavaScript' type='text/JavaScript'>
           alert('ERROR EN EL NOMBRE DEL CONTACTO')
		   window.location='bajas.html'
		 </script>
       ";
}
 else
 {
 $datos=mysql_fetch_object($registro);
  if(!$datos->clave_emp)
  {
   echo"<script language='JavaScript' type='text/JavaScript'>
           alert('EL NOMBRE DEL CONTACTO NO EXISTE')
		   window.location='bajas.html'
		 </script>
       ";
	   exit();
  }
 }
?>
  
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><strong><font size="5" color="blue">DESEA ELIMINAR AL CONTACTO? </font> </strong>
      </p>
    <p align="center">
         <input type='submit' name='eliminar' value="SI">
		<input type='button' name='button' value="NO" onclick='cancelar();'>
		</td>
		</font>
 </form>
</body>
</html>
