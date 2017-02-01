<?php 
    session_start();
    //importamos la conexión
    require_once("proc/conexion.php");
    if(!isset($_SESSION['usu_id'])){
        header("location:../index.php");
        //echo $_SESSION['usu_id'];
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
    <!--SCRIP-->

</head>
<body>
    
        <div class="header-container row col-md-10">
            <div class="logcol col-md-1">
                <img src="../css/img/logo.png" class="prin_logo img-rounded"/>
            </div><!--end log-->
            <div class="col-md-10 buttons" >
                <a href='principal.php'><button class='btn btn-info disabled'>Principal</button></a>
                 <a href='modificar_user.php'><button class='btn btn-info'>Modificar mis datos</button></a>
                 <a href='anadir_contacto.php'><button class='btn btn-info'>Añadir contactos</button></a>
                 <a href='proc/logout.proc.php'> <button class='btn btn-danger logout' onclick="return confirm('¿Está seguro que desea cerrar sesión?')">Logout</button></a>
           
            </div><!-- end buttons-->
        </div><!-- end row -->
        </div>
    <div class="content-form col-md-10">
        <div class="showuser col-md-8">
           <!-- <form name="fr_modify" action="/proc/modificar.php" method="GET">-->
           <!--<table class="table table-striped">-->
            <?php
                 //preparamos la consulta para sacar información de la tabla de contactos
                  $contact_con="SELECT * FROM `tbl_contacto` WHERE `id_usuario` = ".$_SESSION['usu_id']." ";
                 // echo $contact_con;

                  $display_contact=mysqli_query($conexion,$contact_con);
                  $total=mysqli_num_rows($display_contact);
                  if($total>=1){
                    while($print_contact   =   mysqli_fetch_array($display_contact))
                         {
                          echo "<table class='table table-striped'>";
                            echo "<tr><td>Nombre</td><td> <input type='text' class='form-control' id='contact_name' name='contact_name' value= '".$print_contact['nombre_contacto']."' readonly /></td></tr>";
                            echo "<tr><td>Apellido1</td><td> <input type='text' class='form-control' id='contact_lastname1' name='contact_lastname1' value= '".$print_contact['apellido1_contacto']."'readonly /></td></tr>";
                            echo "<tr><td>Apellido2</td><td> <input type='text' class='form-control' id='contact_lastname2' name='contact_lastname2' value= '".$print_contact['apellido2_contacto']."' readonly /></td></tr>";
                            echo "<tr><td>Correo</td><td> <input type='mail' class='form-control' id='mail' name='mail' value= '".$print_contact['correo_contacto']."' readonly /></td></tr>";
                            echo "<tr><td>Telefono</td><td> <input type='text' class='form-control' id='phone' name='phone' value= '".$print_contact['telefono1_contacto']."' readonly /></td></tr>";
                            echo "<tr><td>Telefono</td><td> <input type='text' class='form-control' id='phone2' name='phone2' value= '".$print_contact['telefono2_contacto']."' readonly /></td></tr>";
                            echo "<tr><td>Ubicación1</td><td ><input type='text' class='form-control' id='location1' name='location1' value= '".$print_contact['ubicacion1_contacto']."' readonly /></td></tr>";
                            echo "<tr><td>Ubicación2</td><td ><input type='text'class='form-control' id='location2' name='location2' value= '".$print_contact['ubicacion2_contacto']."' readonly /></td></tr>";
                            echo "<tr><td cols='2' ><a href='modificar.php?contact_id=".$print_contact['id_contacto']."'><button class='btn btn-info col-md-10 '>Modificar</button></a></td></tr>";
                          echo "</table>";
                         } //end while
                    }//end if
                    else {
                        echo "No tiene contactos que mostrar";
                    }
                         
            ?>

           <!-- </table>-->
        </div><!-- end show user-->

    </div><!-- end container -->
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>