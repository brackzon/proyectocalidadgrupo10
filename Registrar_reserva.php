<?php
require 'conec_bd.php';
session_start(); // Asegúrate de iniciar la sesión en todas las vistas que requieren autenticación

$usu_sesion = $_SESSION['usu'];
$nom_pasajero = $_SESSION['nom'];
$ape_pasajero = $_SESSION['ape'];
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
    echo '<style>#v_bus { display: none; }</style>';
    echo '<style>#v_cdt { display: none; }</style>';
    echo '<style>#v_bdi { display: none; }</style>';

    
}
}



if (!$_POST) {
  //para que no salgan errores en pantalla
  error_reporting(0);
}
error_reporting(0);
//llamar a los inputs que estan en el mapa
$id_rut= $_POST['selec_ruta'];
$origen= $_POST['selec_inicio'];
$destino= $_POST['selec_final'];
$distancia = $_POST['selec_dis'];
$tiempo = $_POST['selec_tie'];
$tarifa = $_POST['selec_tarifa'];

//echo "el origen es $tiempo y el destino es $distancia";

//separado el numero de la letra
$cadena = $distancia;
$separador = " ";
$separada = explode($separador,$cadena);
//para ver el arreglo
//var_dump($separada);
//echo $separada[0];
$num_sin_formato = $separada[0];
//cambiar la coma por el punto
$num_con_formato = str_replace(",",".",$num_sin_formato);
//convertir a decimal
$distancia_numerica = (double) $num_con_formato;
$tarifa;
if ($distancia_numerica != 0.00) {
  if($distancia_numerica < 300.00) {
    $tarifa = 30.00;
  }
  elseif ($distancia_numerica > 300.00 && $distancia_numerica <= 500.00) {
    $tarifa = 40.00;
  }
  elseif ($distancia_numerica > 500.00 && $distancia_numerica < 800.00) {
    $tarifa = 80.00;
  }
  else {$tarifa = 120.00;}
}
else {
  echo "<script>var tarifa = document.getElementById('tarifa_re');";
  echo "tarifa.value = '';</script>";
}
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pasajeros</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/disenio_vista_principal.css" rel="stylesheet">
    <link href="css/disenio_reg_mod_conductor.css" rel="stylesheet">  
  </head>
  <body>
    
  <div class="container-fluid text-black" style="background-color: #BEE7F4">
        
        <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
            <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>TRANSBUS</strong> </a>
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
                  <a class="nav-link" id="v_bus" href="bus.php"><strong>Buses</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="v_cdt" href="calcular_distancia_tiempo.php"><strong>Distancia y tiempo</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="v_bdi" href="buscador_direcciones.php"><strong>Ubicación</strong></a>
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
      <form class="row g-3" id="formulario" name="registro_cond" method="POST" action="guarda_reserva.php">
                <!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
            <!-- GUARDAR LA INFO   -->
                <div class="col-12">
                <h3>Datos de la reserva</h3>
                </div>
  <div class="col-md-6">
    <label for="fecha_re" class="form-label">Fecha de reserva</label>
    <input type="date" class="form-control" name="fecha_re" id="fecha_re" required>
  </div>
  <div class="col-md-6">
    <label for="asiento_re" class="form-label">Asiento reservado</label>
    <input type="text" class="form-control" name="asiento_re" id="asiento_re" autocomplete="off"
    required>
  </div>
  <div class="col-md-6">
    <label for="nombre_re" class="form-label">Nombres</label>
    <input type="text" class="form-control" name="nombre_re" id="nombre_re" autocomplete="off"
    value = "<?php echo $nom_pasajero; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="apellido_re" class="form-label">Apellidos</label>
    <input type="text" class="form-control" name="apellido_re" id="apellido_re" autocomplete="off"
    value = "<?php echo $ape_pasajero; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="inicio_re" class="form-label">Inicio</label>
    <input type="text" class="form-control" name="inicio_re" id="inicio_re" autocomplete="off"
    value = "<?php echo $origen; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="destino_re" class="form-label">Destino</label>
    <input type="text" class="form-control" name="destino_re" id="destino_re" autocomplete="off"
    value = "<?php echo $destino; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="tiempo_re" class="form-label">Tiempo</label>
    <input type="text" class="form-control" name="tiempo_re" id="tiempo_re" autocomplete="off"
    value = "<?php echo $tiempo; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="distancia_re" class="form-label">Distancia</label>
    <input type="text" class="form-control" name="distancia_re" id="distancia_re" autocomplete="off"
    value = "<?php echo $distancia; ?>" required>
  </div>
  <div class="col-md-4">
    <label for="tarifa_re" class="form-label">Tarifa</label>
    <input type="text" class="form-control" name="tarifa_re" id="tarifa_re" autocomplete="off"
    value = "<?php echo $tarifa; ?>" required>
    <input type="hidden" name="ruta" value="<?php echo $id_rut; ?>">
    
    <?php 
    if ($_SESSION['pf'] === 'Pasajero') {
      $sql = "SELECT id_pasajero FROM pasajero WHERE pas_nombres = '$nom_pasajero'
AND pas_apellidos = '$ape_pasajero' LIMIT 1";
$resultado = $mysqli->query($sql);
while($fila = $resultado->fetch_assoc()) {
    $id = $fila['id_pasajero'];
    echo "<input type='hidden' name='pasajero' value='$id'>";
    }
    } else {echo "";}
    ?>
   
  </div>      

        <div class="col-md-8">
          <br>
          <button type="submit" class="btn btn-primary" id="guarda_co" name="guarda_co">Registrar</button>
          <!-- BOTON PARA REGISTRAR CONDUCTOR -->
          <br>
          <br>
          </div>

          
      </form>
      </div>

      <script>

  </script>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
  </body>
  
</html>