<?php
require 'conec_bd.php';

$sql = "SELECT id_reserva, pas_nombres, pas_apellidos,
fecha_reserva,asiento_reservado, ruta_origen,
ruta_destino, duracion_estimada, tarifa
        FROM reserva INNER JOIN ruta USING (id_ruta)
        INNER JOIN pasajero USING (id_pasajero);";
     $resultado = $mysqli->query($sql);

?>

<?php

session_start(); // Asegúrate de iniciar la sesión en todas las vistas que requieren autenticación

$usu_sesion = $_SESSION['usu'];
$nombre_pas = $_SESSION['nom'];
$ape_pas = $_SESSION['ape'];
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
    $sql = "SELECT id_reserva, pas_nombres, pas_apellidos,
fecha_reserva,asiento_reservado, ruta_origen,
ruta_destino, duracion_estimada, tarifa
        FROM reserva INNER JOIN ruta USING (id_ruta)
        INNER JOIN pasajero USING (id_pasajero)
        WHERE pas_nombres = '$nombre_pas' AND pas_apellidos = '$ape_pas';";
     $resultado = $mysqli->query($sql);
    }
}
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rutas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/disenio.css" rel="stylesheet">
    <link rel= "stylesheet" href="css/jquery.dataTables.min.css">

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function () {
        $('#tablaruta').DataTable();
      });
    </script>

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
       
      <br>
        <a class="btn btn-primary" role="button" href="Registrar_reserva.php"><strong>Registrar Reserva</strong></a>
        
            <div class="tabla_ru">
                <table id="tablaruta" class="display" style="width:100%">
                    <thead>
                    <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha de reserva</th>
                    <th>Asiento reservado</th>
                    <th>Inicio</th>
                    <th>Destino</th>
                    
                    <th>Tiempo estimado</th>
                    <th>Tarifa</th>
                    
                    
                    
                    
                    <th></th>
                    <th></th>
                    <!-- USAMOS 2 COLUMNAS MAS PARA EL BOTON MODIFICAR Y ELIMINAR-->
                    </tr>
                    </thead>
                    <tbody>
                  <!--AQUI AGREGAMOS LOS RESULTADOS DE LA TABLA CONDUCTOR EN MYSQL -->
                  <!--RECORREMOS LOS RESULTADOS DE LA CONSULTA -->
                  <?php
                    while($fila = $resultado->fetch_assoc()) {
                  ?>
                    <tr>
                      
                        <td><?php echo $fila['pas_nombres'];?></td>
                        <td><?php echo $fila['pas_apellidos'];?></td>
                        <td><?php echo $fila['fecha_reserva'];?></td>
                        <td><?php echo $fila['asiento_reservado'];?></td>
                        <td><?php echo $fila['ruta_origen'];?></td>
                        <td><?php echo $fila['ruta_destino'];?></td>
                        <td><?php echo $fila['duracion_estimada'];?></td>
                        <td><?php echo $fila['tarifa'];?></td>
                     
                        <td><a class="btn btn-danger" role="button"
                        href="Eliminar_reserva.php?id_reserva=<?php echo $fila['id_reserva'];?>">Eliminar</a></td>
                        <form method="post" action="reportes.php">
                          <input type="hidden" value="<?php echo $fila['id_reserva'];?>" name="reserva">
                        <td><button class="btn btn-dark" role="button" href="reportes.php"><b>PDF</b></button></td>
                        </form> 
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
                
          </div>

</div>


    
  </body>
  
</html>

