 <?php
  session_start();
    //importamos la conexión
    require_once("proc/conexion.php");
    if(!isset($_SESSION['usu_id'])){
       // header("location:../index.php");
        echo $_SESSION['usu_id'];
    }
    extract($_GET);
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Mycontact</title>
	<!-- Bootstrap -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
    
    <!-- CUSTOM CSS  -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    
        <div class="header-container row col-md-10" >
            <div class="logcol col-md-1">
                <img src="../css/img/logo.png" class="prin_logo img-rounded"/>
            </div><!--end log-->
            <div class="col-md-10 buttons">
                <button class="btn btn-info">Modificar mis datos</button>
                <button class="btn btn-info">Añadir contactos</button>
               <a href="proc/logout.proc.php" onclick="return confirm('¿Está seguro que desea cerrar sesión?');"> <button class="btn btn-danger logout">Logout</button></a>
            </div><!-- end buttons-->
        </div>
    <div class="content-form col-md-10">
        <div class="showuser col-md-8">
           <form name="fr_modify" action="proc/modificar.proc.php" method="GET">
           <table class="table table-striped">
            <?php
                 //preparamos la consulta para sacar información de la tabla de contactos
                  $contact_con="SELECT * FROM `tbl_contacto` WHERE `id_contacto` = ".$contact_id."";
                  //echo $contact_con;
                 // echo $contact_con;
                  $display_contact=mysqli_query($conexion,$contact_con);
                    while($print_contact   =   mysqli_fetch_array($display_contact))
                         {
                            echo "<tr><td>Nombre</td><td>  <input type='text' id='contact_name' class='form-control' name='contact_name' value= '".$print_contact['nombre_contacto']."'></td></tr>";
                            echo "<tr><td>Apellido1</td><td>  <input type='text' id='contact_lastname1'  class='form-control' name='contact_lastname1' value= '".$print_contact['apellido1_contacto']."'></td></tr>";
                            echo "<tr><td>Apellido2</td><td>  <input type='text' id='contact_lastname2'  class='form-control' name='contact_lastname2' value= '".$print_contact['apellido2_contacto']."'></td></tr>";
                            echo "<tr><td>Correo</td><td>  <input type='mail' id='mail' name='mail'  class='form-control' value= '".$print_contact['correo_contacto']."'></td></tr>";
                            echo "<tr><td>Telefono</td><td>  <input type='text' id='phone'  class='form-control' name='phone' value= '".$print_contact['telefono1_contacto']."'></td></tr>";
                            echo "<tr><td>Telefono</td><td>  <input type='text' id='phone2'  class='form-control' name='phone2' value= '".$print_contact['telefono2_contacto']."'></td></tr>";
                            echo "<tr><td>Ubicación1</td><td> <input type='text' id='location1'  class='form-control' name='location1' value= '".$print_contact['ubicacion1_contacto']."'></td></tr>";
                            echo "<tr><td>Ubicación2</td><td> <input type='text' id='location2'  class='form-control' name='location2' value= '".$print_contact['ubicacion2_contacto']."'></td></tr>";
                            echo "<input type='text' name='con_id' value='".$contact_id."' style='display: none;'/>";
                         }
            ?>
             <tr><td><input type="submit" class="btn btn-info" value="enviar"/></td></tr>
            </form>
           
           <?php echo "<tr><td><a class='btn btn-danger' href='proc/del_contact.proc.php?id_con=".$contact_id."'>eliminar</a></td></tr>";?>
           </table>
        </div><!-- end show user>
    </div><!-- end container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>