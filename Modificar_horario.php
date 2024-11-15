<?php

require 'conec_bd.php';

$id = $mysqli->real_escape_string($_GET['id_horario']);

$sql = "SELECT dia, hora_salida FROM horario WHERE id_horario = $id LIMIT 1";
$resultado = $mysqli->query($sql);

$fila = $resultado->fetch_assoc();
?>

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

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Conductor</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/disenio_vista_principal.css" rel="stylesheet">
    <link href="css/disenio_reg_mod_conductor.css" rel="stylesheet">  
    
  </head>
  <body style="background-color: white">
    
  <div class="container-fluid text-black" style="background-color: #BEE7F4">
        
        <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
            <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>Sistema de gestion de buses</strong></a>
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
              <form class="row g-3" id="formulario" method="POST" name="modificar_co" action="modificar_cond.php">
                <!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
            <!-- MODIFICAR LA INFO   -->
                <div class="col-12">
                <h3>Datos del conductor</h3>
                </div>

    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Dia disponible</label>
        <input type="text" class="form-control" name="dia" placeholder="Indica el dia disponible" 
        value = "<?php echo $fila['dia']; ?>" required>
        <input type="hidden" id = "id_co" name = "id_horario" value = "<?php echo $id; ?>">
    </div>

  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Hora de salida</label>
    <input type="text" class="form-control" name="salida" placeholder="Indica la hora de salida" 
    value = "<?php echo $fila['hora_salida']; ?>" required>
  </div>          

        <div class="col-md-12">
          
          <button type="submit" class="btn btn-primary" id="modificar_co" name="modificar_co"
          >Modificar</button>
          <!-- BOTON PARA MODIFICAR CONDUCTOR -->
          <br>
          <br>
          </div>

          
      </form>
    

      </div>
      

      


    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
  </body>
  
</html>