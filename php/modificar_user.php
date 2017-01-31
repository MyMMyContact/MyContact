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
    
        <div class="header-container row col-md-10">
            <div class="logcol col-md-1">
                <img src="../css/img/logo.png" class="prin_logo img-rounded"/>
            </div><!--end log-->
            <div class="col-md-10 buttons">
               <a href="principal.php"><button class="btn btn-info">Principal</button></a>
                <button class="btn btn-info disabled">Modificar mis datos</button>
                 <a href="anadir_contacto.php"><button class="btn btn-info">Añadir contactos</button></a>
                <a href="proc/logout.proc.php" onclick="return confirm('¿Está seguro que desea cerrar sesión?');"><button class="btn btn-danger logout">Logout</button></a>
               
            </div><!-- end buttons-->
        </div><!-- end row -->
    <div class="content-form col-md-10">
        <div class="showuser col-md-8">
           <form name="fr_modify" action="proc/modificar_user.proc.php" method="GET">
           <table class="table table-striped">
            <?php
                 //preparamos la consulta para sacar información de la tabla de contactos
                  $user_con="SELECT * FROM `tbl_usuario` WHERE `id_usuario` = ".$_SESSION['usu_id']."";
                  $display_user=mysqli_query($conexion,$user_con);
                    while($print_user   =   mysqli_fetch_array($display_user))
                         {
                            echo "<tr><td>Nombre</td><td> <input type='text' class='form-control' id='user_name' name='user_name' value= '".$print_user['nombre_usuario']."'></td></tr>";
                            echo "<tr><td>Apellido1</td><td> <input type='text' class='form-control' id='user_lastname1' name='user_lastname1' value= '".$print_user['apellido1_usuario']."'></td></tr>";
                            echo "<tr><td>Apellido2</td><td> <input type='text' class='form-control' id='user_lastname2' name='user_lastname2' value= '".$print_user['apellido2_usuario']."'></td></tr>";
                            echo "<tr><td>Correo</td><td> <input type='mail' class='form-control' id='user_mail' name='user_mail' value= '".$print_user['correo_usuario']."'></td></tr>";
                          
                            echo "<tr><td>contraseña actual</td><td><input type='password' class='form-control' id='user_pass' name='user_pass' value= '".$print_user['contrasena_usuario']."'></td></tr>";
                            echo "<tr><td>Nueva contraseña</td><td><input type='text' class='form-control' id='new_pass' name='new_pass'></td></tr>";
                           // echo "<input type='text' name='con_id' value='".$contact_id."' style='display: none;'/>";
                         }
            ?>
            </table>
            <input type="submit" class="btn btn-info" value="enviar"/>
            </form>
            <a href="proc/remove_contact.proc.php"><button class="btn btn-danger" onclick="return confirm('¿Está seguro que desea borrar su usario y sus contactos?');">Eliminar cuenta</button>
        </div><!-- end show user>
    </div><!-- end container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>