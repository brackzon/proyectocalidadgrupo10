<?php

session_start(); // Asegúrate de iniciar la sesión en todas las vistas que requieren autenticación

$usu_sesion = $_SESSION['usu'];
// Verificar el tipo de usuario
if ($usu_sesion = '' || $usu_sesion == null) {
  header('Location: http://localhost/sistema_gestion_buses/Iniciar_sesion.php');
  die();
}
else {

echo '<style>#crear_usuario { display: none; }</style>';
if ($_SESSION['pf'] === 'Pasajero') {
    // Ocultar el boton
    echo '<style>#v_pas { display: none; }</style>';
    echo '<style>#v_con { display: none; }</style>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Distances btn two cities App</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/ab2155e76b.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="css/App.css" rel="stylesheet" />
</head>
<body>
  

    <div class="jumbotron">
        <div class="container-fluid">
            <h2>Encuentra el tiempo y distancia entre 2 lugares.</h2>
            <form class="form-horizontal" method="POST" action="Registrar_ruta.php">
                <div class="form-group">
                    <label for="from" class="col-xs-2 control-label"><i class="far fa-dot-circle"></i></label>
                    <div class="col-xs-4">
                        <input type="text" id="from" name="from" placeholder="Origin" class="form-control">
                    </div>
               </div>
               <div class="form-group">
                
                    <label for="to" class="col-xs-2 control-label"><i class="fas fa-map-marker-alt"></i></label>
                    <div class="col-xs-4">
                        <input type="text" id="to" name ="to" placeholder="Destination" class="form-control">
                    </div>
                    <input type="hidden" id="tiempo" name ="tiempo" class="form-control">
                    <input type="hidden" id="distancia" name ="distancia" class="form-control">
                 </div>
                 <button class="btn btn-info" type="submit">Datos</button>
            </form>

            <div class="col-xs-offset-2 col-xs-10">
                <button class="btn btn-info btn-lg " onclick="calcRoute();"><i class="fas fa-map-signs"></i></button>
            </div>
            <br>
            <div class="col-xs-4">
                <a class="btn btn-primary" href="sistema_buses.php"><strong>Regresar</strong></a>
            </div>
            
            </form>
        </div>
        <div class="container-fluid">
            <div id="googleMap">

            </div>
            <div id="output">

            </div>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkfRsO7eHz4JkT_w3EjlgZbWIO3f7WAa8&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/Main.js"></script>

    <script>
          //restaurar datos del formulario
      window.addEventListener('beforeunload', function(event) {
  // Obtener el formulario y sus campos
  var origen = document.getElementById('from');
  var destino = document.getElementById('to');


  // Guardar los datos del formulario en el almacenamiento local
  sessionStorage.setItem('from', origen.value);
  sessionStorage.setItem('to', destino.value);

  // Eliminar los datos del formulario al cambiar de pestaña
  origen.value = '';
  destino.value = '';

});

window.addEventListener('load', function() {
  var origen = document.getElementById('from');
  var destino = document.getElementById('to');


  // Obtener los datos del almacenamiento local y restaurarlos en los campos del formulario
  if (sessionStorage.getItem('from')) {
    origen.value = sessionStorage.getItem('from');
  }

  if (sessionStorage.getItem('to')) {
    destino.value = sessionStorage.getItem('to');
  }

});


    </script>

</body>
</html>