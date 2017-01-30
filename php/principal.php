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
    <script type="text/javascript">
        function unlock(){
            document.getElementById('contact_name').readOnly=false;
            document.getElementById('contact_lastname1').readOnly=false;
            document.getElementById('contact_lastname2').readOnly=false;
            document.getElementById('mail').readOnly=false;
            document.getElementById('phone').readOnly=false;
            document.getElementById('phone2').readOnly=false;
            document.getElementById('location1').readOnly=false;
            document.getElementById('location2').readOnly=false;
            document.getElementById('send').style.display='block';
            alert("Ya puedes modificar sus contactos")
        }
        function block(){
            document.getElementById('contact_name').readOnly=true;
            document.getElementById('contact_lastname1').readOnly=true;
            document.getElementById('contact_lastname2').readOnly=true;
            document.getElementById('mail').readOnly=true;
            document.getElementById('phone').readOnly=true;
            document.getElementById('phone2').readOnly=true;
            document.getElementById('location1').readOnly=true;
            document.getElementById('location2').readOnly=true;
        }
    </script>
</head>
<body>
    
        <div class="row">
            <div class="logcol col-md-2">
                <img src="../css/img/logo.png" class="prin_logo img-rounded"/>
            </div><!--end log-->
            <div class="col-md-8">
            <?php 
             echo  "<a href='modificar_user.php'><button class='btn btn-info'>Modificar mis datos</button></a>";
             echo " <a href='anadir_contacto.php'><button class='btn btn-info'>Añadir contactos</button></a>";


             echo " <a href='proc/logout.proc.php'> <button class='btn btn-danger'>Logout</button></a>";
            ?>
            </div><!-- end buttons-->
    <div class="content-form col-md-10">
        <div class="showuser col-md-8">
           <!-- <form name="fr_modify" action="/proc/modificar.php" method="GET">-->
            <?php
                 //preparamos la consulta para sacar información de la tabla de contactos
                  $contact_con="SELECT * FROM `tbl_contacto` WHERE `id_usuario` = ".$_SESSION['usu_id']." ";
                 // echo $contact_con;
                  $display_contact=mysqli_query($conexion,$contact_con);
                    while($print_contact   =   mysqli_fetch_array($display_contact))
                         {
                            echo "<div>Nombre: <input type='text' id='contact_name' name='contact_name' value= '".$print_contact['nombre_contacto']."' readonly /></div>";
                            echo "<div> Apellido1: <input type='text' id='contact_lastname1' name='contact_lastname1' value= '".$print_contact['apellido1_contacto']."'readonly /></div>";
                            echo "<div>Apellido2: <input type='text' id='contact_lastname2' name='contact_lastname2' value= '".$print_contact['apellido2_contacto']."' readonly /></div>";
                            echo "<div>Correo: <input type='mail' id='mail' name='mail' value= '".$print_contact['correo_contacto']."' readonly /></div>";
                            echo "<div>Telefono: <input type='text' id='phone' name='phone' value= '".$print_contact['telefono1_contacto']."' readonly /></div>";
                            echo "<div>Telefono: <input type='text' id='phone2' name='phone2' value= '".$print_contact['telefono2_contacto']."' readonly /></div>";
                            echo "<div>Ubicación1:<input type='text' id='location1' name='location1' value= '".$print_contact['ubicacion1_contacto']."' readonly /></div>";
                            echo "<div>Ubicación2:<input type='text' id='location2' name='location2' value= '".$print_contact['ubicacion2_contacto']."' readonly /></div>";
                            echo "<a href='modificar.php?contact_id=".$print_contact['id_contacto']."'><button class='btn btn-info'>Modificar</button></a>";
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