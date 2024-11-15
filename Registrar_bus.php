<?php
require 'conec_bd.php';
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

$sql = "SELECT num_licencia,CONCAT(co_nombres, ', ',co_apellidos) AS nombres FROM conductor";
     $resultado = $mysqli->query($sql);

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Conductor</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/disenio_vista_principal.css" rel="stylesheet">
    <link href="css/disenio_reg_mod_conductor.css" rel="stylesheet">  
    
    <style>
      select {
        display: block;
        position: relative;
        right: -30px;
      }
    </style>
  </head>
  <body>
    
  <div class="container-fluid text-black" style="background-color: #BEE7F4">
        
        <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
            <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>TRANSBUS</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid">
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
      
  <div class="container-fluid text-white" id="contenedor_fondo">  

          <form class="row g-3" id="formulario" method="post" name="registro_bus" action="guarda_bus.php">
                <!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
            <!-- GUARDAR LA INFO   -->
                    <div class="col-12">
                      <h3>Datos del bus</h3>
                    </div>
                    <div class="col-md-4">
                      <label for="num_bus" class="form-label">Numero de bus</label>
                      <input type="text" class="form-control" name="num_bus" id="num_bus"
                      placeholder="Escribe el numero de bus" required>
                    </div>
                    <div class="col-md-4">
                      <label for="modelo" class="form-label">Modelo</label>
                      <input type="text" class="form-control" name="modelo" id="modelo" 
                      placeholder="Escribe el modelo de bus" required>
                    </div>
                    <div class="col-md-4">
                      <label for="capacidad" class="form-label">Capacidad</label>
                      <input type="text" class="form-control" name="capacidad" id="capacidad" 
                      placeholder="Indica la cantidad de asientos del bus" required>
                    </div>
                    <div class="col-md-6">
                      <label for="fab" class="form-label">Año de fabricación</label>
                      <input type="text" class="form-control" name="fab" id="fab" 
                      placeholder="Indica el año de fabricacion del bus" required>
                    </div>
                    <div class="col-md-6">
                      <label for="fab" class="form-label">CONDUCTOR</label>
                      <select class="form-select" name="lista">
                        <option selected>Seleccione una opcion</option>
                        <?php 
                        
                        while($fila = $resultado->fetch_assoc()) {
                          
                        echo '<option value="'.$fila['num_licencia'].'">'.$fila['nombres'].'</option>';
                        }
                      ?>
                      </select>
                    </div>
                    <input type="hidden" name="id_co" id="id_co" value="<?php echo $id_conductor ?>">
              
                    <div class="col-md-12">
                      <br>
                      <button type="submit" class="btn btn-primary" id="guarda_co" name="guarda_co">Registrar</button>
                      <!-- BOTON PARA REGISTRAR CONDUCTOR -->
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
  var numbus = document.getElementById('num_bus');
  var modelo = document.getElementById('modelo');
  var capacidad = document.getElementById('capacidad');
  var anio_fab = document.getElementById('fab');
  var id_con = document.getElementById('id_co');

  // Guardar los datos del formulario en el almacenamiento local
  sessionStorage.setItem('num_bus', numbus.value);
  sessionStorage.setItem('modelo', modelo.value);
  sessionStorage.setItem('capacidad', capacidad.value);
  sessionStorage.setItem('fab', anio_fab.value);
  sessionStorage.setItem('id_co', id_con.value);


  // Eliminar los datos del formulario al cambiar de pestaña
  numbus.value = '';
  modelo.value = '';
  capacidad.value = '';
  anio_fab.value = '';
  id_con.value = '';


});

window.addEventListener('load', function() {
  var numbus = document.getElementById('num_bus');
  var modelo = document.getElementById('modelo');
  var capacidad = document.getElementById('capacidad');
  var anio_fab = document.getElementById('fab');
  var id_con = document.getElementById('id_co');

  // Obtener los datos del almacenamiento local y restaurarlos en los campos del formulario
  if (sessionStorage.getItem('num_bus')) {
    numbus.value = sessionStorage.getItem('nombres_co');
  }

  if (sessionStorage.getItem('modelo')) {
    modelo.value = sessionStorage.getItem('apellidos_co');
  }

  if (sessionStorage.getItem('capacidad')) {
    capacidad.value = sessionStorage.getItem('num_iicencia');
  }

  if (sessionStorage.getItem('fab')) {
    anio_fab.value = sessionStorage.getItem('contacto_co');
  }

  if (sessionStorage.getItem('id_co')) {
    id_con.value = sessionStorage.getItem('id_co');
  }


});


    </script>
  </body>
  
</html>