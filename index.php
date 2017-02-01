<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Mycontact</title>
	<!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- CUSTOM CSS  -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
    //Funciones para mostrar/ocultar las capas
    	function showsig(){
    		document.getElementById("sig").style.display="block";
    		document.getElementById("reg").style.display="none";
    		document.getElementById("ins").classList.remove('btn-info');
    		document.getElementById("go").classList.remove('btn-link');
    		document.getElementById("go").classList.add('btn-info');
    	}
    	function showreg(){
    		document.getElementById("sig").style.display="none";
    		document.getElementById("reg").style.display="block";
    		document.getElementById("go").classList.remove('btn-info');
    		document.getElementById("ins").classList.remove('btn-link');
    		document.getElementById("ins").classList.add('btn-info');
    	}
    //Funciones de validación
    	//validacion de login
	    	 function log_validar()
		    {
		      var error ="";

		      if(document.getElementById("l_mail").value=="")
		      {
		        error+="Error, el correo no puede estar vacio \n";
		        document.getElementById("l_mail").style.borderColor="red";
		      }
		       if(document.getElementById("l_password").value=="")
		      {
		        error+="Error, la contraseña no puede estar vacio \n";
		        document.getElementById("l_password").style.borderColor="red";
		      }
		      if(error!="")
		      {
		        alert(error);
		        return false;
		      }
		      else{
		        return true;
		      }
		    }
		//Validacion de registro
			 function reg_validar()
		    {
		      var error ="";

		      if(document.getElementById("s_name").value=="")
		      {
		        error+="Error, el nombre no puede estar vacio \n";
		        document.getElementById("s_name").style.borderColor="red";
		      }
		       if(document.getElementById("s_lastname1").value=="")
		      {
		        error+="Error, el apellido no puede estar vacio \n";
		        document.getElementById("s_lastname1").style.borderColor="red";
		      }

		      if(document.getElementById("s_email").value=="")
		      {
		        error+="Error, el correo no puede estar vacio \n";
		        document.getElementById("s_email").style.borderColor="red";
		      }
		      else
		   {
               emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
               if (emailRegex.test(document.getElementById('s_email').value))
               {

               }
               else
                  {
                     error+='el correo no es correcto \n';
                  }

            }

		       if(document.getElementById("s_password").value=="")
		      {
		        error+="Error, la contraseña no puede estar vacio \n";
		        document.getElementById("s_password").style.borderColor="red";
		      }

		       if(document.getElementById("s_rpassword").value!=document.getElementById("s_password").value)
		      {
		        error+="Error, las contraseñas no coinciden \n";
		        document.getElementById("s_rpassword").style.borderColor="red";
		        document.getElementById("s_password").style.borderColor="red";
		      }
		      if(error!="")
		      {
		        alert(error);
		        return false;
		      }
		      else{
		        return true;
		      }
		    }
    </script>
</head>
<body>
 	<div class="divlogo col-lg-6">
		<img src="css/img/logo.png" class="logo img-rounded"/>
	</div><!--END DIVLOGO-->

	<div class="content-form col-lg-10">

		

			<ul class="nav nav-tabs">
			  <li class="active" onclick="showsig();"><buton id="go" class="btn  btn-link">Acceder</buton></li>
			  <li onclick="showreg();"><buton id="ins" class="btn btn btn-link">Registro</buton></li>
			  
			</ul>



			<!-- FORMULARIO DE LOGUEO-->
			<div class="content-log-form" id="sig">
				<form  name="fr_log" class="form-horizontal" role="form" action ="php/proc/login.proc.php" method="POST">
					  <div class="form-group">
					   		<label for="email" class="col-lg-2 control-label" id=>Email</label>
					  		  <div class="col-lg-7">
					    		  <input type="email" class="form-control" id="l_mail" name="l_mail" placeholder="Email">
					    	  </div>
					  </div>
					  <div class="form-group">
					    	<label for="s_pass" class="col-lg-2 control-label">Contraseña</label>
					   			 <div class="col-lg-7">
					  			    <input type="password" class="form-control" id="l_password" name="l_password" placeholder="Contraseña">
					    		</div>
					  </div>
					  <div class="access">
					  	<button class="btn btn-success" onclick="return log_validar();">¡Entra!</button>
					  	<input type="reset" class=" btn btn-danger" value="Borrar datos" />
					  </div>
			</form>
		</div><!--END CONTENT LOG FORM-->
		<!--FORMULARIO DE REGISTRO-->
			<div class="content-sig-form" id="reg">
				<form name="fr_sig" class="form-horizontal" role="form" action="php/proc/register.proc.php" method="POST">
				<!--nombre -->
				 <div class="form-group">
					   		<label for="ename" class="col-lg-2 control-label">Nombre</label>
					  		  <div class="col-lg-7">
					    		  <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Introduzca su nombre">*
					    	  </div>
					  </div>
				<!-- end nombre -->
				<!--Apellido1 -->
				 <div class="form-group">
					   		<label for="elast1" class="col-lg-2 control-label">Primer apellido</label>
					  		  <div class="col-lg-7">
					    		  <input type="text" class="form-control" id="s_lastname1" name="s_lastname1" placeholder="Introduzca su primer apellido">*
					    	  </div>
					  </div>
				<!-- end Apellido1 -->
				<!--Apellido2 -->
				 <div class="form-group">
					   		<label for="elast2" class="col-lg-2 control-label">Segundo apellido</label>
					  		  <div class="col-lg-7">
					    		  <input type="text" class="form-control" id="s_lastname2" name="s_lastname2" placeholder="Introduzca su segundo apellido">
					    	  </div>
					  </div>
				<!-- end Apellido2 -->
				<!--Correo -->
					  <div class="form-group">
					   		<label for="email" class="col-lg-2 control-label">Email</label>
					  		  <div class="col-lg-7">
					    		  <input type="email" class="form-control" id="s_email" name="s_email" placeholder="Email">
					    	  </div>
					  </div>
				<!--End Correo -->
				<!--Contraseña -->
					  <div class="form-group">
					    	<label for="pass" class="col-lg-2 control-label">Contraseña</label>
					   			 <div class="col-lg-7">
					  			    <input type="password" class="form-control" id="s_password" name="s_password" placeholder="Contraseña">
					    		</div>
					  </div>
				<!--End contraseña -->
				<!--Contraseña -->
					  <div class="form-group">
					    	<label for="rpass" class="col-lg-2 control-label">repita su contraseña</label>
					   			 <div class="col-lg-7">
					  			    <input type="password" class="form-control" id="s_rpassword" placeholder="Por favor repita su contraseña">
					    		</div>
					  </div>
				<!--End contraseña -->
					  <div class="access">
					  	<button class="btn btn-success" onclick="return reg_validar();">¡Registrate!</button>
					  	<input type="reset" class=" btn btn-danger" value="Borrar datos" />
					  </div>
	

	</div><!--END CONTENT  FORM-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="assets/js/bootstrap.min.js"></script>-->
    <script type="text/javascript">
    	document.onload = showsig();
    </script>
</body>
</html>