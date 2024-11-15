
 
 <!--CONSULTAMOS LOS DATOS DE TABLA CONDUCTOR DE LA BASE DE DATOS -->
<?php
require 'conec_bd.php';

$sql = "SELECT id_conductor, co_nombres, co_apellidos, 
num_licencia, num_contacto FROM conductor WHERE co_disponibilidad = 'Activo';";
     $resultado = $mysqli->query($sql);

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
    echo '<style>#v_pas,#v_b,#v_cdt,#v_b,#v_bd { display: none; }</style>';
    echo '<style>#v_con { display: none; }</style>';
    }
}
?> 


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de gestion de buses</title>
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
        $('#tablacond').DataTable();
      });
    </script>

  </head>
  <body style="background-color: white">
    
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
        <br>
        <a class="btn btn-primary" role="button" href="Registrar_conductor.php"><strong>Registrar Conductor</strong></a>
         
            <div class="tabla_co">
                <table id="tablacond" class="display" style="width:100%">
                    <thead>
                    <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Licencia</th>
                    <th>Telefono</th>
                    <th></th>
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
                        <td><?php echo $fila['co_nombres'];?></td>
                        <td><?php echo $fila['co_apellidos'];?></td>
                        <td><?php echo $fila['num_licencia'];?></td>
                        <td><?php echo $fila['num_contacto'];?></td>
                    
                        <td><a class="btn btn-warning" role="button" 
                        href="Modificar_conductor.php?id_co=<?php echo $fila['id_conductor'];?>"><strong>Modificar</strong></a></td>
                        <td><a class="btn btn-danger"
                        href="Eliminar_conductor.php?id_co=<?php echo $fila['id_conductor'];?>">Eliminar</a></td>
                        <td><a class="btn btn-success"
                        href="Registrar_bus.php?id_co=<?php echo $fila['id_conductor'];?>"><b>Seleccionar</b></a></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
                
          </div>
      </div>

      


  </body>
</html>