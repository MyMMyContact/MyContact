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

    <script type="text/javascript">
        function validar(){
            var error= "";
            if(document.getElementById('contact_name').value==""){
                error+='El nombre no puede estar vacio \n';
                document.getElementById('contact_name').style.borderColor="red";
               
            }
            if(document.getElementById('contact_lastname1').value==""){
                error+='el primer apellido no puede estar vacio \n';
                document.getElementById('contact_lastname1').style.borderColor="red";
            }
            if(document.getElementById('contact_mail').value==""){
                error+='el correo no puede estar vacio \n';
                 document.getElementById('contact_mail').style.borderColor="red";
            }
            if(document.getElementById('contact_phone').value==""){
                error+='el teléfono1 no puede estar vacio \n';
                document.getElementById('contact_phone').style.borderColor="red";
            }
            if(document.getElementById('contact_location').value==""){
                error+='La localización es obligatoria \n';
                document.getElementById('contact_location').style.borderColor="red";
            }
            if(document.getElementById('contact_location2').value==""){
                error+='La segunda localización es obligatoria \n'
                document.getElementById('contact_location2').style.borderColor="red";
            }
           if(error!=''){
            alert(error);
            return false;
           }
           else{
            return true;
           }
        }

    </script>
        <!--<script type="text/javascript">
            function initMap()
            {
              // Create a map object and specify the DOM element for display.
              var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -34.397, lng: 150.644},
               scrollwheel: false,
                zoom: 8
               });
             }

        </script>-->
        <script type="text/javascript">
            //definimos las variables
            var marker;          //variable del marcador
            var coords = {};    //coordenadas obtenidas con la geolocalización
            var coords2 = {};   
            //Funcion principal del mapa
                initMap = function () 
                {
                     //usamos la API para geolocalizar el usuario
                     navigator.geolocation.getCurrentPosition(
                     function (position)
                    {
                         coords =  {
                         lng: position.coords.longitude,
                         lat: position.coords.latitude
                    };
                   
                     setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
                    },function(error){console.log(error);});
                }

                function setMapa (coords)
                {   
                    // Personalizamos los marcadores de Google
                    var pinColor = "FE7569";
                    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                    new google.maps.Size(21, 34),
                    new google.maps.Point(0,0),
                    new google.maps.Point(10, 34));
                    var pinColor2 = "5858FA";
                    var pinImage2 = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor2,
                    new google.maps.Size(21, 34),
                    new google.maps.Point(0,0),
                    new google.maps.Point(10, 34));
                  //Creamos un nuevo objeto mapa
                  var map = new google.maps.Map(document.getElementById('map'),
                  {
                    zoom: 13,
                    center:new google.maps.LatLng(coords.lat,coords.lng),

                  });

                  //Creamos el marcador en el mapa con sus propiedades
                  //para nuestro obetivo tenemos que poner el atributo draggable en true
                  //position pondremos las mismas coordenas que obtuvimos en la geolocalización
                  marker = new google.maps.Marker({
                    map: map,
                    title: "posicion1",
                    icon: pinImage,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(coords.lat,coords.lng),

                  });
                  marker2 = new google.maps.Marker({
                    map: map,
                    title: "posicion2",
                    icon: pinImage2,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(coords.lat,coords.lng),

                  });
                  //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
                  //cuando el usuario a soltado el marcador
                  marker.addListener('click', toggleBounce);
                  marker2.addListener('click', toggleBounce);
                  marker.addListener( 'dragend', function (event)
                  {
                    //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                    document.getElementById("contact_location").value = this.getPosition().lat()+","+ this.getPosition().lng();
                  });
                  marker2.addListener( 'dragend', function (event)
                  {
                    //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                    document.getElementById("contact_location2").value = this.getPosition().lat()+","+ this.getPosition().lng();
                  });
                }

                //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
                function toggleBounce() {
                if (marker.getAnimation() !== null) {
                 marker.setAnimation(null);
                } else 
                    {
                      marker.setAnimation(google.maps.Animation.BOUNCE);
                 }
                }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlCWelCgG0aL-T2mFwFGvWcjgnaZP1Gxk&callback=initMap"
         async defer></script>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    
        <div class="row">
            <div class="logcol col-md-2">
                <img src="../css/img/logo.png" class="prin_logo img-rounded"/>
            </div><!--end log-->
            <div class="col-md-8">
               <a href='modificar_user.php'><button class="btn btn-info">Modificar mis datos</button></a>
                <button class="btn btn-info disabled">Añadir contactos</button>
                <a href="proc/logout.proc.php"><button class="btn btn-danger logout">Logout</button></a>
                
            </div><!-- end buttons-->
        </div>
    <div class="content-form col-md-10">
        <div class="showuser col-md-8">
           <form name="fr_add" action="proc/anadir_contacto.proc.php" method="GET">
           <table  class="table table-striped">
            <tr><td>Nombre</td><td> <input type='text' id='contact_name' class='form-control' name='contact_name'>*</td></tr>
            <tr><td>Apellido1</td><td> <input type='text' id='contact_lastname1' class='form-control' name='contact_lastname1'>*</td></tr>
            <tr><td>Apellido2</td><td> <input type='text' id='contact_lastname2' class='form-control' name='contact_lastname2'></td></tr>
            <tr><td>Correo:</td><td> <input type='text' id='contact_mail' class='form-control' name='contact_mail'>*</td></tr>
            <tr><td>Telefono1</td><td> <input type='text' id='contact_phone' class='form-control' name='contact_phone'></td></tr>
            <tr><td>Telefono2</td><td> <input type='text' id='contact_phone2' class='form-control' name='contact_phone2'></td></tr>
            <tr><td>Ubicación1</td><td> <input type='text' id='contact_location' class='form-control' name='contact_location'></td></tr>
            <tr><td>Ubicación2</td><td> <input type='text' id='contact_location2' class='form-control' name='contact_location2'></td></tr>

          </table>
          <input type="submit" class="btn btn-info" value="enviar" onclick="return validar()"/>
            
        </div><!-- end show user>-->
        <div id="map" style="width:100%;height:200px;">
             
        </div>


    </div><!-- end container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>