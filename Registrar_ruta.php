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

if (!$_POST) {
  //para que no salgan errores en pantalla
  error_reporting(0);
}
error_reporting(0);
$origen= $_POST['from'];
$destino= $_POST['to'];
$distancia = $_POST['distancia'];
$tiempo = $_POST['tiempo'];
$id_bus = $_POST['bus'];
$id_hor = $_POST['hora'];




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
  echo "<script>var tarifa = document.getElementById('tarifa');";
  echo "tarifa.value = '';</script>";
}
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
  </div>   
        
  <div class="container-fluid text-white" id="contenedor2">            
              <form class="row g-3" id="formulario" method="post" name="guarda_ruta" action="guarda_ruta.php">
                <!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
            <!-- GUARDAR LA INFO   -->
                <div class="col-12">
                <h3>Escriba los datos solicitados</h3>
                </div>
                <div class="col-md-6">
    <label for="inicio" class="form-label">Inicio</label>
    <input type="text" class="form-control" name="inicio" id="inicio" autocomplete="off"
    value = "<?php echo $origen; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="destino" class="form-label">Destino</label>
    <input type="text" class="form-control" name="destino" id="destino" autocomplete="off"
    value = "<?php echo $destino; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="distancia" class="form-label">Distancia</label>
    <input type="text" class="form-control" name="distancia" id="distancia" autocomplete="off"
    value = "<?php echo $distancia; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="tiempo" class="form-label">Tiempo</label>
    <input type="text" class="form-control" name="tiempo" id="tiempo" autocomplete="off"
    value = "<?php echo $tiempo; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="tarifa" class="form-label">Tarifa</label>
    <input type="text" class="form-control" name="tarifa" id="tarifa" autocomplete="off"
    value = "<?php echo $tarifa; ?>" required>
  </div>
  <input type="hidden" name="id_bus" id="id_bus" value="<?php echo $id_bus ?>">
  <input type="hidden" name="id_hor" id="id_hor" value="<?php echo $id_hor ?>">
  
        <div class="col-md-12">
          <br>
          <button type="submit" class="btn btn-primary" id="guarda_ru" name="guarda_ru">Registrar</button>
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
  var inicio = document.getElementById('inicio');
  var destino = document.getElementById('destino');
  var distancia = document.getElementById('distancia');
  var tiempo = document.getElementById('tiempo');
  var tarifa = document.getElementById('tarifa');
  var bus = document.getElementById('id_bus');
  var hora = document.getElementById('id_hor');

  // Guardar los datos del formulario en el almacenamiento local
  sessionStorage.setItem('inicio', inicio.value);
  sessionStorage.setItem('destino', destino.value);
  sessionStorage.setItem('distancia', distancia.value);
  sessionStorage.setItem('tiempo', tiempo.value);
  sessionStorage.setItem('tarifa', tarifa.value);
  sessionStorage.setItem('id_bus', bus.value);
  sessionStorage.setItem('id_hor', hora.value);

  // Eliminar los datos del formulario al cambiar de pestaña
  inicio.value = '';
  destino.value = '';
  distancia.value = '';
  tiempo.value = '';
  tarifa.value = '';
  bus.value = '';
  hora.value = '';

});

window.addEventListener('load', function() {
  var inicio = document.getElementById('inicio');
  var destino = document.getElementById('destino');
  var distancia = document.getElementById('distancia');
  var tiempo = document.getElementById('tiempo');
  var tarifa = document.getElementById('tarifa');
  var bus = document.getElementById('id_bus');
  var hora = document.getElementById('id_hor');

  // Obtener los datos del almacenamiento local y restaurarlos en los campos del formulario
  if (sessionStorage.getItem('inicio')) {
    inicio.value = sessionStorage.getItem('inicio');
  }

  if (sessionStorage.getItem('destino')) {
    destino.value = sessionStorage.getItem('destino');
  }

  if (sessionStorage.getItem('distancia')) {
    distancia.value = sessionStorage.getItem('distancia');
  }

  if (sessionStorage.getItem('tiempo')) {
    tiempo.value = sessionStorage.getItem('tiempo');
  }

  if (sessionStorage.getItem('tarifa')) {
    tarifa.value = sessionStorage.getItem('tarifa');
  }

  if (sessionStorage.getItem('id_bus')) {
    bus.value = sessionStorage.getItem('id_bus');
  }

  if (sessionStorage.getItem('id_hor')) {
    hora.value = sessionStorage.getItem('id_hor');
  }
});


    </script>

  </body>

    </html>