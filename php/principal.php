<?php 
    session_start();
    //importamos la conexión
    require_once("proc/conexion.php");
    if(!isset($_SESSION['usu_id'])){
       // header("location:../index.php");
        echo $_SESSION['usu_id'];
    }
           

   
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
    
        <div class="row">
            <div class="logcol col-md-2">
                <img src="../css/img/logo.png" class="prin_logo img-rounded"/>
            </div><!--end log-->
            <div class="col-md-8">
                <button class="btn btn-info" onclick="showsig();">Modificar mis datos</button>
                <button class="btn btn-info" onclick="showsig();">Ver contactos</button>
                <button class="btn btn-info" onclick="showsig();">Añadir contactos</button>
            </div><!-- end buttons-->
    <div class="content-form col-md-10">
        <div class="showuser col-md-8">

            <?php
                 //preparamos la consulta para sacar información de la tabla de contactos
                  $contact_con="SELECT * FROM `tbl_contacto` WHERE `id_usuario` = ".$_SESSION['usu_id']." ";
                  echo $contact_con;
                  $display_contact=mysqli_query($conexion,$contact_con);
                    while($print_contact   =   mysqli_fetch_array($display_contact))
                         {
                            echo "<div>".$print_contact['nombre_contacto']."</div>";
                            echo "<div>".$print_contact['apellido1_contacto']."</div>";
                            echo "<div>".$print_contact['apellido2_contacto']."</div>";
                            echo "<div>".$print_contact['correo_contacto']."</div>";
                            echo "<div>".$print_contact['telefono1_contacto']."</div>";
                            echo "<div>".$print_contact['telefono2_contacto']."</div>";
                            echo "<div>".$print_contact['ubicacion1_contacto']."</div>";
                            echo "<div>".$print_contact['ubicacion1_contacto']."</div>";

                         }
            ?>

        </div><!-- end show user>
    </div><!-- end container -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>