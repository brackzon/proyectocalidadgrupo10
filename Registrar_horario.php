<?php

session_start(); // Asegúrate de iniciar la sesión en todas las vistas que requieren autenticación

$usu_sesion = $_SESSION['usu'];
// Verificar el tipo de usuario
if ($usu_sesion = '' || $usu_sesion == null) {
  header('Location: http://localhost/sistema_gestion_buses/sistema_buses_2.php');
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

if (!$_GET) {
  //para que no salgan errores en pantalla
  error_reporting(0);
}
$id_conductor = $_GET['id_co'];

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Horario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/disenio_vista_principal.css" rel="stylesheet">
    <link href="css/disenio_reg_mod_conductor.css" rel="stylesheet">  
    
  </head>
  <body>
    
  <div class="container-fluid text-black" style="background-color: #BEE7F4">
        
        <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
            <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>TRANSBUS</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container fluid">
              <div class="collapse navbar-collapse" id="MenuNavegacion">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="sistema_buses.php"><strong>Inicio</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" id="v_pas" href="pasajeros.php"><strong>Pasajero</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="usuario.php"><strong>Usuario</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" id="v_con" href="conductor.php"><strong>Conductor</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="reservas.php"><strong>Reservas</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="rutas.php"><strong>Rutas</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="bus.php"><strong>Buses</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calcular_distancia_tiempo.php"><strong>Distancia y tiempo</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buscador_direcciones.php"><strong>Ubicación</strong></a>
                </li>
                <li class="nav-item">
                  <a class='nav-link btn btn-danger' id='cerrar_sesion' role='button' href='cerrar_sesion.php'><strong>Cerrar sesion</strong></a>
                  <a class="nav-link btn btn-success" role="button" href="iniciar_sesion.php" id="crear_usuario"><strong>Iniciar sesion</strong></a>
                </li>
              </ul>
              </div>
            </div>
          </div>
        </nav>

  </div>
      
  <div class="container-fluid" id="contenedor_fondo">
      </div>
      
      <div class="container-fluid text-white" id="contenedor2">
      <form class="row g-3" id="formulario" method="post" name="registro_bus" action="guarda_horario.php">
                <!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
            <!-- GUARDAR LA INFO   -->
                <div class="col-12">
                <h3>Datos del horario</h3>
                </div>
  <div class="col-md-6">
    <label for="dia" class="form-label">Dia disponible</label>
    <input type="text" class="form-control" name="dia" id="dia"
    placeholder="Indica el dia disponible" required>
  </div>
  <div class="col-md-6">
    <label for="salida" class="form-label">Hora de salida</label>
    <input type="text" class="form-control" name="salida" id="salida" 
    placeholder="Indica la hora de salida del bus" required>
  </div>      

        <div class="col-md-12">
          <br>
          <button type="submit" class="btn btn-primary" id="guarda_co" name="guarda_co">Registrar</button>
          <br>
          <br>
          </div>

          
      </form>
      </div>


    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    
    <script>
      //restaurar datos del formulario
      window.addEventListener('beforeunload', function(event) {
  // Obtener el formulario y sus campos
  var dia = document.getElementById('dia');
  var salida = document.getElementById('salida');


  // Guardar los datos del formulario en el almacenamiento local
  sessionStorage.setItem('dia', dia.value);
  sessionStorage.setItem('salida', salida.value);


  // Eliminar los datos del formulario al cambiar de pestaña
  dia.value = '';
  salida.value = '';

});

window.addEventListener('load', function() {
    var dia = document.getElementById('dia');
  var salida = document.getElementById('salida');

  // Obtener los datos del almacenamiento local y restaurarlos en los campos del formulario
  if (sessionStorage.getItem('dia')) {
    dia.value = sessionStorage.getItem('dia');
  }

  if (sessionStorage.getItem('salida')) {
    salida.value = sessionStorage.getItem('salida');
  }

});


    </script>
  </body>
  
</html>