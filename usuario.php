<?php

session_start(); // Asegúrate de iniciar la sesión en todas las vistas que requieren autenticación

$usu_sesion = $_SESSION['usu'];
$nombres = $_SESSION['nom'];
$apellidos = $_SESSION['ape'];
// Verificar el tipo de usuario
if ($usu_sesion = '' || $usu_sesion == null) {
  header('Location: http://localhost/sistema_gestion_buses/sistema_buses_2.php');
  die();
}
else {
  require 'conec_bd.php';
  if ($_SESSION['pf'] === 'Administrador') {
$sql = "SELECT nombres, apellidos, perfil, nom_usuario, contrasenia FROM usuario
where nombres = '$nombres' AND apellidos = '$apellidos' LIMIT 1;";
     $resultado = $mysqli->query($sql);
  }

echo '<style>#crear_usuario { display: none; }</style>';
if ($_SESSION['pf'] === 'Pasajero') {
  $sql = "SELECT pas_nombres, pas_apellidos, pas_email, pas_telefono FROM pasajero
where pas_nombres = '$nombres' AND pas_apellidos = '$apellidos' LIMIT 1;";
     $resultado = $mysqli->query($sql);

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
    <title>Pasajeros</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <style>
      
      body {
  background: linear-gradient(90deg, #04FEA7, #3C88F0,#FEBE04, #F0F03C);
  background-size: 200% 200%;
  animation: gradientAnimation 5s ease infinite;
}

@keyframes gradientAnimation {
  0% {
    background-position: 0% 50%;
  }
  25% {
    background-position: 100% 50%;
  }
  50% {
    background-position: 50% 100%;
  }
  75% {
    background-position: 50% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}


      #user-profile {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#user-profile img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin-bottom: 0px;
}

#user-profile h2 {
  font-size: 24px;
  margin-bottom: 15px;
}

#user-profile p {
  font-size: 16px;
  margin-bottom: 10px;
}

#user-profile p:last-child {
  margin-bottom: 0;
}

      </style>
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
                  <a class="nav-link" id="v_b" href="bus.php"><strong>Buses</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="v_cdt" href="calcular_distancia_tiempo.php"><strong>Distancia y tiempo</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="v_bd" href="buscador_direcciones.php"><strong>Ubicación</strong></a>
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

      <div id="user-profile">
        
      <img src="images/usuario.png" alt="usuario">
      <?php
      if ($_SESSION['pf'] === 'Pasajero') {
                    while($fila = $resultado->fetch_assoc()) {
                  ?>
                  <br>
      <h2><?php echo $fila['pas_nombres'] . ', ' . $fila['pas_apellidos'];?></h2>
      
  <p>Correo electrónico: <?php echo $fila['pas_email'];?></p>
  <p>Teléfono: <?php echo $fila['pas_telefono'];?></p>
  <?php }?>
  <?php }?>

  <?php
     if ($_SESSION['pf'] === 'Administrador') {
                    while($fila = $resultado->fetch_assoc()) {
                  ?>
      <h2><?php echo $fila['nombres'] . ', ' . $fila['apellidos'];?></h2>
  <p>Perfil: <?php echo $fila['perfil'];?></p>
  <p>Usuario: <?php echo $fila['nom_usuario'];?></p>
  <p>Contraseña: <?php echo $fila['contrasenia'];?></p>
  <?php }?>
  <?php }?>

  


      </div>


    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
  
</html>