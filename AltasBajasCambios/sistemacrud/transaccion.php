<?
include("conexion.php");
$conexion=conectar();
?>
<br><br>
<center><h2><b>CONSULTA DE EMPLEADOS</b></h2>
<center><h3><b>aplica un aumento del 10%</b></h3>
<table width="900" border="0" align="center">
    	<tr align="center">
      		<td  bgcolor="#CCCCCC">CLAVE</td>
      		<td  bgcolor="#CCCCCC">NOMBRE</td>
      		<td  bgcolor="#CCCCCC">EMAIL</td>
            <td  bgcolor="#CCCCCC">EMPRESA</td>
            <td  bgcolor="#CCCCCC">CIUDAD</td>
            <td  bgcolor="#CCCCCC">SALARIO BASE</td>
      		<td  bgcolor="#CCCCCC">A/AUMENTO</td>
            <td  bgcolor="#CCCCCC">REPORTE</td>
    	</tr>
    	<?php 
		$consulta=mysql_query("select * FROM empleados");
		$cantidad = mysql_num_rows($consulta);
	    if (isset($_POST['buscar'])){
			$consulta=mysql_query("select * FROM empleados where nombre like '%".$_POST['buscar']."%'");
		}
	
		while($filas=mysql_fetch_array($consulta)){
			$clave=$filas['clave_emp'];
			$nombre=$filas['nombre'];
			$email=$filas['email'];
			$empresa=$filas['empresa'];
			$ciudad=$filas['ciudad'];
			$salario=$filas['salario_base'];
        ?>
    	<tr>
      		<td><?php echo $clave ?></td>
      		<td><?php echo $nombre ?></td>
            <td><?php echo $email ?></td>
      		<td align="center"><?php echo $empresa ?></td>
            <td align="center"><?php echo $ciudad ?></td>
            <td align="center"><?php echo $salario ?></td>
      		<td align="center">
                <form action="transaccion2.php" method="post" name="editar">
        		  <input name="clave" type="hidden" value="<?php echo $clave ?>" />
                  <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
                  <input name="email" type="hidden" value="<?php echo $email ?>" />
                  <input name="empresa" type="hidden" value="<?php echo $empresa ?>" />
                  <input name="ciudad" type="hidden" value="<?php echo $ciudad ?>" />
                  <input name="salario" type="hidden" value="<?php echo $salario ?>" />
        		  <input type="submit" value="Aplicar" class="asdasda" alt="cambio" title="Aplicar Descuento"/>
      		    </form>
            </td>
            <td align="center"><form action="reporte.php" method="post" name="reporte">
        		  <input name="clave" type="hidden" value="<?php echo $clave ?>" />
        		  <input type="submit" value="Generar" alt="cambio" title="Generar Reporte PDF"/>
      		    </form>
            </td>
    	</tr>
    	<p>
      	<?php }?>
   	  </table>
</p>
<p align="center">
<a href="index.html">REGRESAR</a>
</p>
</body>
</html>
